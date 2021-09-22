CREATE DATABASE login;
USE login;

CREATE TABLE `login`.`usuario` (
  `usuario_id` INT NOT NULL AUTO_INCREMENT,
  `usuario` VARCHAR(200) NOT NULL,
  `senha` VARCHAR(32) NOT NULL,
  PRIMARY KEY (`usuario_id`));

INSERT INTO `usuario` (`usuario_id`,`usuario`,`senha`) VALUES (1,'Lucas Laroca','973798a0dea842a91f2c479fd391a275');
INSERT INTO `usuario` (`usuario_id`,`usuario`,`senha`) VALUES (1,'Anny Navarro','aab02082b80ba683a7e5d2027bad0116');
