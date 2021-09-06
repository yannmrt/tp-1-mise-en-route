<?php

/**
 * 
 * On inclus les fichiers nécessaire au fonctionnement du site web
 * 
*/

//require "class/user.class.php";
//require "inc/db.php";

?>



<!doctype html>
<html lang="fr">
    <head>
        <title>Inscription</title>
        <meta charset="utf-8" />
    </head>
<body>

<form method="POST" action="">
    <input type="text" name="username" placeholder="Nom d'utilisateur" />
    <input type="email" name="email" placeholder="Adresse email" />
    <input type="password" name="password" placeholder="Mot de passe" />

    <input type="password" name="securityPhrase" placeholder="Phrase de sécurité" />

    <input type="submit" value="Je m'inscris" />
</form>

</body>
</html>