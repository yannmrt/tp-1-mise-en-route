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
        <!-- Responsive navbar-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">TP 1 - Mise en route</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="index.php">Accueil</a></li>
                        <li class="nav-item"><a class="nav-link" href="#">Voir la map</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Espace membre</a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="#">Connexion</a></li>
                                <li><a class="dropdown-item" href="#">Inscription</a></li>
                                <li><hr class="dropdown-divider" /></li>
                                <li><a class="dropdown-item" href="#">Mot de passe oublié ?</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Page content-->
        <div class="container">
            <div class="text-center mt-5">
                <h1>Connexion</h1>
                <p class="lead">Une connexion est nécessaire pour utiliser notre site web.</p>
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
                        <label for="password">Mot de passe</label>
                        <div class="col-sm-4">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Votre mot de passe">
                            <a href="pwreset.php"><small>Mot de passe oublié ?</small></a>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Connexion</button>
                </div>
            </form>


        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
