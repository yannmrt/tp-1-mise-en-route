<?php 
    class User  
    {
        /**
         * 
         * id : id de l'user
         * name : nom d'utilisateur
         * password : mot de passe
         * securite : phrase de sécurité
         * 
         */
        protected $id;
        protected $username;
        protected $password;
        protected $securityPhrase;

        //Constructeur du User depuis la BDD (utiliser PDO)
        public function __construct($_PDO) {
            $this->_db = $_PDO;
        }

        public function register($username, $email, $securityPhrase, $password) {

            $this->_username = htmlspecialchars($username);
            $this->_email = htmlspecialchars($email);
            $this->_securityPhrase = htmlspecialchars($securityPhrase);
            $this->_password = hash("sha512", $password);

            

        }

        //On verifie si le Nom et le Mot de Passe soit similaire à ceux present en base, si oui, on cré une SESSION
        public function login($username, $password) {

            $this->_username = htmlspecialchars($username);
            $this->_password = hash("sha512", $password);

            if(!empty($this->_username) AND !empty($this->_password)) {
                $reqUser = $this->_db->prepare("SELECT * FROM user WHERE username = ? AND password = ?");
                $reqUser->execute(array(
                    "username" => $this->_username,
                    "password" => $this->_password
                ));

                // REDIRECTION                                                     A FINIR

            }

        }

        //On supprime la SESSION
        public function logout() {

        }

        //Changement de MPD en BDD avec Sécurité + Nom
        public function pwreset($username, $securityPhrase, $password) {

        }
    }
?>
