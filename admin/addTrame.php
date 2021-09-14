<?php

/**
 * 
 * On inclus les fichiers nécessaire au fonctionnement du site web
 * 
*/
require "../class/user.php";
require "../class/trame.php";
require "../inc/db.php";

if($_SESSION["admin"] == 0) {
    header("Location: ../index.php");
}

$_TRAME = new Trame($_PDO);

if(isset($_POST["name"])) {
    $error = $_TRAME->addTrame($_POST["longitude"], $_POST["latitude"], $_POST["name"], $_POST["idBoat"]);
}


?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ajouter une trame</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="../css/styles.css" rel="stylesheet" />
    </head>
    <body>
        <?php include("header.php"); ?> 
        <!-- Page content-->
        <div class="container">
            <div class="text-center mt-5">
                <h1>Ajouter une trame</h1>
                <p class="lead">Il est nécessaire de remplir tous les champs afin de créer une trame.</p>
            </div>

            <?php if(isset($error)) { echo $error; } ?>

            <!-- Form connexion -->
            <form method="POST" action="">
                <div align="center">
                    <div class="form-group">
                        <label for="username">Nom</label>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nom de la trame">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="number">Longitude</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="longitude" name="longitude" placeholder="Longitude">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="number">Latitude</label>
                        <div class="col-sm-4">
                            <input type="number" class="form-control" id="latitude" name="latitude" placeholder="Latitude">
                        </div>
                    </div>
                    <div class="form-group col-md-4">
                    <label for="admin">Bateau à lier</label>
                    <select id="idBoat" name="idBoat" class="form-control">
                        <?php $_TRAME->getBoatList();?>
                    </select>
                    </div>
                    <br/>
                    <button type="submit" class="btn btn-primary">Ajouter</button>
                </div>
            </form>

        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
