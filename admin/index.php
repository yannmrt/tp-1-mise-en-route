<?php 

/**
 * 
 * On inclus les fichiers nécessaire au fonctionnement du site web
 * 
*/
require "../class/user.php";
require "../inc/db.php";

if($_SESSION["admin"] == 0) {
    header("Location: ../index.php");
} else {

    echo "Bjr vous etes admin";

}