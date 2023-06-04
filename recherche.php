<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fructus et legumina - Recherche</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="./photos/favicon.svg" type="image/svg+xml">
</head>

<body>
    <header>
        <a href="#navigation" class="skip-link">Aller à la barre de navigation</a>
        <a href="#top" class="skip-link">Aller au contenu</a>
        <nav id="navigation">
            <a href="./index.php" class="logo"><img src="./photos/logo.svg" alt="Accueil"></a>
            <a href="./concept.php">Le concept</a>
            <a href="./catalogue.php">Commandez votre panier&nbsp;!</a>
            <a href="./quisommesnous.php">Qui sommes-nous&nbsp;?</a>
        </nav>
    </header>

    <h1 class="top titre" id="top">Votre recherche</h1>
    <?php
    if (isset($_POST['recherche'])) {
        $ingredient = str_replace("Des ", "", substr($_POST['recherche'], 0, -1));
        require('./bdconnect.php');
        $requete = "SELECT * FROM `203_formules` f inner join `203_ingredients_formule` fi on fi.ext_id_formule = f.id_formule inner join `203_ingredients` i on fi.ext_id_ingredient = i.id_ingredient where i.nom_ingredient like :nom AND f.periode = MONTH(NOW());";
        $stmt = $db->prepare($requete);
        $stmt->bindValue(':nom', '%' . $ingredient . '%', PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <h2 class="disponibilite">Formules disponibles :</h2>
        <div class="allFormule">
            <?php foreach ($result as $key => $element) { ?>
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
                    } ?>" alt="" width="100%">
                    <p>
                        <?= $element['description_formule']; ?>
                    </p>
                    <p class="prix">
                        <?= $element['prix']; ?>€
                    </p>
                    <a class="lienFormule" href="./article.php?id=<?= $element['id_formule']; ?>"
                        title="Lien vers la page de l'article">Commandez maintenant</a>
                </div>
            <?php }
            if (empty($result)) {
                echo ("<p class='aucunResultat'>Aucune formule contenant cet ingredient n'est actuellement disponible.</p>");
            }
            ?>
        </div>


        <?php
        $requete = "SELECT * FROM `203_formules` f inner join `203_ingredients_formule` fi on fi.ext_id_formule = f.id_formule inner join `203_ingredients` i on fi.ext_id_ingredient = i.id_ingredient where i.nom_ingredient like :nom AND f.periode != MONTH(NOW());";
        $stmt = $db->prepare($requete);
        $stmt->bindValue(':nom', '%' . $ingredient . '%', PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>

        <h2 class="disponibilite">Formules indisponibles :</h2>
        <div class="allFormule">
            <?php foreach ($result as $key => $element) { ?>
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
                    } ?>" alt="" width="100%">
                    <p>
                        <?= $element['description_formule']; ?>
                    </p>
                    <p class="prix">
                        <?= $element['prix']; ?>€
                    </p>
                    <a class="indisponible"
                        href="./article.php?id=<?= $element['id_formule']; ?> Lien vers la page de l'article">Indisponible</a>
                </div>
            <?php } ?>
        </div>

        <a href='./redirectionPanier.php' class='lienPanier invisible' title="Lien pour aller au panier"><img
                src='./photos/panier.svg' alt='Aller au panier'></a>
        <footer><a href="./mentionslegales.php" title="Lien pour aller aux mentions légales">Mentions légales</a><a
                href="./planSite.php" title="Lien pour aller au plan du site">Plan du site</a></footer>
        <script src="./script/nav.js"></script>
        <script src="./script/lienPanier.js"></script>
    <?php } else {
        header('Location: ./catalogue.php');
        exit;
    } ?>
</body>

</html>