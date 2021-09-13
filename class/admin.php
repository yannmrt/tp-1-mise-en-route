<?php 

class Admin {

    /**
     *
     *  $_admin : valeur admin de la bdd
     *  $_longitude : longitude de la tram
     *  $_latitude : latitude de la tram 
     *  $_idGPS : id de la tram GPS
     *  
    */

    private $_admin; 
    private $_longitude;
    private $_latitude;
    private $_id;
    private $_name;

    private $_db;

    //Constructeur du User depuis la BDD (utiliser PDO)
    public function __construct($_PDO) {
        $this->_db = $_PDO;
    }

    //On ajoute des coordonnée GPS à la base de donnée grace à la longitude et la latitude renseigné
    public function AjoutTrame($longitude, $latitude, $name) {
        $this->_longitude = htmlspecialchars($longitude);
        $this->_latitude = htmlspecialchars($latitude);
        $this->_name = htmlspecialchars($name);

        if(!empty($this->_longitude) AND !empty($this->_latitude) AND !empty($this->_name)) {
            $req_name_exist = $this->_db->prepare("SELECT name FROM gps WHERE name = ?");
            $req_name_exist->execute(array($this->_name));
            $name_exist_count = $req_name_exist->rowCount();

            if($name_exist_count == 0) {
                $add_trame =  $this->_db->prepare("INSERT INTO gps SET longitude = :longitude, latitude = :latitude, name = :name");
                $add_trame->execute(array(
                    "longitude" => $this->_longitude,
                    "latitude" => $this->_latitude,
                    "name" => $this->_name
                ));
            } else {
                $error = "Le nom est déjà utilisé.";
                return $error;
            }
        }

    }

    //On supprime un points GPS grace à son ID (faire système pour trouver / lister toutes les trames ?)
    public function DeleteTrame($id) {
        $this->_id = $id;

        if($this->_id > 0) {
            $delTrame = $this->_db->prepare("DELETE FROM gps WHERE id = ?");
            $delTrame->execute(array($this->_id));
        }
    }

    //On modifie la longitude / latitude GPS identifié grace à son ID
    public function ModifTrame($idGPS, $longitude, $latitude) {

    }
} 