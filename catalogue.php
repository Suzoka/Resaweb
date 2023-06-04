<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fructus et legumina - Catalogue</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="./photos/favicon.svg" type="image/svg+xml">
</head>

<body>
<header>
        <a href="#navigation" class="skip-link" title="Lien pour aller à la barre de navigation">Aller à la barre de navigation</a>
        <a href="#top" class="skip-link" title="Lien pour aller au contenu">Aller au contenu</a>
        <nav id="navigation">
            <a href="./index.php" class="logo" title="Lien pour aller vers l'accueil"><img src="./photos/logo.svg" alt="Accueil"></a>
            <a href="./concept.php" title="Lien pour aller à la page concept">Le concept</a>
            <a href="./catalogue.php" title="Lien pour aller au catalogue">Commandez votre panier&nbsp;!</a>
            <a href="./quisommesnous.php" title="Lien pour aller à la page de présentation de l'équipe">Qui sommes-nous&nbsp;?</a>
        </nav>
    </header>

    <h1 class="top titre marge" id="top">Nos formules</h1>

    <form action="./recherche.php" method="post">
        <label for="recherche">Que voulez-vous manger ?</label>
        <div class="searchBar">
            <input type="search" list="ingredients" id="recherche" name="recherche">
            <input type="submit" value="Rechercher">
        </div>
    </form>

    <datalist id="ingredients">
        <?php
        require('./bdconnect.php');
        $requete = "SELECT * FROM `203_ingredients`";
        $stmt = $db->query($requete);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($result as $key => $element) {
            $ingredient = "Des " . str_replace("L'", "", str_replace("La ", "", str_replace("Le ", "", $element["nom_ingredient"])));
            if (substr($ingredient, -1) != "x") {
                if (substr($ingredient, -1) == "u") {
                    $ingredient .= "x";
                } else {
                    $ingredient .= "s";
                }
            }
            echo ("<option value=\"{$ingredient}\">");
        }
        ?>
    </datalist>


    <div class="allFormule">

        <?php
        $requete = "SELECT * FROM `203_formules` where periode = MONTH(NOW());";
        $stmt = $db->query($requete);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $key => $element) {
            ?>

            <div class="formule">
                <h2>
                    <?= $element['nom_formule']; ?>
                </h2>
                <img src="<?php if (strstr($element['nom_formule'], "Fruits et légumes")) {
                    echo ("./photos/panier-fruit-legume.jpg");
                } else if (strstr($element['nom_formule'], "Fruits")) {
                    echo ("./photos/panier-fruit.jpg");
                } else if (strstr($element['nom_formule'], "Légumes")) {
                    echo ("./photos/panier-legume.jpg");
                } else {
                    echo ("./photos/interogation.png");
                } ?>"
                    alt="" width="100%">
                <p>
                    <?= $element['description_formule']; ?>
                </p>
                <p class="prix">
                    <?= $element['prix']; ?>€
                </p>
                <a class="lienFormule" href="./article.php?id=<?= $element['id_formule']; ?>" title="Lien vers la page du produit">Commandez maintenant</a>
            </div>
        <?php } ?>
    </div>

    <a href='./redirectionPanier.php' class='lienPanier invisible' title="Lien pour aller au panier"><img src='./photos/panier.svg'
            alt='Aller au panier'></a>
    <footer><a href="./mentionslegales.php" title="Lien pour aller aux mentions légales">Mentions légales</a><a href="./planSite.php" title="Lien pour aller au plan du site">Plan du site</a></footer>

    <script src="./script/nav.js"></script>
    <script src="./script/lienPanier.js"></script>
</body>

</html>