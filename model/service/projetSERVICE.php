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

    public function createProject($libelle_projet,$date_de_debut_projet,$id_client,$id_user) {
        return $this->projetDAO->createProject($libelle_projet,$date_de_debut_projet,$id_client,$id_user);
    }

    public function getProject() { // Fonction pour aller chercher tous les clients dans la BDD
        return $this->projetDAO->getProject();
    }

    public function getCurrentProject() {
        return $this->projetDAO->getCurrentProject();
    }

    public function getFinishProject() {
        return $this->projetDAO->getFinishProject();
    }

    public function getNumbersOfProject() {
        return $this->projetDAO->getNumbersOfProject();
    }

    public function getPercentageOfFinishProject() {
        return $this->projetDAO->getPercentageOfFinishProject();
    }


}