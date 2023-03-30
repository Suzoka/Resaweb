window.addEventListener("DOMContentLoaded", function () {
    
    const body = document.querySelector('body');
    const nav = document.querySelector('nav');
    const hauteur = nav.clientHeight;
    const flag = document.querySelector('#top').getBoundingClientRect().top;

    var animationNavBar = nav.animate([{ "height": hauteur + "px" }], { "duration": 500 });
    animationNavBar.addEventListener("finish", function () {
        nav.style.height = hauteur + "px";
    })

    body.addEventListener('wheel', function (e) {
        if (e.deltaY < 0) {
            var animationNavBar = nav.animate([{ "height": hauteur + "px" }], { "duration": 500 });
            animationNavBar.addEventListener("finish", function () {
                nav.style.height = hauteur + "px";
            })
        }
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



