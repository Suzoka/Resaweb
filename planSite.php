<!DOCTYPE html>
<html lang="fr">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fructus et legumina - Plan du site</title>
        <link rel="stylesheet" href="style.css">
        <link rel="icon" href="./photos/favicon.svg" type="image/svg+xml">
</head>

<body>
        <header>
                <a href="#navigation" class="skip-link" title="Lien pour aller à la barre de navigation">Aller à la
                        barre de
                        navigation</a>
                <a href="#top" class="skip-link" title="Lien pour aller au contenu">Aller au contenu</a>
                <nav id="navigation">
                        <a href="./index.php" class="logo" title="Lien pour aller vers l'accueil"><img
                                        src="./photos/logo.svg" alt="Accueil"></a>
                        <a href="./concept.php" title="Lien pour aller à la page concept">Le concept</a>
                        <a href="./catalogue.php" title="Lien pour aller au catalogue">Commandez votre panier&nbsp;!</a>
                        <a href="./quisommesnous.php" title="Lien pour aller à la page de présentation de l'équipe">Qui sommes-nous&nbsp;?</a>
                </nav>
        </header>

        <h1 class="top titre" id="top">Plan du site</h1>

        <div class="listePuce">
                <h2>Voici les différentes pages du site :</h2>
                <ul>
                        <li>Page d'accueil (index) : <a href="./index.php" target="_blank">Accueil</a></li>
                        <li>Page de concept : <a href="./concept.php" target="_blank">Concept</a></li>
                        <li>Page de catalogue : <a href="./catalogue.php" target="_blank">Catalogue</a></li>
                        <li>Page des articles : <a href="./article.php" target="_blank">Article (vous serez redirigé vers le catalogue car il est nécessaire d'avoir l'id de l'article dans l'url)</a></li>
                        <li>Page de recherche : <a href="./article.php" target="_blank">Recherche (vous serez redirigé vers le catalogue car il est nécessaire d'avoir saisie votre recherche)</a></li>
                        <li>Page de panier : <a href="./redirectionPanier.php" target="_blank">Panier</a></li>
                        <li>Page de présentation : <a href="./quisommesnous.php" target="_blank">Présentation</a></li>
                        <li>Page de mentions légales : <a href="./mentionslegales.php" target="_blank">Mentions légales</a></li>
                </ul>

        <a href='./redirectionPanier.php' class='lienPanier invisible' title="Lien pour aller au panier"><img
                        src='./photos/panier.svg' alt='Aller au panier'></a>
        <footer><a href="./mentionslegales.php" title="Lien pour aller aux mentions légales">Mentions légales</a><a
                        href="./planSite.php" title="Lien pour aller au plan du site">Plan du site</a></footer>

        <script src="./script/nav.js"></script>
        <script src="./script/lienPanier.js"></script>
</body>

</html>