<?php
namespace model\dao;
use model\metier\clientMetier;

date_default_timezone_set('Europe/Paris');

class clientDAO {
    private const TABLE = "client";
    private $Connection;

    public function __construct()
    {
        try {
            $hconnection=new Connexion();
            $this->Connection=$hconnection->getConnection();
        }
        catch (\Exception $e) {
            throw new \Exception('Impossible d\'établir la connexion à la BD.');
        }
    }

    public function __destruct() {
    }

    public function createClient($adresse_mail_client,$nom_client,$prenom_client,$nom_entreprise_client) { // Crée un client
        $createclient = $this->Connection->prepare("INSERT INTO ".self::TABLE." (adresse_mail_client,nom_client,prenom_client,nom_entreprise_client)
            VALUES (:adresse_mail_client,:nom_client,:prenom_client,:nom_entreprise_client)");
        $res = $createclient->execute(array(
            "adresse_mail_client"=>$adresse_mail_client,
            "nom_client"=>$nom_client,
            "prenom_client"=>$prenom_client,
            "nom_entreprise_client"=>$nom_entreprise_client
        ));

        return $res;
    }

    public function getClient() // Cherche tous les clients pour les afficher lors d'une crétion de projet
    {
        $getClient = $this->Connection->prepare("SELECT * FROM `client`");
        $getClient->execute();
        return clientMETIER::fromFetchAllData($getClient->fetchAll());
    }
}
?>