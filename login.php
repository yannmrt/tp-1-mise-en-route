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
        <title>Connexion</title>
        <meta charset="utf-8" />
    </head>
<body>

<form method="POST" action="">
    <input type="text" name="username" placeholder="Nom d'utilisateur" />
    <input type="password" name="password" placeholder="Mot de passe" />
    <input type="submit" value="Connexion" />
</form>

<a href="pwreset.php"><p> Mot de passe oublié ?</p></a>

</body>
</html>