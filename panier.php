<?php
// Démarrer la session
session_start();

// Vérifier si les données du panier sont présentes dans la session
if(isset($_SESSION['panier'])) {
  // Récupérer les données du panier depuis la session
  $panier = $_SESSION['panier'];
    var_dump($panier);
  // Faire ce que tu souhaites avec les données du panier
  // Par exemple, les afficher ou effectuer des opérations sur elles
  // ...
  
  // Effacer les données du panier de la session si nécessaire
  unset($_SESSION['panier']);
} else {
    echo("erreur");
  // Aucune donnée de panier n'est présente dans la session
  // Gérer ce cas selon tes besoins
}
?>
