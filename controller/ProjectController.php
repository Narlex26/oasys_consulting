<?php

namespace controller;

class ProjectController extends Controller
{
    public function resolve() {
        $projetSERVICE = new \model\service\projetSERVICE();
        $clientSERVICE = new \model\service\clientSERVICE();
        $userSERVICE = new \model\service\userSERVICE();

        $vars = [
            "infosProjects" => $projetSERVICE->getProjectById(),
            "infosClients" => $clientSERVICE->getClientByProjectId(),
            "listUsers" => $userSERVICE->getUser(),
        ];

        if(isset($_POST['id_etape_projet']) && isset($_POST['commentaire_etape_projet']) && isset($_POST['id_user']) )  {
            try {
                $etapes_projetSERVICE = new \model\service\etapes_projetSERVICE();
            }
            catch(\Exception $e) {
                echo "impossible de créer l'étape de projet";
                die();
            }

            $etapes_projetSERVICE->create_project_stage($_POST['id_etape_projet'],$_POST['commentaire_etape_projet'],$_POST['id_user']);

            $this->render("project", $vars);
            $this->redirect("project", $vars);
        }else{
            $this->render("project", $vars);
        }
    }
}