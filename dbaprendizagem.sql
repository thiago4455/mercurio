create database dbaprendizagem DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
use dbaprendizagem;

SET NAMES 'utf8';
SET character_set_connection=utf8;
SET character_set_client=utf8;
SET character_set_results=utf8;


create table Func (
    idFunc int(8) primary key,
    nomeFunc varchar(60) not null,
    emailFunc varchar(60) not null,
    senhaFunc varchar(20) not null,
    cpfFunc varchar(14) not null
) CHARACTER SET utf8 COLLATE utf8_general_ci;

create table Alunos (
    idAluno int(8) primary key,
    nomeAluno varchar(60) not null,
    emailAluno varchar(60) not null
) CHARACTER SET utf8 COLLATE utf8_general_ci;
