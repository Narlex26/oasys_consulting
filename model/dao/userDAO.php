<?php
    namespace model\dao;
    date_default_timezone_set('Europe/Paris');

    class userDAO {
        private const TABLE = "t_user";
        private $Connection;
    
        public function __construct() 
        { 
            try {
                $hconnection=new Connexion();
                $this->Connection=$hconnection->getConnection();
            }
            catch (\Exception $e) {
                throw new \Exception('Impossible d\'établir la connexion à la BD.');
            }
        }

        public function __destruct() {
        }

        public function checkUser($adresse_mail_client, $password_client) { // Vérifie la présence d'un utilisateur dans la BDD avec son mail et mot de passe
            $res = true;

            $checkuser = $this->Connection->prepare("SELECT * FROM `client` WHERE adresse_mail_client=? AND password_client=? LIMIT 1");
            $checkuser->execute(array($adresse_mail_client, $password_client));
            $existinguser = $checkuser->fetchAll();

            // Si l'utilisateur n'existe pas dans la BDD, alors le resultat est false
                if (count($existinguser) == 0) {
                    $res = false;
                    return $res;
                }
            
            // Sinon retourne true
                return $res;
        }

        public function createUser($adresse_mail_client,$password_client,$nom_client,$prenom_client,$nom_entreprise_client) { // Crée un utilisateur
            $createuser = $this->Connection->prepare("INSERT INTO ".self::TABLE." (adresse_mail_client,password_client,nom_client,prenom_client,nom_entreprise_client)
            VALUES (:adresse_mail_client,:password_client,:nom_client,:prenom_client,:nom_entreprise_client)");
            $res = $createuser->execute(array(
                "adresse_mail_client"=>$adresse_mail_client,
                "password_client"=>$password_client,
                "nom_client"=>$nom_client,
                "prenom_client"=>$prenom_client,
                "nom_entreprise_client"=>$nom_entreprise_client
            ));

            return $res;
        }

        public function connUser($adresse_mail_client,$password_client)
        { // Connecte un utilisateur
            $connUser = $this->Connection->prepare("SELECT * FROM `client` WHERE adresse_mail_client=? and password_client=? LIMIT 1");
            $connUser->execute(array($adresse_mail_client, hash('sha256', $password_client)));
            $res = $connUser->fetchAll();

            return !empty($res);
        }
    }
?>