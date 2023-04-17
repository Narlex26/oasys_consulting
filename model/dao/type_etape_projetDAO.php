<?php
namespace model\dao;
use model\metier\type_etape_projetMetier;

date_default_timezone_set('Europe/Paris');
class type_etape_projetDAO
{
    private const TABLE = "etape_projet";
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
        $get_projet_stage = $this->Connection->prepare("SELECT * FROM type_etape_projet");
        $get_projet_stage->execute();
        return type_etape_projetMetier::fromFetchAllData($get_projet_stage->fetchAll());
    }
}