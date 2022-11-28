<?php
namespace model\dao;
use model\metier\clientMETIER;
use model\metier\projetMETIER;

date_default_timezone_set('Europe/Paris');

class projetDAO
{
    private const TABLE = "projet";
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

    public function __destruct()
    {
    }

    public function createProject($libelle_projet,$date_de_debut_projet,$id_client)
    { // Créer un projet
        $createproject = $this->Connection->prepare("INSERT INTO " . self::TABLE . " (libelle_projet,date_de_debut_projet,id_client)
            VALUES (:libelle_projet,:date_de_debut_projet,:id_client)");
        $res = $createproject->execute(array(
            "libelle_projet" => $libelle_projet,
            "date_de_debut_projet" => $date_de_debut_projet,
            "id_client" => $id_client
        ));

        return $res;
    }

    public function getProject() // Cherche tous les clients pour les afficher lors d'une crétion de projet
    {
        $getProject = $this->Connection->prepare("SELECT projet.code_projet, libelle_projet, date_de_debut_projet, date_de_fin_projet, client.nom_client, client.prenom_client FROM projet, client WHERE projet.id_client = client.id_client");
        $getProject->execute();
        return projetMETIER::fromFetchAllData($getProject->fetchAll());
    }

    public function getCurrentProject()
    {
       $getCurrentProject =  $this->Connection->prepare("SELECT projet.code_projet, libelle_projet, date_de_debut_projet, date_de_fin_projet, client.nom_client, client.prenom_client FROM projet, client WHERE projet.id_client = client.id_client AND date_de_fin_projet IS NULL");
       $getCurrentProject->execute();
        return projetMETIER::fromFetchAllData($getCurrentProject->fetchAll());
    }

    public function getFinishProject()
    {
        $getFinishProject =  $this->Connection->prepare("SELECT projet.code_projet, libelle_projet, date_de_debut_projet, date_de_fin_projet, client.nom_client, client.prenom_client FROM projet, client WHERE projet.id_client = client.id_client AND date_de_fin_projet IS NOT NULL");
        $getFinishProject->execute();
        return projetMETIER::fromFetchAllData($getFinishProject->fetchAll());
    }
}
?>