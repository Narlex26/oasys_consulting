<?php

namespace model\service;

use model\dao\userDAO;

class userSERVICE {
    private $userDAO;

    public function __construct() {
        try {
            $this->userDAO = new userDAO();
        }
        catch (\Exception $e) {
            throw new \Exception('Impossible d\'établir la connexion à la BD.');
        }
    }

    public function connUser($adresse_mail_client,$password_client) {
        return $this->userDAO->connUser($adresse_mail_client,$password_client);
    }

    public function modifyUser($id_user,$nom_user, $prenom_user, $adresse_mail_user) {
        return $this->userDAO->modifyUser($id_user,$nom_user, $prenom_user, $adresse_mail_user);
    }

    public function modifyPasswordUser($id_user, $new_password) {
        return $this->userDAO->modifyPasswordUser($id_user, $new_password);
    }

    public function getAllUser() { // Fonction pour aller chercher tous les users dans la BDD
        return $this->userDAO->getAllUser();
    }

    public function getUserById($id_user) { // Fonction pour aller chercher un user par son id
        return $this->userDAO->getUserById($id_user);
    }

    public function getChefDeProjet() { // Fonction pour aller chercher tous les users qui sont chef de projet dans la BDD
        return $this->userDAO->getChefDeProjet();
    }

}