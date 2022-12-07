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

            $this->initSessionUserVars($userSERVICE->connUser($_POST['adresse_mail_client'],$_POST['password_client']));

            $this->redirect("dashboard");
        }else{
            $this->initSessionUserVars();
            $this->render("login");
        }
    }

    public function initSessionUserVars(userMETIER $user = null) {
        $is_auth = $user != null && $user->getId_user() > 0;
        $_SESSION['auth_state'] = $is_auth;

        if($is_auth)
        {
            $_SESSION['id'] = $user->getId_user();
            $_SESSION['email'] = $user->getAdresse_mail_user();
            $_SESSION['nom'] = $user->getNom_user();
            $_SESSION['prenom'] = $user->getPrenom_user();
            $_SESSION['type'] = $user->getRole_user();
        }
    }
}