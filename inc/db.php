<?php

session_start();

/**
 * 
 * INFORMATIONS DE LA BASE DE DONNEES
 * 
 * hostname : adresse du serveur de base de données
 * username : nom d'utilsiateur de la base de données
 * password : mot de passe de l'utilisateur de la base de données
 * 
*/

$_DB = array(
    "hostname" => "192.168.64.201",
    "username" => "superuser",
    "password" => "superuser",
    "dbname" => "TP1" 
);


/** 
 * 
 * CONNEXION A LA BASE DE DONNEES 
 * 
 * _PDO : Variable de la base de données
 * e : Erreur ressortie dans le cas ou la connexion est impossible
 *  
*/
try {
    $_PDO = new pdo("mysql:host=".$_DB['hostname'].";dbname=".$_DB['dbname'].";charset=utf8", $_DB['username'], $_DB['password']);
} catch(Exception $e) {
    echo "Erreur de connexion:" .$e;
}