<?php
namespace controller;

use model\dao\Connexion;

abstract class Controller
{
    public $needAuth = true;

    public function resolve () {}

    public function guard () {
        if ($this->needAuth && $_SESSION['auth_state'] !== true) {
            $this->redirect("connexion");
        }

        if (!isset($_SESSION['auth_state'])) {
            $_SESSION['auth_state'] = false;
        }

    }

    public final function redirect(string $action) {
        header("location:Route.php?action=$action");
        die();
    }

    public final function render(string $view, array $vars = [], bool $print = true)
    {
        $viewPath = "../view/$view.php";
        $output = NULL;
        if(file_exists($viewPath)){
            extract($vars);

            ob_start();
            include $viewPath;
            $output = ob_get_clean();
        }

        if ($print)
            print $output;

        return $output;
    }
}