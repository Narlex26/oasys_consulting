<?php

namespace model\dao;

use model\metier\etapes_projet_historyMetier;

date_default_timezone_set('Europe/Paris');
class etapes_projet_historyDAO
{
    private const TABLE = "historique_etapes_projet";
    private $Connection;

    public function __construct()
    {
        try {
            $hconnection = new Connexion();
            $this->Connection = $hconnection->getConnection();
        } catch (\Exception $e) {
            throw new \Exception('Impossible d\'établir la connexion à la BD.');
        }
    }

    public function create_project_stage_history($project_number,$id_etape_projet,$commentaire_etape_projet,$id_user)
    { // Créer un projet
        $create_project_stage = $this->Connection->prepare("INSERT INTO " . self::TABLE . " (id_etape_projet,commentaire_etape_projet,date_add,id_user,code_projet)
            VALUES (:id_etape_projet,:commentaire_etape_projet,NOW(),:id_user,:code_projet)");
        $res = $create_project_stage->execute(array(
            "id_etape_projet" => $id_etape_projet,
            "commentaire_etape_projet" => $commentaire_etape_projet,
            "id_user" => $id_user,
            "code_projet" => $project_number
        ));

        return $res;
    }

    public function getProjectStageHistoryById($project_number)
    {
        $getProjectStageHistoryById = $this->Connection->prepare("SELECT historique_etapes_projet.id_historique_etapes_projet, etapes_projet.libelle_etape_projet, historique_etapes_projet.commentaire_etape_projet, historique_etapes_projet.date_add, user.nom_user, user.prenom_user, historique_etapes_projet.code_projet FROM historique_etapes_projet, etapes_projet, user, projet WHERE historique_etapes_projet.code_projet = :project_number AND historique_etapes_projet.code_projet = projet.code_projet AND historique_etapes_projet.id_etape_projet = etapes_projet.id_etapes_projet AND historique_etapes_projet.id_user = user.id_user ORDER BY  historique_etapes_projet.date_add DESC");
        $getProjectStageHistoryById->bindParam(':project_number', $project_number);
        $getProjectStageHistoryById->execute();
        return etapes_projet_historyMetier::fromFetchAllData($getProjectStageHistoryById->fetchAll());
    }
}