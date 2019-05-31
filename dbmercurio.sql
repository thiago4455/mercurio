CREATE DATABASE dbmercurio CHARACTER SET utf8 COLLATE utf8_unicode_ci;

USE dbmercurio;

CREATE TABLE Funcionarios (
    idFunc INT PRIMARY KEY AUTO_INCREMENT,
    nomeFunc VARCHAR(60) NOT NULL,
    emailFunc VARCHAR(60) NOT NULL,
    senhaFunc VARCHAR(32) NOT NULL,
    cpfFunc VARCHAR(14) NOT NULL,
    telefoneFunc VARCHAR(15) NOT NULL,
    cepFunc VARCHAR(9) NOT NULL,
    ruaFunc VARCHAR(50) NOT NULL,
    numeroFunc VARCHAR(5) NOT NULL,
    bairroFunc VARCHAR(30) NOT NULL,
    cidadeFunc VARCHAR(30) NOT NULL,
    estadoFunc CHAR(2) NOT NULL,
    tipoFunc VARCHAR(20) NOT NULL
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

CREATE TABLE Necessidade(
    id INT AUTO_INCREMENT PRIMARY KEY,
    codEmpresa VARCHAR(6) NOT NULL,
    FOREIGN KEY (codEmpresa)
    REFERENCES Empresas(codEmpresa),
    tipoContrato VARCHAR(30),
    quantidade INT,
    ciclo CHAR(5),
    descricao TEXT
) CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE Encaminhados(
    Alunos_ra VARCHAR(10) NOT NULL,
    FOREIGN KEY Alunos_ra(Alunos_ra)
    REFERENCES Alunos(Ra),
    idNecessidade INT NOT NULL,
    FOREIGN KEY (idNecessidade)
    REFERENCES Necessidade(id),
	Status VARCHAR(20),
    tipoContrato VARCHAR(30)
) CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE Recuperar(
    email VARCHAR(60) UNIQUE,
    codigo VARCHAR(6)
) CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE Historico(
    alunoRa VARCHAR(10),
    FOREIGN KEY (alunoRa)
    REFERENCES Alunos(Ra),
    empresaCod VARCHAR(6),
    FOREIGN KEY (empresaCod)
    REFERENCES Empresas(codEmpresa),
    funcionarioId INT,
    FOREIGN KEY (funcionarioId)
    REFERENCES Funcionarios(idFunc),
    descricao TEXT,
    ciclo CHAR(5)
)CHARACTER SET utf8 COLLATE utf8_unicode_ci;

CREATE TABLE Contratos (
    idContrato INT PRIMARY KEY AUTO_INCREMENT,
    nomeContrato VARCHAR(60) NOT NULL
);

INSERT INTO `dbmercurio`.`Contratos` (`nomeContrato`) VALUES ('Fase_Escolar');
INSERT INTO `dbmercurio`.`Contratos` (`nomeContrato`) VALUES ('Prática_Sequencial');
INSERT INTO `dbmercurio`.`Contratos` (`nomeContrato`) VALUES ('Concomitante');
INSERT INTO `dbmercurio`.`Contratos` (`nomeContrato`) VALUES ('Sequencial');
INSERT INTO `dbmercurio`.`Contratos` (`nomeContrato`) VALUES ('Dual');



INSERT INTO `Funcionarios` (`idFunc`, `nomeFunc`, `emailFunc`, `senhaFunc`, `cpfFunc`, `telefoneFunc`, `cepFunc`, `ruaFunc`, `numeroFunc`, `bairroFunc`, `cidadeFunc`, `estadoFunc`, `tipoFunc`) VALUES ('1', 'Admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '000.000.000-00', '(00) 00000-0000', '00000-000', 'Rua X', '0', 'Bairro X', 'Cidade X', '00', 'admin');
