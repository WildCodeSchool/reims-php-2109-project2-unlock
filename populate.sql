USE `unlock_db`;

INSERT INTO `game` (`name`, `description`, `instruction`) VALUES 
("Sherlock, découverte","Inité vous au jeu UNLOCK et les histoire de Sherlock","A l'aide des différentes combinaisons de cartes, recherche la clé qui te mènera vers la sortie."),
("Sherlock et le mystère de Pandore", "Vous serez plongé dans un tout nouvel univers!","A l'aide des différentes combinaisons de cartes, recherche la clé qui te mènera vers la sortie."),
("Sherlock dans le égout de londre", "Une aventure nauséabonde et visieuse vous attend","A l'aide des différentes combinaisons de cartes, recherche la clé qui te mènera vers la sortie."),
("Shreklock Holmes, le retour de Farquaad", "Get out of my swamp !","A l'aide des différentes combinaisons de cartes, recherche la clé qui te mènera vers la sortie.");

INSERT INTO `card` (`name`, `description`) VALUES
("Key", "Here is a key to open door"),
("Door", "Here is a door. Find a key to open it",
("Smoking pipe", "Probably your best friend"),
("Bookshelf", "You can clearly see some inscription on it"),
("Book", "Such a great story, reminds me when i was young"),
("Horse", "Look at my Horse, my horse is amazing!"),
("Phone", "You can phone to your best friend with it, can you?"),
("Sword", "You can probably kill someone with it, be carefull"),
("Handkerchief", "Probably usefull, KEEP IT"),
("Gobelin", "Kill this gobelin"),
("Finished", "you finished the game");

INSERT INTO `gamecards` (`game_id`, `card_id`, `card_number`, `available_on_begin`) VALUES
(1, 1, 3, 1),
(1, 2, 5, 1),
(1, 3, 8, 0),
(1, 10, 10, 1),
(1, 11, 18, 0);