<?php

namespace controller;

use model\metier\userMETIER;

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