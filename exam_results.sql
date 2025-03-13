CREATE DATABASE IF NOT EXISTS exam_results;

USE exam_results;

CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE IF NOT EXISTS results (
    id INT AUTO_INCREMENT PRIMARY KEY,
    prn VARCHAR(20) NOT NULL,
    name VARCHAR(255) NOT NULL,
    internal_type ENUM('1st', '2nd') NOT NULL,
    oop INT,
    ccn INT,
    ds INT,
    csiks INT,
    status ENUM('Pass', 'Fail')
);

INSERT INTO users (username, password) VALUES ('Admin', 'Admin@9488');
