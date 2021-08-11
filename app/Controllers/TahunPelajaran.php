<?php

namespace App\Controllers;

class TahunPelajaran extends BaseController
{
    public function index()
    {
        return view('dashboard/tahun_pelajaran/index');
    }
}
