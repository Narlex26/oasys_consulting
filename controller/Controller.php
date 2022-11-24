<?php
namespace controller;

use model\dao\Connexion;

abstract class Controller
{
    public $needAuth = true;

    public function resolve () {
    }

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

    private function commonVariables(): array
    {
        return [
            "email" => $_SESSION['email'],
            "nom" => $_SESSION['nom'],
            "prenom" => $_SESSION['prenom'],
        ];
    }

    public final function render(string $view, array $vars = [], bool $print = true)
    {
        $viewPath = "../view/$view.php";
        $output = NULL;
        $allVars = array_merge($this->commonVariables(), $vars);

        if(file_exists($viewPath)){
            extract($allVars);

            ob_start();
            include $viewPath;
            $output = ob_get_clean();
        }

        if ($print)
            print $output;

        return $output;
    }
}