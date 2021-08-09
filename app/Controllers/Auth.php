<?php

namespace App\Controllers;

class Auth extends BaseController
{
    public function index()
    {
        //echo "hai";
        return view("auth/login");
    }
}