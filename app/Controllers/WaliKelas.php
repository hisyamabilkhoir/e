<?php

namespace App\Controllers;

use App\Models\KelasModel;
use App\Models\SiswaModel;
use App\Models\TahunPelajaranModel;

class WaliKelas extends BaseController
{

    protected $kelas;
    protected $siswa;
    protected $tahunPelajaran;
    public function __construct()
    {

        $this->kelas = new KelasModel();
        $this->siswa = new SiswaModel();
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

    public function detailSiswa()
    {
        $tahunActive = $this->tahunPelajaran->getActive('1');
        $data = [
            'kelas' => $this->kelas->where(['id_tahun_pelajaran' => $tahunActive['id']])->findAll(),
            'tahunActive' => $tahunActive,
        ];
        // dd($data['kelas']);
        return view('dashboard/wali_kelas/detail_siswa', $data);
    }

    public function tambahSiswa($id)
    {
        $tahunActive = $this->tahunPelajaran->getActive('1');
        $data = [
            'siswa' => $this->siswa->getDataSiswa(1),
            'walas' => $this->kelas->getDataKelas($tahunActive['tahun_awal'], $tahunActive['tahun_akhir']),
            'semua_kelas' => $this->kelas->getDetailKelas($id),
            'idKelas' => $id,
        ];
        // dd($data);
        return view('dashboard/wali_kelas/tambah_siswa', $data);
    }
}
