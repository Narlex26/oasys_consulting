<?php
namespace model\service;

class userSERVICE {
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

    public function createProject($code_projet,$libelle_projet,$date_de_debut_projet,$date_de_fin_projet,$id_client) {
        return $this->projetDAO->createProject($code_projet,$libelle_projet,$date_de_debut_projet,$date_de_fin_projet,$id_client);
    }


}