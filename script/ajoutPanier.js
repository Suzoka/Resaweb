const bouton = document.querySelector('.panier');
const quantite = document.querySelector('select');

bouton.addEventListener('click', function() {
    let panier = JSON.parse(localStorage.getItem('panier'));
    let flag = false;
    if (panier == null) {
        panier = [];
    }
    panier.forEach(function(element) {
        if (element.produit == bouton.id) {
            element.quantite = parseInt(element.quantite) + parseInt(quantite.value);
            flag = true;
            return
        }
    });
    if (!flag) {
        panier.push({
            produit: bouton.id,
            quantite: quantite.value
        });
    }
    localStorage.setItem('panier', JSON.stringify(panier));
    quantite.value = 1;
    ajoutPopup();
});

function ajoutPopup (){
    const popup = document.querySelector('.popup');
    popup.classList.remove('invisible');
    popup.classList.add('visible');
    setTimeout(function(){
    document.addEventListener('click', masquerPopup);
    }, 100)
}

function masquerPopup (){
    const popup = document.querySelector('.popup');
    popup.classList.remove('visible');
    popup.classList.add('invisible');
    document.removeEventListener('click', masquerPopup);
    const boutonPanier = document.querySelector('.lienPanier');
    boutonPanier.classList.remove('invisible');
    boutonPanier.classList.add('visible');
}