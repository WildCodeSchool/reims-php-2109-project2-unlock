<?php

namespace App\Controller;

class CardController extends AbstractController
{
    public function list()
    {
        return $this->twig->render("Card/list.html.twig");
    }
}
