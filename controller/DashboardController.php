<?php

namespace controller;

use model\service\clientSERVICE;
use model\service\projetSERVICE;

class DashboardController extends Controller
{
    public function resolve(): void
    {

        $projetSERVICE = new projetSERVICE();
        $clientSERVICE = new clientSERVICE();

        $vars = [
            "nombreProjets" => $projetSERVICE->getNumbersOfProject(),
            "nombreProjetsFini" => $projetSERVICE->getNumbersOfFinishProject(),
            "nombreProjetsEnCours" => $projetSERVICE->getNumbersOfCurrentProject(),
            "nombreClients" => $clientSERVICE->getNumbersOfClient(),
            "pourcentageProjetFini" => $projetSERVICE->getPercentageOfFinishProject(),
        ];
        $this->render("dashboard", $vars);
    }

}