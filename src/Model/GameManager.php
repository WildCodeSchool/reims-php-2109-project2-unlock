<?php

namespace App\Model;

class GameManager extends AbstractManager
{
    public const TABLE = 'game';

    //title, description, image url
    public function insert(array $game): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`title`, `description`, `image_url`)
         VALUES (:title, :description, :image_url)");
        $statement->bindValue('title', $game['title'], \PDO::PARAM_STR);
        $statement->bindValue('description', $game['description'], \PDO::PARAM_STR);
        $statement->bindValue('image_url', $game['image_url'], \PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
