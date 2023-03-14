<?php

namespace controller;

use model\metier\userMetier;

class List_clientController extends Controller
{
    public function resolve() {
        $clientSERVICE = new \model\service\clientSERVICE();

        $vars = [
            "listClients" => $clientSERVICE->getClient(),
        ];
        $this->render("list_client", $vars);
    }
}