# NOTICE

    I will be posting the logs of the changes here
    additional info like database info will also be posted.

## DB

CREATE DATABASE IF NOT EXISTS motivation;

USE motivation;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);
