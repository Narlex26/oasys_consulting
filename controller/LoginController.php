<?php

namespace controller;

use model\metier\userMETIER;

class LoginController extends Controller
{
    public $needAuth = false;

    public function guard()
    {
        parent::guard();

        if($_SESSION['auth_state'] === true) {
            $this->redirect("dashboard");
        }
    }

    public function resolve()
    {
        if(isset($_POST['adresse_mail_client']) && isset($_POST['password_client'])) {
            try {
                $userSERVICE = new \model\service\userSERVICE();
            }
            catch(\Exception $e) {
                echo "erreur connexion";
                die();
            }

            $this->initSessionVars($userSERVICE->connUser($_POST['adresse_mail_client'],$_POST['password_client']));

            $this->redirect("dashboard");
        }else{
            $this->initSessionVars();
            $this->render("login");
        }
    }

    public function initSessionVars(userMETIER $user = null) {
        $_SESSION['auth_state'] = $user != null;
        if($user != null)
        {
            $_SESSION['email'] = $user->getAdresse_mail_user();
            $_SESSION['nom'] = $user->getNom_user();
            $_SESSION['prenom'] = $user->getPrenom_user();
        }
    }
}