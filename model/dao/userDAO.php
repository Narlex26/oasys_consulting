<?php
namespace model\dao;
use model\metier\clientMETIER;
use model\metier\userMETIER;

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

    public function connUser($adresse_mail_user,$password_user)
    { // Connecte un utilisateur
        $connUser = $this->Connection->prepare("SELECT * FROM `user` WHERE :adresse_mail_user = user.adresse_mail_user and :password_user = user.password_user LIMIT 1");
        $connUser->execute(array(
            ':adresse_mail_user' => $adresse_mail_user,
            ':password_user' => hash('sha256', $password_user)
        ));
        return userMETIER::fromFetchData($connUser->fetch());
    }

    public function getUser()
    { // Retourne tous les utilisateurs
        $getUser = $this->Connection->prepare("SELECT * FROM `user`");
        $getUser->execute();
        return userMETIER::fromFetchAllData($getUser->fetchAll());
    }
}
?>