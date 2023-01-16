<?php

namespace controller;

use model\service\etapes_projet_historySERVICE;

class ProjectController extends Controller
{
    public function resolve() {
        $projetSERVICE = new \model\service\projetSERVICE();
        $clientSERVICE = new \model\service\clientSERVICE();
        $userSERVICE = new \model\service\userSERVICE();
        $etapes_projetSERVICE = new \model\service\etapes_projetSERVICE();
        $etapes_projet_historySERVICE = new \model\service\etapes_projet_historySERVICE();

        $vars = [
            "listUsers" => $userSERVICE->getUser(),
            "listProjectStage" => $etapes_projetSERVICE->get_projet_stage(),
        ];

        if(isset($_POST['project_number']) && isset($_POST['id_etape_projet']) && isset($_POST['commentaire_etape_projet']) && isset($_POST['id_user'])) {
            try {
                $etapes_projet_historySERVICE = new \model\service\etapes_projet_historySERVICE();
            }
            catch(\Exception $e) {
                echo "impossible de créer l'étape de projet";
                die();
            }

            $etapes_projet_historySERVICE->create_project_stage_history($_POST['project_number'],$_POST['id_etape_projet'],$_POST['commentaire_etape_projet'],$_POST['id_user']);

            $vars["infosProjects"] = $projetSERVICE->getProjectById($_POST['project_number']);
            $vars["infosClients"] = $clientSERVICE->getClientByProjectId($_POST['project_number']);
            $vars["listProjectStageHistory"] = $etapes_projet_historySERVICE->getProjectStageHistoryById($_POST['project_number']);
            $this->render("project", $vars);
        }else{
            $vars["infosProjects"] = $projetSERVICE->getProjectById($_GET['project_number']);
            $vars["infosClients"] = $clientSERVICE->getClientByProjectId($_GET['project_number']);
            $vars["listProjectStageHistory"] = $etapes_projet_historySERVICE->getProjectStageHistoryById($_GET['project_number']);
            $this->render("project", $vars);
        }
    }
}