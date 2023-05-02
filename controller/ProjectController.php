<?php

namespace controller;

use Exception;
use model\service\clientSERVICE;
use model\service\etape_projetSERVICE;
use model\service\projetSERVICE;
use model\service\type_etape_projetSERVICE;
use model\service\userSERVICE;

class ProjectController extends Controller
{
    public function resolve(): void
    {

        $projetSERVICE = new projetSERVICE();
        $clientSERVICE = new clientSERVICE();
        $userSERVICE = new userSERVICE();
        $etape_projet_SERVICE = new etape_projetSERVICE();
        $type_etape_projetSERVICE = new type_etape_projetSERVICE();

        $projectNumber = $_POST['project_number'] ?? $_GET['project_number'] ?? null;

        if (!$projectNumber) {
            // si le numéro de projet n'est pas fourni dans POST ou GET
            // afficher une erreur ou rediriger vers une page d'erreur
            $this->render("404");
        }

        $vars = [
            "infosProjects" => $projetSERVICE->getProjectById($projectNumber),
            "infosClients" => $clientSERVICE->getClientByProjectId($projectNumber),
            "listProjectStage" => $etape_projet_SERVICE->getAllProjectStageById($projectNumber),
            "listUsers" => $userSERVICE->getAllUser(),
            "listProjectStageType" => $type_etape_projetSERVICE->get_projet_stage_type()
        ];

        if (isset($_POST['id_type_etape_projet'], $_POST['commentaire_etape_projet'], $_POST['id_user'])) {
            try {
                $etape_projet_SERVICE->create_project_stage(
                    $projectNumber,
                    $_POST['id_type_etape_projet'],
                    $_POST['commentaire_etape_projet'],
                    $_POST['id_user']
                );

                // Rediriger vers l'URL de départ
                header("Location: ../controller/Route.php?action=project&project_number=$projectNumber");
                exit;
            } catch (Exception $e) {
                // afficher une erreur ou rediriger vers une page d'erreur
                die("Impossible de créer l'étape de projet : " . $e->getMessage());
            }
        }

        if (isset($_POST['id_etape_projet'], $_POST['date_end_project_stage'])) {
            try {
                $etape_projet_SERVICE->end_project_stage(
                    $_POST['id_etape_projet'],
                    $_POST['date_end_project_stage']
                );

                //Rediriger vers l'URL de départ
                header("Location: ../controller/Route.php?action=project&project_number=$projectNumber");
                exit;
            } catch (Exception $e) {
                // afficher une erreur ou rediriger vers une page d'erreur
                die("Impossible de finir l'étape de projet : " . $e->getMessage());
            }
        }

        $this->render("project", $vars);
    }
}