-- Active: 1680159283194@@127.0.0.1@3306@hospitaldb
CREATE TABLE doctors (
    id INT NOT NULL AUTO_INCREMENT,
    name TEXT NOT NULL,
    email TEXT NOT NULL,
    password TEXT NOT NULL,
    speciality TEXT,
    PRIMARY KEY(id)
);


CREATE TABLE patients (
    id INT AUTO_INCREMENT NOT NULL,
    name TEXT NOT NULL,
    email TEXT NOT NULL,
    password TEXT NOT NULL,
    doctor_id INT REFERENCES doctors(id),
    PRIMARY KEY(id)
);
