<?php

namespace App\Controllers;

class Kelas extends BaseController
{



    public function index()
    {
        $data = [
            ""
        ];
        return view('dashboard/kelas/index');
    }
}
