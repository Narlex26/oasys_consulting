<?php

namespace controller;

class LoginController extends Controller
{
    public $needAuth = false;

    public function resolve()
    {
        $_SESSION['auth_state'] = false;
        include_once("../view/login.php");
    }

}