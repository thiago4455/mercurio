create schema biblioteca;
use biblioteca;

create table Func (
    idFunc smallint primary key,
    nomeFunc varchar(60) not null,
    emailFunc varchar(60) not null,
    senhaFunc varchar(20) not null,
    cpfFunc varchar(14) not null
);

create table Alunos (
    idAluno smallint primary key,
    nomeAluno varchar(60) not null,
    emailAluno varchar(60) not null,
);

create table Livros (
    idLivro smallint primary key,
    nomeLivro varchar(60) not null,
    autorLivro varchar(60) not null,
    categoriaLivro varchar(20) not null,
);