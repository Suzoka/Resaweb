<?php
// Démarrer la session
session_start();

// Vérifier si les données du panier ont été envoyées via POST
if(isset($_POST['panier'])) {
  // Récupérer les données du panier depuis la requête POST
  $panier = $_POST['panier'];

  // Stocker les données du panier dans la session
  $_SESSION['panier'] = $panier;

  // Répondre avec un message de succès
  echo 'Panier stocké avec succès';
} else {
  // Répondre avec un message d'erreur
  echo 'Aucune donnée de panier reçue';
}
?>
