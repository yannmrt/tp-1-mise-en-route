<?php 

class Bateau {

    /**
     * 
     * id : id du bateau
     * nom : nom du bateau
     * 
     * _db : connexion pdo à la bdd 
     * 
     */
    private $_id;
    private $_nom; 

    private $_db;

    // Constructeur de la classe User avec la base de donnée ($_PDO est dans /inc/db.php)
    public function __construct($_PDO) {
        $this->_db = $_PDO;
    }

}