USE `unlock_db`;

INSERT INTO `game` (`name`, `description`, `instruction`) VALUES 
("Sherlock, découverte","Inité vous au jeu UNLOCK et les histoire de Sherlock","A l'aide des différentes combinaisons de cartes, recherche la clé qui te mènera vers la sortie."),
("Sherlock et le mystère de Pandore", "Vous serez plongé dans un tout nouvel univers!","A l'aide des différentes combinaisons de cartes, recherche la clé qui te mènera vers la sortie."),
("Sherlock dans le égout de londre", "Une aventure nauséabonde et visieuse vous attend","A l'aide des différentes combinaisons de cartes, recherche la clé qui te mènera vers la sortie."),
("Shreklock Holmes, le retour de Farquaad", "Get out of my swamp !","A l'aide des différentes combinaisons de cartes, recherche la clé qui te mènera vers la sortie.");

INSERT INTO `card` (`name`, `description`, `image`) VALUES 
("Salon", "Voici la pièce où vous êtes enfermés. Plusieurs élements sont visibles. Vous pouvez maintenant associer les cartes qui vous mêneront vers la sortie.", ""),
("Cable", "Voici un cable téléphonique.", ""),
("Clé", "C'est une clé, qui permet sûrement d'ouvrir une serrure...", ""),
("Armoire", "Une armoir fermée à clé.", ""),
("Watson", "Il vous connait bien, il peut peut-être vous aider.", ""),
("Porte", "La porte d'entrée est fermée à clé.", ""),
("Carnet téléphonique", "Ce carnet contient le numéro de téléphone de Watson.", ""),
("Téléphone", "Appel à un ami.", ""),
("Livre", "Ce livre contient une clé.", "");

INSERT INTO `gamecards` (`game_id`, `card_id`, `card_number`, `available_on_begin`) VALUES
(1, 1, 3, 1),
(1, 2, 5, 1),
(1, 3, 8, 0),
(1, 10, 10, 1),
(1, 11, 18, 0);
