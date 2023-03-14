<?php

namespace model\service;

class etape_projetSERVICE
{
    private $etapes_projet_historyDAO;

    public function __construct() {
        try {
            $this->etapes_projet_historyDAO = new \model\dao\etape_projetDAO();
        }
        catch (\Exception $e) {
            throw new \Exception('Impossible d\'établir la connexion à la BD.');
        }
    }

    public function create_project_stage($project_number, $id_type_etape_projet, $commentaire_etape_projet,$id_user) {
        return $this->etapes_projet_historyDAO->create_project_stage($project_number,$id_type_etape_projet,$commentaire_etape_projet,$id_user);
    }
    public function getAllProjectStageById($project_number) { // Fonction pour aller chercher tous les étapes de projet dans la BDD
        return $this->etapes_projet_historyDAO->getAllProjectStageById($project_number);
    }
}