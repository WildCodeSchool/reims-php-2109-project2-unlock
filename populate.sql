USE `unlock_db`;

INSERT INTO `game` (`name`, `description`) VALUES 
("Sherlock, découverte","Inité vous au jeu UNLOCK et les histoire de Sherlock"),
("Sherlock et le mystère de Pandore", "Vous serez plongé dans un tout nouvel univers!"),
("Sherlock dans le égout de londre", "Une aventure nauséabonde et visieuse vous attend"),
("Shreklock Holmes, le retour de Farquaad", "Get out of my swamp !");

INSERT INTO `card` (`name`, `description`, `instruction`, `image`) VALUES 
("Sherlock house", "You wake up in your living room, a little bit drunk. But where are your house key !?!", "Check the cards that you can see over the picture", "/assets/images/start.webp"),
("Key", "Here is a key to open door", "", ""),
("Door", "Here is a door. Find a key to open it", "", ""),
("Sword", "You can probably kill someone with it, be carefull", "", ""),
("Handkerchief", "Probably usefull, KEEP IT", "", ""),
("Smoking pipe", "Probably your best friend", "", ""),
("Bookshelf", "You can clearly see some inscription on it", "", ""),
("Book", "Such a great story, reminds me when i was young", "", ""),
("Horse", "Look at my Horse, my horse is amazing!", "", ""),
("Phone", "You can phone to your best friend with it, can you?", "", "");