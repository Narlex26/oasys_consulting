<?php

namespace controller;

class DashboardController extends Controller
{
    public function resolve() {

        $projetSERVICE = new \model\service\projetSERVICE();
        $clientSERVICE = new \model\service\clientSERVICE();

        $vars = [
            "nombreProjets" => $projetSERVICE->getNumbersOfProject(),
            "nombreClients" => $clientSERVICE->getNumbersOfClient(),
            "pourcentageProjetFini" => $projetSERVICE->getPercentageOfFinishProject(),
        ];
        $this->render("dashboard", $vars);
    }

}