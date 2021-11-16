DROP DATABASE IF EXISTS `unlock_db`;
CREATE DATABASE IF NOT EXISTS `unlock_db`;
USE `unlock_db`;

CREATE TABLE IF NOT EXISTS `card` (
  `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(100),
  `description` TEXT,
  `image_url` VARCHAR(100)
) ENGINE = InnoDB CHARACTER SET latin1 COLLATE latin1_bin ;

CREATE TABLE IF NOT EXISTS `game` (
  `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(50),
  `description` TEXT,
  `instruction` VARCHAR(100),
  `image_url` VARCHAR(100)
) ENGINE = InnoDB CHARACTER SET latin1 COLLATE latin1_bin ;

CREATE TABLE IF NOT EXISTS `gamecards` (
  `game_id` INT NOT NULL,
  `card_id` INT NOT NULL,
  `card_number` INT NOT NULL,
  `available_on_begin` BOOLEAN NOT NULL DEFAULT 1
) ENGINE = InnoDB CHARACTER SET latin1 COLLATE latin1_bin ;

ALTER TABLE `gamecards`
    ADD CONSTRAINT `fk_game_id`
    FOREIGN KEY (`game_id`)
    REFERENCES `game`(`id`)
    ON DELETE CASCADE;

ALTER TABLE `gamecards`
  ADD CONSTRAINT `fk_card_id`
  FOREIGN KEY (`card_id`)
  REFERENCES `card`(`id`)
  ON DELETE CASCADE;

ALTER TABLE `gamecards`
  ADD UNIQUE (`game_id`, `card_id`);
