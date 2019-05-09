CREATE DATABASE dbmercurio CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE dbmercurio;

CREATE TABLE Func (
    idFunc INT PRIMARY KEY,
    nomeFunc VARCHAR(60) NOT NULL,
    emailFunc VARCHAR(60) NOT NULL,
    senhaFunc VARCHAR(20) NOT NULL,
    cpfFunc VARCHAR(14) NOT NULL
) CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE Alunos(
    Ra VARCHAR(10),
    Nome VARCHAR(100),
    DataNasc VARCHAR(10),
    Idade INT,
    Sexo CHAR(1),
    GrauInstrucao VARCHAR(30),
    Rua VARCHAR(50),
    Numero INT ,
    Complemento VARCHAR(50),
    Bairro VARCHAR(30),
    Estado CHAR(2),
    Cidade VARCHAR(30),
    Cep VARCHAR(8),
    Telefone1 VARCHAR(15),
    Telefone2 VARCHAR(15),
    Identidade VARCHAR(30),
    Cpf VARCHAR(11),
    Email VARCHAR(50),
    CarteiraTrabalho VARCHAR(20),
    NomePai VARCHAR(100),
    TelefonePai VARCHAR(100),
    NomeMae VARCHAR(100),
    TelefoneMae VARCHAR(100),
    NomeCurso VARCHAR(50),
    CodTurma VARCHAR(20),
    Status VARCHAR(30),
    Semestre CHAR(5),
    PRIMARY KEY(Ra)
) CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE Empresas(
    codEmpresa VARCHAR(6) PRIMARY KEY,
    cnpj CHAR(18) NOT NULL,
    nomeFantasia VARCHAR(100) NOT NULL,
    razaoSocial VARCHAR(100) NOT NULL,
    telefone VARCHAR(15) NOT NULL,
    email VARCHAR(100) NOT NULL,
    responsavel VARCHAR(100) NOT NULL,
    cep VARCHAR(9) NOT NULL,
    rua VARCHAR(50) NOT NULL,
    numero VARCHAR(5) NOT NULL,
    bairro VARCHAR(30) NOT NULL,
    cidade VARCHAR(30) NOT NULL,
    estado CHAR(2) NOT NULL
) CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE Empregado(
    Alunos_ra VARCHAR(10) NOT NULL,
    FOREIGN KEY Alunos_ra(Alunos_ra)
    REFERENCES Alunos(Ra),
    Empresas_codEmpresa VARCHAR(6) NOT NULL,
    FOREIGN KEY Empresas_codEmpresa(Empresas_codEmpresa)
    REFERENCES Empresas(codEmpresa)
) CHARACTER SET utf8 COLLATE utf8_unicode_ci;

INSERT INTO `Func` (`idFunc`, `nomeFunc`, `emailFunc`, `senhaFunc`, `cpfFunc`) VALUES ('00000001', 'Admin', 'admin@admin.com', 'admin', '000.000.000-00');