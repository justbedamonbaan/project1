CREATE DATABASE project1;

CREATE TABLE account (
    ID int NOT NULL AUTO_INCREMENT,
    email VARCHAR(30) UNIQUE,
    password VARCHAR(30),
    PRIMARY KEY (ID) );

volgende table

CREATE TABLE persoon (
    ID int NOT NULL,
    voornaam varchar(255),
    tussenvoegsel varchar(30),
    achternaam varchar(255),
    gebruikersnaam varchar(255) UNIQUE,
    account_ID INT, FOREIGN KEY (account_ID) REFERENCES account(ID)
    );
    