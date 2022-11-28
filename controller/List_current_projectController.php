<?php

namespace controller;

use model\metier\userMETIER;

class List_current_projectController extends Controller
{
    public function resolve() {
        $projetSERVICE = new \model\service\projetSERVICE();

        $vars = [
            "listCurrentProjects" => $projetSERVICE->getCurrentProject(),
        ];

        $this->render("list_current_project", $vars);
    }
}