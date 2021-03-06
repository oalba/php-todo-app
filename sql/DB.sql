create database todo;
use todo;

create table users (
name varchar(20),
username varchar(30),
password varchar(600),
cod_user int auto_increment primary key);

create table listas (
cod_lista int primary key,
cod_user int,
list_name varchar(20),
creation_date date,
status varchar(20));

create table contenido (
cod_lista int,
cod_tarea int,
status varchar(20),
descripcion varchar(200),
primary key (cod_lista,cod_tarea));

create table listas_users (
cod_lista int,
cod_user int,
primary key (cod_lista,cod_user));


alter table listas
add constraint fk_listas_users
foreign key (cod_user)
references users(cod_user)
on delete cascade
on update cascade;

alter table listas_users
add constraint fk_listasu_users2
foreign key (cod_user)
references users(cod_user)
on delete cascade
on update cascade;

alter table contenido
add constraint fk_listas_contenido
foreign key (cod_lista)
references listas(cod_lista)
on delete cascade
on update cascade;