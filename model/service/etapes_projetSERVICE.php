<?php

namespace model\service;

class etapes_projetSERVICE
{
    private $etapes_projetDAO;

    public function __construct() {
        try {
            $this->etapes_projetDAO = new \model\dao\etapes_projetDAO();
        }
        catch (\Exception $e) {
            throw new \Exception('Impossible d\'établir la connexion à la BD.');
        }
    }

    public function create_project_stage($id_etape_projet,$commentaire_etape_projet,$id_user) {
        return $this->etapes_projetDAO->createProjectStage($id_etape_projet,$commentaire_etape_projet,$id_user);
    }
}