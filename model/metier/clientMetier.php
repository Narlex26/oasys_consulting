<?php
namespace model\metier;

class clientMETIER {
    private $adresse_mail_client;
    private $nom_client;
    private $prenom_client;
    private $nom_entreprise_client;

    // Setters
    public function setId_client($id_client) : void {
        $this->id_client = $id_client;
    }
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
    public function getId_client() {
        return $this->id_client;
    }
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

    public static function fromFetchData ($data) : clientMETIER {
        $client = new clientMETIER();
        $client->setId_client($data["id_client"]);
        $client->setAdresse_mail_client($data["adresse_mail_client"]);
        $client->setNom_client($data["nom_client"]);
        $client->setPrenom_client($data["prenom_client"]);
        $client->setNom_entreprise_client($data["nom_entreprise_client"]);

        return $client;
    }

    /**
     * Return a list of users from pdo fetch all
     * @return array|clientMETIER[]
     */
    public static function  fromFetchAllData($data) : array
    {
        $tab_client = [];
        foreach ($data as $line)
            $tab_client[] = clientMETIER::fromFetchData($line);

        return $tab_client;
    }
}
?>