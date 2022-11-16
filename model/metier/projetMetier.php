<?php
namespace model\metier;

class projetMETIER {
    private $code_projet;
    private $libelle_projet;
    private $date_de_debut_projet;
    private $date_de_fin_projet;
    private $id_client;

    public function __construct() {
    }

    public function __destruct() {
    }

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
    public function setId_client($id_client) : void {
        $this->id_client = $id_client;
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
    public function getId_client() {
        return $this->id_client;
    }
}
?>