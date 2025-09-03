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
        $statement = $this->pdo->prepare("UPDATE items SET name = :name, link = :link, category = :category, image = :image, value = :value, status = :status WHERE id = :id");
        $statement->bindValue(":id", $item->id, PDO::PARAM_INT);
        $statement->bindValue(":name", $item->name);
        $statement->bindValue(":link", $item->link);
        $statement->bindValue(":category", $item->category);
        $statement->bindValue(":value", $item->value);
        $statement->bindValue(":status", $item->status);

        if ($item->image !== "") {
            $statement->bindValue(":image", $item->image);
        }

        $statement->execute();
        header("Location: /details?id=$item->id");

    }

    public function all(): array
    {
        $itemsList = $this->pdo->query("SELECT * FROM items;")->fetchAll(PDO::FETCH_ASSOC);

        return array_map(
            function (array $itemData) {
                $item = new Item($itemData["name"], $itemData["link"], $itemData["category"], $itemData["value"], $itemData["user_id"], $itemData["status"], $itemData["image"]);
                $item->setId($itemData["id"]);

                return $item;
            },
            $itemsList
        );

    }

    public function findById(int $id): Item
    {
        $statement = $this->pdo->prepare("SELECT * FROM items WHERE id = ?");
        $statement->bindParam(1, $id, PDO::PARAM_INT);
        $statement->execute();
        $row = $statement->fetch(PDO::FETCH_ASSOC);

        $item = new Item(
            $row['name'],
            $row['link'],
            $row['category'],
            $row['value'],
            $row['user_id'],
            $row['status'],
            $row['image']
        );
        $item->setId($id);
        return $item;
    }

    public function markedAsPurchased(int $id): void
    {

        $statement = $this->pdo->prepare("UPDATE items SET status = :status WHERE id = :id");
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->bindValue(":status", "Comprado");
        $statement->execute();

        header("Location: /details?id=$id");
    }
}