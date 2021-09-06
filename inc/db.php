<?php

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
    "hostname" => "",
    "username" => "",
    "password" => "" 
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
    $_PDO = new pdo("mysql:host="); 
} catch(Exception $e) {
    echo "Erreur de connexion:" .$e;
}