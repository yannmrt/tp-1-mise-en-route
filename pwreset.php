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

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Mot de passe oublié ?</title>
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
                <h1>Mot de passe oublié ?</h1>
                <p class="lead">Veuillez entrer votre nom d'utilisateur ainsi que votre phrase de récupération.</p>
            </div>

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
                        <label for="password">Phrase de sécurité</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" id="securityPhrase" name="securityPhrase" placeholder="Votre phrase de récupération">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Nouveau mot de passe</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="Votre nouveau mot de passe">
                            <small>Tache de ne pas l'oublier de nouveau</small>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Changer mon mot de passe</button>
                </div>
            </form>

        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
