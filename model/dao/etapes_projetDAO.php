<?php
namespace model\dao;
use model\metier\etapes_projetMetier;

date_default_timezone_set('Europe/Paris');
class etapes_projetDAO
{
    private const TABLE = "etapes_projet";
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

    public function get_projet_stage()
    {
        $get_projet_stage = $this->Connection->prepare("SELECT * FROM etapes_projet");
        $get_projet_stage->execute();
        return etapes_projetMetier::fromFetchAllData($get_projet_stage->fetchAll());
    }
}