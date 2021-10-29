<?php

namespace App\Model;

class GameManager extends AbstractManager
{
    public const TABLE = 'game';

    //name, description, image url
    public function insert(array $game): int
    {
        $statement = $this->pdo->prepare("INSERT INTO " . self::TABLE . " (`name`, `description`)
         VALUES (:name, :description)");
        $statement->bindValue('name', $game['name'], \PDO::PARAM_STR);
        $statement->bindValue('description', $game['description'], \PDO::PARAM_STR);

        $statement->execute();
        return (int)$this->pdo->lastInsertId();
    }
}
