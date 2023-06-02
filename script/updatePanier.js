//Pour chaque élément du panier, on ajoute un évènement si la valeur du select a changée
document.querySelectorAll('select.quantite').forEach(function (element) {
    element.addEventListener('change', function () {
        //On récupère le panier
        let panier = JSON.parse(localStorage.getItem('panier'));
        //On cherche la case du panier qui correspond à l'élément
        panier.forEach(function (element2) {
            if (element2.produit == element.getAttribute('class').replace('quantite ', '')) {
                //On change la quantité de l'élément
                element2.quantite = parseInt(element.value);
                //Si la nouvelle valeur est 0, on supprime l'élément du panier
                if (element.value == 0) {
                    panier.splice(panier.indexOf(element2), 1);
                }
            }
        });
        //On met à jour le panier
        localStorage.setItem('panier', JSON.stringify(panier));
        //On redirige vers la page de redirection du panier
        setTimeout(function () {
        window.location.replace("./redirectionPanier.php");
        }, 5000);
    })
})