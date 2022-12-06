<?php
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
                $controllerName = \controller\LoginController::class;
                break;

            case "dashboard":
                $controllerName = \controller\DashboardController::class;
                break;

            case "create_project":
                $controllerName = \controller\Create_projectController::class;
                break;

            case "create_client":
                $controllerName = \controller\Create_clientController::class;
                break;

            case "list_project":
                $controllerName = \controller\List_projectController::class;
                break;

            case "list_current_project":
                $controllerName = \controller\List_current_projectController::class;
                break;

            case "list_finish_project":
                $controllerName = \controller\List_finish_projectController::class;
                break;

            case "list_client":
                $controllerName = \controller\List_clientController::class;
                break;

            case "logout":
                session_destroy();
                unset($_SESSION);
                $controllerName = \controller\AccueilController::class;
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

