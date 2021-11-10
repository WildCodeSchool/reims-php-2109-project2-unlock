<?php

namespace App\Controller;

use App\Model\GameCardsManager;
use App\Model\GameManager;

class GameController extends AbstractController
{
    public function list(): string
    {
        $gameManager = new GameManager();
        $games = $gameManager->selectAll();
        return $this->twig->render('Game/list.html.twig', ['games' => $games]);
    }

    //name, description, image url
    public function add(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $game = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, insert and redirection
            $gameManager = new GameManager();
            $gameManager->insert($game);
            header('Location:/games');
        }

        return $this->twig->render('Game/add.html.twig');
    }

    /**
     * Show informations for a specific game
     */
    public function show(int $id): string
    {
        $gameManager = new GameManager();
        $game = $gameManager->selectOneById($id);

        return $this->twig->render('Game/show.html.twig', ['game' => $game]);
    }

    public function play(int $gameId): string
    {
        session_start();
        if (!isset($_SESSION["cards"])) {
            $gameCardsManager = new GameCardsManager();
            $cards = $gameCardsManager->selectCardsFromGame($gameId);
            $sessionCards = ["discovered" => [], "hidden" => [], "used" => []];
            foreach ($cards as $card) {
                $card["aob"]
                    ? array_push($sessionCards["discovered"], $card)
                    : array_push($sessionCards["hidden"], $card);
            }
            $_SESSION["cards"] = $sessionCards;
        }

        $gameManager = new GameManager();
        $game = $gameManager->selectOneById($gameId);

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $cards = array_map('trim', $_POST);

            //Get Ids of card selected
            $cardIds = [];
            foreach ($cards as $key => $value) {
                if ($value === "on") {
                    $foundId = [];
                    preg_match_all("/cardN([0-9]+)/", $key, $foundId, PREG_PATTERN_ORDER);
                    array_push($cardIds, $foundId[1][0]);
                }
            }

            //get Numbers associated to every card
            $cardNumbers = $this->getCardNumbers($cardIds);

            //add the card to the discovered
            $error = "";
            $this->addCardToDiscover($cardNumbers, $cardIds, $error);

            if ($this->isFinished()) {
                session_destroy();
                header("Location: /games/victory?id=" . $gameId);
            }

            return $this->twig->render('Game/play.html.twig', [
                "cards_discovered" => $_SESSION["cards"]["discovered"],
                "cards_hidden" => $_SESSION["cards"]["hidden"],
                "cards_used" => $_SESSION["cards"]["used"],
                "game" => $game,
                "error" => $error,
            ]);
        }

        return $this->twig->render('Game/play.html.twig', [
            "cards_discovered" => $_SESSION["cards"]["discovered"],
            "cards_hidden" => $_SESSION["cards"]["hidden"],
            "cards_used" => $_SESSION["cards"]["used"],
            "game" => $game,
        ]);
    }

    private function unsetCardsDiscovered(array $cardIds)
    {
        foreach ($_SESSION["cards"]["discovered"] as $key => $card) {
            if (in_array($card["id"], $cardIds)) {
                array_push($_SESSION["cards"]["used"], $card);
                unset($_SESSION["cards"]["discovered"][$key]);
            }
        }
    }

    private function getCardNumbers(array $cardIds)
    {
        $cardNumbers =  [];
        foreach ($cardIds as $id) {
            foreach ($_SESSION["cards"]["discovered"] as $card) {
                if ($card["id"] === $id) {
                    array_push($cardNumbers, $card["number"]);
                }
            }
        }
        return $cardNumbers;
    }

    private function isFinished()
    {
        if (count($_SESSION["cards"]["hidden"]) === 0) {
            return true;
        }
        return false;
    }

    private function addCardToDiscover(array $cardNumbers, array $cardIds, string &$error)
    {
        $found = 0;
        foreach ($_SESSION["cards"]["hidden"] as $key => $card) {
            if (array_sum($cardNumbers) == $card["number"]) {
                array_push($_SESSION["cards"]["discovered"], $card);
                unset($_SESSION["cards"]["hidden"][$key]);
                $this->unsetCardsDiscovered($cardIds);
                $found = $card["number"];
            }
        }
        $found > 0 ? $error = "Carte n°" . $found . " obtenue" : $error = "Fusion échouée";
    }

    public function victory(int $id)
    {

        $gameManager = new GameManager();
        $games = $gameManager->selectOneById($id);

        return $this->twig->render('/Game/victoryScreen.html.twig', ['game' => $games]);
    }
}
