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

    public function createProject($libelle_projet,$date_de_debut_projet,$id_client,$id_user)
    { // Créer un projet
        $createproject = $this->Connection->prepare("INSERT INTO " . self::TABLE . " (libelle_projet,date_de_debut_projet,id_client,id_user)
            VALUES (:libelle_projet,:date_de_debut_projet,:id_client,:id_user)");
        $res = $createproject->execute(array(
            "libelle_projet" => $libelle_projet,
            "date_de_debut_projet" => $date_de_debut_projet,
            "id_client" => $id_client,
            "id_user" => $id_user
        ));

        return $res;
    }

    public function getProject() // Cherche tous les projet pour les afficher
    {
        $getProject = $this->Connection->prepare("SELECT projet.code_projet, projet.libelle_projet, projet.date_de_debut_projet, projet.date_de_fin_projet, projet.id_client, client.nom_client, client.prenom_client, user.nom_user, user.prenom_user FROM projet, client, user WHERE projet.id_client = client.id_client AND projet.id_user = user.id_user AND projet.id_user = :id_user");
        $getProject->bindParam(':id_user', $_SESSION['id']);
        $getProject->execute();
        return projetMETIER::fromFetchAllData($getProject->fetchAll());
    }

    public function getProjectById() // Cherche le projet choisi a afficher
    {
        $getProjectById = $this->Connection->prepare("SELECT projet.code_projet, projet.libelle_projet, projet.date_de_debut_projet, projet.date_de_fin_projet, projet.id_client, client.nom_client, client.prenom_client, user.nom_user, user.prenom_user FROM projet, client, user WHERE projet.id_client = client.id_client AND projet.id_user = user.id_user AND projet.code_projet = :id_projet");
        $getProjectById->bindParam(':id_projet', $_GET['project_number']);
        $getProjectById->execute();
        return projetMETIER::fromFetchAllData($getProjectById->fetchAll());
    }

    public function getCurrentProject()
    {
       $getCurrentProject =  $this->Connection->prepare("SELECT projet.code_projet, libelle_projet, date_de_debut_projet, date_de_fin_projet, client.nom_client, client.prenom_client, user.nom_user, user.prenom_user FROM projet, client, user WHERE projet.id_client = client.id_client AND projet.id_user = user.id_user AND projet.id_user = :id_user AND date_de_fin_projet IS NULL");
       $getCurrentProject->bindParam(':id_user', $_SESSION['id']);
       $getCurrentProject->execute();
        return projetMETIER::fromFetchAllData($getCurrentProject->fetchAll());
    }

    public function getFinishProject()
    {
        $getFinishProject =  $this->Connection->prepare("SELECT projet.code_projet, libelle_projet, date_de_debut_projet, date_de_fin_projet, client.nom_client, client.prenom_client, user.nom_user, user.prenom_user FROM projet, client, user WHERE projet.id_client = client.id_client AND projet.id_user = user.id_user AND projet.id_user = :id_user  AND date_de_fin_projet IS NOT NULL");
        $getFinishProject->bindParam(':id_user', $_SESSION['id']);
        $getFinishProject->execute();
        return projetMETIER::fromFetchAllData($getFinishProject->fetchAll());
    }

    public function getNumbersOfProject() // Affiche le nombre de projet total
    {
        $getNumbersOfProject = $this->Connection->prepare("SELECT COUNT(*) FROM projet");
        $getNumbersOfProject->execute();
        return $getNumbersOfProject->fetch();
    }

    public function getNumbersOfCurrentProject() // Affiche le nombre de projet en cours
    {
        $getNumbersOfCurrentProject = $this->Connection->prepare("SELECT COUNT(*) FROM projet WHERE date_de_fin_projet IS NULL");
        $getNumbersOfCurrentProject->execute();
        $getNumbersOfCurrentProject = $getNumbersOfCurrentProject->fetch();
        return (int) $getNumbersOfCurrentProject[0];
    }

    public function getNumbersOfFinishProject() // Affiche le nombre de projet fini
    {
        $getNumbersOfFinishProject = $this->Connection->prepare("SELECT COUNT(*) FROM projet WHERE date_de_fin_projet IS NOT NULL");
        $getNumbersOfFinishProject->execute();
        $getNumbersOfFinishProject = $getNumbersOfFinishProject->fetch();
        return (int) $getNumbersOfFinishProject[0];
    }

    public function getPercentageOfCurrentProject() // Affiche le pourcentage de projet en cours
    {
        $getPercentageOfCurrentProject = $this->Connection->prepare("SELECT (SELECT COUNT(*) FROM projet WHERE date_de_fin_projet IS NULL) * 100 / (SELECT COUNT(*) FROM projet)");
        $getPercentageOfCurrentProject->execute();
        $getPercentageOfCurrentProject = $getPercentageOfCurrentProject->fetch();
        return (int) $getPercentageOfCurrentProject[0];
    }

    public function getPercentageOfFinishProject() // Affiche le pourcentage de projet fini
    {
        $getPercentageOfFinishProject = $this->Connection->prepare("SELECT (SELECT COUNT(*) FROM projet WHERE date_de_fin_projet IS NOT NULL) * 100 / (SELECT COUNT(*) FROM projet)");
        $getPercentageOfFinishProject->execute();
        $getPercentageOfFinishProject = $getPercentageOfFinishProject->fetch();
        return (int) $getPercentageOfFinishProject[0];
    }
}
?>