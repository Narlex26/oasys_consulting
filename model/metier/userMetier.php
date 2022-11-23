<?php
namespace model\metier;

class userMETIER {
    private $adresse_mail_user;
    private $password_user;
    private $nom_user;
    private $prenom_user;
    private $nom_entreprise_user;

    public function __construct() {
    }

    public function __destruct() {
    }

    // Setters
    public function setAdresse_mail_user($adresse_mail_user) : void {
        $this->adresse_mail_user = $adresse_mail_user;
    }
    public function setPassword_user($password_user) : void {
        $this->password_user = $password_user;
    }
    public function setNom_user($nom_user) : void {
        $this->nom_user = $nom_user;
    }
    public function setPrenom_user($prenom_user) : void {
        $this->prenom_user = $prenom_user;
    }
    public function setNom_entreprise_user($nom_entreprise_user) : void {
        $this->nom_entreprise_user = $nom_entreprise_user;
    }

    // Getters
    public function getAdresse_mail_user() {
        return $this->adresse_mail_user;
    }
    public function getPassword_user() {
        return $this->password_user;
    }
    public function getNom_user() {
        return $this->nom_user;
    }
    public function getPrenom_user() {
        return $this->prenom_user;
    }
    public function getNom_entreprise_user() {
        return $this->nom_entreprise_user;
    }
}
?>