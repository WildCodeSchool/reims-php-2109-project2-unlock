<?php

namespace App\Controller;

use App\Model\CardManager;

class GameCardsController extends AbstractController
{
    public function add(/*int $id*/)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cards = array_map('trim', $_POST);
            var_dump($cards);
        }

        $cardManager = new CardManager();
        $cards = $cardManager->selectAll();
        return $this->twig->render("GameCards/cardsForm.html.twig", ["cards" => $cards]);
    }
}
