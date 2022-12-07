<?php
namespace model\service;

class userSERVICE {
    private $userDAO;

    public function __construct() {
        try {
            $this->userDAO = new \model\dao\userDAO();
        }
        catch (\Exception $e) {
            throw new \Exception('Impossible d\'établir la connexion à la BD.');
        }
    }

    public function connUser($adresse_mail_client,$password_client) { // Fonction pour vérifier l'existance d'un utilisateur dans la BDD (avec mail et id spotify)
        return $this->userDAO->connUser($adresse_mail_client,$password_client);
    }

    public function getUser() { // Fonction pour aller chercher tous les users dans la BDD
        return $this->userDAO->getUser();
    }


}