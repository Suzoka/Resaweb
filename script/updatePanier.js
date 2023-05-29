document.querySelectorAll('select').forEach(function (element) {
    element.addEventListener('change', function (e) {
        console.log(e);

        let panier = JSON.parse(localStorage.getItem('panier'));
        panier.forEach(function (element2) {
            if (element2.produit == element.getAttribute('class')) {
                element2.quantite = parseInt(element.value);
                if (element.value == 0) {
                    panier.splice(panier.indexOf(element2), 1);
                }
            }
        });
        localStorage.setItem('panier', JSON.stringify(panier));
        window.location.replace("./redirectionPanier.php");
    })
})