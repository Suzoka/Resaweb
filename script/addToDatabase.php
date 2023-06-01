<?php
session_start();
if (isset($_SESSION['panier']) && isset($_POST['mail']) && isset($_POST['nom']) && isset($_POST['jour']) && isset($_POST['payement'])) {
    $panier = json_decode($_SESSION['panier']);
    require('../bdconnect.php');
    $requete = "insert into `203_reservation` (email, nom_usr, jour, deja_paye) values ('{$_POST['mail']}', '{$_POST['nom']}', {$_POST['jour']}, {$_POST['payement']})";
    $stmt = $db->query($requete);
    $id = $db->lastInsertId();

    foreach ($panier as $key => $element) {
        for ($i = 0; $i < $element->quantite; $i++) {
            $requete = "insert into `203_formule_reservee` (ext_id_utilisateur, ext_id_formule) values ({$id}, {$element->produit})";
            $stmt = $db->query($requete);
        }
    }
    mail(
        $_POST['mail'],
        "Fructus & Legumina | Confirmation de votre commande",
        "Votre commande chez Fructus & Legumina a bien été validée. Votre numéro de client est {$id}"
    );
    echo ("Votre commande a bien été validée. <br> Vous avez reçu un mail de confirmtion et allez être redirigé vers la page d'accueil dans quelques secondes.");
    header("refresh:30;url=../index.php");
} else {
    echo ("Une erreur est survenue, veuillez réessayer plus tard. <br> Vous allez être redirigés vers la page d'accueil dans quelques secondes.");
    header("refresh:15;url=../index.php");
}

?>