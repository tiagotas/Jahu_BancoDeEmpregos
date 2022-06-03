-- Gera��o de Modelo f�sico
-- Sql ANSI 2003 - brModelo.



CREATE TABLE Pessoa (
    Id Varchar(255) PRIMARY KEY auto_increment,    
    Email Varchar(255),
    Senha Varchar(255),
    Ativo ENUM('S','N') DEFAULT 'S',
    Data_Cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE Vaga (
    Id int PRIMARY KEY auto_increment,
    Titulo Varchar(255),
    Descricao Varchar(255),
    Salario Double,
    Data_Abertura TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Data_Fechamento TIMESTAMP,
    Ativo ENUM('S','N') DEFAULT 'S',
);

CREATE TABLE Pessoa_Fisica (
    Id int PRIMARY KEY auto_increment,
    CPF Varchar(255),
    Data_Nascimento Date,
    Genero Varchar(255),    
    Nome Varchar(255),
    id_pessoa int,
    FOREIGN KEY(id_pessoa) REFERENCES Pessoa (Id)
);

CREATE TABLE Pessoa_Juridica (
    CNPJ Varchar(255),
    Id int PRIMARY KEY auto_increment,
    Razao_Social Varchar(255),
    Nome_Fantasia Varchar(255),
    id_pessoa int,
    FOREIGN KEY(id_pessoa) REFERENCES Pessoa (Id)
);

CREATE TABLE Endereco (
    Id int PRIMARY KEY,
    Endereco Varchar(255),
    CEP Varchar(255),
    Cidade Varchar(255),
    Bairro Varchar(255),
    Ativo ENUM('S','N') DEFAULT 'S',
    Data_Cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    id_pessoa int,
    FOREIGN KEY(id_pessoa) REFERENCES Pessoa (Id)
);

CREATE TABLE Telefone (
    Id Varchar(255) PRIMARY KEY,
    id_pessoa Varchar(255),
    Numero Varchar(255),
    WhatsApp Varchar(255),
    Data_Cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    Ativo ENUM('S','N') DEFAULT 'S',
    FOREIGN KEY(id_pessoa) REFERENCES Pessoa (Id)
);

CREATE TABLE Qualificacao (
    Id int PRIMARY KEY,
    Descricao Varchar(255),
    Curso Varchar(255),
    Data_Termino Date,
    Institucao Varchar(255),
    Data_Inicio Date,
    id_pessoa_fisica int,
    FOREIGN KEY(id_pessoa_fisica) REFERENCES Fisica (Id)
);

CREATE TABLE Experiencia (
    Id int PRIMARY KEY,
    Data_Saida Date,
    Empresa Varchar(255),
    Data_Inicio Date,
    Cargo Varchar(255),
    id_pessoa_fisica int,
    FOREIGN KEY(id_pessoa_fisica) REFERENCES Fisica (Id)
);

CREATE TABLE Candidatura (    
    id_pessoa_fisica int,
    id_vaga int,
    Data_Candidatura TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY(id_pessoa_fisica) REFERENCES Fisica (Id),
    FOREIGN KEY(id_vaga) REFERENCES Vaga (Id)
);
