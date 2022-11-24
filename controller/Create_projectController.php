<?php

namespace controller;

class Create_projectController extends Controller
{
    public function resolve()
    {
        $clientSERVICE = new \model\service\clientSERVICE();

        $vars = [
            "listClients" => $clientSERVICE->getClient(),
            "resultNotification" => false
        ];


        if(isset($_POST['nom_projet']) and isset($_POST['date_debut_projet']) and isset($_POST['id_client']))  {
            try {
                $projetSERVICE = new \model\service\projetSERVICE();
            }
            catch(\Exception $e) {
                echo "impossible de créer le projet";
                die();
            }

            $vars["resultNotification"]  = $projetSERVICE->createProject($_POST['nom_projet'],$_POST['date_debut_projet'],$_POST['id_client']);

            $this->render("create_project", $vars);
            $this->redirect("create_project");
        }else{
            $this->render("create_project", $vars);
        }

    }
}