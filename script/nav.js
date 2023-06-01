window.addEventListener("DOMContentLoaded", function () {
    
    const body = document.querySelector('body');
    const nav = document.querySelector('nav');
    const hauteur = nav.clientHeight;
    const flag = document.querySelector('#top').getBoundingClientRect().top;

    //Exécute la fonction au chargement de la page pour ne pas avoir de sacadement lors de la première animation
    var animationNavBar = nav.animate([{ "height": hauteur + "px" }], { "duration": 500 });
    animationNavBar.addEventListener("finish", function () {
        nav.style.height = hauteur + "px";
    })

    //Regarde si on scroll
    body.addEventListener('wheel', function (e) {
        //Si on scroll vers le haut, on affiche la barre de navigation
        if (e.deltaY < 0) {
            var animationNavBar = nav.animate([{ "height": hauteur + "px" }], { "duration": 500 });
            animationNavBar.addEventListener("finish", function () {
                nav.style.height = hauteur + "px";
            })
        }
        //Si on scroll vers le bas et que le premier élément est remonté jusqu'en haut, on cache la barre de navigation
        if (e.deltaY > 0 && window.pageYOffset > flag) {
            var animationNavBar = nav.animate([{ "height": "0em" }], { "duration": 500 });
            animationNavBar.addEventListener("finish", function () {
                nav.style.height == "0em";
            })
            setTimeout(function () {
                nav.style.height = "0em";
            }, 490)
        }
    })
});



