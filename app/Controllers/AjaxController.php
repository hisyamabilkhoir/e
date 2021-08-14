<?php

namespace App\Controllers;

use App\Models\TahunPelajaranModel;
use App\Models\PegawaiModel;

class AjaxController extends BaseController
{
    protected $tahun_pelajaran;
    protected $pegawai;
    public function __construct()
    {
        $this->tahun_pelajaran = new TahunPelajaranModel();
        $this->pegawai = new PegawaiModel();
        $this->req = \Config\Services::request();
    }

    public function index()
    {
        $data = [];
        return view('dashboard/tahun_pelajaran/index', $data);
    }

    public function edit_tahun_pelajaran()
    {
        // $year = Year::where("id",)->first();
        $tahunPelajaran = $this->req->getVar('id');
        // dd($tahunPelajaran);
        $data = [
            "tahunPelajaran" => $this->tahun_pelajaran->getTahunPelajaran($tahunPelajaran),
        ];
        return view("ajaxs/form_edit_tahun_pelajaran", $data);
    }

    public function edit_pegawai()
    {
        // $year = Year::where("id",)->first();
        $kode = $this->req->getVar('kode');
        // dd($tahunPelajaran);
        $data = [
            "DetailPegawai" => $this->pegawai->getPegawai($kode),
        ];
        // dd($data);

        // dd($data);

        return view("ajaxs/form_edit_pegawai", $data);
    }
}