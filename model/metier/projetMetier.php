<?php
namespace model\metier;

class projetMETIER {
    private $code_projet;
    private $libelle_projet;
    private $date_de_debut_projet;
    private $date_de_fin_projet;
    private $prenom_client;
    private $nom_client;
    private $prenom_gestionnaire_projet;
    private $nom_gestionnaire_projet;
    private $nombre_projet;

    // Setters
    public function setCode_projet($code_projet) : void {
        $this->code_projet = $code_projet;
    }
    public function setLibelle_projet($libelle_projet) : void {
        $this->libelle_projet = $libelle_projet;
    }
    public function setDate_de_debut_projet($date_de_debut_projet) : void {
        $this->date_de_debut_projet = $date_de_debut_projet;
    }
    public function setDate_de_fin_projet($date_de_fin_projet) : void {
        $this->date_de_fin_projet = $date_de_fin_projet;
    }
    public function setPrenom_client($prenom_client) : void {
        $this->prenom_client = $prenom_client;
    }
    public function setNom_client($nom_client) : void {
        $this->nom_client = $nom_client;
    }
    public function setPrenom_gestionnaire_projet($prenom_gestionnaire_projet) : void {
        $this->prenom_gestionnaire_projet = $prenom_gestionnaire_projet;
    }
    public function setNom_gestionnaire_projet($nom_gestionnaire_projet) : void {
        $this->nom_gestionnaire_projet = $nom_gestionnaire_projet;
    }
    public function setNombre_projet($nombre_projet) : void {
        $this->nombre_projet = $nombre_projet;
    }

    // Getters
    public function getCode_projet() {
        return $this->code_projet;
    }
    public function getLibelle_projet() {
        return $this->libelle_projet;
    }
    public function getDate_de_debut_projet() {
        return $this->date_de_debut_projet;
    }
    public function getDate_de_fin_projet() {
        return $this->date_de_fin_projet;
    }
    public function getPrenom_client() {
        return $this->prenom_client;
    }
    public function getNom_client() {
        return $this->nom_client;
    }
    public function getPrenom_gestionnaire_projet() {
        return $this->prenom_gestionnaire_projet;
    }
    public function getNom_gestionnaire_projet() {
        return $this->nom_gestionnaire_projet;
    }
    public function getNombre_projet() {
        return $this->nombre_projet;
    }

    public static function fromFetchData ($data) : projetMETIER {
        $project = new projetMETIER();
        $project->setCode_projet($data["code_projet"]);
        $project->setLibelle_projet($data["libelle_projet"]);
        $project->setDate_de_debut_projet($data["date_de_debut_projet"]);
        $project->setDate_de_fin_projet($data["date_de_fin_projet"]);
        $project->setPrenom_client($data["prenom_client"]);
        $project->setNom_client($data["nom_client"]);
        $project->setPrenom_gestionnaire_projet($data["prenom_user"]);
        $project->setNom_gestionnaire_projet($data["nom_user"]);

        return $project;
    }

    /**
     * Return a list of users from pdo fetch all
     * @return array|projetMETIER[]
     */
    public static function  fromFetchAllData($data) : array
    {
        $tab_project = [];
        foreach ($data as $line)
            $tab_project[] = projetMETIER::fromFetchData($line);

        return $tab_project;
    }
}
?>