<?php
namespace model\Metier;

class type_etape_projetMetier
{
    private $id_etape_projet;
    private $libelle_etape_projet;

    // Setters
    public function setId_etape_projet($id_etape_projet) : void {
        $this->id_etape_projet = $id_etape_projet;
    }
    public function setLibelle_etape_projet($libelle_etape_projet) : void {
        $this->libelle_etape_projet = $libelle_etape_projet;
    }


    // Getters
    public function getId_etape_projet() {
        return $this->id_etape_projet;
    }
    public function getLibelle_etape_projet() {
        return $this->libelle_etape_projet;
    }

    public static function fromFetchData ($data) : type_etape_projetMetier {
        $project_stage = new type_etape_projetMetier();
        $project_stage->setId_etape_projet($data["id_type_etape_projet"]);
        $project_stage->setLibelle_etape_projet($data["libelle_type_etape_projet"]);

        return $project_stage;
    }

    /**
     * Return a list of Project Stage from pdo fetch all
     * @return array|type_etape_projetMetier[]
     */
    public static function  fromFetchAllData($data) : array
    {
        $tab_project_stage = [];
        foreach ($data as $line)
            $tab_project_stage[] = type_etape_projetMetier::fromFetchData($line);

        return $tab_project_stage;
    }
}