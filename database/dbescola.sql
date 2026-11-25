CREATE DATABASE IF NOT EXISTS dbescola
CHARACTER SET utf8mb4
COLLATE utf8mb4_unicode_ci;

USE dbescola;

CREATE TABLE alunos(
    id_aluno INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR (100) NOT NULL,
    cpf CHAR(32),
    curso VARHCAR(100) NOT NULL,
    login VARCHAR(50) NOT NULL UNIQUE,
    senha CHAR(32) NOT NULL
);

CREATE TABLE professores(
    id_professor INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    cpf CHAR(32) NOT NULL,
    curso VARCHAR(100) NOT NULL,
    login VARCHAR(50) NOT NULL UNIQUE,
    senha CHAR(32) NOT NULL
);

