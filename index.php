<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resaweb</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <header>
        <nav>
            <a href="./index.php" class="logo"><img src="./photos/filigrane.svg" alt="Accueil"></a>
            <a href="./concept.php">Le concept</a>
            <a>Commandez votre panier&nbsp;!</a>
            <a>Qui sommes nous&nbsp;?</a>
        </nav>

        <div class="captioned-gallery">
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
        <h1 class="enTete">Nom concept</h1>
    </header>

    <h1 class="titre">En ce moment dans vos panniers</h1>

    <div class="sliderNouveautees">
        <?php
        for ($i = 0; $i < 3; $i++) {
            echo "<div class=\"nouveautee\"></div>";
        }
        ?>
    </div>

    <script src="./script/nav.js"></script>
</body>

</html>