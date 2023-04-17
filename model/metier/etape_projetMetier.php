<?php
namespace model\Metier;

class etape_projetMetier
{
    private $id_historique_etape_projet;
    private $libelle_etape_projet;
    private $commentaire_etape_projet;
    private $date_add_etape_projet;
    private $date_end_etape_projet;
    private $prenom_nom_user;

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
    public function setDate_add_etape_projet($date_add_etape_projet) : void {
        $this->date_add_etape_projet = $date_add_etape_projet;
    }
    public function setDate_end_etape_projet($date_end_etape_projet) : void {
        $this->date_end_etape_projet = $date_end_etape_projet;
    }
    public function setPrenom_Nom_user($prenom_nom_user) : void {
        $this->prenom_nom_user = $prenom_nom_user;
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
    public function getDate_add_etape_projet() {
        return $this->date_add_etape_projet;
    }
    public function getDate_end_etape_projet() {
        return $this->date_end_etape_projet;
    }
    public function getPrenom_Nom_user() {
        return $this->prenom_nom_user;
    }

    public static function fromFetchData ($data) : etape_projetMetier {
        $project_stage = new etape_projetMetier();
        $project_stage->setId_historique_etape_projet($data["id_etape_projet"]);
        $project_stage->setLibelle_etape_projet($data["libelle_type_etape_projet"]);
        $project_stage->setCommentaire_etape_projet($data["commentaire_etape_projet"]);
        $project_stage->setDate_add_etape_projet($data["date_add"]);
        $project_stage->setDate_end_etape_projet($data["date_end"]);
        $project_stage->setPrenom_Nom_user($data["prenom_nom_user"]);

        return $project_stage;
    }

    /**
     * Return a list of users from pdo fetch all
     * @return array|etape_projetMetier[]
     */
    public static function  fromFetchAllData($data) : array
    {
        $tab_project_stage_history = [];
        foreach ($data as $line)
            $tab_project_stage_history[] = etape_projetMetier::fromFetchData($line);

        return $tab_project_stage_history;
    }
}