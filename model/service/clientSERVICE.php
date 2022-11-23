<?php
namespace model\service;

class clientSERVICE {
    private $clientDAO;

    public function __construct() {
        try {
            $this->clientDAO = new \model\dao\clientDAO();
        }
        catch (\Exception $e) {
            throw new \Exception('Impossible d\'établir la connexion à la BD.');
        }
    }

    public function __destruct() {

    }

    public function getClient() { // Fonction pour aller chercher tous les clients dans la BDD
        return $this->clientDAO->getClient();
    }

    public function createClient($adresse_mail_client,$nom_client,$prenom_client,$nom_entreprise_client) { // Fonction pour aller créer un client
        return $this->clientDAO->createClient($adresse_mail_client,$nom_client,$prenom_client,$nom_entreprise_client);
    }


}