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
 * 1 : On vérifie si l'utilisateur est connecter
 * 
 */

if(empty($_SESSION["username"])) {
    header("Location: login.php");
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
                <h1>Mon compte</h1>
                <p class="lead">Vous pouvez changer les informations de votre compte</p>
            </div>
        </div>

        <?php if(isset($error)) { echo $error; } ?>

        <!-- Form connexion -->
            <form method="POST" action="">
                <div align="center">
                    <div class="form-group">
                        <label for="username">Nom d'utilisateur</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="username" name="username" value="<?php echo $_SESSION["username"]; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Adresse email</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="email" name="email" value="<?php echo $_SESSION["email"]; ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Phrase de récupération</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="securityPhrase" name="securityPhrase" value="<?php echo $_SESSION["securityPhrase"]; ?>">
                        </div>
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-primary">Modifier</button>
                </div>
            </form>

            <div class="container">
                <div class="text-center mt-5">
                    <h1>Changer mon mot de passe</h1>
                </div>
            </div>

            <form method="POST" action="">
                <div align="center">
                    <div class="form-group">
                        <label for="username">Mot de passe actuel</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" id="oldpassword" name="oldpassword" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Nouveau mot de passe</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" id="newpassword" name="newpassword" placeholder="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Confirmation du nouveau mot de passe</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" id="confirmnewpassword" name="confirmnewpassword" placeholder="">
                        </div>
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-primary">Modifier mon mot de passe</button>
                </div>
            </form>

        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
