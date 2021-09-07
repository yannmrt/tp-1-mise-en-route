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
 * On effectue les différents check de la page
 * 
 * 1 : Si l'utilisateur est admin on lui affiche un lien vers l'espace admin
 * 2 : On vérifie si l'utilisateur est connecter
 * 
 */
if($_SESSION["admin"] == 1) {
    echo "<a href='admin/index.php'><button>Espace d administration</button></a>'";
}

if(empty($_SESSION["username"])) {
    header("Location: login.php");
}

/**
 *  Si le formulaire de déconnexion est lancer, on lance la fonction de déconnexion 
*/
if(isset($_POST["logout"])) {
    $_USER = new User($_PDO);
    $_USER->logout();
}

?>

<!doctype html>
<html lang="fr">
    <head>
        <title>Espace membre</title>
        <meta charset="utf-8" />
    </head>
<body>

<form method="POST" action="">
    <input type="submit" name="logout" value="Déconnexion" />
</form>


</body>
</html>
