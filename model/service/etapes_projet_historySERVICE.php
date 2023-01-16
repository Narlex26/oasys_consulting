<?php

namespace model\service;

class etapes_projet_historySERVICE
{
    private $etapes_projet_historyDAO;

    public function __construct() {
        try {
            $this->etapes_projet_historyDAO = new \model\dao\etapes_projet_historyDAO();
        }
        catch (\Exception $e) {
            throw new \Exception('Impossible d\'établir la connexion à la BD.');
        }
    }

    public function create_project_stage_history($project_number,$id_etape_projet,$commentaire_etape_projet,$id_user) {
        return $this->etapes_projet_historyDAO->create_project_stage_history($project_number,$id_etape_projet,$commentaire_etape_projet,$id_user);
    }
    public function getProjectStageHistoryById($project_number) { // Fonction pour aller chercher tous les étapes de projet dans la BDD
        return $this->etapes_projet_historyDAO->getProjectStageHistoryById($project_number);
    }
}