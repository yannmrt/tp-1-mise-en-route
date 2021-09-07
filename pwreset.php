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
    $_USER->pwreset($_POST["username"], $_POST["securityPhrase"], $_POST["newpassword"]);
}

?>

<!doctype html>
<html lang="fr">
    <head>
        <title>Mot de passe oublié ?</title>
        <meta charset="utf-8" />
    </head>
<body>

<form method="POST" action="">
    <input type="text" name="username" placeholder="Nom d'utilisateur" />
    <input type="password" name="securityPhrase" placeholder="Phrase de sécurité" />

    <input type="password" name="newpassword" placeholder="Nouveau mot de passe" />

    <input type="submit" value="Changer mot de passe" />
</form>

</body>
</html>