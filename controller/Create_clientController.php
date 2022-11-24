<?php

namespace controller;

class Create_clientController extends Controller
{
    public function resolve()
    {

        $vars = [
            "resultNotification" => false,
        ];

        if(isset($_POST['adresse_mail_client']) and isset($_POST['nom_client']) and isset($_POST['prenom_client']) and isset($_POST['nom_entreprise'])) {
            $clientSERVICE = new \model\service\clientSERVICE();

            $vars["resultNotification"] = $clientSERVICE->createClient($_POST['adresse_mail_client'],$_POST['nom_client'],$_POST['prenom_client'],$_POST['nom_entreprise']);

            $this->render("create_client", $vars);
            $this->redirect("create_client");
        }else{
            $this->render("create_client", $vars);
        }

    }
}