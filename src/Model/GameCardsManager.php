<?php

namespace App\Model;

class GameCardsManager extends AbstractManager
{

    public const TABLE = "gamecards";

    public function selectCardsNotFromGame(int $id): array
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

    public function insert(int $gameId, int $cardId, int $cardNumber): void
    {
        $query = "INSERT INTO "
            . self::TABLE
            . " (game_id, card_id, card_number) VALUES (:game_id, :card_id, :card_number)";

        $statement = $this->pdo->prepare($query);
        $statement->bindValue("game_id", $gameId, \PDO::PARAM_INT);
        $statement->bindValue("card_id", $cardId, \PDO::PARAM_INT);
        $statement->bindValue("card_number", $cardNumber, \PDO::PARAM_INT);
        $statement->execute();
    }

    public function getNextCardNumber(int $id): array
    {
        $query = "select COUNT(*) as number from " . self::TABLE . " where game_id = :game_id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue("game_id", $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function selectCardsFromGame(int $id): array
    {
        $query = "select c.name as name, c.description as description, c.id as id,"
            . " card_number number ,available_on_begin aob, c.image_url image_url from "
            . self::TABLE
            . " right join "
            . CardManager::TABLE
            . " c on c.id = card_id left join "
            . GameManager::TABLE
            . " g on g.id = game_id where g.id = :game_id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue("game_id", $id, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function getCardFromGameById(int $cardId, int $gameId)
    {
        $query = "select c.name name, c.description description, card_number number from "
            . self::TABLE .
            " join "
            . CardManager::TABLE .
            " c on c.id = card_id where game_id = :game_id and c.id = :card_id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue("game_id", $gameId, \PDO::PARAM_INT);
        $statement->bindValue("card_id", $cardId, \PDO::PARAM_INT);
        $statement->execute();

        return $statement->fetchAll();
    }

    public function updateCardNumber(int $cardId, int $gameId, string $number)
    {
        $query = "update "
            . self::TABLE .
            " set card_number = :number where game_id = :game_id and card_id = :card_id";
        $statement = $this->pdo->prepare($query);
        $statement->bindValue("game_id", $gameId, \PDO::PARAM_INT);
        $statement->bindValue("card_id", $cardId, \PDO::PARAM_INT);
        $statement->bindValue("number", intval($number), \PDO::PARAM_INT);
        $statement->execute();
    }
}
