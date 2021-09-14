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

?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Liste des trames</title>
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
                <h1>Liste des trames</h1>
                <p class="lead">Vous pouvez éditer les trames ou les supprimer via les boutons</p>
            </div>

            <table class="table table-striped">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nom</th>
                <th scope="col">Longitude</th>
                <th scope="col">Latitude</th>
                <th scope="col">Bateau lié</th>
                <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                <!--<tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td><label class="btn btn-primary btn-sm">Modifier</label><label class="btn btn-danger btn-sm">Supprimer</label></td>
                </tr>-->
                <?php $_TRAME->showTrameList(); ?>
            </tbody>
            </table>

        </div>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
