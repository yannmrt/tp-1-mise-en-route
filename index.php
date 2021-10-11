<?php

/**
 * 
 * On inclus les fichiers nécessaire au fonctionnement du site web
 * 
 */

require "class/user.php";
require "class/trame.php";
require "inc/db.php";
/**
 * 
 * On effectue les différents check de la page
 * 
 * 1 : On vérifie si l'utilisateur est connecter
 * 
 */
$trame = new Trame($_PDO);

/**
 * 
 * On effectue les différents check de la page
 * 
 * 1 : On vérifie si l'utilisateur est connecter
 * 
 */

if (empty($_SESSION["username"])) {
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


    <!-- Nous chargeons les fichiers CDN de Leaflet. Le CSS AVANT le JS -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.3.1/dist/leaflet.css" integrity="sha512-Rksm5RenBEKSKFjgI3a41vrjkw4EVPlJ3+OiI65vTjIdo9brlAacEuKOiQ5OFh7cOI1bkDwLqdLw3Zg0cRJAAQ==" crossorigin="" />

    <style>
        body {
            margin: 0;
            padding: 0;
        }

        #map {
            /* la carte DOIT avoir une hauteur sinon elle n'apparaît pas */
            height: 600px;
            width: 85rem;
        }

        .centrer {
            position: absolute;
            /* postulat de départ */
            top: 55%;
            left: 50%;
            /* à 50%/50% du parent référent */
            transform: translate(-50%, -50%);
            /* décalage de 50% de sa propre taille */
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
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
            <div id="map">
                <!-- Ici s'affichera la carte -->
            </div>
        </div>
    </div>
    <!-- Fichiers Javascript -->
    <script src="https://unpkg.com/leaflet@1.3.1/dist/leaflet.js" integrity="sha512-/Nsx9X4HebavoBvEBuyp3I7od5tA0UzAxs+j83KgC8PU0kgB4XiK4Lfe4y4cgBtaRJQEIFCW+oC506aPT2L1zw==" crossorigin=""></script>
    <script type='text/javascript' src='https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js'></script>
    <script type="text/javascript">
        // On initialise la latitude et la longitude du centre de france (centre de la carte)
        var lat = 46.227638;
        var lon = 2.213749;
        var macarte = null;
        var markerClusters; // Servira à stocker les groupes de marqueurs
        // Nous initialisons une liste de marqueurs depuis la base de donner
        var villes = {
            <?php
            $data = $trame->getalltrame();
            $nb = $data[1];
            $case = "2";
            for ($i = 0; $i < $nb; $i++){
            ?> "<?= $data[$case] ?>": {
                <?php $case++; ?>
                    "lat": <?= $data[$case] ?>,
                <?php $case++; ?>
                    "lon": <?= $data[$case] ?>,
                    <?php $case++ ?>
                },
            <?php  } ?>
        };

        // Fonction d'initialisation de la carte
        function initMap() {
            // Nous définissons le dossier qui contiendra les marqueurs
            var iconBase = 'assets/';
            // Créer l'objet "macarte" et l'insèrer dans l'élément HTML qui a l'ID "map"
            macarte = L.map('map').setView([lat, lon], 6);
            markerClusters = L.markerClusterGroup(); // Nous initialisons les groupes de marqueurs
            // Leaflet ne récupère pas les cartes (tiles) sur un serveur par défaut. Nous devons lui préciser où nous souhaitons les récupérer. Ici, openstreetmap.fr
            L.tileLayer('https://{s}.tile.openstreetmap.fr/osmfr/{z}/{x}/{y}.png', {
                // Il est toujours bien de laisser le lien vers la source des données
                attribution: 'données © <a href="//osm.org/copyright">OpenStreetMap</a>/ODbL - rendu <a href="//openstreetmap.fr">OSM France</a>',
                minZoom: 1,
                maxZoom: 20
            }).addTo(macarte);
            // Nous parcourons la liste des villes
            for (ville in villes) {
                // Nous définissons l'icône à utiliser pour le marqueur, sa taille affichée (iconSize), sa position (iconAnchor) et le décalage de son ancrage (popupAnchor)
                var myIcon = L.icon({
                    iconUrl: iconBase + "Marker.png",
                    iconSize: [50, 50],
                    iconAnchor: [25, 50],
                    popupAnchor: [-3, -76],
                });
                var marker = L.marker([villes[ville].lat, villes[ville].lon], {
                    icon: myIcon
                }); // pas de addTo(macarte), l'affichage sera géré par la bibliothèque des clusters
                marker.bindPopup(ville);
                markerClusters.addLayer(marker); // Nous ajoutons le marqueur aux groupes
            }
            macarte.addLayer(markerClusters);
        }
        window.onload = function() {
            // Fonction d'initialisation qui s'exécute lorsque le DOM est chargé
            initMap();
        };
    </script>
    </div>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>

</body>

</html>