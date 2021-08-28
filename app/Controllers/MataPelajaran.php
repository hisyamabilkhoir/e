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



        $this->kelompok_mapel->insert([
            'id_kelas' => (int)$this->request->getVar('id_kelas'),
            'nama_kelompok' => $this->request->getVar('nama_kelompok'),
        ]);

        session()->setFlashdata('msg', 'Data Berhasil ditambahkan');

        return redirect()->to('/matapelajaran/tambah_kelompok');
    }

    public function manage($id)
    {


        $data = [
            'nama_kelas' => $this->kelompok_mapel->getNamaKelas(),
            "walas" => $this->guru->getWalas('4'),
            'validation' => \Config\Services::validation(),
            'kelompokById' => $this->kelompok_mapel->getKelompokById($id),
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
            'bobot_nilai_harian_pengetahuan'          => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Masukkan Nilai terlebih dahulu',
                    'numeric' => 'harap isi dengan angka !'
                ],
            ],
            'bobot_nilai_akhir_pengetahuan'          => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Masukkan Nilai terlebih dahulu',
                    'numeric' => 'harap isi dengan angka !'
                ],
            ],
            'bobot_nilai_harian_keterampilan'          => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Masukkan Nilai terlebih dahulu',
                    'numeric' => 'harap isi dengan angka !'
                ],
            ],
            'bobot_nilai_akhir_keterampilan'          => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Masukkan Nilai terlebih dahulu',
                    'numeric' => 'harap isi dengan angka !'
                ],
            ],
            'interval_pengetahuan'          => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Masukkan Nilai terlebih dahulu',
                    'numeric' => 'harap isi dengan angka !'
                ],
            ],
            'interval_kompetensi'          => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Masukkan Nilai terlebih dahulu',
                    'numeric' => 'harap isi dengan angka !'
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
            'bobot_nilai_harian_pengetahuan' => $this->request->getVar('bobot_nilai_harian_pengetahuan'),
            'bobot_nilai_akhir_pengetahuan' => $this->request->getVar('bobot_nilai_akhir_pengetahuan'),
            'bobot_nilai_harian_keterampilan' => $this->request->getVar('bobot_nilai_harian_keterampilan'),
            'bobot_nilai_akhir_keterampilan' => $this->request->getVar('bobot_nilai_akhir_keterampilan'),
            'interval_pengetahuan' => $this->request->getVar('interval_pengetahuan'),
            'interval_kompetensi' => $this->request->getVar('interval_kompetensi'),
            'kalimat_kurang_pengetahuan' => $this->request->getVar('kalimat_kurang_pengetahuan'),
            'kalimat_kurang_keterampilan' => $this->request->getVar('kalimat_kurang_keterampilan'),
        ]);

        session()->setFlashdata('msg', 'Data Berhasil ditambahkan');

        return redirect()->to('/matapelajaran/manage/' . $id_kelompok_mapel_kelas);
    }
}