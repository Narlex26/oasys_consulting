<?php

namespace controller;

use model\service\etape_projetSERVICE;

class ProjectController extends Controller
{
    public function resolve() {
        $projetSERVICE = new \model\service\projetSERVICE();
        $clientSERVICE = new \model\service\clientSERVICE();
        $userSERVICE = new \model\service\userSERVICE();
        $type_etape_projetSERVICE = new \model\service\type_etape_projetSERVICE();
        $etape_projet_SERVICE = new \model\service\etape_projetSERVICE();

        $vars = [
            "listUsers" => $userSERVICE->getUser(),
            "listProjectStageType" => $type_etape_projetSERVICE->get_projet_stage_type(),
        ];

        if(isset($_POST['project_number']) && isset($_POST['id_type_etape_projet']) && isset($_POST['commentaire_etape_projet']) && isset($_POST['id_user'])) {
            try {
                $etape_projet_SERVICE = new \model\service\etape_projetSERVICE();
            }
            catch(\Exception $e) {
                echo "impossible de créer l'étape de projet";
                die();
            }

            $etape_projet_SERVICE->create_project_stage($_POST['project_number'],$_POST['id_type_etape_projet'],$_POST['commentaire_etape_projet'],$_POST['id_user']);

                $vars["infosProjects"] = $projetSERVICE->getProjectById($_POST['project_number']);
                $vars["infosClients"] = $clientSERVICE->getClientByProjectId($_POST['project_number']);
                $vars["listProjectStage"] = $etape_projet_SERVICE->getAllProjectStageById($_POST['project_number']);
            $this->render("project", $vars);

        } else {

                $vars["infosProjects"] = $projetSERVICE->getProjectById($_GET['project_number']);
                $vars["infosClients"] = $clientSERVICE->getClientByProjectId($_GET['project_number']);
                $vars["listProjectStage"] = $etape_projet_SERVICE->getAllProjectStageById($_GET['project_number']);

            $this->render("project", $vars);
        }
    }
}