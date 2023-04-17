<?php

namespace controller;

use model\metier\userMetier;
use model\service\userSERVICE;

class LoginController extends Controller
{
    public bool $needAuth = false;

    public function guard(): void
    {
        parent::guard();

        if($_SESSION['auth_state'] === true) {
            $this->redirect("dashboard");
        }
    }

    public function resolve(): void
    {
        if(isset($_POST['adresse_mail_client']) && isset($_POST['password_client'])) {
            try {
                $userSERVICE = new userSERVICE();
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

    public function initSessionUserVars(userMetier $user = null) {
        $is_auth = $user != null && $user->getId_user() > 0;
        $_SESSION['auth_state'] = $is_auth;

        if($is_auth)
        {
            $_SESSION['id'] = $user->getId_user();
            $_SESSION['email'] = $user->getAdresse_mail_user();
            $_SESSION['nom'] = $user->getNom_user();
            $_SESSION['prenom'] = $user->getPrenom_user();
            $_SESSION['role'] = $user->getRole();
        }
    }
}