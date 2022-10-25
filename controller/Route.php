<?php
    // Prérequis
    require_once("../autoloader.php");
    session_start();

    // Débug
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    // Routage
        if(isset($_GET['action'])) { // Vérification de la présence d'une action
            switch($_GET['action']) { // Vérification du type d'action
                default: // Si aucune action valide -> index
                    header ('Location: ../view/accueil.php');
                    break;

                case "demander_connexion": // L'utilisateur demande la page de connexion
                    // On vérifie que l'utilisateur ne soit pas déjà connecté
                    if ($_SESSION['auth_state'] = true) {
                        header('location:../view/index.php');
                        break;
                    }
                    $_SESSION['auth_state'] = false;
                    header('location:../view/login.php');
                    break;

                case "connexion": // L'utilisateur a cliqué sur "se connecter"
                    // On vérifie que l'utilisateur ne soit pas déjà connecté
                    if ($_SESSION['auth_state'] = true) {
                        header('location:../view/index.php');
                        break;
                    }

                    try {
                        $userSERVICE = new \model\service\userSERVICE();
                    }
                    catch(\Exception $e) {
                        echo "erreur connexion";
                        die();
                    }

                    $connuser = $userSERVICE->connUser($_POST['adresse_mail_client'],$_POST['password_client']);
                    break;

                case "logout":
                    session_destroy();
                    unset($_SESSION);

                    header('location:../view/index.php');

            }
        } else { // Aucune action présente = index
            $_SESSION['controller'] = true;
            header('location:../view/index.php');
            exit;
        }
?>

<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <title>Mixme</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="../view/img/favicon.ico">
</head>
<body>
<div class="container d-flex justify-content-center mt-5">
    <img class="mt-5" height="120" src="../view/img/loading.gif"/>
</div>
<div class="container d-flex justify-content-center mt-3">
    <h2>Chargement en cours ...</h2>
</div>
<div class="container d-flex justify-content-center mt-3">
    <p>La page ne se charge pas ? Cliquez <a href="../view/index.php">ici</a></p>
</div>
</body>
</html>
