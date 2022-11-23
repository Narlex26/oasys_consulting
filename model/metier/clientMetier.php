<?php
namespace model\metier;

class clientMetier {
    private $adresse_mail_client;
    private $nom_client;
    private $prenom_client;
    private $nom_entreprise_client;

    public function __construct() {
    }

    public function __destruct() {
    }

    // Setters
    public function setAdresse_mail_client($adresse_mail_client) : void {
        $this->adresse_mail_client = $adresse_mail_client;
    }
    public function setNom_client($nom_client) : void {
        $this->nom_client = $nom_client;
    }
    public function setPrenom_client($prenom_client) : void {
        $this->prenom_client = $prenom_client;
    }
    public function setNom_entreprise_client($nom_entreprise_client) : void {
        $this->nom_entreprise_client = $nom_entreprise_client;
    }

    // Getters
    public function getAdresse_mail_client() {
        return $this->adresse_mail_client;
    }
    public function getNom_client() {
        return $this->nom_client;
    }
    public function getPrenom_client() {
        return $this->prenom_client;
    }
    public function getNom_entreprise_client() {
        return $this->nom_entreprise_client;
    }
}
?>