<?php

namespace controller;

class DashboardController extends Controller
{
    public function resolve() {

        $projetSERVICE = new \model\service\projetSERVICE();
        $clientSERVICE = new \model\service\clientSERVICE();

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