<?php

namespace App\Controller;

use App\Model\GameManager;

class GameController extends AbstractController
{
    /**
     * Add a new Game
     */

     //name, description, image url
    public function add(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // clean $_POST data
            $game = array_map('trim', $_POST);

            // TODO validations (length, format...)

            // if validation is ok, insert and redirection
            $gameManager = new GameManager();
            $id = $gameManager->insert($game);
            header('Location:/games/show?id=' . $id);
        }

        return $this->twig->render('game/add.html.twig');
    }
}
