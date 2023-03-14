<?php

namespace controller;

use model\metier\userMetier;

class List_finish_projectController extends Controller
{
    public function resolve() {
        $projetSERVICE = new \model\service\projetSERVICE();

        $vars = [
            "listFinishProjects" => $projetSERVICE->getFinishProject(),
        ];

        $this->render("list_finish_project", $vars);
    }
}