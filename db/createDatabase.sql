CREATE DATABASE apiPHP CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
CREATE USER 'user'@'localhost' identified by 'Centos7,29';
GRANT ALL on apiPHP.* to 'user'@'localhost';


CREATE TABLE `apiPHP`.`beer` (
  `beer_id` INT NOT NULL AUTO_INCREMENT,
  `beer_name` VARCHAR(145) NOT NULL,
  `beer_description` VARCHAR(45) NOT NULL,
  `beer_style` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`beer_id`));
