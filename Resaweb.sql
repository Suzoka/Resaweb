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
    `description_ingredient` mediumtext
);

Insert into
    `morgan.zarka_db`.`203_ingredients` (`nom_ingredient`, `type`, `saison`, `description_ingredient`)
values
    ("La fraise", 0, "été", "Classique des fruits rouges, elle est hydratante et vitaminée, peu importe l'âge, ce fruit est intemporel."),
    ("Le litchi", 0, "hiver", "Fruit très vitaminé et très bon pour le transit, le litchi sera votre meilleur ami en cas de problèmes d'estomac."),
    ("L'orange", 0, "hiver", "Remplie de vitamines, et surtout de la C, l'orange est une très bonne amie contre les virus hivernaux."),
    ("La clémentine", 0, "automne", "Remplie de vitamines C, la clémentine peut aider à accélérer la cicatrisation et à lutter contre les infection."),
    ("La pomme", 0, "automne", "Ce fruit aurait des vertues qui réduisent les risques de cancer et le mauvais choléstérol."),
    ("La poire", 0, "automne", "Fruit ayant un effet antioxydant, la poire est également très bonne pour le transit."),
    ("La carotte", 1, "automne", "Grande source de vitamine B, la carotte est bonne pour la vue et la peau. Elle a également un fort pouvoir antioxydant."),
    ("La pomme de terre", 1, "hiver", "Féculent très riche en potassium, la pomme de terre est également riche en amidon."),
    ("La prune", 0, "printemps", "La prune a pour effet de faciliter la gestion. Elle est une grande source de potassium, bon pour le corps."),
    ("La pêche", 0, "printemps", ""),
    ("Le kiwi", 0, "printemps", ""),
    ("Le chou", 1, "printemps", ""),
    ("L'épinard", 1, "printemps", ""),
    ("La cerise", 0, "printemps", ""),
    ("La courgette", 1, "printemps", ""),
    ("Le poivron", 1, "printemps", ""),
    ("L'asperge", 1, "printemps", ""),
    ("La tomate", 1, "été", ""),
    ("Le poireau", 1, "hiver", ""),
    ("L'aubergine", 1, "été", ""),
    ("La betterave", 1, "été", ""),
    ("L'abricot", 0, "été", ""),
    ("La framboise", 0, "été", ""),
    ("La mirabelle", 0, "été", ""),
    ("La figue", 0, "automne", ""),
    ("Le concombre", 1, "été", "");

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