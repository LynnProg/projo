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
    password VARCHAR(255) NOT NULL,
    is_admin TINYINT(1) DEFAULT 0
);

INSERT INTO users (firstname, lastname, email, password, is_admin)
VALUES ('Admin', 'User', '<admin@example.com>', 'admin', 1);

CREATE TABLE motivation_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    subject VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


## CHANGES TO BE MADE

1. the quotes in dash.php to show on cards below and save them on admin page after saving on database
2. modify admin page according to photo
