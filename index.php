<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resaweb</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" href="./photos/favicon.svg" type="image/svg+xml">
</head>

<body>
    <header>
        <a href="#navigation" class="skip-link">Aller à la barre de navigation</a>
        <a href="#contenu" class="skip-link">Aller au contenu</a>
        <nav id="navigation">
            <a href="./index.php" class="logo"><img src="./photos/logo.svg" alt="Accueil"></a>
            <a href="./concept.php">Le concept</a>
            <a>Commandez votre panier&nbsp;!</a>
            <a href="./quisommesnous.php">Qui sommes nous&nbsp;?</a>
        </nav>
        <div class="captioned-gallery" id="top">
            <div class="slider">
                <div>
                    <img src="./photos/photo-page-accueil-1.jpg" alt>
                </div>
                <div>
                    <img src="./photos/photo-page-accueil-2.jpg" alt>
                </div>
                <div>
                    <img src="./photos/photo-page-accueil-3.jpg" alt>
                </div>
                <div>
                    <img src="./photos/photo-page-accueil-1.jpg" alt>
                </div>
            </div>
        </div>
        </div>
        <h1 class="enTete">Fructus et legumina</h1>
    </header>

    <h1 class="titre" id="contenu">En ce moment dans vos panniers</h1>


    <div class="sliderNouveautees">
        <div class="toutesNouveautees">
            <?php
            for ($i = 0; $i < 3; $i++) {
                echo "<div class=\"nouveautee\"><img src=\"https://laparra.fr/wp-content/uploads/2021/06/Pomme-1024x1024-1.png\" alt=\"\"
                width=\"50%\">
            <h2>La pomme</h2>
            <p>Ce fruit aurait des vertues qui réduirait les risques de cancer et réduit le mauvais choléstérol.</p>
                </div>";
            }
            ?>
        </div>
    </div>


    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vero beatae et ex pariatur ratione neque quaerat sit dolores harum quasi, fugit quam ducimus. Nobis, magni? Culpa fugit consectetur repellendus suscipit.
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem corrupti dolorum amet hic? Tempore similique, soluta voluptates maxime architecto quibusdam, nobis, adipisci voluptatem atque fuga quod quo. Nostrum, dolores delectus?
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Nostrum doloremque expedita reiciendis. Explicabo, qui? Iure molestiae corporis, totam, adipisci ullam numquam facilis voluptatum, veritatis ratione magnam explicabo! Repudiandae, dolorem officiis?
    </p>

    <script src="./script/nav.js"></script>
</body>

</html>