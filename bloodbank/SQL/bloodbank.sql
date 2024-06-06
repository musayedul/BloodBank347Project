-- Create the database
CREATE DATABASE IF NOT EXISTS bloodbank_db;
USE bloodbank_db;

-- Create the admins table
CREATE TABLE IF NOT EXISTS admins (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL
);

-- Create the blood_requests table
CREATE TABLE IF NOT EXISTS blood_requests (
    id INT PRIMARY KEY AUTO_INCREMENT,
    patient_name VARCHAR(255) NOT NULL,
    blood_group VARCHAR(10) NOT NULL,
    contact VARCHAR(20) NOT NULL
);

-- Create the contact_messages table
CREATE TABLE IF NOT EXISTS contact_messages (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    message TEXT NOT NULL
);

-- Create the donors table
CREATE TABLE IF NOT EXISTS donors (
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    blood_group VARCHAR(10) NOT NULL,
    contact VARCHAR(20) NOT NULL
);
