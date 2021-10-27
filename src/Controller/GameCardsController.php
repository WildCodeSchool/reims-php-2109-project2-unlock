<?php

namespace App\Controller;

use App\Model\GameCardsManager;

class GameCardsController extends AbstractController
{
    public function add(int $id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cards = array_map('trim', $_POST);
            var_dump($cards);
        }

        $gameCardsManager = new GameCardsManager();
        $cards = $gameCardsManager->selectCardsFromGame($id);
        return $this->twig->render("GameCards/cardsForm.html.twig", ["cards" => $cards]);
    }
}
