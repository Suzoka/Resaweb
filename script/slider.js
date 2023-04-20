window.addEventListener("DOMContentLoaded", function () {
    let position = 0;
    const droite = document.querySelector('.sliderDroite')
    const gauche = document.querySelector('.sliderGauche')
    const slider = document.querySelector('.toutesNouveautees')

    droite.addEventListener('click', function () {
        position++;
        decaleGauche();
    })

    gauche.addEventListener('click', function () {
        position--;
        decaleDroite();
    })



    function decaleGauche() {
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
        slider.style.left = "-" + ((position) * 47 + 22.5) + "%";
    }

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
        slider.style.left = "-" + ((position) * 47 + 22.5) + "%";
    }
});


