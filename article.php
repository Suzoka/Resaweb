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
        <div class="lien"><a class="lienFormule" href="./catalogue.php">Retour au catalogue</a></div>
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
            <img src="https://www.maison-leroy.fr/wp-content/uploads/2020/11/panier_fruits-1900x1425.png" alt=""
                width="40%">
        </div>

        <div class="dansPanier achat">
            <p>Ce panier peut contenir :</p>
            <ul>
                <?php
                $requete = "SELECT * FROM `zarka_resaweb`.`203_ingredients` i inner join `zarka_resaweb`.`203_ingredients_formule` fi on i.id_ingredient = fi.ext_id_ingredient where fi.ext_id_formule = " . $result["id_formule"] . " ORDER BY i.type ASC";
                $stmt = $db->query($requete);
                $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
                foreach ($result as $key => $element) {
                    $ingredient = "Des " . str_replace("L'", "", str_replace("La", "", str_replace("Le", "", $element["nom_ingredient"])));
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

    <a href='./redirectionPanier.php' class='lienPanier invisible'><img src='./photos/panier.svg' alt='Aller au panier'></a>
    <footer><a href="./mentionslegales.php">Mentions légales</a><a href="./planSite.php">Plan du site</a></footer>
    
    <script src="./script/nav.js"></script>
    <script src="./script/ajoutPanier.js"></script>
    <script src="./script/lienPanier.js"></script>
</body>

</html>