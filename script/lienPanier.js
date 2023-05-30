if (localStorage.getItem('panier') != null && JSON.parse(localStorage.getItem('panier')).length > 0) {
    const panier = document.querySelector('.lienPanier');
    panier.classList.remove('invisible');
    panier.classList.add('visible');
}