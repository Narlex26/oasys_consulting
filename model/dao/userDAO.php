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

    public function connUser($adresse_mail_user,$password_user)
    { // Connecte un utilisateur
        $connUser = $this->Connection->prepare("SELECT * FROM `user` WHERE adresse_mail_user=? and password_user=? LIMIT 1");
        $connUser->execute(array($adresse_mail_user, hash('sha256', $password_user)));
        $res = $connUser->fetchAll();

        return !empty($res);
    }
}
?>