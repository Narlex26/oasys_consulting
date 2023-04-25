<?php

namespace model\dao;

use model\metier\etape_projetMetier;

date_default_timezone_set('Europe/Paris');
class etape_projetDAO
{
    private const TABLE = "etape_projet";
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

    public function create_project_stage($project_number,$id_type_etape_projet,$commentaire_etape_projet,$id_user) {
        // Créer une étape de projet dans la table etape_projet
        $create_project_stage = $this->Connection->prepare("INSERT INTO etape_projet (commentaire_etape_projet,date_add,code_projet,id_type_etape_projet ) 
            VALUES (:commentaire_etape_projet,NOW(),:code_projet,:id_type_etape_projet)");
        $res = $create_project_stage->execute(array(
            "commentaire_etape_projet" => $commentaire_etape_projet,
            "code_projet" => $project_number,
            "id_type_etape_projet" => $id_type_etape_projet
        ));

        // Récupérer l'identifiant de l'étape de projet insérée
        $id_etape_projet = $this->Connection->lastInsertId();

        // Créer la liaison entre les users et l'étape de projet la table etape_projet_user
        $value_query = [];
        $params = [];

        foreach ($id_user as $index => $id) {
            $value_query []= " (:id_user$index, :id_etape_projet)";
            $params ["id_user$index"] = intval($id);
        }
        $create_user_linked_to_project_stage = $this->Connection->prepare("INSERT INTO etape_projet_user (id_user, id_etape_projet) VALUES ".implode("," ,$value_query));

        return $create_user_linked_to_project_stage->execute(array_merge(
            $params,
            ["id_etape_projet" => intval($id_etape_projet)]
        ));
    }

    public function getAllProjectStageById($project_number) {
        $getProjectStageById = $this->Connection->prepare("SELECT etape_projet.id_etape_projet, type_etape_projet.libelle_type_etape_projet, etape_projet.commentaire_etape_projet, etape_projet.date_add, etape_projet.date_end, GROUP_CONCAT(CONCAT_WS(' ', user.prenom_user, user.nom_user)SEPARATOR ' - ') as prenom_nom_user
            FROM etape_projet, type_etape_projet, etape_projet_user, user, projet 
            WHERE etape_projet.code_projet = :project_number AND etape_projet.code_projet = projet.code_projet AND etape_projet.id_type_etape_projet = type_etape_projet.id_type_etape_projet  AND etape_projet.id_etape_projet = etape_projet_user.id_etape_projet AND etape_projet_user.id_user = user.id_user 
            GROUP BY etape_projet.id_etape_projet, type_etape_projet.libelle_type_etape_projet, etape_projet.commentaire_etape_projet, etape_projet.date_add, etape_projet.date_end
            ORDER BY etape_projet.date_add DESC;");
        $getProjectStageById->bindParam(':project_number', $project_number);
        $getProjectStageById->execute();
        return etape_projetMetier::fromFetchAllData($getProjectStageById->fetchAll());
    }
}