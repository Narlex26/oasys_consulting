<?php

namespace controller;

use model\service\projetSERVICE;

class List_projectController extends Controller
{
    public function resolve(): void
    {
        $projetSERVICE = new projetSERVICE();

        $vars = [
            "listProjects" => $projetSERVICE->getProject(),
        ];

        $this->render("list_project", $vars);
    }
}