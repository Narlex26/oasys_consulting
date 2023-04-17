<?php

namespace controller;

use model\service\projetSERVICE;

class List_finish_projectController extends Controller
{
    public function resolve(): void
    {
        $projetSERVICE = new projetSERVICE();

        $vars = [
            "listFinishProjects" => $projetSERVICE->getFinishProject(),
        ];

        $this->render("list_finish_project", $vars);
    }
}