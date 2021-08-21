<?php

namespace App\Controllers;

use App\Models\KelasModel;
use App\Models\PegawaiModel;
use App\Models\TahunPelajaranModel;

class WaliKelas extends BaseController
{

    protected $kelas;
    protected $tahunPelajaran;
    public function __construct()
    {

        $this->kelas = new KelasModel();
        $this->tahunPelajaran = new TahunPelajaranModel();
        $this->req = \Config\Services::request();
    }

    public function index()
    {
        $tahunActive = $this->tahunPelajaran->getActive('1');
        $data = [
            'kelas' => $this->kelas->where(['id_tahun_pelajaran' => $tahunActive['id']])->findAll(),
            'tahunActive' => $tahunActive,
        ];
        // dd($data['kelas']);
        return view('dashboard/wali_kelas/index', $data);
    }
}
