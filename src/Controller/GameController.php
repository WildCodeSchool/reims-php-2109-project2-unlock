<?php

namespace App\Controller;

class GameController extends AbstractController
{
    public function list()
    {
        return $this->twig->render('Home/index.html.twig');
    }
}