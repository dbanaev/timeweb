CREATE DATABASE timeweb;

CREATE TABLE results(
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  url VARCHAR(255) NOT NULL,
  elements TEXT NOT NULL,
  `count` INT UNSIGNED NOT NULL,
  `type` ENUM('img', 'a', 'text') NOT NULL,
  txt VARCHAR(255),
  PRIMARY KEY(id)
);