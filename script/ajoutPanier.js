//Séléctionne les éléments nécessaires
const bouton = document.querySelector('.panier');
const quantite = document.querySelector('select');

//Détecte si le bouton est cliqué
bouton.addEventListener('click', ajoutPanier);

//Affiche la fenêtre popup
function ajoutPopup() {
    bouton.removeEventListener('click', ajoutPanier);
    const popup = document.querySelector('.popup');
    popup.classList.remove('invisible');
    popup.classList.add('visible');
    setTimeout(function () {
        document.addEventListener('click', masquerPopup);
    }, 100)
}

//Masque la fenêtre popup
function masquerPopup() {
    const popup = document.querySelector('.popup');
    popup.classList.remove('visible');
    popup.classList.add('invisible');
    document.removeEventListener('click', masquerPopup);
    const boutonPanier = document.querySelector('.lienPanier');
    boutonPanier.classList.remove('invisible');
    boutonPanier.classList.add('visible');
    bouton.addEventListener('click', ajoutPanier);
    //remet le focus sur le sélecteur de quantité pour éviter de réajouter le même produit sans le vouloir
    quantite.focus();
}

//Ajoute l'id du produit et la quantité au localStorage
function ajoutPanier() {
    //Récupère le panier dans le localStorage
    let panier = JSON.parse(localStorage.getItem('panier'));
    let flag = false;
    //Si le panier n'existe pas, on le crée
    if (panier == null) {
        panier = [];
    }
    //Si le produit est déjà dans le panier, on agrandi la quantité
    panier.forEach(function (element) {
        if (element.produit == bouton.id) {
            element.quantite = parseInt(element.quantite) + parseInt(quantite.value);
            flag = true;
            return
        }
    });
    //Sinon on ajoute le produit au panier
    if (!flag) {
        panier.push({
            produit: bouton.id,
            quantite: quantite.value
        });
    }
    //Sauvegarde du nouveau panier
    localStorage.setItem('panier', JSON.stringify(panier));
    //Remise à 1 du sélecteur de quantité
    quantite.value = 1;
    //Affichage de la fenêtre popup
    ajoutPopup();
}