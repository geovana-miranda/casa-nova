<?php

namespace CasaNova\Repository;

use PDO;
use CasaNova\Models\Item;

class ItemRepository
{
    public function __construct(private PDO $pdo)
    {
    }

    public function add(Item $item)
    {
        $statement = $this->pdo->prepare("INSERT INTO items (name, image, link, category, value, status, user_id) VALUES (:name, :image, :link, :category, :value, :status, :user_id)");
        $statement->bindValue(":name", $item->name);
        $statement->bindValue(":image", $item->image);
        $statement->bindValue(":link", $item->link);
        $statement->bindValue(":category", $item->category);
        $statement->bindValue(":value", $item->value);
        $statement->bindValue(":status", $item->status);
        $statement->bindValue(":user_id", $item->user_id);
        $statement->execute();

        $id = $this->pdo->lastInsertId();
        $item->setId(intval($id));
    }

    public function remove(int $id, $user_id): bool
    {
        $statement = $this->pdo->prepare("DELETE FROM items WHERE id = :id AND user_id = :user_id");
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        return $statement->execute();
    }

    public function update(Item $item): void
    {
        $statement = $this->pdo->prepare("UPDATE items SET name = :name, link = :link, category = :category, image = :image, value = :value, status = :status WHERE id = :id AND user_id = :user_id");
        $statement->bindValue(":id", $item->id, PDO::PARAM_INT);
        $statement->bindValue(":user_id", $item->user_id, PDO::PARAM_INT);
        $statement->bindValue(":name", $item->name);
        $statement->bindValue(":link", $item->link);
        $statement->bindValue(":category", $item->category);
        $statement->bindValue(":value", $item->value);
        $statement->bindValue(":status", $item->status);
        $statement->bindValue(":image", $item->image);

        $statement->execute();
        header("Location: /details?id=$item->id");

    }

    public function findByUserId(int $user_id): array
    {

        $statement = $this->pdo->prepare("SELECT * FROM items WHERE user_id = ?;");
        $statement->bindValue(1, $user_id, PDO::PARAM_INT);
        $row = $statement->execute();

        if ($row) {

            $itemsList = $statement->fetchAll(PDO::FETCH_ASSOC);
            return array_map(
                function (array $itemData) {
                    $item = new Item($itemData["name"], $itemData["link"], $itemData["category"], $itemData["value"], $itemData["user_id"], $itemData["status"], $itemData["image"]);
                    $item->setId($itemData["id"]);

                    return $item;
                },
                $itemsList
            );
        } else {
            return $itemsList = [];
        }
    }

    public function findById(int $id, $user_id): Item
    {
        $statement = $this->pdo->prepare("SELECT * FROM items WHERE id = :id AND user_id = :user_id");
        $statement->bindValue(":id", $id, PDO::PARAM_INT);
        $statement->bindValue(":user_id", $user_id, PDO::PARAM_INT);
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

    public function markedAsPurchased(int $id, int $user_id): void
    {

        $statement = $this->pdo->prepare("UPDATE items SET status = :status WHERE id = :id AND user_id = :user_id");
        $statement->bindParam(":id", $id, PDO::PARAM_INT);
        $statement->bindValue(":user_id", $user_id, PDO::PARAM_INT);
        $statement->bindValue(":status", "Comprado");
        $statement->execute();

        header("Location: /details?id=$id");
    }
}