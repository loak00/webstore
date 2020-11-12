drop database if exists webstore;
create database webstore;
use verkkokauppa;

create table tuoteryhma (
  id int primary key auto_increment,
  nimi varchar(50) unique not null
);

create table tuote (
  id int primary key auto_increment,
  nimi varchar(50) not null,
  kuvaus text not null,
  hinta decimal(6,2) not null,
  kuva varchar(50),
  varastomaara smallint unsigned,
  tuoteryhma_id int not null,
  index tuoteryhma_id(tuoteryhma_id),
  foreign key (tuoteryhma_id) references tuoteryhma(id)
  on delete restrict
);


insert into tuoteryhma (id, nimi) values (1, 'Kupit');
insert into tuoteryhma (id, nimi) values (2, 'Lautaset');
insert into tuoteryhma (id, nimi) values (3, 'Taidelasi');
insert into tuoteryhma (id, nimi) values (4, 'Ruokailuvälineet');



insert into tuote (nimi, kuvaus, hinta, kuva, varastomaara,tuoteryhma_id) 
values ('Kuppi','Tämä on kuppi',7000,NULL,10,1);

insert into tuote (nimi, kuvaus, hinta, kuva, varastomaara,tuoteryhma_id) 
values ('Lautanen','Tämä on lautanen',6680,NULL,100,2);

insert into tuote (nimi, kuvaus, hinta, kuva, varastomaara,tuoteryhma_id) 
values ('Taidelasi','Tämä on taidelasi',256,NULL,20,3);

insert into tuote (nimi, kuvaus, hinta, kuva, varastomaara,tuoteryhma_id) 
values ('lusikka','Tämä on lusikka',399,NULL,5,4);

