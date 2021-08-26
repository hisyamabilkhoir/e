<?php

namespace App\Controllers;

use App\Models\AnggotaKelasModel;
use App\Models\KelasModel;
use App\Models\TahunPelajaranModel;
use App\Models\PegawaiModel;
use App\Models\SiswaModel;

class AjaxController extends BaseController
{
    protected $tahun_pelajaran;
    protected $pegawai;
    protected $kelas;
    protected $siswa;
    protected $anggota_kelas;

    public function __construct()
    {
        $this->tahun_pelajaran = new TahunPelajaranModel();
        $this->pegawai = new PegawaiModel();
        $this->kelas = new KelasModel();
        $this->siswa = new SiswaModel();
        $this->anggota_kelas = new AnggotaKelasModel();
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
            "walas" => $this->pegawai->getWalas('4'),
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
            'id_kelas' => $kelas,
        ];
        // dd($data);
        return view("ajaxs/detail_kelas", $data);
    }

    public function kelas_siswa()
    {
        // $year = Year::where("id",)->first();
        // $tahunActive = $this->tahun_pelajaran->getActive('1');
        return 'Data Berhasil di Tambahkan';
        $kode = $this->req->getVar('kode');
        $idKelas = $this->req->getVar('idKelas');
        // return d($kode);
        // return dd($idKelas);
        // // return '<h1>asd</h1>';
        $s = $this->siswa->update(
            $kode,
            [
                'status' => 2,
            ]
        );
        // $this->siswa->update([
        //     'kode' => $kode,
        //     'status' => 2,
        // ]);
        $a = $this->anggota_kelas->save([
            'kode_siswa' => $kode,
            'id_kelas' => $idKelas,
        ]);
        // return dd($a);
        if ($s && $a) {
            # code...
            return 'Data Berhasil di Tambahkan';
        }
        // dd($data);
        // return view("ajaxs/detail_kelas", $data);
    }
}
