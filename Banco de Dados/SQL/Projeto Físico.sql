CREATE DATABASE banco_empregos_jahu;

USE banco_empregos_jahu;

CREATE TABLE Pessoa (
    Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,    
    Email VARCHAR(255) NOT NULL,
    Senha VARCHAR(100) NOT NULL,
    Ativo ENUM('S','N') NOT NULL DEFAULT 'S',
    Data_Cadastro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Vaga (
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Id_Pessoa INT NOT NULL,
    Titulo VARCHAR(255) NOT NULL,
    Descricao VARCHAR(255) NOT NULL,
    Salario Double,
    Data_Abertura TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    Data_Fechamento TIMESTAMP DEFAULT NULL,
    Ativo ENUM('S','N') DEFAULT 'S',
    FOREIGN KEY(Id_Pessoa) REFERENCES Pessoa (Id)
);

CREATE TABLE Pessoa_Fisica (
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Id_Pessoa INT NOT NULL,
    CPF CHAR(11) NOT NULL,
    Data_Nascimento Date NOT NULL,
    Genero VARCHAR(255),    
    Nome VARCHAR(255) NOT NULL,   
    FOREIGN KEY(Id_Pessoa) REFERENCES Pessoa (Id)
);

CREATE TABLE Pessoa_Juridica (    
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Id_Pessoa INT NOT NULL,
    Razao_Social VARCHAR(255) NOT NULL,
    CNPJ CHAR(14) NOT NULL,
    Nome_Fantasia VARCHAR(255) NOT NULL,    
    FOREIGN KEY(id_pessoa) REFERENCES Pessoa (Id)
);

CREATE TABLE Endereco (
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Id_Pessoa INT NOT NULL,
    Endereco VARCHAR(255) NOT NULL,
    CEP CHAR(8) NOT NULL,
    Cidade VARCHAR(255) NOT NULL,
    Bairro VARCHAR(255) NOT NULL,
    Ativo ENUM('S','N') NOT NULL DEFAULT 'S',
    Data_Cadastro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,   
    FOREIGN KEY(id_pessoa) REFERENCES Pessoa (Id)
);

CREATE TABLE Telefone (
    Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Id_Pessoa INT NOT NULL,
    Numero VARCHAR(11) NOT NULL,
    WhatsApp ENUM('S','N') NOT NULL DEFAULT 'S',
    Data_Cadastro TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    Ativo ENUM('S','N') NOT NULL DEFAULT 'S',
    FOREIGN KEY(id_pessoa) REFERENCES Pessoa (Id)
);

CREATE TABLE Qualificacao (
    Id INT PRIMARY KEY AUTO_INCREMENT,
    Id_Pessoa_Fisica INT NOT NULL,
    Descricao VARCHAR(255) NOT NULL,
    Institucao VARCHAR(255) NOT NULL,
    Curso VARCHAR(255) NOT NULL,
    Data_Inicio Date, 
    Data_Termino Date NOT NULL,     
    FOREIGN KEY(Id_Pessoa_Fisica) REFERENCES Pessoa_Fisica (Id)
);

CREATE TABLE Experiencia (
    Id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    Id_Pessoa_Fisica INT NOT NULL,
    Data_Saida Date,
    Empresa VARCHAR(255) NOT NULL,
    Data_Inicio Date NOT NULL,
    Cargo VARCHAR(255) NOT NULL,    
    FOREIGN KEY(Id_Pessoa_Fisica) REFERENCES Pessoa_Fisica (Id)
);

CREATE TABLE Candidatura (    
    Id_Pessoa_Fisica INT NOT NULL AUTO_INCREMENT,
    Id_Vaga INT NOT NULL,
    Data_Candidatura TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(Id_Pessoa_Fisica) REFERENCES Pessoa_Fisica (Id),
    FOREIGN KEY(Id_Vaga) REFERENCES Vaga (Id),
    PRIMARY KEY(Id_Pessoa_Fisica, Id_Vaga)
);