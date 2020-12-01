drop database if exists webstore;
create database webstore;
use webstore;

create table user (
    id int primary key auto_increment,
    username varchar(30) not null unique,
    password varchar(255) not null,
    firstname varchar(100),
    lastname varchar(100)
);

create table tuoteryhma (
  id int primary key auto_increment,
  nimi varchar(50) unique not null,
  kuvake varchar(255) 
);

create table tuote (
  id int primary key auto_increment,
  nimi varchar(50) not null,
  kuvaus text not null,
  hinta decimal(6,2) not null,
  kuva varchar(50),
  kuvan_kuvaus varchar(50),
  varastomaara smallint unsigned,
  tuoteryhma_id int not null,
  index tuoteryhma_id(tuoteryhma_id),
  foreign key (tuoteryhma_id) references tuoteryhma(id)
  on delete restrict
);

create table uutiskirjeentilaajat (
  id int primary key auto_increment,
  email varchar(80) unique not null
);

insert into user (id, username, password, firstname, lastname) values (1, 'Testikäyttäjä', '$2y$10$u6QxuTzaPADEPVM2XUJtle.syhDpTmTCG4dFI3E3TlEI5jcp9MpOS', 'Teppo','Testikäyttäjä');

insert into tuoteryhma (id, nimi, kuvake) values (1, 'Kupit', '<i class="fas fa-coffee text-muted"></i>');
insert into tuoteryhma (id, nimi, kuvake) values (2, 'Lautaset', '<i class="fas fa-bullseye text-muted"></i>');
insert into tuoteryhma (id, nimi, kuvake) values (3, 'Taidelasi', '<i class="fas fa-glass-martini-alt text-muted"></i>');
insert into tuoteryhma (id, nimi, kuvake) values (4, 'Ruokailuvälineet', '<i class="fas fa-utensils text-muted"></i>');



insert into tuote (nimi,kuvaus,hinta,kuva,kuvan_kuvaus,varastomaara,tuoteryhma_id) 
values ('Nalle Puh Ihaa','Masentunut aasi',20.50,'k1.png','Muki: Nalle Puh - Ihaa',10,1);

insert into tuote (nimi,kuvaus,hinta,kuva,kuvan_kuvaus,varastomaara,tuoteryhma_id) 
values ('Nalle Puh kuppi' ,'Nalle Puh kuppi',20.50,'k2.png','Muki: Nalle Puh',10,1);

insert into tuote (nimi,kuvaus,hinta,kuva,kuvan_kuvaus,varastomaara,tuoteryhma_id) 
values ('Lautanen','Tämä on lautanen',6680,NULL,NULL,100,2);

insert into tuote (nimi,kuvaus,hinta,kuva,kuvan_kuvaus,varastomaara,tuoteryhma_id) 
values ('Taidelasi','Tämä on taidelasi',256,NULL,NULL,20,3);

insert into tuote (nimi,kuvaus,hinta,kuva,kuvan_kuvaus,varastomaara,tuoteryhma_id)
values ('lusikka','Tämä on lusikka',399,NULL,NULL,5,4);