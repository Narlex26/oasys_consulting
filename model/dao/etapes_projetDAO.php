<?php

namespace model\dao;

date_default_timezone_set('Europe/Paris');
class etapes_projetDAO
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

    public function createProjectStage($id_etape_projet,$commentaire_etape_projet,$id_user)
    { // Créer un projet
        $create_project_stage = $this->Connection->prepare("INSERT INTO " . self::TABLE . " (id_etape_projet,commentaire_etape_projet,date_add,id_user,code_projet)
            VALUES (:id_etape_projet,:commentaire_etape_projet,NOW(),:id_user,:code_projet)");
        $res = $create_project_stage->execute(array(
            "id_etape_projet" => $id_etape_projet,
            "commentaire_etape_projet" => $commentaire_etape_projet,
            "id_user" => $id_user,
            "code_projet" => $_GET['project_number']
        ));

        return $res;
    }

    public function getProjectStage()
    {
        $getProjectStage = $this->Connection->prepare("SELECT projet.code_projet, projet.libelle_projet, projet.date_de_debut_projet, projet.date_de_fin_projet, projet.id_client, client.nom_client, client.prenom_client, user.nom_user, user.prenom_user FROM projet, client, user WHERE projet.id_client = client.id_client AND projet.id_user = user.id_user AND projet.id_user = :id_user");
        $getProjectStage->bindParam(':id_user', $_SESSION['id']);
        $getProjectStage->execute();
        return etapes_projetMETIER::fromFetchAllData($getProjectStage->fetchAll());
    }

    public function getProjectStageHistorical()
    {
        $getProjectStageHistorical = $this->Connection->prepare("SELECT projet.code_projet, projet.libelle_projet, projet.date_de_debut_projet, projet.date_de_fin_projet, projet.id_client, client.nom_client, client.prenom_client, user.nom_user, user.prenom_user FROM projet, client, user WHERE projet.id_client = client.id_client AND projet.id_user = user.id_user AND projet.id_user = :id_user");
        $getProjectStageHistorical->bindParam(':id_user', $_SESSION['id']);
        $getProjectStageHistorical->execute();
        return etapes_projetMETIER::fromFetchAllData($getProjectStageHistorical->fetchAll());
    }
}