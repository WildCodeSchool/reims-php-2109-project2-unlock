<?php

namespace App\Model;

class CardManager extends AbstractManager
{

    public const TABLE = "card";

    public function insert(array $card): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`, `description`, `image_url`) VALUES (:name, :description, :image_url) ");// phpcs:ignore
        $statement->bindValue('name', $card['name'], \PDO::PARAM_STR);
        $statement->bindValue('description', $card['description'], \PDO::PARAM_STR);
        $statement->bindValue('image_url', "/assets/images/" . $card['image_url'], \PDO::PARAM_STR);
        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
