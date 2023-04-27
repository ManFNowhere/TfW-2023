DROP DATABASE IF EXISTS tmahdi_db;
CREATE DATABASE tmahdi_db;
USE tmahdi_db;

DROP TABLE IF EXISTS demo;
CREATE TABLE demo (
  id INT NOT NULL AUTO_INCREMENT,
  fullname VARCHAR(100) NOT NULL,
  username VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  telpNummer INT NOT NULL,
  password VARCHAR(255) NOT NULL,
  PRIMARY KEY (id));

INSERT INTO demo (fullname, username, email, telpNummer,password) VALUES
  ('test satu','test1', 'test1@test.com', 111111, 'testpassword1'),
  ('test dua','test2', 'test2@test.com', 222222, 'testpassword2');