DROP DATABASE IF EXISTS tmahdi_db;
CREATE DATABASE tmahdi_db;
USE tmahdi_db;

DROP TABLE IF EXISTS demo;
CREATE TABLE demo (
  id INT NOT NULL AUTO_INCREMENT,
  timestamp TIMESTAMP NOT NULL,
  fullname VARCHAR(100) NOT NULL,
  username VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  telpNummer CHAR(15) NOT NULL,
  password VARCHAR(255) NOT NULL,
  token VARCHAR(255) NOT NULL,
  PRIMARY KEY (id));

DROP TABLE IF EXISTS validation;
CREATE TABLE validation (
  id INT NOT NULL AUTO_INCREMENT,
  timestamp TIMESTAMP NOT NULL,
  fullname VARCHAR(100) NOT NULL,
  username VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  telpNummer CHAR(15) NOT NULL,
  password VARCHAR(255) NOT NULL,
  token VARCHAR(255) NOT NULL,
  activationKey VARCHAR(255) NOT NULL,
  PRIMARY KEY (id));


/*SET GLOBAL event_scheduler = ON;
CREATE EVENT cleaning ON SCHEDULE EVERY 1 MINUTE ENABLE
  DO 
  DELETE FROM validation
  WHERE timestamp < CURRENT_TIMESTAMP - INTERVAL 10 MINUTE;
*/
INSERT INTO demo (timestamp, fullname, username, email, telpNummer, password, token) VALUES
(CURRENT_TIMESTAMP,'admin','admin','admin@admin','-','admin','admin')

