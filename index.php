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
        <meta name="viewport" content="initial-scale=1,maximum-scale=1,user-scalable=no">
        <link href="https://api.mapbox.com/mapbox-gl-js/v2.4.1/mapbox-gl.css" rel="stylesheet">
        <script src="https://api.mapbox.com/mapbox-gl-js/v2.4.1/mapbox-gl.js"></script>
        <style>
        body { margin: 0; padding: 0; }
        #map { position: absolute; top: 0; bottom: 0; width: 100%; }
        </style>
    </head>
    <body>
        <?php include("inc/header.php"); ?> 
        <!-- Page content-->
        <div class="container">
            <div class="text-center mt-5">
                <h1>Bienvenue sur notre site web !</h1>
                <p class="lead">Vous pourrez trouver ci-dessus la carte du monde.</p>
            </div>
        </div>

        <div class="container">
            <div class="card" style="width: 85rem;">
                    <div id="map" style="height: 600px"></div>
            </div>
        </div>

        </div>
        <script>
            // TO MAKE THE MAP APPEAR YOU MUST
            // ADD YOUR ACCESS TOKEN FROM
            // https://account.mapbox.com
            mapboxgl.accessToken = 'pk.eyJ1IjoieWFubm1hcnRpbiIsImEiOiJja3RpZjFncnAwcjd1MnJtenRsNjRkbTBtIn0.MmiDJtxjnfQQDY3cWAmH7Q';
            const map = new mapboxgl.Map({
            container: 'map', // container ID
            style: 'mapbox://styles/mapbox/streets-v11', // style URL
            center: [2, 49], // starting position [lng, lat]
            zoom: 9 // starting zoom
            });
        </script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
