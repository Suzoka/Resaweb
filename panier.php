<?php
// Démarrer la session
session_start();

// Vérifier si les données du panier sont présentes dans la session
if (isset($_SESSION['panier'])) {
    // Récupérer les données du panier depuis la session
    $panier = json_decode($_SESSION['panier']);
    require('./bdconnect.php');
    ?>
    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fructus & legumina - Panier</title>
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

        <h1 class="top titre" id="top">Votre panier</h1>

        <p>Résumé de votre panier :</p>
        <ul>
            <?php
            foreach ($panier as $key => $element) {
                $requete = "select * from `zarka_resaweb`.`203_formules` where id_formule = " . $element->produit;
                $stmt = $db->query($requete);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                echo ("<li>" . $result["nom_formule"] . " - " . $element->quantite . " - " . $result["prix"] * ($element->quantite) . "€</li>");
            } ?>
        </ul>

    </body>

    </html>

    <?php
} else {
    echo ("<p>Une erreur est survenue, veuillez réessayer plus tard.</p> <a href='./index.php'>Retourner sur la page d'accueil</a>");
}
?>









<!-- ! Une fois la commande validée
// Effacer les données du panier de la session si nécessaire
//   unset($_SESSION['panier']); -->