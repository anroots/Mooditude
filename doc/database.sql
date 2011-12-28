SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `projects_mooditude` ;
USE `projects_mooditude` ;

-- -----------------------------------------------------
-- Table `projects_mooditude`.`roles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projects_mooditude`.`roles` ;

CREATE  TABLE IF NOT EXISTS `projects_mooditude`.`roles` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(32) NOT NULL ,
  `description` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `uniq_name` (`name` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projects_mooditude`.`users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projects_mooditude`.`users` ;

CREATE  TABLE IF NOT EXISTS `projects_mooditude`.`users` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(127) NOT NULL ,
  `username` VARCHAR(32) NOT NULL DEFAULT '' ,
  `name` VARCHAR(60) NOT NULL DEFAULT 'Kasutaja' ,
  `password` CHAR(64) NOT NULL ,
  `logins` INT(10) UNSIGNED NOT NULL DEFAULT '0' ,
  `last_login` INT(10) UNSIGNED NULL DEFAULT NULL ,
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `uniq_username` (`username` ASC) )
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projects_mooditude`.`roles_users`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projects_mooditude`.`roles_users` ;

CREATE  TABLE IF NOT EXISTS `projects_mooditude`.`roles_users` (
  `user_id` INT(10) UNSIGNED NOT NULL ,
  `role_id` INT(10) UNSIGNED NOT NULL ,
  PRIMARY KEY (`user_id`, `role_id`) ,
  INDEX `fk_role_id` (`role_id` ASC) ,
  CONSTRAINT `roles_users_ibfk_1`
    FOREIGN KEY (`user_id` )
    REFERENCES `projects_mooditude`.`users` (`id` )
    ON DELETE CASCADE,
  CONSTRAINT `roles_users_ibfk_2`
    FOREIGN KEY (`role_id` )
    REFERENCES `projects_mooditude`.`roles` (`id` )
    ON DELETE CASCADE)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projects_mooditude`.`sessions`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projects_mooditude`.`sessions` ;

CREATE  TABLE IF NOT EXISTS `projects_mooditude`.`sessions` (
  `session_id` VARCHAR(24) NOT NULL ,
  `last_active` INT(10) UNSIGNED NOT NULL ,
  `contents` TEXT NOT NULL ,
  PRIMARY KEY (`session_id`) ,
  INDEX `last_active` (`last_active` ASC) )
ENGINE = MyISAM
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `projects_mooditude`.`user_tokens`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projects_mooditude`.`user_tokens` ;

CREATE  TABLE IF NOT EXISTS `projects_mooditude`.`user_tokens` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT ,
  `user_id` INT(11) UNSIGNED NOT NULL ,
  `user_agent` VARCHAR(40) NOT NULL ,
  `token` VARCHAR(32) NOT NULL ,
  `created` INT(10) UNSIGNED NOT NULL ,
  `expires` INT(10) UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `uniq_token` (`token` ASC) ,
  INDEX `fk_user_id` (`user_id` ASC) ,
  CONSTRAINT `user_tokens_ibfk_1`
    FOREIGN KEY (`user_id` )
    REFERENCES `projects_mooditude`.`users` (`id` )
    ON DELETE CASCADE)
ENGINE = InnoDB
AUTO_INCREMENT = 1
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `projects_mooditude`.`moods`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `projects_mooditude`.`moods` ;

CREATE  TABLE IF NOT EXISTS `projects_mooditude`.`moods` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT ,
  `created` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `score` TINYINT(2) UNSIGNED NULL DEFAULT 5 COMMENT 'Mood score, range 1 - 10' ,
  `user_id` INT(11) UNSIGNED NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_moods_users1` (`user_id` ASC) ,
  CONSTRAINT `fk_moods_users1`
    FOREIGN KEY (`user_id` )
    REFERENCES `projects_mooditude`.`users` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `projects_mooditude`.`roles`
-- -----------------------------------------------------
START TRANSACTION;
USE `projects_mooditude`;
INSERT INTO `projects_mooditude`.`roles` (`id`, `name`, `description`) VALUES (1, 'login', 'Can log in');
INSERT INTO `projects_mooditude`.`roles` (`id`, `name`, `description`) VALUES (2, 'admin', 'Admin');

COMMIT;

-- -----------------------------------------------------
-- Data for table `projects_mooditude`.`users`
-- -----------------------------------------------------
START TRANSACTION;
USE `projects_mooditude`;
INSERT INTO `projects_mooditude`.`users` (`id`, `email`, `username`, `name`, `password`, `logins`, `last_login`, `created`) VALUES (1, 'test@sqroot.eu', 'test', 'Test User', 'd547799ebfca81165178259ca1af6b5a4ab07d2104e7f816cf2f36b42b2f50da', 1, 132121, '2011-12-28 02:02:00');

COMMIT;

-- -----------------------------------------------------
-- Data for table `projects_mooditude`.`roles_users`
-- -----------------------------------------------------
START TRANSACTION;
USE `projects_mooditude`;
INSERT INTO `projects_mooditude`.`roles_users` (`user_id`, `role_id`) VALUES (1, 1);

COMMIT;
