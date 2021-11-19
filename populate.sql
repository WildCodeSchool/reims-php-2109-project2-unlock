USE `unlock_db`;

INSERT INTO `game` (`name`, `description`, `instruction`, `image_url`) VALUES 
("Sherlock, découverte","Initié vous au jeu UNLOCK et les histoires de Sherlock","A l'aide des différentes combinaisons de cartes, recherche la clé qui te mènera vers la sortie.","assets/images/carnet.png"), ("Sherlock, enquête","Initié vous au jeu UNLOCK et les histoires de Sherlock","A l'aide des différentes combinaisons de cartes, recherche la clé qui te mènera vers la sortie.","assets/images/caleche.png"), ("Dr Watson","Initié vous au jeu UNLOCK et les histoires de Sherlock","A l'aide des différentes combinaisons de cartes, recherche la clé qui te mènera vers la sortie.","assets/images/street.png")
INSERT INTO `card` (`name`, `description`, `image_url`) VALUES
("Salon", "Voici la pièce où vous êtes enfermés. Plusieurs éléments sont visibles. Vous pouvez maintenant associer les cartes qui vous mèneront vers la sortie.", ""),
("Câble", "Voici un câble téléphonique.", "/assets/images/cable.png"),
("Clé", "C'est une clé, qui permet sûrement d'ouvrir une serrure...", "/assets/images/key.png"),
("Armoire", "Une armoire fermée à clé.", "/assets/images/armoire.png"),
("Watson", "Il vous connaît bien, il peut peut-être vous aider.", "/assets/images/watson.png"),
("Porte", "La porte d'entrée est fermée à clé.", "/assets/images/door.png"),
("Carnet téléphonique", "Ce carnet contient le numéro de téléphone de Watson.", "/assets/images/carnet.png"),
("Téléphone", "Appel à un ami.", "/assets/images/phone.png"),
("Livre", "Ce livre contient une clé.", "/assets/images/keydoor.png"),
("Fil de Téléphone", "Brancher votre téléphone!", "/assets/images/cable.png"),
("Fin", "", "");

INSERT INTO `gamecards` (`game_id`, `card_id`, `card_number`, `available_on_begin`) VALUES
(1, 3, 2, 1),
(1, 4, 1, 1),
(1, 5, 11, 1),
(1, 6, 29, 1),
(1, 10, 4, 1),
(1, 7, 3, 0),
(1, 8, 7, 0),
(1, 9, 18, 0),
(1, 11, 47, 0);
