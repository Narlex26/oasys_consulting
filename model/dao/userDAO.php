<?php
namespace model\dao;
use model\Metier\clientMetier;
use model\Metier\userMetier;

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
        $connUser = $this->Connection->prepare("SELECT * FROM user, role WHERE :adresse_mail_user = user.adresse_mail_user and :password_user = user.password_user and user.id_role = role.id_role LIMIT 1");
        $connUser->execute(array(
            ':adresse_mail_user' => $adresse_mail_user,
            ':password_user' => hash('sha256', $password_user)
        ));
        return userMetier::fromFetchData($connUser->fetch());
    }

    public function getUser()
    { // Retourne tous les utilisateurs
        $getUser = $this->Connection->prepare("SELECT user.id_user, user.adresse_mail_user, user.nom_user, user.prenom_user, role.libelle_role FROM user, role WHERE role.id_role = user.id_role");
        $getUser->execute();
        return userMetier::fromFetchAllData($getUser->fetchAll());
    }

    public function getChefDeProjet()
    { // Retourne tous les utilisateurs
        $getChefDeProjet = $this->Connection->prepare("SELECT * FROM user, role WHERE role.id_role = 4 AND user.id_role = role.id_role");
        $getChefDeProjet->execute();
        return userMetier::fromFetchAllData($getChefDeProjet->fetchAll());
    }
}
?>