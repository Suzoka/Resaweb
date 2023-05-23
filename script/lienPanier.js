if (localStorage.getItem('panier') != null) {
    const panier = document.querySelector('.lienPanier');
    panier.classList.remove('invisible');
    panier.classList.add('visible');
}