DROP DATABASE IF EXISTS login;
CREATE DATABASE login;
USE login;

DROP TABLE IF EXISTS demo;
CREATE TABLE demo (
  id INT NOT NULL AUTO_INCREMENT,
  fullname VARCHAR(100) NOT NULL,
  usernmae VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  telpNummer INT NOT NULL,
  password VARCHAR(50) NOT NULL,
  PRIMARY KEY (id));

INSERT INTO demo (fullname, usernmae, email, telpNummer,password) VALUES
  ('test satu','test1', 'test1@test.com', 111111, 'testpassword1'),
  ('test dua','test2', 'test2@test.com', 222222, 'testpassword2');