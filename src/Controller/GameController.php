<?php

namespace App\Controller;

use App\Model\GameManager;

class GameController extends AbstractController
{
    public function list(): string
    {
        $gameManager = new GameManager();
        $game = $gameManager->selectAll();
        return $this->twig->render('Game/list.html.twig', ['game' => $game]);
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
            header('Location:/games/list');
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
}
