<?php 

class Boat {

    /**
     * 
     * id : id du bateau
     * name : nom du bateau
     * 
     * _db : connexion pdo à la bdd 
     * 
     */
    private $_id;
    private $_name; 

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

        $this->_name = htmlspecialchars($name);

        if(!empty($this->_name)) {
            $req_boat_exist = $this->_db->prepare("SELECT name FROM boat WHERE name = ?");
            $req_boat_exist->execute(array($this->_name));
            $boat_name_exist = $req_boat_exist->rowCount();
            
            if($boat_name_exist == 0) {
                $add_boat = $this->_db->prepare("INSERT INT boat SET name = :name");
                $add_boat->execute(array($this->_name));

                $error = '<div class="alert alert-success" role="alert">Le bateau a été ajouté.</div>';
                return $error;

            } else {
                $error = '<div class="alert alert-danger" role="alert">Ce nom de bateau est déjà utilisé.</div>';
                return $error;
            }
        }
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

        $this->_name = htmlspecialchars($name);
        $this->_id = htmlspecialchars($id);

        if(!empty($this->_name) AND !empty($this->_id)) {
            $editBoat = $this->_db->prepare("UPDATE boat SET name = ? WHERE id = ?");
            $editBoat->execute(array($this->_name, $this->_id));

            $error = '<div class="alert alert-success" role="alert">Le bateau a bien été modifié.</div>';
            return $error;
        }
    }

    /**
     * 
     * Supprimer un bateau en fonction de l'id (page: admin/editBoat.php)
     * 
     * $id : id du bateau
     * 
     */
    public function delBoat($id) {

        $this->_id = htmlspecialchars($id);

        if(!empty($this->_id)) {
            $delBoat = $this->_db->prepare("DELETE FROM boat WHERE id = ?");
            $delBoat->execute(array($this->_id));

            header("Location: boatList.php");
        }
    }

    /**
     * 
     * On affiche la liste des bateaux de la bdd dans un tableau (page: admin/boatList.php)
     * 
     */
    public function showBoatList() {

        $req_boatList = $this->_db->prepare("SELECT * FROM boat");
        $req_noatList->execute();
        $count = $req_noatList->rowCount();

        while($_BOAT = $req_noatList->fetch()) {
            echo '
            
            <tr>
                <th scope="row">'.$_BOAT["id"].'</th>
                <td>'.$_BOAT["name"].'</td>
                <td><a href="editTrame.php?id='.$_BOAT["id"].'"><label class="btn btn-primary btn-sm">Modifier</label></a><a href="editTrame.php?id='.$_BOAT["id"].'&method=delete"><label class="btn btn-danger btn-sm">Supprimer</label></a></td>
            </tr>
            
            ';

        }
    }

    /**
     * 
     * On récupère les informations d'un bateau par l'id (page: admin/editBoat.php)
     * 
     * $id : id du bateau
     * 
     */
    public function getBoatInfo() {
        
        $get_info = $this->_db->prepare("SELECT * FROM boat WHERE id = ?");
        $get_info->execute(array($id)); 
        
        return $_infoBoat = $get_info->fetch();
    }

}