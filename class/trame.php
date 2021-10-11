<?php

class Trame {

    /**
    * 
    * longitude : longitude de la trame
    * latitude : latitude de la trame
    * id : id de la trame
    * name : nom de la trame
    *
    * db : variable pdo
    * 
    */
    private $_longitude;
    private $_latitude;
    private $_id;
    private $_name;
    private $_tab;
    private $_horodatage;
    private $_db;

    // Constructeur de la classe User avec la base de donnée ($_PDO est dans /inc/db.php)
    public function __construct($_PDO) {
        $this->_db = $_PDO;
    }

    /**
     * 
     * Ajouter une trame à la base de donnée (page: admin/addTrame.php)
     * 
     * longitude : longitude de la trame
     * latitude : latitude de la trame 
     * name : nom de la trame
     * 
     */
    public function addTrame($longitude, $latitude, $name, $idBoat) {
        $this->_longitude = htmlspecialchars($longitude);
        $this->_latitude = htmlspecialchars($latitude);
        $this->_name = htmlspecialchars($name);
        $this->_idBoat = htmlspecialchars($idBoat);
        $this->_horodatage = date("h:i:s");


        if(!empty($this->_longitude) AND !empty($this->_latitude) AND !empty($this->_name)) {
            $req_name_exist = $this->_db->prepare("SELECT name FROM gps WHERE name = ?");
            $req_name_exist->execute(array($this->_name));
            $name_exist_count = $req_name_exist->rowCount();

            if($name_exist_count == 0) {
                if(filter_var($this->_longitude, FILTER_VALIDATE_FLOAT)) {
                    if(filter_var($this->_latitude, FILTER_VALIDATE_FLOAT)) {
                        $add_trame =  $this->_db->prepare("INSERT INTO gps SET longitude = :longitude, latitude = :latitude, name = :name, idBoat = :idBoat, horodatage = :horodatage");
                        $add_trame->execute(array(
                            "longitude" => $this->_longitude,
                            "latitude" => $this->_latitude,
                            "name" => $this->_name,
                            "idBoat" => $this->_idBoat,
                            "horodatage" => $this->_horodatage
                        ));
                        $error = '<div class="alert alert-success" role="alert">La trame a bien été ajouté à la base de donnée</div>';
                        return $error;
                    } else {
                        $error = '<div class="alert alert-danger" role="alert">Veuillez entrer uniquement des chiffres</div>';
                        return $error;
                    }
                } else {
                    $error = '<div class="alert alert-danger" role="alert">Veuillez entrer uniquement des chiffres</div>';
                    return $error;
                }
            } else {
                $error = '<div class="alert alert-danger" role="alert">Le nom est déjà utilisé</div>';
                return $error;
            }
        }

    }

    /**
     * 
     * Supprimer une trame de la base de donnée en fonction de l'id (page: editTrame.php)
     * 
     * $id : id de la trame
     * 
     */
    public function delTrame($id) {
        $this->_id = $id;

        if($this->_id > 0) {
            $delTrame = $this->_db->prepare("DELETE FROM gps WHERE id = ?");
            $delTrame->execute(array($this->_id));

            header("Location: trameList.php");
        }
    }

    /** 
     * 
     * Modifier une trame en fonction de l'id (page: editTrame.php)
     * 
     * $id : id de la trame 
     * $longitude : longitude de la trame
     * $latitude : latitude de la trame
     * $name : nom de la trame
     * 
     */
    public function editTrame($id, $longitude, $latitude, $name, $idBoat) {
        $this->_id = htmlspecialchars($id);
        $this->_longitude = htmlspecialchars($longitude);
        $this->_latitude = htmlspecialchars($latitude);
        $this->_name = htmlspecialchars($name);
        $this->_idBoat = htmlspecialchars($idBoat);
        $this->_horodatage = date("h:i:s");

        if(!empty($this->_id) AND !empty($this->_longitude) AND !empty($this->_latitude) AND !empty($this->_name)) {
            if(filter_var($this->_longitude, FILTER_VALIDATE_FLOAT)) {
                if(filter_var($this->_latitude, FILTER_VALIDATE_FLOAT)) {
                    $editTrame = $this->_db->prepare("UPDATE gps SET longitude = :longitude, latitude = :latitude, name = :name, idBoat = :idBoat, horodatage = :horodatage WHERE id = :id");
                    $editTrame->execute(array(
                        "longitude" => $this->_longitude,
                        "latitude" => $this->_latitude,
                        "name" => $this->_name,
                        "idBoat" => $this->_idBoat,
                        "id" => $this->_id,
                        "horodatage" => $this->_horodatage
                    ));

                    $error = '<div class="alert alert-success" role="alert">La trame a bien été editée</div>';
                    return $error;
                } else {
                    $error = '<div class="alert alert-danger" role="alert">Veuillez entrer uniquement des chiffres</div>';
                    return $error;
                }
            } else {
                $error = '<div class="alert alert-danger" role="alert">Veuillez entrer uniquement des chiffres</div>';
                return $error;
            }
        }
    }

    /**
     * 
     * Afficher toutes les trames de la bdd dans un tableau (page: trameList.php)
     * 
     */
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
                <td>'.$_TRAME["idBoat"].'</td>
                <td><a href="editTrame.php?id='.$_TRAME["id"].'"><label class="btn btn-primary btn-sm">Modifier</label></a><a href="editTrame.php?id='.$_TRAME["id"].'&method=delete"><label class="btn btn-danger btn-sm">Supprimer</label></a></td>
            </tr>
            
            ';

        }
    }

    /**
     * 
     * On récupère les informations d'une trame en fonction de l'id (page: editTrame.php)
     * 
     * $id : id de la trame
     * 
     */
    public function getTrameInfo($id) {
        $get_info = $this->_db->prepare("SELECT * FROM gps WHERE id = ?");
        $get_info->execute(array($id)); 
        
        return $_infoTram = $get_info->fetch();
    }

    /**
     * 
     * On récupère la liste des bateaux sous forme de menu déroulant (page: addTram.php)
     * 
     */
    public function getBoatList() {
        $getBoat = $this->_db->prepare("SELECT * FROM boat");
        $getBoat->execute();
        $boatExist = $getBoat->rowCount();

        if($boatExist > 0) {
            while($_BOAT = $getBoat->fetch()) {
                echo '

                    <option value="'.$_BOAT["id"].'">'.$_BOAT["id"].' - '.$_BOAT["name"].'</option>

                ';

            }
        }
    }

    /**
     * 
     * On récupère la liste des bateaux sous forme de menu déroulant (page: addTram.php)
     * 
     */
    public function getalltrame(){

        $prepar = $this->_db->query("SELECT `latitude`, `longitude`, `name` FROM `gps` WHERE 1");
        $nb = $prepar->RowCount();
        $case = "1";
        $this->_tab[$case] = $nb;
        while($data = $prepar->fetch()){
            $case++;
            $this->_tab[$case] = $data['name'];
            $case++;
            $this->_tab[$case] = $data['latitude'];
            $case++;
            $this->_tab[$case] = $data['longitude'];
        }
        return $this->_tab;
    }

}