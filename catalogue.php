<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commandez votre pannier</title>
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

    <h1 class="top titre" id="top">Nos formules</h1>

    <?php
    require('./bdconnect.php');
    $requete = "SELECT * FROM `morgan.zarka_db`.`203_formules` where periode = MONTH(NOW());";
    $stmt = $db->query($requete);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $key => $element) {
        ?>
        <a class="lienFormule" href="./article.php?id=<?= $element['id_formule']; ?>">
            <div class="formule">
                <div class="text">
                    <h2>
                        <?= $element['nom_formule']; ?>
                    </h2>
                    <p>
                        <?= $element['description_formule']; ?>
                    </p>
                </div>
                <p class="prix">
                    <?= $element['prix']; ?>€
                </p>
            </div>
        </a>

    <?php } ?>

    <script src="./script/nav.js"></script>
</body>

</html>