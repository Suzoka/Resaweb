<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fructus & legumina - Accueil</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="./photos/favicon.svg" type="image/svg+xml">
</head>

<body>
    <header>
        <a href="#navigation" class="skip-link" title="Lien pour aller à la barre de navigation">Aller à la barre de
            navigation</a>
        <a href="#top" class="skip-link" title="Lien pour aller au contenu">Aller au contenu</a>
        <nav id="navigation">
            <a href="./index.php" class="logo" title="Lien pour aller vers l'accueil"><img src="./photos/logo.svg"
                    alt="Accueil"></a>
            <a href="./concept.php" title="Lien pour aller à la page concept">Le concept</a>
            <a href="./catalogue.php" title="Lien pour aller au catalogue">Commandez votre panier&nbsp;!</a>
            <a href="./quisommesnous.php" title="Lien pour aller à la page de présentation de l'équipe">Qui sommes
                nous&nbsp;?</a>
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
        <a href="#contenu" title="Lien pour aller au contenu"><img src="./photos/fleche.svg" alt="Aller au contenu"
                width="70" class="appeleScroll"></a>
    </header>

    <h1 class="titre" id="contenu">En ce moment dans vos paniers</h1>


    <div class="sliderNouveautees">
        <div class="toutesNouveautees">
            <?php
            require('./bdconnect.php');
            $requete = "SELECT DISTINCT i.* FROM `zarka_resaweb`.`203_ingredients` i inner join `zarka_resaweb`.`203_ingredients_formule` fi on i.id_ingredient = fi.ext_id_ingredient inner join `zarka_resaweb`.`203_formules` f on fi.ext_id_formule = f.id_formule WHERE f.periode = MONTH(NOW());";
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
                <div class="nouveautee">
                    <img src="./photos/<?= $result[${"ingredient" . $i}]["id_ingredient"] ?>.jpg" alt="" width="50%">
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


    <p class="concept center">Bienvenue chez Fructus et Legumina, votre vendeur de paniers de fruits et légumes frais.
        <br><br>
        Nous comprenons que votre emploi du temps chargé peut rendre difficile la cueillette de produits de qualité.
        C'est pourquoi nous vous offrons la solution idéale : la réservation de paniers prêts à l'emploi, remplis de
        délices saisonniers directement issus de la cueillette Eiffel.
        <br><br>
        Découvrez une sélection de fruits et légumes bio soigneusements choisies par notre équipe, et cultivés avec amour et dans le respect de l'environnement. Que vous soyez un passionné de cuisine en quête d'ingrédients de première qualité ou
        simplement à la recherche d'une alimentation saine et pratique, nos paniers répondront à vos besoins.
        <br><br>
        <a href="./concept.php" class="lienFormule" title="redirection vers la page concept">En savoir plus</a>
    </p>

    <a href='./redirectionPanier.php' class='lienPanier invisible' title="Lien pour aller au panier"><img
            src='./photos/panier.svg' alt='Aller au panier'></a>
    <footer><a href="./mentionslegales.php" title="Lien pour aller aux mentions légales">Mentions légales</a><a
            href="./planSite.php" title="Lien pour aller au plan du site">Plan du site</a></footer>

    <script src="./script/nav.js"></script>
    <script src="./script/slider.js"></script>
    <script src="./script/lienPanier.js"></script>
</body>

</html>