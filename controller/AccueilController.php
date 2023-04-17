<?php

namespace controller;

class AccueilController extends Controller
{
    public function resolve(): void
    {
        $this->render("accueil");
    }
}