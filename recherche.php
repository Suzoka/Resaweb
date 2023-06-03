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
            <a href="./quisommesnous.php">Qui sommes nous&nbsp;?</a>
        </nav>
    </header>

    <h1 class="top titre" id="top">Votre panier</h1>

    <?php
    $ingredient = substr($_POST['recherche'], 4, -1);
    require('./bdconnect.php');
    $requete = "SELECT * FROM `203_formules` f inner join `203_ingredients_formule` fi on fi.ext_id_formule = f.id_formule inner join `203_ingredients` i on fi.ext_id_ingredient = i.id_ingredient where i.nom_ingredient like '%{$ingredient}' AND f.periode = MONTH(NOW());";
    $stmt = $db->query($requete);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <h2 class="disponibilite">Formules disponibles :</h2>
    <div class="allFormule">
        <?php foreach ($result as $key => $element) { ?>
            <div class="formule">
                <h2>
                    <?= $element['nom_formule']; ?>
                </h2>
                <img src="https://www.maison-leroy.fr/wp-content/uploads/2020/11/panier_fruits-1900x1425.png" alt=""
                    width="100%">
                <p>
                    <?= $element['description_formule']; ?>
                </p>
                <p class="prix">
                    <?= $element['prix']; ?>€
                </p>
                <a class="lienFormule" href="./article.php?id=<?= $element['id_formule']; ?>">Commandez maintenant</a>
            </div>
        <?php } 
        if (empty($result)) { 
            echo("<p class='aucunResultat'>Aucune formule contenant cet ingredient n'est disponible.</p>");
        }
        ?>
    </div>


    <?php
    $requete = "SELECT * FROM `203_formules` f inner join `203_ingredients_formule` fi on fi.ext_id_formule = f.id_formule inner join `203_ingredients` i on fi.ext_id_ingredient = i.id_ingredient where i.nom_ingredient like '%{$ingredient}' AND f.periode != MONTH(NOW());";
    $stmt = $db->query($requete);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <h2 class="disponibilite">Formules indisponibles :</h2>
    <div class="allFormule">
        <?php foreach ($result as $key => $element) { ?>
            <div class="formule">
                <h2>
                    <?= $element['nom_formule']; ?>
                </h2>
                <img src="https://www.maison-leroy.fr/wp-content/uploads/2020/11/panier_fruits-1900x1425.png" alt=""
                    width="100%">
                <p>
                    <?= $element['description_formule']; ?>
                </p>
                <p class="prix">
                    <?= $element['prix']; ?>€
                </p>
                <a class="indisponible" href="./article.php?id=<?= $element['id_formule']; ?>">Indisponible</a>
            </div>
        <?php } ?>
    </div>

    <footer><a href="./mentionslegales.php">Mentions légales</a><a href="./planSite.php">Plan du site</a></footer>
    <script src="./script/nav.js"></script>
</body>

</html>