<?php

namespace App\Model;

class GameCardsManager extends AbstractManager
{

    public const TABLE = "gamecards";

    public function selectCardsFromGame(int $id): array
    {
        $query = "select * from "
        . CardManager::TABLE
        . " where id not in(select distinct c.id as id from "
        . self::TABLE
        . " right join "
        . CardManager::TABLE
        . " c on c.id = card_id left join "
        . GameManager::TABLE
        . " g on g.id = game_id where game_id = :game_id )";

        $statement = $this->pdo->prepare($query);
        $statement->bindValue("game_id", $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }
}
