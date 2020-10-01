CREATE DATABASE project1;

CREATE TABLE account (
    ID int NOT NULL AUTO_INCREMENT,
    username varchar(255),
    email VARCHAR(30) UNIQUE,
    password VARCHAR(30),
    PRIMARY KEY (ID) );

volgende table

CREATE TABLE persoon (
    ID int NOT NULL AUTO_INCREMENT,
    account_ID INT NOT NULL,
    firstname varchar(255),
    middlename varchar(30),
    lastname varchar(255),
    primary key(ID),
    FOREIGN KEY (account_ID) REFERENCES account(ID)
    );
    