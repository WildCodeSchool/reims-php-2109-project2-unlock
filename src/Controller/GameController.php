<?php

namespace App\Controller;

use App\Model\GameManager;

class GameController extends AbstractController
{
    public function list()
    {
        return $this->twig->render('Home/index.html.twig');
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
