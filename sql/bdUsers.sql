DROP DATABASE IF EXISTS proyectophp2;
CREATE DATABASE proyectophp2;
USE proyectophp2;
CREATE TABLE users(
    id int AUTO_INCREMENT NOT NULL PRIMARY KEY,
	username varchar(100) NOT NULL,
    pwd varchar(255) NOT NULL 
);