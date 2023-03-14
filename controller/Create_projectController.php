<?php

namespace controller;

class Create_projectController extends Controller
{
    public function resolve()
    {
        $clientSERVICE = new \model\service\clientSERVICE();
        $userSERVICE = new \model\service\userSERVICE();

        $vars = [
            "listClients" => $clientSERVICE->getClient(),
            "listChefDeProjet" => $userSERVICE->getChefDeProjet(),
            "resultNotification" => false
        ];

        if(isset($_POST['nom_projet']) && isset($_POST['date_debut_projet']) && isset($_POST['id_client']) && isset($_POST['id_user']))  {
            try {
                $projetSERVICE = new \model\service\projetSERVICE();
            }
            catch(\Exception $e) {
                echo "impossible de créer le projet";
                die();
            }

            $vars["resultNotification"]  = $projetSERVICE->createProject($_POST['nom_projet'],$_POST['date_debut_projet'],$_POST['id_client'],$_POST['id_user']);

            $this->render("create_project", $vars);
            $this->redirect("create_project");
        }else{
            $this->render("create_project", $vars);
        }

    }
}