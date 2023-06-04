<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fructus et legumina - Formule</title>
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
            <a href="./quisommesnous.php" title="Lien pour aller à la page de présentation de l'équipe">Qui sommes-nous&nbsp;?</a>
        </nav>
    </header>

    <?php
    if (isset($_GET['id'])) {
        require('./bdconnect.php');
        $requete = "SELECT * FROM `203_formules` where id_formule = :id;";
        $stmt = $db->prepare($requete);
        $stmt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        ?>
        <div class="lien"><a class="lienFormule" href="./catalogue.php" title="Lien pour retourner au catalogue">Retour au catalogue</a></div>
        <div class="produit">
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
                <div class="quantite">
                    <label for="quantite">Quantité :&nbsp;</label>
                    <select name="quantite" id="quantite">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
                <?php
                if ($result["periode"] == date("m")) {
                    echo ('<div class="lien"><button class="lienFormule panier" id="' . $result["id_formule"] . '">Ajouter au panier</button></div>');
                } else {
                    echo ('<div class="lien"><p class="indisponible">Cette formule n\'est pas disponible</p></div>');
                }
                ?>
            </div>
            <img src="<?php if (strstr($result['nom_formule'], "Fruits et légumes")) {
                echo ("./photos/panier-fruit-legume.jpg");
            } else if (strstr($result['nom_formule'], "Fruits")) {
                echo ("./photos/panier-fruit.jpg");
            } else if (strstr($result['nom_formule'], "Légumes")) {
                echo ("./photos/panier-legume.jpg");
            } else {
                echo ("./photos/interogation.png");
            } ?>" alt="" width="50%">
        </div>

        <div class="dansPanier achat">
            <p>Ce panier peut contenir :</p>
            <ul>
                <?php
                $requete = "SELECT * FROM `zarka_resaweb`.`203_ingredients` i inner join `zarka_resaweb`.`203_ingredients_formule` fi on i.id_ingredient = fi.ext_id_ingredient where fi.ext_id_formule = :idFormule ORDER BY i.type ASC";
                $stmt = $db->prepare($requete);
                $stmt->bindValue(':idFormule', $result["id_formule"], PDO::PARAM_INT);
                $stmt->execute();
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
                    echo ("<li>" . $ingredient . "</li>");
                }
                ?>
            </ul>
            <p class="italic">Photo non contractuelle.</p>
        </div>
    <?php } else {
        header('Location: ./catalogue.php');
        exit;
    } ?>

    <div class="popup invisible">
        <div class="textePopup">
            <p>L'article a bien été ajouté au panier !</p>
            <p class="ok">C'est compris</p>
        </div>
    </div>

    <a href='./redirectionPanier.php' class='lienPanier invisible' title="Lien pour aller au panier"><img
            src='./photos/panier.svg' alt='Aller au panier'></a>
    <footer><a href="./mentionslegales.php" title="Lien pour aller aux mentions légales">Mentions légales</a><a
            href="./planSite.php" title="Lien pour aller au plan du site">Plan du site</a></footer>

    <script src="./script/nav.js"></script>
    <script src="./script/ajoutPanier.js"></script>
    <script src="./script/lienPanier.js"></script>
</body>

</html>