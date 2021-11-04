USE `unlock_db`;

INSERT INTO `game` (`name`, `description`) VALUES 
("Sherlock, découverte","Inité vous au jeu UNLOCK et les histoire de Sherlock"),
("Sherlock et le mystère de Pandore", "Vous serez plongé dans un tout nouvel univers!"),
("Sherlock dans le égout de londre", "Une aventure nauséabonde et visieuse vous attend"),
("Shreklock Holmes, le retour de Farquaad", "Get out of my swamp !");

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


/* ("Key", "Here is a key to open door", "", ""),
("Door", "Here is a door. Find a key to open it", "", ""),
("Sword", "You can probably kill someone with it, be carefull", "", ""),
("Handkerchief", "Probably usefull, KEEP IT", "", ""),
("Smoking pipe", "Probably your best friend", "", ""),
("Bookshelf", "You can clearly see some inscription on it", "", ""),
("Book", "Such a great story, reminds me when i was young", "", ""),
("Horse", "Look at my Horse, my horse is amazing!", "", ""),
("Phone", "You can phone to your best friend with it, can you?", "", ""); */