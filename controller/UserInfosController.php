<?php

namespace controller;

class UserInfosController extends Controller
{
    public function resolve(): void
    {
        $this->render("user_infos");
    }
}