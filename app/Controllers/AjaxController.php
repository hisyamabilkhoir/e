<?php

namespace App\Controllers;

use App\Models\KelasModel;
use App\Models\TahunPelajaranModel;
use App\Models\PegawaiModel;

class AjaxController extends BaseController
{
    protected $tahun_pelajaran;
    protected $pegawai;
    protected $kelas;

    public function __construct()
    {
        $this->tahun_pelajaran = new TahunPelajaranModel();
        $this->pegawai = new PegawaiModel();
        $this->kelas = new KelasModel();
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
        return view("ajaxs/form_edit_pegawai", $data);
    }

    public function edit_kelas()
    {
        // $year = Year::where("id",)->first();
        $kelas = $this->req->getVar('id');
        // dd($kelas);
        $data = [
            "walas" => $this->pegawai->getWalas('5'),
            "kelas" => $this->kelas->getKelas($kelas),

        ];
        return view("ajaxs/form_edit_kelas", $data);
    }

    public function detail_kelas()
    {
        // $year = Year::where("id",)->first();
        $tahunActive = $this->tahun_pelajaran->getActive('1');
        $kelas = $this->req->getVar('id');
        // return '<h1>asd</h1>';
        $data = [
            'walas' => $this->kelas->getDataKelas($tahunActive['tahun_awal'], $tahunActive['tahun_akhir']),
            'semua_kelas' => $this->kelas->getDetailKelas($kelas),
        ];
        // dd($data);
        return view("ajaxs/detail_kelas", $data);
    }
}
