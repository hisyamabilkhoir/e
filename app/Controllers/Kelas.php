<?php

namespace App\Controllers;

use App\Models\KelasModel;
use App\Models\PegawaiModel;
use App\Models\TahunPelajaranModel;

class Kelas extends BaseController
{

    protected $walas;
    protected $kelas;
    protected $tahunPelajaran;
    public function __construct()
    {
        $this->walas = new PegawaiModel();
        $this->kelas = new KelasModel();
        $this->tahunPelajaran = new TahunPelajaranModel();
        $this->req = \Config\Services::request();
    }

    public function index()
    {
        $tahunActive = $this->tahunPelajaran->getActive('1');
        if (!$tahunActive) {
            session()->setFlashdata('warning', 'Tidak ada tahun pelajaran yang aktif');
            return redirect()->to(base_url('TahunPelajaran'));
        }
        $data = [
            "walas" => $this->walas->getWalas('5'),
            "kelas" => $this->kelas->getDataKelas($tahunActive['tahun_awal'], $tahunActive['tahun_akhir']),
        ];
        // dd($data['kelas']);
        return view('dashboard/kelas/index', $data);
    }

    public function tambah()
    {
        $valid = [
            'tingkat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tingkat Barang Harus di isi',
                ],
            ],
            'kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Spesifikasi Harus di isi',
                ],
            ],
            'wali_kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Lokasi Harus di isi',
                ],
            ],
        ];

        if (!$this->validate($valid)) {
            return redirect()->to(base_url('Kelas'))->withInput();
        } else {
            $tahunActive = $this->tahunPelajaran->getActive('1');
            $data = [
                'id_tahun_pelajaran' => $tahunActive['id'],
                'tingkat' => $this->req->getVar('tingkat'),
                'kelas' => $this->req->getVar('kelas'),
                'kode_walas' => $this->req->getVar('wali_kelas'),
            ];

            $simpan = $this->kelas->save($data);
            if ($simpan) {
                session()->setFlashdata('success', 'Data Berhasil di Buat');
                return redirect()->to(base_url('Kelas'));
            } else {
                session()->setFlashdata('danger', 'Data Gagal di Buat');
                return redirect()->to(base_url('Kelas'));
            }
        }
    }
}
