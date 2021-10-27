<?php

namespace App\Controller;

use App\Model\CardManager;

class CardController extends AbstractController
{
    public function list()
    {
        $cardManager = new CardManager();
        $cards = $cardManager->selectAll();
        return $this->twig->render("Card/list.html.twig", ["cards" => $cards]);
    }
}
