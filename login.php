<?php

/**
 * 
 * On inclus les fichiers nécessaire au fonctionnement du site web
 * 
*/

require "class/user.php";
require "inc/db.php";

/**
 * 
 *  On prépare la fonction si le POST du formulaire est envoyé 
 * 
*/
if(isset($_POST["username"])) {
    $_USER = new User($_PDO);
    $_USER->login($_POST["username"], $_POST["password"]);
}
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