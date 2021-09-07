<?php 

class Admin {

    /**
     *
     *  $_id : id de l'utilisateur
     *  $_username : nom de l'utilisateur
     *  $_admin : valeur admin de la bdd
     *  
    */
    private $_id
    private $_username;
    private $_admin; 

    private $_db;

    /**
     *  $_PDO : variable PDO (inc/db.php) 
    */
    public function __construct($_PDO) {
        $this->_db = $_PDO;
    }

    /**
     *  $
    */

}