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

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Accueil</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <?php include("inc/header.php"); ?> 
        <!-- Page content-->
        <div class="container">
            <div class="text-center mt-5">
                <h1>A Bootstrap 5 Starter Template</h1>
                <p class="lead">A complete project boilerplate built with Bootstrap</p>
                <p>Bootstrap v5.1.0</p>
            </div>
        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
