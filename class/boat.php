<?php 

class Boat {

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

    /**
     * 
     * On ajoute un bateau a la base de donnée (page: admin/addBoat.php)
     * 
     * $name : nom du bateau
     * 
     */
    public function addBoat($name) {

    }

    /**
     * 
     * On modifier les informations du bateau par l'id  (page: admin/editBoat.php)
     * 
     * $name : nom du bateau
     * $id : id du bateau
     * 
     */
    public function editBoat($name, $id) {

    }

    /**
     * 
     * Supprimer un bateau en fonction de l'id (page: admin/editBoat.php)
     * 
     * $id : id du bateau
     * 
     */
    public function delBoat($id) {

    }

    /**
     * 
     * On affiche la liste des bateaux de la bdd dans un tableau (page: admin/boatList.php)
     * 
     */
    public function showBoatList() {

    }

    /**
     * 
     * On récupère les informations d'un bateau par l'id (page: admin/editBoat.php)
     * 
     * $id : id du bateau
     * 
     */
    public function getBoatInfo() {
        
    }

}