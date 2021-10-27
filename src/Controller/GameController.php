<?php

namespace App\Controller;

use App\Model\GameManager;

class GameController extends AbstractController
{
    public function list(): string
    {
        $gameManager = new GameManager();
        $games = $gameManager->selectAll();

        return $this->twig->render('Game/list.html.twig', ['games' => $games]);
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
}
