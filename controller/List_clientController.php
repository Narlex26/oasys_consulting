<?php

namespace controller;

use model\service\clientSERVICE;

class List_clientController extends Controller
{
    public function resolve(): void
    {
        $clientSERVICE = new clientSERVICE();

        $vars = [
            "listClients" => $clientSERVICE->getClient(),
        ];

        if(isset($_POST['id_client']) and isset($_POST['adresse_mail_client']) and isset($_POST['nom_client']) and isset($_POST['prenom_client']) and isset($_POST['nom_entreprise'])) {
            $clientSERVICE = new clientSERVICE();

            $clientSERVICE->modifyClient($_POST['id_client'],$_POST['adresse_mail_client'],$_POST['nom_client'],$_POST['prenom_client'],$_POST['nom_entreprise']);

            $this->redirect("list_client");

        }else{
            $this->render("list_client", $vars);
        }
    }
}