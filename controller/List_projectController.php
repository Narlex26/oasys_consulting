<?php

namespace controller;

use model\metier\userMETIER;

class List_projectController extends Controller
{
    public function resolve() {
        $projetSERVICE = new \model\service\projetSERVICE();

        $vars = [
            "listProjects" => $projetSERVICE->getProject(),
        ];

        $this->render("list_project", $vars);
    }
}