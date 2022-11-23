<?php
namespace model\service;

class projetSERVICE {
    private $projetDAO;

    public function __construct() {
        try {
            $this->projetDAO = new \model\dao\projetDAO();
        }
        catch (\Exception $e) {
            throw new \Exception('Impossible d\'établir la connexion à la BD.');
        }
    }

    public function __destruct() {

    }

    public function createProject($libelle_projet,$date_de_debut_projet,$id_client) {
        return $this->projetDAO->createProject($libelle_projet,$date_de_debut_projet,$id_client);
    }


}