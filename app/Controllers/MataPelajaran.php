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

        // dd($data);   

        return view('dashboard/mata_pelajaran/manage', $data);
    }

    public function proses_manage()
    {
        $id_kelompok_mapel_kelas = $this->request->getVar('id_kelompok_mapel_kelas');
        $id_tahun = $this->request->getVar('id_tahun');
        $id_kelas = $this->request->getVar('id_kelas');
        $nama_mapel = $this->request->getVar('nama_mapel');
        $valid = $this->mapel->mapelValid($id_kelas, $nama_mapel, $id_tahun, $id_kelompok_mapel_kelas);
        $validKelompok = $this->mapel->updateMapelValid($id_kelas, $nama_mapel, $id_tahun);
        $unique = '';
        if ($valid || $validKelompok) {
            $unique = 'is_unique[mata_pelajaran.nama_mapel]|';
        }

        if (!$this->validate([
            'nama_mapel'          => [
                'rules' => $unique . 'required',
                'errors' => [
                    'required' => 'Masukkan nama mapel terlebih dahulu',
                    'is_unique' => 'Nama mapel sudah ada atau sudah terdaftar di kelompok lain',
                ],
            ],

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/WaliKelas/tambahSiswa/' . $id_kelas)->withInput()->with('validation', $validation);
        }


        $this->mapel->insert([
            'id_kelas' => $id_kelas,
            'id_tahun' => $id_tahun,
            'id_kelompok_mapel_kelas' => $id_kelompok_mapel_kelas,
            'nama_mapel' => $this->request->getVar('nama_mapel'),
            'kode_guru' => $this->request->getVar('kode_guru'),
        ]);

        session()->setFlashdata('msg', 'Data Berhasil ditambahkan');

        return redirect()->to('/WaliKelas/tambahSiswa/' . $id_kelas);
    }

    public function edit_mapel()
    {
        $idMapel = $this->request->getVar('idMapel');
        $idKelas = $this->request->getVar('idKelas');
        $id_tahun = $this->request->getVar('id_tahun');
        $id_kelompok_mapel_kelas = $this->request->getVar('idKelompok');
        $nama_mapel = $this->request->getVar('nama_mapel');
        $valid = $this->mapel->mapelValid($idKelas, $nama_mapel, $id_tahun, $id_kelompok_mapel_kelas);
        $validKelompok = $this->mapel->updateMapelValid($idKelas, $nama_mapel, $id_tahun);
        $unique = '';
        // d($validKelompok);
        // dd($idMapel);
        if ($idMapel != $validKelompok[0]['id'] || $validKelompok[0]['id'] == null) {
            if ($valid || $validKelompok) {
                $unique = 'is_unique[mata_pelajaran.nama_mapel]|';
            }
        }

        if (!$this->validate([
            'nama_mapel'          => [
                'rules' => $unique . 'required',
                'errors' => [
                    'required' => 'Masukkan nama_mapel terlebih dahulu',
                    'is_unique' => 'Nama mapel sudah ada atau sudah terdaftar di kelompok lain',
                ],
            ],

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/WaliKelas/tambahSiswa/' . $idKelas)->withInput()->with('validation', $validation);
        }

        $this->mapel->save([
            'id' => $idMapel,
            'nama_mapel' => $nama_mapel,
            'kode_guru' => $this->request->getVar('kode_guru'),
        ]);

        session()->setFlashdata('msg', 'Data Berhasil Ubah');

        return redirect()->to('/WaliKelas/tambahSiswa/' . $idKelas);
    }

    public function updateKelompokMapel()
    {
        $idKelas = $this->request->getVar('id_kelas');
        $id_tahun = $this->request->getVar('tahunActive');
        $id_kelompok_mapel_kelas = $this->request->getVar('id_kelompok');
        $nama_kelompok = $this->request->getVar('nama_kelompok');
        $validKelompok = $this->kelompok_mapel->updateKelompokMapelValid($idKelas, $nama_kelompok, $id_tahun);
        $unique = '';
        if ($validKelompok != null) {
            if ($validKelompok[0]['id'] != $id_kelompok_mapel_kelas) {
                $unique = 'is_unique[kelompok_mata_pelajaran.nama_kelompok]|';
            }
        }
        if (!$this->validate([
            'nama_kelompok' => [
                'rules' => $unique . 'required',
                'errors' => [
                    'required' => 'Masukkan nama kelompok terlebih dahulu',
                    'is_unique' => 'Nama kelompok sudah ada',
                ],
            ],

        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/WaliKelas/tambahSiswa/' . $idKelas)->withInput()->with('validation', $validation);
        }

        $this->kelompok_mapel->save([
            'id' => $id_kelompok_mapel_kelas,
            'nama_kelompok' => $nama_kelompok,
        ]);

        session()->setFlashdata('msg', 'Data Berhasil Ubah');

        return redirect()->to('/WaliKelas/tambahSiswa/' . $idKelas);
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

    public function hapus($idMapel, $idKelas)
    {
        $idMapel = $this->mapel->find($idMapel);
        if (!$idMapel) {
            session()->setFlashdata('warning', 'Data yang di cari tidak ada');
            return redirect()->to(base_url('/WaliKelas/tambahSiswa/' . $idKelas));
        }
        $this->mapel->delete($idMapel);
        session()->setFlashdata('success', 'Data berhasil di hapus');
        return redirect()->to(base_url('/WaliKelas/tambahSiswa/' . $idKelas));
    }

    public function hapusKelompok($idMapel, $idKelas)
    {
        $idKelompokMapel = $this->kelompok_mapel->find($idMapel);
        if (!$idKelompokMapel) {
            session()->setFlashdata('warning', 'Data yang di cari tidak ada');
            return redirect()->to(base_url('/WaliKelas/tambahSiswa/' . $idKelas));
        }
        $this->kelompok_mapel->delete($idKelompokMapel);
        session()->setFlashdata('success', 'Data berhasil di hapus');
        return redirect()->to(base_url('/WaliKelas/tambahSiswa/' . $idKelas));
    }
}
