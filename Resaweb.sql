create database if not exists `morgan.zarka_db`;

use `morgan.zarka_db`;

drop table if exists `203_ingredients`;

drop table if exists `203_formules`;

drop table if exists `203_ingredients_formule`;

create table if not exists `morgan.zarka_db`.`203_reservation` (
    `id_utilisateur` bigint primary key auto_increment,
    `email` tinytext,
    `nom` tinytext,
    `jour` tinytext,
    -- lundi, mardi, mercredi, jeudi, vendredi
    `deja_paye` boolean
);

create table if not exists `morgan.zarka_db`.`203_formule_reservee` (
    `id_utilisateur` bigint,
    `id_formule` bigint
);

create table if not exists `morgan.zarka_db`.`203_formules` (
    `id_formule` bigint primary key auto_increment,
    `nom_formule` tinytext,
    `prix` tinyblob,
    `description_formule` mediumtext,
    `periode` tinyblob
);

create table if not exists `morgan.zarka_db`.`203_ingredients_formule` (
    `id_formule` bigint,
    `id_ingredient` bigint
);

create table if not exists `morgan.zarka_db`.`203_ingredients` (
    `id_ingredient` bigint primary key auto_increment,
    `nom_ingredient` tinytext,
    `type` bit,
    -- 0 = fruit ou 1 = legume
    `saison` tinytext,
    -- printemps, été, automne, hiver
    `description_fruit` mediumtext
);

Insert into
    `morgan.zarka_db`.`203_ingredients` (`nom_ingredient`, `type`, `saison`)
values
    ("Fraise", 0, "été"),
    ("Litchi", 0, "hiver"),
    ("Orange", 0, "hiver"),
    ("Clémentine", 0, "automne"),
    ("Pomme", 0, "automne"),
    ("Poire", 0, "automne"),
    ("Carotte", 1, "automne"),
    ("Pomme de terre", 1, "hiver"),
    ("Prune", 0, "printemps"),
    ("pêche", 0, "printemps"),
    ("kiwi", 0, "printemps"),
    ("chou", 1, "printemps"),
    ("épinard", 1, "printemps"),
    ("cerise", 0, "printemps"),
    ("courgette", 1, "printemps"),
    ("poivron", 1, "printemps"),
    ("asperge", 1, "printemps"),
    ("tomate", 1, "été"),
    ("poireau", 1, "hiver"),
    ("aubergine", 1, "été"),
    ("betterave", 1, "été"),
    ("abricot", 0, "été"),
    ("framboise", 0, "été"),
    ("mirabelle", 0, "été"),
    ("figue", 0, "automne"),
    ("Concombre", 1, "été");

Insert into
    `morgan.zarka_db`.`203_formules` (
        `nom_formule`,
        `prix`,
        `description_formule`,
        `periode`
    )
values
    (
        "Fruits de Janvier",
        25,
        "Un panier remplie de fruits de saison",
        1
    ),
    (
        "Légumes de Janvier",
        25,
        "Un panier remplie de légumes de saison",
        1
    ),
    (
        "Fruits et légumes de Janvier",
        35,
        "Un panier remplie de fruits et légumes de saison",
        1
    ),
    (
        "Fruits de Février",
        25,
        "Un panier remplie de fruits de saison",
        2
    ),
    (
        "Légumes de Février",
        25,
        "Un panier remplie de légumes de saison",
        2
    ),
    (
        "Fruits et légumes de Février",
        35,
        "Un panier remplie de fruits et légumes de saison",
        2
    ),
    (
        "Fruits de Mars",
        25,
        "Un panier remplie de fruits de saison",
        3
    ),
    (
        "Légumes de Mars",
        25,
        "Un panier remplie de légumes de saison",
        3
    ),
    (
        "Fruits et légumes de Mars",
        35,
        "Un panier remplie de fruits et légumes de saison",
        3
    ),
    (
        "Fruits de Avril",
        25,
        "Un panier remplie de fruits de saison",
        4
    ),
    (
        "Légumes de Avril",
        25,
        "Un panier remplie de légumes de saison",
        4
    ),
    (
        "Fruits et légumes de Avril",
        35,
        "Un panier remplie de fruits et légumes de saison",
        4
    ),
    (
        "Fruits de Mai",
        25,
        "Un panier remplie de fruits de saison",
        5
    ),
    (
        "Légumes de Mai",
        25,
        "Un panier remplie de légumes de saison",
        5
    ),
    (
        "Fruits et légumes de Mai",
        35,
        "Un panier remplie de fruits et légumes de saison",
        5
    ),
    (
        "Fruits de Juin",
        25,
        "Un panier remplie de fruits de saison",
        6
    ),
    (
        "Légumes de Juin",
        25,
        "Un panier remplie de légumes de saison",
        6
    ),
    (
        "Fruits et légumes de Juin",
        35,
        "Un panier remplie de fruits et légumes de saison",
        6
    ),
    (
        "Fruits de Juillet",
        25,
        "Un panier remplie de fruits de saison",
        7
    ),
    (
        "Légumes de Juillet",
        25,
        "Un panier remplie de légumes de saison",
        7
    ),
    (
        "Fruits et légumes de Juillet",
        35,
        "Un panier remplie de fruits et légumes de saison",
        7
    ),
    (
        "Fruits de Août",
        25,
        "Un panier remplie de fruits de saison",
        8
    ),
    (
        "Légumes de Août",
        25,
        "Un panier remplie de légumes de saison",
        8
    ),
    (
        "Fruits et légumes de Août",
        35,
        "Un panier remplie de fruits et légumes de saison",
        8
    ),
    (
        "Fruits de Septembre",
        25,
        "Un panier remplie de fruits de saison",
        9
    ),
    (
        "Légumes de Septembre",
        25,
        "Un panier remplie de légumes de saison",
        9
    ),
    (
        "Fruits et légumes de Septembre",
        35,
        "Un panier remplie de fruits et légumes de saison",
        9
    ),
    (
        "Fruits de Octobre",
        25,
        "Un panier remplie de fruits de saison",
        10
    ),
    (
        "Légumes de Octobre",
        25,
        "Un panier remplie de légumes de saison",
        10
    ),
    (
        "Fruits et légumes de Octobre",
        35,
        "Un panier remplie de fruits et légumes de saison",
        10
    ),
    (
        "Fruits de Novembre",
        25,
        "Un panier remplie de fruits de saison",
        11
    ),
    (
        "Légumes de Novembre",
        25,
        "Un panier remplie de légumes de saison",
        11
    ),
    (
        "Fruits et légumes de Novembre",
        35,
        "Un panier remplie de fruits et légumes de saison",
        11
    ),
    (
        "Fruits de Décembre",
        25,
        "Un panier remplie de fruits de saison",
        12
    ),
    (
        "Légumes de Décembre",
        25,
        "Un panier remplie de légumes de saison",
        12
    ),
    (
        "Fruits et légumes de Décembre",
        35,
        "Un panier remplie de fruits et légumes de saison",
        12
    );