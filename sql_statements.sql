CREATE DATABASE project1;

CREATE TABLE account (
    ID int NOT NULL AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE,
     gebruikersnaam varchar(255) NOT NULL,
    password VARCHAR(30),
    PRIMARY KEY (ID) );


-- volgende table

CREATE TABLE persoon (
    ID int NOT NULL AUTO_INCREMENT,
    account_ID INT NOT NULL,
    voornaam varchar(255),
    tussenvoegsel varchar(30),
    achternaam varchar(255),
    gebruikersnaam varchar(255),
    email VARCHAR(255) UNIQUE,
    password VARCHAR(30),
    PRIMARY KEY(ID),
    FOREIGN KEY (account_ID) REFERENCES account(ID)
    );

    INSERT INTO account (email, password)
    VALUES ('damonbaan@hotmail.com', '1234');

    INSERT INTO persoon (account_ID, voornaam, tussenvoegsel, achternaam, gebruikersnaam, email, password)
    VALUES ('1', 'damon', '', 'baan', 'justbedamon', 'damonbaan@hotmail.com', '1234');

    