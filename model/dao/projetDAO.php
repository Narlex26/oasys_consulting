<?php
namespace model\dao;
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
}
?>