<!-- Stock les données envoyées par la requête AJAX dans une session du serveur (Fait par chat GPT) -->

<?php
// Démarrer la session
session_start();

// Vérifier si les données du panier ont été envoyées via POST
if(isset($_POST['panier'])) {
  // Récupérer les données du panier depuis la requête POST
  $panier = $_POST['panier'];

  // Stocker les données du panier dans la session
  $_SESSION['panier'] = $panier;
} 
?>
