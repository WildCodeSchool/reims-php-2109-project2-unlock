<?php

namespace App\Controller;

use App\Model\CardManager;

class CardController extends AbstractController
{

    public function add(): string
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $card = array_map('trim', $_POST);

            $cardManager = new cardManager();
            $id = $cardManager->insert($card);
            header('Location:/cards/show?id=' . $id);
        }

        return $this->twig->render('Card/add.html.twig');
    }

    public function list()
    {
        $cardManager = new CardManager();
        $cards = $cardManager->selectAll();
        return $this->twig->render("Card/list.html.twig", ["cards" => $cards]);
    }
    /*
    ** Show informations for a specific card
    */
    public function show(int $id): string
    {
        $cardManager = new CardManager();
        $card = $cardManager->selectOneById($id);

        return $this->twig->render('Card/show.html.twig', ['card' => $card]);
    }
}
