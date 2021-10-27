<?php

namespace App\Controller;

class GameCardsController extends AbstractController
{
    public function add(/*int $id*/)
    {
        return $this->twig->render("GameCards/cardsForm.html.twig");
    }
}
