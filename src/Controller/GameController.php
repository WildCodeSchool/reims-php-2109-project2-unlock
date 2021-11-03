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
            $sessionCards = ["discovered" => $cards, "hidden" => $cards, "used" => []];
            $_SESSION["cards"] = $sessionCards;
        }

        $gameManager = new GameManager();
        $game = $gameManager->selectOneById($gameId);

        return $this->twig->render('Game/play.html.twig', [
            "cards_discovered" => $_SESSION["cards"]["discovered"],
            "cards_hidden" => $_SESSION["cards"]["hidden"],
            "cards_used" => $_SESSION["cards"]["used"],
            "game" => $game,
        ]);
    }
}
