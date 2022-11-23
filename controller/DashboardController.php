<?php

namespace controller;

class DashboardController extends Controller
{
    public function resolve()
    {
        $vars = [
            "maVariable" => "Admin"
        ];
        $this->render("dashboard", $vars);
    }
}