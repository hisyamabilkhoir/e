<?php

namespace App\Controllers;

use App\Models\KelasModel;
use App\Models\SiswaModel;
use App\Models\TahunPelajaranModel;
use App\Models\MataPelajaranModel;
use App\Models\KelompokMataPelajaranModel;
use App\Models\PegawaiModel;


class WaliKelas extends BaseController
{

    protected $kelas;
    protected $kelompok_mapel;
    protected $mapel;
    protected $siswa;
    protected $tahunPelajaran;
    public function __construct()
    {

        $this->kelas = new KelasModel();
        $this->siswa = new SiswaModel();
        $this->mapel = new MataPelajaranModel();
        $this->kelompok_mapel = new KelompokMataPelajaranModel();
        $this->guru = new PegawaiModel();
        $this->tahunPelajaran = new TahunPelajaranModel();
        $this->req = \Config\Services::request();
    }

    public function kelas()
    {
        $walas = session()->get('is_walas');
        // dd($walas);
        $tahunActive = $this->tahunPelajaran->getActive('1');
        $data = [
            'walas' => $this->kelas->getDataWalas($tahunActive['tahun_awal'], $tahunActive['tahun_akhir'], $walas),
            'siswa' => $this->siswa->getDataSiswa(1),
            'kelas' => $this->kelas->where(['id_tahun_pelajaran' => $tahunActive['id']])->findAll(),
            'semua_kelas' => $this->kelas->getDetailKelas($walas),
            'tahunActive' => $tahunActive,
            'idKelas' => $walas,
        ];
        // dd($data['walas']);
        // $tahunActive = $this->tahunPelajaran->getActive('1');
        // $data = [
        //     'siswa' => $this->siswa->getDataSiswa(1),
        //     'walas' => $this->kelas->getDataKelas($tahunActive['tahun_awal'], $tahunActive['tahun_akhir']),
        //     'semua_kelas' => $this->kelas->getDetailKelas($id),
        //     'idKelas' => $id,
        // ];

        // dd($data['kelas']);
        return view('dashboard/wali_kelas/index', $data);
    }

    public function detailSiswa($kode)
    {
        $tahunActive = $this->tahunPelajaran->getActive('1');
        $data = [
            'siswa' => $this->siswa->getSiswa($kode),
            'tahunActive' => $tahunActive,
        ];
        // dd($data['kelas']);
        return view('dashboard/wali_kelas/detail_siswa', $data);
    }

    public function tambahSiswa($id)
    {
        $tahunActive = $this->tahunPelajaran->getActive('1');
        $data = [
            //'nama_kelompok' => $this->kelompok_mapel->getDataKelompokMapel($tahunActive['tahun_awal'], $tahunActive['tahun_akhir']),
            "kelas" => $this->kelompok_mapel->getDataKelompokMapel($tahunActive['tahun_awal'], $tahunActive['tahun_akhir'], $id),
            'siswa' => $this->siswa->getDataSiswa(1),
            'walas' => $this->kelas->getDataKelas($tahunActive['tahun_awal'], $tahunActive['tahun_akhir']),
            'semua_kelas' => $this->kelas->getDetailKelas($id),
            'idKelas' => $id,
            'nama_kelas' => $this->kelompok_mapel->getNamaKelas(),
            "wali_kelas" => $this->guru->getWalas('4'),
            'validation' => \Config\Services::validation(),
            'kelompokById' => $this->kelompok_mapel->getKelompokById($id),
            'mata_pelajaran' => $this->mapel->getDetailMapel($id),
            "tahunActive" => $this->tahunPelajaran->getActive('1'),
        ];

        // dd($data);
        return view('dashboard/wali_kelas/tambah_siswa', $data);
    }
}