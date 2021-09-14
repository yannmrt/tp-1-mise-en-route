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
    public function addTrame($longitude, $latitude, $name) {
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
    public function delTrame($id) {
        $this->_id = $id;

        if($this->_id > 0) {
            $delTrame = $this->_db->prepare("DELETE FROM gps WHERE id = ?");
            $delTrame->execute(array($this->_id));

            header("Location: trameList.php");
        }
    }

    //On modifie la longitude / latitude GPS identifié grace à son ID
    public function editTrame($id, $longitude, $latitude, $name) {
        $this->_id = htmlspecialchars($id);
        $this->_longitude = htmlspecialchars($longitude);
        $this->_latitude = htmlspecialchars($latitude);
        $this->_name = htmlspecialchars($name);

        if(!empty($this->_id) AND !empty($this->_longitude) AND !empty($this->_latitude) AND !empty($this->_name)) {
            $editTrame = $this->_db->prepare("UPDATE gps SET longitude = :longitude, latitude = :latitude, name = :name WHERE id = :id");
            $editTrame->execute(array(
                "longitude" => $this->_longitude,
                "latitude" => $this->_latitude,
                "name" => $this->_name,
                "id" => $this->_id
            ));
        }
    }

    // On affiche tous les valeurs de trames de la base de données 
    public function showTrameList() {
        $req_trameList = $this->_db->prepare("SELECT * FROM gps");
        $req_trameList->execute();
        $count = $req_trameList->rowCount();

        while($_TRAME = $req_trameList->fetch()) {
            echo '
            
            <tr>
                <th scope="row">'.$_TRAME["id"].'</th>
                <td>'.$_TRAME["name"].'</td>
                <td>'.$_TRAME["longitude"].'</td>
                <td>'.$_TRAME["latitude"].'</td>
                <td><a href="editTrame.php?id='.$_TRAME["id"].'"><label class="btn btn-primary btn-sm">Modifier</label></a><a href="editTrame.php?id='.$_TRAME["id"].'&method=delete"><label class="btn btn-danger btn-sm">Supprimer</label></a></td>
            </tr>
            
            ';

        }
    }

    // Cette fonction permet de récupèrer toutes les informations de la trame en fonction de l'id
    public function getTrameInfo($id) {
        $get_info = $this->_db->prepare("SELECT * FROM gps WHERE id = ?");
        $get_info->execute(array($id)); 
        
        return $_infoTram = $get_info->fetch();
    }

    // Afficher tous les utilisateurs dans la base de donnée dans un tableau
    public function showUserList() {
        $req_userList = $this->_db->prepare("SELECT * FROM user");
        $req_userList->execute();
        $count = $req_userList->rowCount();

        while($_USER = $req_userList->fetch()) {
            echo '
            
            <tr>
                <th scope="row">'.$_USER["id"].'</th>
                <td>'.$_USER["username"].'</td>
                <td>'.$_USER["email"].'</td>
                <td>'.$_USER["securityPhrase"].'</td>
                <td>'.$_USER["admin"].'</td>
                <td><a href="editTrame.php?id='.$_USER["id"].'"><label class="btn btn-primary btn-sm">Modifier</label></a><a href="editTrame.php?id='.$_USER["id"].'&method=delete"><label class="btn btn-danger btn-sm">Supprimer</label></a></td>
            </tr>
            
            ';
        }
    }
} 