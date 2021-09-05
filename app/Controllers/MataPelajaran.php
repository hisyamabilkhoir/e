<?php

namespace App\Controllers;

use App\Models\KelasModel;
use App\Models\MataPelajaranModel;
use App\Models\KelompokMataPelajaranModel;
use App\Models\TahunPelajaranModel;
use App\Models\PegawaiModel;

class MataPelajaran extends BaseController
{

    protected $mapel;
    protected $tahunPelajaran;
    protected $kelompok_mapel;


    public function __construct()
    {
        $this->mapel = new MataPelajaranModel();
        $this->kelompok_mapel = new KelompokMataPelajaranModel();
        $this->tahunPelajaran = new TahunPelajaranModel();
        $this->kelas = new KelasModel();
        $this->guru = new PegawaiModel();
    }

    public function index()
    {
        $tahunActive = $this->tahunPelajaran->getActive('1');

        $data = [
            'validation' => \Config\Services::validation(),
        ];

        return view('dashboard/mata_pelajaran/index', $data);
    }


    //====Sementara diNonaktifkan==================//
    // public function tambah_kelompok()
    // {
    //     $tahunActive = $this->tahunPelajaran->getActive('1');

    //     $data = [
    //         "kelas" => $this->kelas->getDataKelas($tahunActive['tahun_awal'], $tahunActive['tahun_akhir']),
    //         "tahunActive" => $this->tahunPelajaran->getActive('1'),
    //         'validation' => \Config\Services::validation(),
    //     ];

    //     return view('dashboard/mata_pelajaran/tambah_kelompok_mapel', $data);
    // }


    public function proses_tambah_kelompok()
    {

        $id_kelas = $this->request->getVar('id_kelas');
        $nama_kelompok = $this->request->getVar('nama_kelompok');

        $data_kelompok = $this->kelompok_mapel->getKelas($id_kelas, $nama_kelompok);



        if ($data_kelompok) {
            $rule_kelas = 'required|is_unique[kelompok_mata_pelajaran.nama_kelompok]';
        } else {

            $rule_kelas = 'required';
        }


        if (!$this->validate([
            'nama_kelompok'          => [
                'rules' => $rule_kelas,
                'errors' => [
                    'required' => 'Masukkan nama kelompok terlebih dahulu',
                    'is_unique' => 'Kelompok yang anda masukan sudah terdaftar !'
                ],
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/walikelas/tambahSiswa/' . $id_kelas . "/?active=custom-content-below-profile")->withInput()->with('validation', $validation);
        }



        $this->kelompok_mapel->insert([
            'id_kelas' => (int)$this->request->getVar('id_kelas'),
            'nama_kelompok' => $this->request->getVar('nama_kelompok'),
        ]);

        session()->setFlashdata('msg', 'Data Berhasil ditambahkan');

        return redirect()->to('/walikelas/tambahSiswa/' . $id_kelas . "/?active=custom-content-below-profile");
    }

    public function manage($id)
    {



        $data = [
            'nama_kelas' => $this->kelompok_mapel->getNamaKelas(),
            "walas" => $this->guru->getWalas('4'),
            'validation' => \Config\Services::validation(),
            'detail_kelompok' => $this->kelompok_mapel->getKelompokDetail($id),
            'mata_pelajaran' => $this->mapel->getDetailMapel($id),
            "tahunActive" => $this->tahunPelajaran->getActive('1'),
        ];



        return view('dashboard/mata_pelajaran/manage', $data);
    }

    public function proses_manage()
    {
        $id_kelompok_mapel_kelas = $this->request->getVar('id_kelompok_mapel_kelas');
        $id_tahun = $this->request->getVar('id_tahun');
        $id_kelas = $this->request->getVar('id_kelas');

        if (!$this->validate([
            'nama_mapel'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan nama_mapel terlebih dahulu',
                ],
            ],

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/matapelajaran/manage/' . $id_kelompok_mapel_kelas)->withInput()->with('validation', $validation);
        }


        $this->mapel->insert([
            'id_kelas' => $id_kelas,
            'id_tahun' => $id_tahun,
            'id_kelompok_mapel_kelas' => $id_kelompok_mapel_kelas,
            'nama_mapel' => $this->request->getVar('nama_mapel'),
            'kode_guru' => $this->request->getVar('kode_guru'),
        ]);

        session()->setFlashdata('msg', 'Data Berhasil ditambahkan');

        return redirect()->to('/matapelajaran/manage/' . $id_kelompok_mapel_kelas);
    }

    public function print($id_kelas)
    {
        $tahunActive = $this->tahunPelajaran->getActive('1');
        $data = [
            "kelas" => $this->kelompok_mapel->getDataKelompokMapel($tahunActive['tahun_awal'], $tahunActive['tahun_akhir'], $id_kelas),
            'getDataPrint' => $this->kelompok_mapel->getDataPrint($id_kelas),
        ];

        return view('dashboard/wali_kelas/print', $data);
    }
}