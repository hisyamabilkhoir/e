<?php

namespace App\Controllers;

class AuthController extends BaseController
{
    public function index()
    {
        //echo "hai";
        return view("auth/login");
    }
}