<?php

namespace controller;

class Create_clientController extends Controller
{
    public function resolve()
    {

        if(isset($_POST['adresse_mail_client']) and isset($_POST['nom_client']) and isset($_POST['prenom_client']) and isset($_POST['nom_entreprise'])) {
            try {
                $clientSERVICE = new \model\service\clientSERVICE();
            }
            catch(\Exception $e) {
                echo "impossible de créer le projet";
                die();
            }

            $client_creation = $clientSERVICE->createClient($_POST['adresse_mail_client'],$_POST['nom_client'],$_POST['prenom_client'],$_POST['nom_entreprise']);

            $this->render("create_client", (array)$client_creation);
            $this->redirect("create_client");
        }else{
            $this->render("create_client");
        }

    }
}