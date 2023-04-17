<?php
namespace controller;

abstract class Controller
{
    public bool $needAuth = true;

    public function resolve () : void {
    }

    public function guard (): void
    {
        if ($this->needAuth && $_SESSION['auth_state'] !== true) {
            $this->redirect("connexion");
        }


        if (!isset($_SESSION['auth_state'])) {
            $_SESSION['auth_state'] = false;
        }

    }

    public final function redirect(string $action): void
    {
        header("location:Route.php?action=$action");
        die();
    }

    private function commonVariables(): array
    {
        return isset($_SESSION['id']) ?
            [
            "id" => $_SESSION['id'],
            "email" => $_SESSION['email'],
            "nom" => $_SESSION['nom'],
            "prenom" => $_SESSION['prenom'],
            "role" => $_SESSION['role'],
            ] : [];
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