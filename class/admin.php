<?php 

class Admin extends User
{

    /**
     *
     *  $_admin : valeur admin de la bdd
     *  
    */

    private $_admin; 


    /**
     *  $_PDO : variable PDO (inc/db.php) 
    */
    //Pas de constucteur : on prend celui de User par héritage

    /**
     *  $
    */

    //On ajoute des coordonnée GPS à la base de donnée grace à la longitude et la latitude renseigné
    public function AjoutTrame($longitude, $latitude) 
    {

    }

    //On supprime un points GPS grace à son ID (faire système pour trouver / lister toutes les trames ?)
    public function DeleteTrame($idGPS)
    {

    }

    //On modifie la longitude / latitude GPS identifié grace à son ID
    public function ModifTrame($idGPS, $longitude, $latitude)
    {

    }
} 