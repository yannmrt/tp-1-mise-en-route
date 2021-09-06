<?php 
    class User  
    {
        protected $ID;
        protected $Nom;
        protected $Mot_de_Passe;
        protected $Securite;

        //Constructeur du User depuis la BDD (utiliser PDO)
        public function __construct()
        {

        }

        //On verifie si le Nom et le Mot de Passe soit similaire à ceux present en base, si oui, on cré une SESSION
        public function Login ($Nom_Formulaire, $MDP_Formulaire)
        {

        }

        //On supprime la SESSION
        public function Déconnexion ()
        {

        }

        //Changement de MPD en BDD avec Sécurité + Nom
        public function Reinitialisation_MDP ($Nom_Formulaire, $Seurite_Formulaire, $Nouv_MDP_Formulaire)
        {

        }
    }
?>
