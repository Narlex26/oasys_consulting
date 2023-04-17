<?php

namespace controller;

use model\service\projetSERVICE;

class List_current_projectController extends Controller
{
    public function resolve(): void
    {
        $projetSERVICE = new projetSERVICE();

        $vars = [
            "listCurrentProjects" => $projetSERVICE->getCurrentProject(),
        ];

        $this->render("list_current_project", $vars);
    }
}