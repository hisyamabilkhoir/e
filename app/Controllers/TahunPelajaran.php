<?php

namespace App\Controllers;

use App\Models\TahunPelajaranModel;

class TahunPelajaran extends BaseController
{

    protected $tahun_pelajaran;
    public function __construct()
    {
        $this->tahun_pelajaran = new TahunPelajaranModel();
        $this->req = \Config\Services::request();
    }

    public function index()
    {
        return view('dashboard/tahun_pelajaran/index');
    }

    public function tambah()
    {
        $this->tahun_pelajaran->save([
            'tahun_awal' => $this->req->getVar('awal'),
            'tahun_akhir' => $this->req->getVar('akhir')
        ]);
    }
}