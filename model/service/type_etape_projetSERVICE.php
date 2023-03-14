<?php

namespace model\service;

class type_etape_projetSERVICE
{
    private $etapes_projetDAO;

    public function __construct() {
        try {
            $this->etapes_projetDAO = new \model\dao\type_etape_projetDAO();
        }
        catch (\Exception $e) {
            throw new \Exception('Impossible d\'établir la connexion à la BD.');
        }
    }

    public function get_projet_stage_type() { // Fonction pour aller chercher tous les étapes de projet dans la BDD
        return $this->etapes_projetDAO->get_projet_stage();
    }
}