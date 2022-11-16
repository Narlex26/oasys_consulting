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
                $controllerName = \controller\LoginController::class;
                break;

            case "connexion": // L'utilisateur a cliqué sur "se connecter"
                // On vérifie que l'utilisateur ne soit pas déjà connecté
                if ($_SESSION['auth_state'] == true) {
                    header('location:../assets/index.php');
                    break;
                }

                try {
                    $userSERVICE = new \model\service\userSERVICE();
                }
                catch(\Exception $e) {
                    echo "erreur connexion";
                    die();
                }

                $_SESSION['auth_state'] = $userSERVICE->connUser($_POST['adresse_mail_client'],$_POST['password_client']);

                header('location:../assets/index.php');
                break;

            case "logout":
                session_destroy();
                unset($_SESSION);
                header('location:../assets/accueil.php');
                break;

            case "":
            default :
            $_SESSION['controller'] = true;
            header('location:../assets/accueil.php');
            break;
        }

        $controller = new $controllerName();
        $controller->guard();
        $controller->resolve();
?>

