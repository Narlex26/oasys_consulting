<?php

namespace model\metier;

class etapes_projet_historyMetier
{
    private $id_historique_etape_projet;
    private $libelle_etape_projet;
    private $commentaire_etape_projet;
    private $date_etape_projet;
    private $prenom_user;
    private $nom_user;

    // Setters
    public function setId_historique_etape_projet($id_historique_etape_projet) : void {
        $this->id_historique_etape_projet = $id_historique_etape_projet;
    }
    public function setLibelle_etape_projet($libelle_etape_projet) : void {
        $this->libelle_etape_projet = $libelle_etape_projet;
    }
    public function setCommentaire_etape_projet($commentaire_etape_projet) : void {
        $this->commentaire_etape_projet = $commentaire_etape_projet;
    }
    public function setDate_etape_projet($date_etape_projet) : void {
        $this->date_etape_projet = $date_etape_projet;
    }
    public function setPrenom_user($prenom_user) : void {
        $this->prenom_user = $prenom_user;
    }
    public function setNom_user($nom_user) : void {
        $this->nom_user = $nom_user;
    }

    // Getters
    public function getId_historique_etape_projet() {
        return $this->id_historique_etape_projet;
    }
    public function getLibelle_etape_projet() {
        return $this->libelle_etape_projet;
    }
    public function getCommentaire_etape_projet() {
        return $this->commentaire_etape_projet;
    }
    public function getDate_etape_projet() {
        return $this->date_etape_projet;
    }
    public function getPrenom_user() {
        return $this->prenom_user;
    }
    public function getNom_user() {
        return $this->nom_user;
    }

    public static function fromFetchData ($data) : etapes_projet_historyMetier {
        $project_stage_history = new etapes_projet_historyMetier();
        $project_stage_history->setId_historique_etape_projet($data["id_historique_etapes_projet"]);
        $project_stage_history->setLibelle_etape_projet($data["libelle_etape_projet"]);
        $project_stage_history->setCommentaire_etape_projet($data["commentaire_etape_projet"]);
        $project_stage_history->setDate_etape_projet($data["date_add"]);
        $project_stage_history->setPrenom_user($data["prenom_user"]);
        $project_stage_history->setNom_user($data["nom_user"]);

        return $project_stage_history;
    }

    /**
     * Return a list of users from pdo fetch all
     * @return array|etapes_projet_historyMetier[]
     */
    public static function  fromFetchAllData($data) : array
    {
        $tab_project_stage_history = [];
        foreach ($data as $line)
            $tab_project_stage_history[] = etapes_projet_historyMetier::fromFetchData($line);

        return $tab_project_stage_history;
    }
}