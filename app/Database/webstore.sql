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
  nimi varchar(50) unique not null
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


insert into tuoteryhma (id, nimi) values (1, 'Kupit');
insert into tuoteryhma (id, nimi) values (2, 'Lautaset');
insert into tuoteryhma (id, nimi) values (3, 'Taidelasi');
insert into tuoteryhma (id, nimi) values (4, 'Ruokailuvälineet');



insert into tuote (nimi,kuvaus,hinta,kuva,kuvan_kuvaus,varastomaara,tuoteryhma_id) 
values ('Nalle Puh Ihaa','Masentunut aasi',20.50,'1.png',NULL,10,1);

insert into tuote (nimi,kuvaus,hinta,kuva,kuvan_kuvaus,varastomaara,tuoteryhma_id) 
values ('Lautanen','Tämä on lautanen',6680,NULL,NULL,100,2);

insert into tuote (nimi,kuvaus,hinta,kuva,kuvan_kuvaus,varastomaara,tuoteryhma_id) 
values ('Taidelasi','Tämä on taidelasi',256,NULL,NULL,20,3);

insert into tuote (nimi,kuvaus,hinta,kuva,kuvan_kuvaus,varastomaara,tuoteryhma_id) 
values ('lusikka','Tämä on lusikka',399,NULL,NULL,5,4);