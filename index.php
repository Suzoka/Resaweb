<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resaweb</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="./photos/favicon.svg" type="image/svg+xml">
</head>

<body>
    <header>
        <a href="#navigation" class="skip-link">Aller à la barre de navigation</a>
        <a href="#contenu" class="skip-link">Aller au contenu</a>
        <nav id="navigation">
            <a href="./index.php" class="logo"><img src="./photos/logo.svg" alt="Accueil"></a>
            <a href="./concept.php">Le concept</a>
            <a href="./catalogue.php">Commandez votre panier&nbsp;!</a>
            <a href="./quisommesnous.php">Qui sommes nous&nbsp;?</a>
        </nav>
        <div class="captioned-gallery" id="top">
            <div class="slider">
                <div>
                    <img src="./photos/photo-page-accueil-1.jpg" alt>
                </div>
                <div>
                    <img src="./photos/photo-page-accueil-2.jpg" alt>
                </div>
                <div>
                    <img src="./photos/photo-page-accueil-3.jpg" alt>
                </div>
                <div>
                    <img src="./photos/photo-page-accueil-1.jpg" alt>
                </div>
            </div>
        </div>
        <h1 class="enTete">Fructus et legumina</h1>
        <a href="#contenu"><img src="./photos/fleche.svg" alt="Aller au contenu" width="75px" class="appeleScroll"></a>
    </header>

    <h1 class="titre" id="contenu">En ce moment dans vos panniers</h1>


    <div class="sliderNouveautees">
        <div class="toutesNouveautees">
            <?php
            require('./bdconnect.php');
            $requete = "SELECT DISTINCT i.* FROM `morgan.zarka_db`.`203_ingredients` i inner join `morgan.zarka_db`.`203_ingredients_formule` fi on i.id_ingredient = fi.ext_id_ingredient inner join `morgan.zarka_db`.`203_formules` f on fi.ext_id_formule = f.id_formule WHERE f.periode = MONTH(NOW());";
            $stmt = $db->query($requete);
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $rand_keys = array_rand($result, 3);
            $ingredient0 = $rand_keys[0];
            $ingredient1 = $rand_keys[1];
            $ingredient2 = $rand_keys[2];
            $ingredient3 = $ingredient0;
            $ingredient4 = $ingredient1;
            $ingredient5 = $ingredient2;
            for ($i = 0; $i < 6; $i++) {
                ?>
                <div class="nouveautee"><img
                        src="https://blog.lecomptoirdetoamasina.fr/wp-content/uploads/2022/12/Quest-ce-que-la-pomme.png"
                        alt="" width="50%">
                    <div class="texteNouveautee">
                        <h2>
                            <?= $result[${"ingredient" . $i}]["nom_ingredient"] ?>
                        </h2>
                        <p>
                            <?= $result[${"ingredient" . $i}]["description_ingredient"] ?>
                        </p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <img src="./photos/fleche.svg" alt="" width="5%" class="sliderDroite">
        <img src="./photos/fleche.svg" alt="" width="5%" class="sliderGauche">
    </div>


    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero beatae et ex pariatur ratione neque quaerat sit
        dolores harum quasi, fugit quam ducimus. Nobis, magni? Culpa fugit consectetur repellendus suscipit.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem corrupti dolorum amet hic? Tempore similique,
        soluta voluptates maxime architecto quibusdam, nobis, adipisci voluptatem atque fuga quod quo. Nostrum, dolores
        delectus?
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum doloremque expedita reiciendis. Explicabo,
        qui? Iure molestiae corporis, totam, adipisci ullam numquam facilis voluptatum, veritatis ratione magnam
        explicabo! Repudiandae, dolorem officiis?
    </p>

    <footer><a href="./mentionslegales.php">mentions légales</a></footer>

    <script src="./script/nav.js"></script>
    <script src="./script/slider.js"></script>
</body>

</html>