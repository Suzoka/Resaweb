// Récupère le contenu du panier depuis le local storage
var panierStringifie = localStorage.getItem('panier');

// Transforme le contenu en tableau d'objets JavaScript
var panier = JSON.parse(panierStringifie);

//Requête AJAX pour envoyer les informations du localStorage à une autre page PHP (Fait pas chat GPT)
var xhr = new XMLHttpRequest();
xhr.open('POST', './script/stockerPanier.php', true);
xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
xhr.onreadystatechange = function () {
    if (xhr.readyState === 4) {
        if (xhr.status === 200) {
            console.log('Panier stocké avec succès');
            // Effectue la redirection vers la page PHP
            window.location.href = './panier.php';
        } else {
            console.error('Erreur lors du stockage du panier : ' + xhr.status);
        }
    }
};
var params = 'panier=' + encodeURIComponent(JSON.stringify(panier));
xhr.send(params);
