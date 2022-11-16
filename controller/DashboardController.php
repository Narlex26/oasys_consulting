<?php

namespace controller;

class DashboardController extends Controller
{
    public function resolve()
    {
        $vars = [
            "maVariable" => "Salut TOi"
        ];
        $this->render("dashboard", $vars);
    }
}