<?php
namespace model\dao;
date_default_timezone_set('Europe/Paris');

class userDAO {
    private const TABLE = "user";
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

    public function createUser($adresse_mail_user,$password_user,$nom_user,$prenom_user,$nom_entreprise_user) { // Crée un utilisateur
        $createuser = $this->Connection->prepare("INSERT INTO ".self::TABLE." (adresse_mail_user,password_user,nom_user,prenom_user)
            VALUES (:adresse_mail_user,:password_user,:nom_user,:prenom_user,:nom_entreprise_user)");
        $res = $createuser->execute(array(
            "adresse_mail_user"=>$adresse_mail_user,
            "password_user"=>$password_user,
            "nom_user"=>$nom_user,
            "prenom_user"=>$prenom_user,
            "nom_entreprise_user"=>$nom_entreprise_user
        ));

        return $res;
    }

    public function connUser($adresse_mail_user,$password_user)
    { // Connecte un utilisateur
        $connUser = $this->Connection->prepare("SELECT * FROM `user` WHERE adresse_mail_user=? and password_user=? LIMIT 1");
        $connUser->execute(array($adresse_mail_user, hash('sha256', $password_user)));
        $res = $connUser->fetchAll();

        return !empty($res);
    }
}
?>