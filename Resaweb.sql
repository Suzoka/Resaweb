create database if not exists `zarka_resaweb`;

use `zarka_resaweb`;

drop table if exists `203_ingredients`;

drop table if exists `203_formules`;

drop table if exists `203_ingredients_formule`;

create table if not exists `zarka_resaweb`.`203_reservation` (
    `id_utilisateur` bigint primary key auto_increment,
    `email` tinytext,
    `nom_usr` tinytext,
    `jour` tinyint,
    -- lundi = 1, mardi = 2, mercredi = 3, jeudi = 4, vendredi = 5
    `deja_paye` boolean
);

create table if not exists `zarka_resaweb`.`203_formule_reservee` (
    `id_reservation` bigint primary key auto_increment,
    `ext_id_utilisateur` bigint,
    `ext_id_formule` bigint
);

create table if not exists `zarka_resaweb`.`203_formules` (
    `id_formule` bigint primary key auto_increment,
    `nom_formule` tinytext,
    `prix` tinyblob,
    `periode` tinyblob,
    -- numéro du mois dans l'année
    `description_formule` mediumtext
);

create table if not exists `zarka_resaweb`.`203_ingredients_formule` (
    `ext_id_formule` bigint,
    `ext_id_ingredient` bigint
);

create table if not exists `zarka_resaweb`.`203_ingredients` (
    `id_ingredient` bigint primary key auto_increment,
    `nom_ingredient` tinytext,
    `type` int,
    -- 0 = fruit ou 1 = legume ou 3 = tentative de payement (erreur)
    `saison` int,
    -- printemps = 1, été = 2, automne = 3, hiver = 4
    `description_ingredient` mediumtext
);

Insert into
    `zarka_resaweb`.`203_ingredients` (
        `nom_ingredient`,
        `type`,
        `saison`,
        `description_ingredient`
    )
values
    (
        "La fraise",
        0,
        2,
        "Classique des fruits rouges, elle est hydratante et vitaminée, peu importe l'âge, ce fruit est intemporel."
    ),
    (
        "Le litchi",
        0,
        4,
        "Fruit très vitaminé et très bon pour le transit, le litchi sera votre meilleur ami en cas de problèmes d'estomac."
    ),
    (
        "L'orange",
        0,
        4,
        "Remplie de vitamines, et surtout de la C, l'orange est une très bonne amie contre les virus hivernaux."
    ),
    (
        "La clémentine",
        0,
        3,
        "Remplie de vitamines C, la clémentine peut aider à accélérer la cicatrisation et à lutter contre les infections."
    ),
    (
        "La pomme",
        0,
        3,
        "Ce fruit aurait des vertus qui réduisent les risques de cancers et le mauvais cholestérol."
    ),
    (
        "La poire",
        0,
        3,
        "Fruit ayant un effet antioxydant, la poire est également très bonne pour le transit."
    ),
    (
        "La carotte",
        1,
        3,
        "Grande source de vitamine B, la carotte est bonne pour la vue et la peau. Elle a également un fort pouvoir antioxydant."
    ),
    (
        "La pomme de terre",
        1,
        4,
        "Féculent très riche en potassium, la pomme de terre est également riche en amidon."
    ),
    (
        "La prune",
        0,
        1,
        "La prune a pour effet de faciliter la digestion. Elle est une grande source de potassium, bon pour le corps."
    ),
    (
        "La pêche",
        0,
        1,
        "La pêche réduit les risques de maladies cardiovasculaires. Elle contient également beaucoup d'antioxydants."
    ),
    (
        "Le kiwi",
        0,
        1,
        "Le kiwi est une grande source de fibres. Mais en plus de cela, il limite les risques de maladies cardiovasculaires et de  cancers."
    ),
    (
        "Le choux",
        1,
        1,
        "Remplie de multiples vitamines, le choux permet une bonne santé de la peau, des yeux, et des os, mais également de garder nos dents et gencives en bonne santé."
    ),
    (
        "L'épinard",
        1,
        1,
        "Popularisé par Popeye, l'épinard est une grande source de bétaïne, permettant d'avoir une meilleure endurance à l'effort physique."
    ),
    (
        "La cerise",
        0,
        1,
        "La cerise est un fruit qui a pour particularité d'améliorer le sommeil. De plus, elle soulage l'arthrose et améliore la santé intestinale."
    ),
    (
        "La courgette",
        1,
        1,
        "Riche en potassium, la courgette est un légume très bon pour les muscles et régule la pression sanguine."
    ),
    (
        "Le poivron",
        1,
        1,
        "En été, rien de tel que de bons poivrons que l'on fait revenir au barbecue. Mais cuit au four dans vos plats, ils seront également très bons."
    ),
    (
        "L'asperge",
        1,
        1,
        "Elles ont le pouvoir de diminuer le taux d'homocystéine dans le sang et limitent également les risques de cancers."
    ),
    (
        "La tomatte",
        0,
        2,
        "Ce fruit est souvent compté comme un légume, et est consommé comme tel, c'est pourquoi nous la retrouvons dans nos paniers de légumes."
    ),
    (
        "Le poireau",
        1,
        4,
        "Un certain canard vous dira surement que c'est un artichaud, mais non ! C'est bien un poireau !"
    ),
    (
        "L'aubergine",
        1,
        2,
        "Ce légume se prête à tous types de cuisson et accompagne à merveille tous vos petits plats !"
    ),
    (
        "La betterave",
        1,
        2,
        "Très prisée par les grands chefs, la betterave a un goût sucré également apprécié par les enfants."
    ),
    (
        "L'abricot",
        0,
        2,
        "C'est un fruit qui est très bon pour la croissance et la protection des os, grâce à son fort apport en bêta carotène"
    ),
    (
        "La framboise",
        0,
        2,
        "Ce petit fruit rouge présente un apport calorique modéré : avec elle, alliez plaisir en bouche et bien-être !"
    ),
    (
        "La mirabelle",
        0,
        2,
        "Fruit sucré et savoureux qui se mange aussi bien seul que cuisiné en tarte, ou même en confiture."
    ),
    (
        "La figue",
        0,
        3,
        "La figue est un festival de couleurs et de saveurs ! Blanche, noire, rouge, violette ou bicolore, elle reste avant tout un fruit gourmand et gorgé de soleil"
    ),
    (
        "Le concombre",
        1,
        2,
        "Très frais et hydratant, c'est le légume parfait pour les étés chauds."
    );

Insert into
    `zarka_resaweb`.`203_formules` (
        `id_formule`,
        `nom_formule`,
        `prix`,
        `description_formule`,
        `periode`
    )
values
    (
        1,
        "Fruits de Janvier",
        25,
        "Un panier remplie de fruits de saison",
        1
    ),
    (
        2,
        "Légumes de Janvier",
        25,
        "Un panier remplie de légumes de saison",
        1
    ),
    (
        3,
        "Fruits et légumes de Janvier",
        35,
        "Un panier remplie de fruits et légumes de saison",
        1
    ),
    (
        4,
        "Fruits de Février",
        25,
        "Un panier remplie de fruits de saison",
        2
    ),
    (
        5,
        "Légumes de Février",
        25,
        "Un panier remplie de légumes de saison",
        2
    ),
    (
        6,
        "Fruits et légumes de Février",
        35,
        "Un panier remplie de fruits et légumes de saison",
        2
    ),
    (
        7,
        "Fruits de Mars",
        25,
        "Un panier remplie de fruits de saison",
        3
    ),
    (
        8,
        "Légumes de Mars",
        25,
        "Un panier remplie de légumes de saison",
        3
    ),
    (
        9,
        "Fruits et légumes de Mars",
        35,
        "Un panier remplie de fruits et légumes de saison",
        3
    ),
    (
        10,
        "Fruits d'Avril",
        25,
        "Un panier remplie de fruits de saison",
        4
    ),
    (
        11,
        "Légumes d'Avril",
        25,
        "Un panier remplie de légumes de saison",
        4
    ),
    (
        12,
        "Fruits et légumes d'Avril",
        35,
        "Un panier remplie de fruits et légumes de saison",
        4
    ),
    (
        13,
        "Fruits de Mai",
        25,
        "Un panier remplie de fruits de saison",
        5
    ),
    (
        14,
        "Légumes de Mai",
        25,
        "Un panier remplie de légumes de saison",
        5
    ),
    (
        15,
        "Fruits et légumes de Mai",
        35,
        "Un panier remplie de fruits et légumes de saison",
        5
    ),
    (
        16,
        "Fruits de Juin",
        25,
        "Un panier remplie de fruits de saison",
        6
    ),
    (
        17,
        "Légumes de Juin",
        25,
        "Un panier remplie de légumes de saison",
        6
    ),
    (
        18,
        "Fruits et légumes de Juin",
        35,
        "Un panier remplie de fruits et légumes de saison",
        6
    ),
    (
        19,
        "Fruits de Juillet",
        25,
        "Un panier remplie de fruits de saison",
        7
    ),
    (
        20,
        "Légumes de Juillet",
        25,
        "Un panier remplie de légumes de saison",
        7
    ),
    (
        21,
        "Fruits et légumes de Juillet",
        35,
        "Un panier remplie de fruits et légumes de saison",
        7
    ),
    (
        22,
        "Fruits d'Août",
        25,
        "Un panier remplie de fruits de saison",
        8
    ),
    (
        23,
        "Légumes d'Août",
        25,
        "Un panier remplie de légumes de saison",
        8
    ),
    (
        24,
        "Fruits et légumes d'Août",
        35,
        "Un panier remplie de fruits et légumes de saison",
        8
    ),
    (
        25,
        "Fruits de Septembre",
        25,
        "Un panier remplie de fruits de saison",
        9
    ),
    (
        26,
        "Légumes de Septembre",
        25,
        "Un panier remplie de légumes de saison",
        9
    ),
    (
        27,
        "Fruits et légumes de Septembre",
        35,
        "Un panier remplie de fruits et légumes de saison",
        9
    ),
    (
        28,
        "Fruits d'Octobre",
        25,
        "Un panier remplie de fruits de saison",
        10
    ),
    (
        29,
        "Légumes d'Octobre",
        25,
        "Un panier remplie de légumes de saison",
        10
    ),
    (
        30,
        "Fruits et légumes d'Octobre",
        35,
        "Un panier remplie de fruits et légumes de saison",
        10
    ),
    (
        31,
        "Fruits de Novembre",
        25,
        "Un panier remplie de fruits de saison",
        11
    ),
    (
        32,
        "Légumes de Novembre",
        25,
        "Un panier remplie de légumes de saison",
        11
    ),
    (
        33,
        "Fruits et légumes de Novembre",
        35,
        "Un panier remplie de fruits et légumes de saison",
        11
    ),
    (
        34,
        "Fruits de Décembre",
        25,
        "Un panier remplie de fruits de saison",
        12
    ),
    (
        35,
        "Légumes de Décembre",
        25,
        "Un panier remplie de légumes de saison",
        12
    ),
    (
        36,
        "Fruits et légumes de Décembre",
        35,
        "Un panier remplie de fruits et légumes de saison",
        12
    );

Insert into
    `zarka_resaweb`.`203_ingredients_formule` (
        `ext_id_formule`,
        `ext_id_ingredient`
    )
values
    (7, 1),
    (9, 1),
    (10, 1),
    (12, 1),
    (13, 1),
    (15, 1),
    (16, 1),
    (18, 1),
    (19, 1),
    (21, 1),
    --
    (31, 2),
    (33, 2),
    (34, 2),
    (36, 2),
    (1, 2),
    (3, 2),
    --
    (34, 3),
    (36, 3),
    (1, 3),
    (3, 3),
    (4, 3),
    (6, 3),
    (7, 3),
    (9, 3),
    (10, 3),
    (12, 3),
    --
    (31, 4),
    (33, 4),
    (34, 4),
    (36, 4),
    (1, 4),
    (3, 4),
    --
    (25, 5),
    (27, 5),
    (28, 5),
    (30, 5),
    (31, 5),
    (33, 5),
    (34, 5),
    (36, 5),
    (1, 5),
    (3, 5),
    (4, 5),
    (6, 5),
    (7, 5),
    (9, 5),
    (10, 5),
    (12, 5),
    (13, 5),
    (15, 5),
    --
    (22, 6),
    (24, 6),
    (25, 6),
    (27, 6),
    (28, 6),
    (30, 6),
    (31, 6),
    (33, 6),
    (34, 6),
    (36, 6),
    (1, 6),
    (3, 6),
    (4, 6),
    (6, 6),
    (7, 6),
    (9, 6),
    (10, 6),
    (12, 6),
    --
    (23, 7),
    (24, 7),
    (26, 7),
    (27, 7),
    (29, 7),
    (30, 7),
    (32, 7),
    (33, 7),
    (35, 7),
    (36, 7),
    (2, 7),
    (3, 7),
    (5, 7),
    (6, 7),
    (8, 7),
    (9, 7),
    (14, 7),
    (15, 7),
    (17, 7),
    (18, 7),
    --
    (26, 8),
    (27, 8),
    (29, 8),
    (30, 8),
    (32, 8),
    (33, 8),
    (35, 8),
    (36, 8),
    (2, 8),
    (3, 8),
    (5, 8),
    (6, 8),
    (8, 8),
    (9, 8),
    --
    (19, 9),
    (21, 9),
    (22, 9),
    (24, 9),
    (25, 9),
    (27, 9),
    --
    (16, 10),
    (18, 10),
    (19, 10),
    (21, 10),
    (22, 10),
    (24, 10),
    --
    (31, 11),
    (33, 11),
    (34, 11),
    (36, 11),
    (1, 11),
    (3, 11),
    (4, 11),
    (6, 11),
    (7, 11),
    (9, 11),
    (10, 11),
    (12, 11),
    (13, 11),
    (15, 11),
    --
    (29, 12),
    (30, 12),
    (32, 12),
    (33, 12),
    (35, 12),
    (36, 12),
    (2, 12),
    (3, 12),
    (5, 12),
    (6, 12),
    (8, 12),
    (9, 12),
    (11, 12),
    (12, 12),
    --
    (26, 13),
    (27, 13),
    (29, 13),
    (30, 13),
    (32, 13),
    (33, 13),
    (35, 13),
    (36, 13),
    (2, 13),
    (3, 13),
    (5, 13),
    (6, 13),
    (8, 13),
    (9, 13),
    (14, 13),
    (15, 13),
    (17, 13),
    (18, 13),
    --
    (13, 14),
    (15, 14),
    (16, 14),
    (18, 14),
    (19, 14),
    (21, 14),
    --
    (14, 15),
    (15, 15),
    (17, 15),
    (18, 15),
    (20, 15),
    (21, 15),
    (23, 15),
    (24, 15),
    (26, 15),
    (27, 15),
    --
    (17, 16),
    (18, 16),
    (20, 16),
    (21, 16),
    (23, 16),
    (24, 16),
    (26, 16),
    (27, 16),
    --
    (11, 17),
    (12, 17),
    (14, 17),
    (15, 17),
    (17, 17),
    (18, 17),
    --
    (11, 18),
    (12, 18),
    (14, 18),
    (15, 18),
    (17, 18),
    (18, 18),
    (20, 18),
    (21, 18),
    (23, 18),
    (24, 18),
    (26, 18),
    (27, 18),
    --
    (26, 19),
    (27, 19),
    (29, 19),
    (30, 19),
    (32, 19),
    (33, 19),
    (35, 19),
    (36, 19),
    (2, 19),
    (3, 19),
    (5, 19),
    (6, 19),
    (8, 19),
    (9, 19),
    (11, 19),
    (12, 19),
    --
    (17, 20),
    (18, 20),
    (20, 20),
    (21, 20),
    (23, 20),
    (24, 20),
    (26, 20),
    (27, 20),
    --
    (29, 21),
    (30, 21),
    (32, 21),
    (33, 21),
    (35, 21),
    (36, 21),
    (2, 21),
    (3, 21),
    (5, 21),
    (6, 21),
    (8, 21),
    (9, 21),
    --
    (16, 22),
    (18, 22),
    (19, 22),
    (21, 22),
    (22, 22),
    (24, 22),
    --
    (13, 23),
    (15, 23),
    (16, 23),
    (18, 23),
    (19, 23),
    (21, 23),
    (22, 23),
    (24, 23),
    (25, 23),
    (27, 23),
    (28, 23),
    (30, 23),
    --
    (22, 24),
    (24, 24),
    (25, 24),
    (27, 24),
    --
    (19, 25),
    (21, 25),
    (22, 25),
    (24, 25),
    (25, 25),
    (27, 25),
    --
    (8, 13),
    (9, 13),
    (14, 13),
    (15, 13),
    (17, 13),
    (18, 13),
    (20, 20),
    (21, 20),
    (23, 20),
    (24, 20),
    (26, 20),
    (27, 20),
    (29, 26),
    (30, 26);