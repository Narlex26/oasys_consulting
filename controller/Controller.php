<?php
namespace controller;

use model\dao\Connexion;

abstract class Controller
{
    public $needAuth = true;

    public function resolve () {}

    public function guard () {
        if ($this->needAuth && $_SESSION['auth_state'] !== true) {
            header('location:../assets/LoginController.php');
        }

    }
}