<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fructus & legumina - Panier</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="./photos/favicon.svg" type="image/svg+xml">
</head>

<?php
// Démarrer la session
session_start();

// Vérifier si les données du panier sont présentes dans la session
if (isset($_SESSION['panier'])) {
    // Récupérer les données du panier depuis la session
    $panier = json_decode($_SESSION['panier']);
    require('./bdconnect.php');
    ?>

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

        <div class="panier">
            <div class="dansPanier">
                <p>Résumé de votre panier :</p>
                <ul>
                    <?php
                    $total = 0;
                    foreach ($panier as $key => $element) {
                        $requete = "select * from `zarka_resaweb`.`203_formules` where id_formule = " . $element->produit;
                        $stmt = $db->query($requete);
                        $result = $stmt->fetch(PDO::FETCH_ASSOC);
                        $total += $result["prix"] * ($element->quantite);
                        echo ("<li>" . $result["nom_formule"] . " x <select class = \"quantite " . $result["id_formule"] . "\">");
                        for (
                            $i = 0;
                            $i < $element->quantite;
                            $i++
                        ) {
                            echo ("<option value=\"" . $i . "\">" . $i . "</option>");
                        }
                        echo ("<option value=\"" . $element->quantite . "\" selected=\"selected\">" . $element->quantite . "</option></select> - " . $result["prix"] * ($element->quantite) . "€</li>");
                    } ?>
                </ul>
                <p>Total =
                    <?= $total ?> €
                </p>
            </div>
            <form class="panier" action="./script/addToDatabase.php" method="post">
                <h1 class="titre"> Finaliser ma commande </h1>
                <fieldset>
                    <legend><span class="number">1</span> Vos informations personnels</legend>
                    <label for="nom">Nom<span class="required">*</span> :</label>
                    <input type="text" id="nom" name="nom" autocomplete="family-name" required>
                    <label for="mail">Email<span class="required">*</span> :</label>
                    <input type="email" id="mail" name="mail" autocomplete="email" required>
                </fieldset>
                <fieldset>
                    <legend><span class="number">2</span> Autres informations</legend>
                    <label for="jour">Je viens chercher mon panier le<span class="required">*</span> :</label>
                    <select id="jour" name="jour" required>
                        <option value="1">Lundi</option>
                        <option value="2">Mardi</option>
                        <option value="3">Mercredi</option>
                        <option value="4">Jeudi</option>
                        <option value="5">Vendredi</option>
                    </select>
                    <p class="label">Je paye<span class="required">*</span> :</p>
                    <input type="radio" id="surPlace" value="0" name="payement" required><label class="ligne" for="surPlace">Sur
                        place</label><br>
                    <input type="radio" id="maintenant" value="1" name="payement"><label class="ligne"
                        for="maintenant">Maintenant, en ligne</label><br>
                </fieldset>
                <div><input type="submit" value="Confirmer mon achat" class="lienFormule"></input></div>
                <span class="required">*Champs obligatoires</span>
            </form>
        </div>


        <footer><a href="./mentionslegales.php">Mentions légales</a><a href="./planSite.php">Plan du site</a></footer>
        <script src="./script/nav.js"></script>
        <script src="./script/updatePanier.js"></script>
    </body>

    </html>

    <?php
} else {
    echo ("<p>Une erreur est survenue, veuillez réessayer plus tard.</p> <a href='./index.php'>Retourner sur la page d'accueil</a>");
}
?>