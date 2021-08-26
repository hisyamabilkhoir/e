<?php

namespace App\Controllers;

use App\Models\KelasModel;
use App\Models\MataPelajaranModel;
use App\Models\KelompokMataPelajaranModel;
use App\Models\TahunPelajaranModel;

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
    }

    public function index()
    {
        $tahunActive = $this->tahunPelajaran->getActive('1');

        $data = [
            'validation' => \Config\Services::validation(),
        ];

        return view('dashboard/mata_pelajaran/index', $data);
    }

    public function tambah_kelompok()
    {
        $tahunActive = $this->tahunPelajaran->getActive('1');

        $data = [
            'nama_kelompok' => $this->kelompok_mapel->getDataKelompokMapel($tahunActive['tahun_awal'], $tahunActive['tahun_akhir']),
            "kelas" => $this->kelas->getDataKelas($tahunActive['tahun_awal'], $tahunActive['tahun_akhir']),
            "tahunActive" => $this->tahunPelajaran->getActive('1'),
            'validation' => \Config\Services::validation(),
        ];

        return view('dashboard/mata_pelajaran/tambah_kelompok_mapel', $data);
    }

    public function proses_tambah_kelompok()
    {

        $id_kelas = $this->request->getVar('id_kelas');
        $nama_kelompok = $this->request->getVar('nama_kelompok');

        $data_kelompok = $this->kelompok_mapel->getKelas($id_kelas, $nama_kelompok);



        if ($data_kelompok) {
            $rule_kelas = 'required|is_unique[kelompok_mata_pelajaran.id_kelas]';
        } else {

            $rule_kelas = 'required';
        }


        if (!$this->validate([
            'nama_kelompok'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan nama kelompok terlebih dahulu',
                ],
            ],
            'id_kelas' => [
                'rules' => $rule_kelas,
                'errors' => [
                    'required' => 'Lokasi Harus di isi',
                    'is_unique' => 'Kelas yang anda pilih sudah terdaftar pada ' . $nama_kelompok,
                ],
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/matapelajaran/tambah_kelompok')->withInput()->with('validation', $validation);
        }

        //dd($this->request->getVar('id_kelas'));

        $this->kelompok_mapel->insert([
            'id_kelas' => (int)$this->request->getVar('id_kelas'),
            'nama_kelompok' => $this->request->getVar('nama_kelompok'),
        ]);

        session()->setFlashdata('msg', 'Data Berhasil ditambahkan');

        return redirect()->to('/matapelajaran/tambah_kelompok');
    }
}