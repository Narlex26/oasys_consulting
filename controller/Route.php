<?php

use controller\AccueilController;
use controller\Create_clientController;
use controller\Create_projectController;
use controller\DashboardController;
use controller\List_clientController;
use controller\List_current_projectController;
use controller\List_finish_projectController;
use controller\List_projectController;
use controller\LoginController;
use controller\ProjectController;
use controller\UserInfosController;
use controller\UserSettingsController;

// Prérequis
require_once("../autoloader.php");
    session_start();

    // Débug
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Routage
        $action = $_GET['action'] ?? "";
        $controllerName = "";

        switch($action) { // Vérification du type d'action
            case "demander_connexion": // L'utilisateur demande la page de connexion
            case "connexion":
                $controllerName = LoginController::class;
                break;

            case "dashboard":
                $controllerName = DashboardController::class;
                break;

            case "user_infos":
                $controllerName = UserInfosController::class;
                break;

            case "modify_user_infos": // L'utilisateur veut modifier ses infos perso
            case "modify_user_password": // L'utilisateur veut modifier son mot de passe
            case "user_settings":
                $controllerName = UserSettingsController::class;
                break;

            case "create_project_stage":
            case "project":
                $controllerName = ProjectController::class;
                break;

            case "create_project":
                $controllerName = Create_projectController::class;
                break;

            case "create_client":
                $controllerName = Create_clientController::class;
                break;

            case "list_project":
                $controllerName = List_projectController::class;
                break;

            case "list_current_project":
                $controllerName = List_current_projectController::class;
                break;

            case "list_finish_project":
                $controllerName = List_finish_projectController::class;
                break;

            case "modify_client":
            case "list_client":
                $controllerName = List_clientController::class;
                break;

            case "logout":
                session_destroy();
                unset($_SESSION);
                $controllerName = AccueilController::class;
                break;

            default :
            $_SESSION['controller'] = true;
            header('location:../view/accueil.php');
            break;
        }

        $controller = new $controllerName();
        $controller->guard();
        $controller->resolve();
?>

