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
    $error = $_USER->login($_POST["username"], $_POST["password"]);
}
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Connexion</title>
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
                <h1>Connexion</h1>
                <p class="lead">Une connexion est nécessaire pour utiliser notre site web.</p>
            </div>

            <?php if(isset($error)) { echo $error; } ?>

            <!-- Form connexion -->
            <form method="POST" action="">
                <div align="center">
                    <div class="form-group">
                        <label for="username">Nom d'utilisateur</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="username"name="username" placeholder="Votre nom d'utilisateur">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe">
                            <a href="pwreset.php"><small>Mot de passe oublié ?</small></a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Connexion</button>
                </div>
            </form>

        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
