create database todo;
use todo;

create table users (
name varchar(20),
username varchar(30),
password varchar(600),
cod_user int auto_increment primary key);

create table listas (
cod_lista int auto_increment primary key,
cod_user int,
list_name varchar(20),
creation_date date,
status varchar(20));

create table contenido (
cod_lista int,
cod_tarea int,
primary key (cod_lista,cod_tarea));

create table tarea (
cod_tarea int auto_increment primary key,
status varchar(20),
descripcion varchar(200));

create table listas_users (
cod_lista int,
cod_user int,
primary key (cod_lista,cod_user));