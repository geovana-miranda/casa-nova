<?php

namespace CasaNova\Repository;

use PDO;
use CasaNova\Models\Item;

class ItemRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function add(Item $item): bool
    {
        $statement = $this->pdo->prepare("INSERT INTO items (name, image, link, category, value, status, user_id) VALUES (:name, :image, :link, :category, :value, :status, :user_id)");
        $statement->bindValue(":name", $item->name);
        $statement->bindValue(":image", $item->image);
        $statement->bindValue(":link", $item->link);
        $statement->bindValue(":category", $item->category);
        $statement->bindValue(":value", $item->value);
        $statement->bindValue(":status", $item->status);
        $statement->bindValue(":user_id", $item->user_id);

        $result = $statement->execute();

        $id = $this->pdo->lastInsertId();
        $item->setId(intval($id));

        return $result;
    }

    public function remove(int $id): bool
    {
        $statement = $this->pdo->prepare("DELETE FROM items WHERE id = ?");
        $statement->bindParam(1, $id);
        return $statement->execute();
    }

    public function update(Item $item): bool
    {
        $statement = $this->pdo->prepare("UPDATE items SET name = :name, link = :link, category = :category, value = :value WHERE id = :id");
        $statement->bindValue(":id", $item->id, PDO::PARAM_INT);
        $statement->bindValue(":name", $item->name);
        $statement->bindValue(":image", $item->image);
        $statement->bindValue(":link", $item->link);
        $statement->bindValue(":category", $item->category);
        $statement->bindValue(":value", $item->value);
        $statement->bindValue(":status", $item->status);
        return $statement->execute();

    }

    public function all(): array
    {
        $itemsList = $this->pdo->query("SELECT * FROM items;")->fetchAll(PDO::FETCH_ASSOC);


        return array_map(function(array $itemData) {
            $item = new Item($itemData["name"], $itemData["link"], $itemData["category"], $itemData["value"], $itemData["user_id"], $itemData["image"], $itemData["status"]);
            $item->setId($itemData["id"]);

            return $item;
        },
        $itemsList);

    }
}