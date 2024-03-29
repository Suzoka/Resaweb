<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fructus et legumina - Confirmation panier</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="./photos/favicon.svg" type="image/svg+xml">
</head>

<body>
    <?php
    //Démarre la session
    session_start();
    //Vérifie si les données nécessaires sont présentes et que le panier n'est pas vide
    if (isset($_SESSION['panier']) && isset($_POST['mail']) && isset($_POST['nom']) && isset($_POST['jour']) && isset($_POST['payement']) && count(json_decode($_SESSION['panier'])) != 0) {
        //Récupère les données du panier depuis la session
        $panier = json_decode($_SESSION['panier']);

        //Connexion à la base de données
        require('../bdconnect.php');
        $requete = "insert into `203_reservation` (email, nom_usr, jour, deja_paye) values (:mail, :nom, :jour, :payement)";
        $stmt = $db->prepare($requete);
        $stmt->bindValue(':mail', $_POST['mail'], PDO::PARAM_STR);
        $stmt->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $stmt->bindValue(':jour', $_POST['jour'], PDO::PARAM_INT);
        $stmt->bindValue(':payement', $_POST['payement'], PDO::PARAM_INT);
        $stmt->execute();

        //Récupère l'id du dernier utilisateur ajouté
        $id = $db->lastInsertId();

        //Ajoute les produits du panier à la base de données
        foreach ($panier as $key => $element) {

            //Créer une réservation pour chaque produit
            for ($i = 0; $i < $element->quantite; $i++) {
                $requete = "insert into `203_formule_reservee` (ext_id_utilisateur, ext_id_formule) values (:id, :id2)";
                $stmt = $db->prepare($requete);
                $stmt->bindValue(':id', $id, PDO::PARAM_INT);
                $stmt->bindValue(':id2', $element->produit, PDO::PARAM_INT);
                $stmt->execute();
            }
        }
        //Envoie un mail de confirmation
        mail(
            $_POST['mail'],
            "Fructus & Legumina | Confirmation de votre commande",
            "Votre commande chez Fructus & Legumina a bien été validée. Votre numéro de client est le N°{$id}",
            'From: fructusetlegumina@zarka.butmmi.o2switch.site'
        );
        unset($_SESSION['panier']);
        //Confirme à l'utilisateur que tout s'est bien passé puis le redirige vers la page d'accueil
        echo ("Votre commande a bien été validée. <br> Vous avez reçu un mail de confirmtion et allez être redirigé vers la page d'accueil dans quelques secondes.");
        header("refresh:10;url=../index.php");
        //Si il manque des données, affiche un message d'erreur et redirige vers la page d'accueil
    } else {
        echo ("Une erreur est survenue, veuillez réessayer plus tard. <br> Vous allez être redirigés vers la page d'accueil dans quelques secondes.");
        header("refresh:5;url=../index.php");
    }

    ?>
    <!-- Reset le localStorage -->
    <script>localStorage.clear();</script>
</body>

</html>