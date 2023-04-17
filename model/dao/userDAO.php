<?php
namespace model\dao;

use model\metier\userMetier;
use PDO;

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

    public function connUser($adresse_mail_user, $password_user) { // Connecte un utilisateur
        $hashed_password = hash('sha256', $password_user);
        $connUser = $this->Connection->prepare("SELECT * FROM user, role WHERE adresse_mail_user = :adresse_mail_user and password_user = :password_user and user.id_role = role.id_role LIMIT 1");
        $connUser->bindParam(':adresse_mail_user', $adresse_mail_user);
        $connUser->bindParam(':password_user', $hashed_password);
        $connUser->execute();
        return userMetier::fromFetchData($connUser->fetch());
    }

    public function modifyUser($id_user,$nom_user, $prenom_user, $adresse_mail_user) { // Modifie un utilisateur
        $modifyuser = $this->Connection->prepare("UPDATE ".self::TABLE." SET adresse_mail_user=:adresse_mail_user, nom_user=:nom_user, prenom_user=:prenom_user WHERE id_user =:id_user");
        return $modifyuser->execute(array(
            ":id_user" => $id_user,
            ":adresse_mail_user"=>$adresse_mail_user,
            ":nom_user"=>$nom_user,
            ":prenom_user"=>$prenom_user
        ));
    }

    public function modifyPasswordUser($id_user, $new_password) { // Modifie le mot de passe utilisateur
        $hashed_password = hash('sha256', $new_password);
        $modifyPasswordUser = $this->Connection->prepare("UPDATE ".self::TABLE." SET password_user=:password_user WHERE id_user =:id_user");
        return $modifyPasswordUser->execute(array(
            ":id_user" => $id_user,
            ":password_user"=> $hashed_password
        ));
    }

    public function getAllUser()
    { // Retourne tous les utilisateurs
        $getUser = $this->Connection->prepare("SELECT user.id_user, user.adresse_mail_user, user.password_user, user.nom_user, user.prenom_user, role.libelle_role FROM user, role WHERE role.id_role = user.id_role");
        $getUser->execute();
        return userMetier::fromFetchAllData($getUser->fetchAll());
    }

    public function getUserById($id_user)
    { // Retourne tous les utilisateurs
        $getUserById = $this->Connection->prepare("SELECT user.id_user, user.adresse_mail_user, user.password_user, user.nom_user, user.prenom_user, role.libelle_role FROM user, role WHERE user.id_user = :id_user AND role.id_role = user.id_role");
        $getUserById->bindParam(':id_user', $id_user, PDO::PARAM_INT);
        $getUserById->execute();
        return userMetier::fromFetchData($getUserById->fetch());
    }

    public function getChefDeProjet()
    { // Retourne tous les utilisateurs
        $getChefDeProjet = $this->Connection->prepare("SELECT * FROM user, role WHERE role.id_role = 4 AND user.id_role = role.id_role");
        $getChefDeProjet->execute();
        return userMetier::fromFetchAllData($getChefDeProjet->fetchAll());
    }
}
?>