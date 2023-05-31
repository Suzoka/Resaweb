<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandez votre panier</title>
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

    <h1 class="top titre marge" id="top">Nos formules</h1>

    <div class="allFormule">

        <?php
        require('./bdconnect.php');
        $requete = "SELECT * FROM `zarka_resaweb`.`203_formules` where periode = MONTH(NOW());";
        $stmt = $db->query($requete);
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($result as $key => $element) {
            ?>

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
        <?php } ?>
    </div>

    <a href='./redirectionPanier.php' class='lienPanier invisible'><img src='./photos/panier.svg' alt='Aller au panier'></a>
    <footer><a href="./mentionslegales.php">Mentions légales</a><a href="./planSite.php">Plan du site</a></footer>

    <script src="./script/nav.js"></script>
    <script src="./script/lienPanier.js"></script>
</body>

</html>