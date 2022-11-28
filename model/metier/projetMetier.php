<?php
namespace model\metier;

class projetMETIER {
    private $code_projet;
    private $libelle_projet;
    private $date_de_debut_projet;
    private $date_de_fin_projet;
    private $prenom_client;
    private $nom_client;

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

    public static function fromFetchData ($data) : projetMETIER {
        $project = new projetMETIER();
        $project->setCode_projet($data["code_projet"]);
        $project->setLibelle_projet($data["libelle_projet"]);
        $project->setDate_de_debut_projet($data["date_de_debut_projet"]);
        $project->setDate_de_fin_projet($data["date_de_fin_projet"]);
        $project->setPrenom_client($data["prenom_client"]);
        $project->setNom_client($data["nom_client"]);

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