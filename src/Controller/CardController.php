<?php

namespace App\Controller;

use App\Model\CardManager;

class CardController extends AbstractController
{

    public function add(): string
    {
        $errors = [];
        if ($_SERVER['REQUEST_METHOD'] === "POST") {
            $uploadDir = 'assets/images/';
            $uploadFile = $uploadDir . basename($_FILES['image_url']['name']);
            $extension = pathinfo($_FILES['image_url']['name'], PATHINFO_EXTENSION);
            $authorizedExtensions = ['jpg','png','jpeg','webp'];
            $maxFileSize = 2000000;

            // Je sécurise et effectue mes tests

            /****** Si l'extension est autorisée *************/
            if ((!in_array($extension, $authorizedExtensions))) {
                $errors[] = 'Veuillez sélectionner une image de type jpg, png, gif ou webp !';
            }

            /****** On vérifie si l'image existe et si le poids est autorisé en octets *************/
            $sizeReajust = filesize($_FILES['image_url']['tmp_name']);
            if (file_exists($_FILES['image_url']['tmp_name']) &&  $sizeReajust > $maxFileSize) {
                $errors[] = "Votre fichier doit faire moins de 2M !";
            }

            $card = array_map('trim', $_POST);

            if (empty($errors)) {
                move_uploaded_file($_FILES['image_url']['tmp_name'], $uploadFile);
                $card['image_url'] = $_FILES['image_url']['name'];
            } else {
                $card['image_url'] = 'london-map1.jpeg';
            }

            $cardManager = new CardManager();
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
