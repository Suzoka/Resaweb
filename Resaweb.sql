create database if not exists `morgan.zarka_db`;

use `morgan.zarka_db`;
drop table `203_ingredients` if exists;

create table if not exists `morgan.zarka_db`.`203_reservation` (
    `id_utilisateur` bigint primary key auto_increment,
    `email` tinytext,
    `nom` tinytext,
    `jour` tinytext, -- lundi, mardi, mercredi, jeudi, vendredi
    `paye` boolean
);

create table if not exists `morgan.zarka_db`.`203_formule_reservee` (
    `id_utilisateur` bigint,
    `id_formule` bigint
);

create table if not exists `morgan.zarka_db`.`203_formules` (
    `id_formule` bigint primary key auto_increment,
    `nom formule` tinytext,
    `prix` tinyblob
);

create table if not exists `morgan.zarka_db`.`203_ingredients_formule` (
    `id_formule` bigint,
    `id_ingredient` bigint
);

create table if not exists `morgan.zarka_db`.`203_ingredients` (
    `id_ingredient` bigint primary key auto_increment,
    `ingredient` tinytext,
    `type` bit, -- 0 = fruit ou 1 = legume
    `saison` tinytext -- printemps, été, automne, hiver
);

Insert into `morgan.zarka_db`.`203_ingredients` values  (null, "Fraise", 0, "été"), 
                                                        (null, "Litchi", 0, "hiver"),
                                                        (null, "Orange", 0, "hiver"),
                                                        (null, "Clémentine", 0, "automne"),
                                                        (null, "Pomme", 0, "automne"),
                                                        (null, "Poire", 0, "automne"),
                                                        (null, "Carotte", 1, "automne"),
                                                        (null, "Concombre", 1, "été");