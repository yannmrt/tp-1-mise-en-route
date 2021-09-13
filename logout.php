<?php 

/**
 * 
 * On inclus les fichiers nécessaire au fonctionnement du site web
 * 
*/

require "class/user.php";
require "inc/db.php";

$_USER = new User($_PDO);
$_USER->logout();

