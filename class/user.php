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

            if(!empty($this->_username) AND !empty($this->_email) AND !empty($this->_securityPhrase) AND !empty($this->_password)) {

                $username_len = strlen($this->_username);
                if($username_len <= 12) {
                    if(filter_var($this->_email, FILTER_VALIDATE_EMAIL)) {

                        $securityPhrase_len = strlen($this->_securityPhrase);
                        if($securityPhrase_len <= 20) {
                            // On vérifie que l'email n'est pas déjà en base de données
                            $req_email = $this->_db->prepare("SELECT email FROM user WHERE email = ?");
                            $req_email->execute(array($this->_email));
                            $count_email = $req_email->rowCount();

                            if($count_email == 0) {

                                // On vérifie que le pseudo n'est pas déjà en base de données
                                $req_username = $this->_db->prepare("SELECT username FROM user WHERE username = ?");
                                $req_username->execute(array($this->_username));
                                $count_username = $req_username->rowCount();
                                if($count_username == 0) {
                                    // On va pouvoir créer l'utilisateur en bdd
                                    $insert_user = $this->_db->prepare("INSERT INTO user SET username = :username, email = :email, securityPhrase = :securityPhrase, password = :password, admin = :admin");
                                    $insert_user->execute(array(
                                        "username" => $this->_username,
                                        "email" = $this->_email,
                                        "securityPhrase" => $this->_securityPhrase,
                                        "password" => $this->_password,
                                        "admin" => "0"
                                    ));

                                    // Utilisateur créer

                                } else {
                                    $error = "Le nom d'utilisateur est déjà utilisé";
                                    return $error;
                                }
                            } else {
                                $error = "L'adresse email est déjà utilisée.";
                                return $error;
                            }

                        } else {
                            $error = "Votre phrase de sécurité est composé de plus de 20 caractères.";
                            return $error;
                        }
                    } else {
                        $error = "Veuillez entrer une adresse email valide.";
                        return $error;
                    }
                } else {
                    $error = "Votre nom d'utilisateur est composé de plus de 12 caractères.";
                    return $error;
                }
            }
        }

        //On verifie si le Nom et le Mot de Passe soit similaire à ceux present en base, si oui, on cré une SESSION
        public function login($username, $password) {

            $this->_username = htmlspecialchars($username);
            $this->_password = hash("sha512", $password);

            if(!empty($this->_username) AND !empty($this->_password)) {
                $reqUser = $this->_db->prepare("SELECT * FROM user WHERE username = :username AND password = :password");
                $reqUser->execute(array(
                    "username" => $this->_username,
                    "password" => $this->_password
                ));

                // REDIRECTION                                                     A FINIR

            }

        }

        //On supprime la SESSION
        public function logout() {
            $_SESSION = array();
            session_destroy();

        }

        //Changement de MPD en BDD avec Sécurité + Nom
        public function pwreset($username, $securityPhrase, $password) {

            $this->_username = htmlspecialchars($username);
            $this->_securityPhrase = htmlspecialchars($securityPhrase);
            $this->_password = hash("sha512", $password);

            if(!empty($this->_username) AND !empty($this->_securityPhrase) AND !empty($this->_password)) {
                // On va vérifie que l'user et la phrase de sécurité correspondent 
                $req_user_security = $this->_db->prepare("SELECT * FROM user WHERE username = ? AND securityPhrase = ?");
                $req_user_security->execute(array($this->_username, $this->_securityPhrase));
                $verifSecurity = $req_user_security->rowCount();

                if($verifSecurity == 1) {
                    // On modifie le mot de passe
                    $edit_password = $this->_db->prepare("UPDATE  user SET password = :password WHERE username = :username");
                    $edit_password->execute(array(
                        "password" => $this->_password,
                        "username" => $this->_username
                    ));

                    // MOT DE PASSE MODIFIER                                          A FINIR
                } else {
                    $error = "Informations éronnées";
                    return $error;
                }
            }
        }
    }
?>
