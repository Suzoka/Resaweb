<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Article</title>
    <link rel="stylesheet" href="style.css">
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

    <?php
    if ($_GET['id']) {
        require('./bdconnect.php');
        $requete = "SELECT * FROM `zarka_resaweb`.`203_formules` where id_formule = " . $_GET['id'] . ";";
        $stmt = $db->query($requete);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>

        <div class="produit">
            <div class="lien"><a class="lienFormule" href="./catalogue.php">Retour au catalogue</a></div>
            <img src="https://www.maison-leroy.fr/wp-content/uploads/2020/11/panier_fruits-1900x1425.png" alt=""
                width="40%">
            <div class="produitTexte">
                <h1 class="top titre" id="top">
                    <?= $result["nom_formule"]; ?>
                </h1>
                <p>
                    <?= $result['description_formule']; ?>
                </p>
                <p class="prix">
                    <?= $result['prix']; ?>€
                </p>
                <div class="lien"><a class="lienFormule" href="#reserver">Ajouter au panier</a></div>
            </div>
        </div>
    <?php } else {
        header('Location: ./catalogue.php');
        exit;
    }

    ?>

    <script src="./script/nav.js"></script>
</body>

</html>