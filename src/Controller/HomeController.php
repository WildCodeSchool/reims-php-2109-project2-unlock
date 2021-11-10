<?php

namespace App\Controller;

use App\Model\GameManager;

class HomeController extends AbstractController
{
    /**
     * Display home page
     *
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function index()
    {

        $gameManager = new GameManager();
        $games = [];
        for ($id = 1; $id <= 3; $id++) {
            $games[] = $gameManager->selectOneById($id);
        }

        return $this->twig->render('Home/index.html.twig', ["games" => $games]);
    }
}
