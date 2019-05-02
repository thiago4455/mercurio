CREATE DATABASE dbaprendizagem;
USE dbaprendizagem;

CREATE TABLE Func (
    idFunc SMALLINT PRIMARY KEY,
    nomeFunc VARCHAR(60) NOT NULL,
    emailFunc VARCHAR(60) NOT NULL,
    senhaFunc VARCHAR(20) NOT NULL,
    cpfFunc VARCHAR(14) NOT NULL
);

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
    PRIMARY KEY(Ra)
);

INSERT INTO `Func` (`idFunc`, `nomeFunc`, `emailFunc`, `senhaFunc`, `cpfFunc`) VALUES ('00000001', 'Admin', 'admin@admin.com', 'admin', '000.000.000-00')