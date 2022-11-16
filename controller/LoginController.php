<?php

namespace controller;

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

            $_SESSION['auth_state'] = $userSERVICE->connUser($_POST['adresse_mail_client'],$_POST['password_client']);
            $this->redirect("dashboard");
        }else{
            $_SESSION['auth_state'] = false;
            $this->render("login");
        }
    }

}