/* create database */
drop database if exists gestion-stock;
create database if not exists gestion-stock;
use gestion-stock;

/*create table*/
create table produit(
    id_p int auto_increment,
    primary key(id_p),
    reference varchar(100) ,
    nom varchar(100) ,
    descriptions varchar(100) ,
    prix money ,
    quantite int ,
    stockCritique int 
);
create table employe(
    cin varchar(20) ,
    primary key(cin),
    nom-prenom varchar(100) ,
    fonction varchar(100),
    motdepass varchar(20)
);
insert into employe value('HH1234','hamza landaoui','magaziner','landaoui1234');
ALTER TABLE produit ADD CONSTRAINT C1 UNIQUE (reference) ;