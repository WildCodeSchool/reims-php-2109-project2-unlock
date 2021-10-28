<?php

namespace App\Controller;

use App\Model\GameCardsManager;

class GameCardsController extends AbstractController
{
    public function add(int $id)
    {
        $gameCardsManager = new GameCardsManager();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $cards = array_map('trim', $_POST);

            foreach ($cards as $key => $value) {
                if ($value === "on") {
                    $foundId = [];
                    preg_match_all("/cardN([0-9]+)/", $key, $foundId, PREG_PATTERN_ORDER);
                    $cardId = $foundId[1][0];
                    $cardNumber = $gameCardsManager->getNextCardNumber($id)[0]["number"];
                    $gameCardsManager->insert($id, $cardId, $cardNumber++);
                }
            }

            header("Location: /games/cards/add?id=" . $id);
        }

        $cards = $gameCardsManager->selectCardsNotFromGame($id);
        return $this->twig->render("GameCards/cardsForm.html.twig", ["cards" => $cards]);
    }

    public function list(int $id)
    {
        $gameCardsManager = new GameCardsManager();
        $cards = $gameCardsManager->selectCardsFromGame($id);
        return $this->twig->render("GameCards/cardsList.html.twig", ["cards" => $cards]);
    }
}
