//Si la page est bien entièrement chargée
window.addEventListener("DOMContentLoaded", function () {
    let position = 0;
    const droite = document.querySelector('.sliderDroite')
    const gauche = document.querySelector('.sliderGauche')
    const slider = document.querySelector('.toutesNouveautees')

    //Si on clique sur la flèche de droite, on décale le slider vers la gauche
    droite.addEventListener('click', function () {
        position++;
        decaleGauche();
    })

    //Si on clique sur la flèche de gauche, on décale le slider vers la droite
    gauche.addEventListener('click', function () {
        position--;
        decaleDroite();
    })



    function decaleGauche() {
        //Si on arrive à la fin du slider, on revient au début en coupant l'animation (slider infini)
        if (position == 4) {
            slider.style.transition = "0s";
            slider.style.left = "-22.5%";
            setTimeout(function () {
                slider.style.transition = "1s";
                slider.style.left = "-68%";
                position = 1;
            }, 100);
            return
        }
        //Sinon on décale simplement le slider
        slider.style.left = "-" + ((position) * 47 + 22.5) + "%";
    }

    //Si on arrive au début du slider, on revient à la fin en coupant l'animation (slider infini)
    function decaleDroite() {
        if (position == -1) {
            slider.style.transition = "0s";
            slider.style.left = "-163.5%";
            setTimeout(function () {
                slider.style.transition = "1s";
                slider.style.left = "-116.5%";
                position = 2;
            }, 100);
            return
        }
        //Sinon on décale simplement le slider
        slider.style.left = "-" + ((position) * 47 + 22.5) + "%";
    }
});


