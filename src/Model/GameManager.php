<?php

namespace App\Model;

class GameManager extends AbstractManager
{
    public const TABLE = 'game';

    //name, description, image url
    public function insert(array $game): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`, `description`, `instruction`, `image_url`)
         VALUES (:name, :description, :instruction, :image_url)");
        $statement->bindValue('name', $game['name'], \PDO::PARAM_STR);
        $statement->bindValue('description', $game['description'], \PDO::PARAM_STR);
        $statement->bindValue('instruction', $game['instruction'], \PDO::PARAM_STR);
        $statement->bindValue('image_url', "/assets/images/" . $game['image_url'], \PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
