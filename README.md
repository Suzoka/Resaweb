# Resaweb

## Pour installer le site ResaWeb en local:

Installer le site en local :

- Installez XAMPP avec au minimum les modules Apache et MySQL.

- Ouvrez votre XAMPP et activer les serveurs Apache et MySQL.

- Ouvrir le dossier `htdocs`. (Dans XAMPP qui se trouve à la racine de votre disque).

- Déposer dans celui ci le dossier `resaweb` qui contient le code du site ainsi que le fichier de Base de Données.


## Pour installer la Base de Données en Local :

- Dans la barre d'URL de votre navigateur, tapez : [localhost/phpMyAdmin](localhost/phpMyAdmin).

- Allez dans l'onglet `SQL`.

- Dans le fichier resaweb installé plus tôt, ouvrez `Resaweb.sql` dans un éditeur de texte quelquonque.

- Sélectionnez tout (`Ctrl + A` (Windows et Linux) ou `Cmd + A` (OSX)).

- Copiez le tout (`Ctrl + C` (Windows et Linux) ou `Cmd + A` (OSX)).

- Collez dans la zone de texte se trouvant dans l'onglet `SQL`de PHPMyAdmin (`Ctrl + V` (Windows et Linux) ou `Cmd + V` (OSX)).

- Exécutez (`Ctrl + Entrée`).

### Attention : 

Si dans votre base de donnée vous avez une base de donnée s'appelant déjà `zarka_resaweb`, elle sera supprimée et remplacée par celle de ce site.


## Si vous souhaitez utiliser un autre compte que celui par défaut pour accéder à la base de donnée :

- Retournez dans le dossier `resaweb` qui se trouve dans `htdocs`.

- Ouvrez le fichier `bdconnect.php` avec un éditeur de texte quelquonque.

- Modifiez les lignes 2 et 3 avec le nom d'utilisateur et le mot de passe de votre compte.


## Aller sur le site :

- Allez à l'adresse [localhost/resaweb](localhost/resaweb) dans votre navigateur pour arriver sur le site.

- La page d'accueil du site s'ouvrira.


### À noter :

Il sera possible de faire des réservation, mais lors de la validation d'enregistrement une erreur s'affichera. Les données seront bien enregistrés dans la base de donnée, mais le mail ne sera pas envoyé. L'envoie de mail n'est pas possible en local.
