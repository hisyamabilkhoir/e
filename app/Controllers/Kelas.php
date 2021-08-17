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
            "validation" => \Config\Services::validation(),
        ];
        // dd($data['kelas']);
        return view('dashboard/kelas/index', $data);
    }

    public function tambah()
    {
        $tahunActive = $this->tahunPelajaran->getActive('1');
        $walas = $this->kelas->getWalas($tahunActive['id'], $this->req->getVar('wali_kelas'));
        $unique = '';
        if ($walas) {
            $unique = 'is_unique[kelas.kode_walas]|';
        }
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
                'rules' => $unique . 'required',
                'errors' => [
                    'required' => 'Lokasi Harus di isi',
                    'is_unique' => 'Guru sudah terdaftar',
                ],
            ],
        ];

        if (!$this->validate($valid)) {
            return redirect()->to(base_url('Kelas'))->withInput();
        } else {
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

    public function update()
    {
        // $walas = $this->kelas->find($this->req->getVar('id'));
        $tahunActive = $this->tahunPelajaran->getActive('1');
        $data = $this->kelas->getWalas($tahunActive['id'], $this->req->getVar('update_wali_kelas'));
        $unique = '';
        if ($data[0]["kode_walas"] == $this->req->getVar('update_wali_kelas') && $data[0]["id"] != $this->req->getVar('id')) {
            $unique = 'is_unique[kelas.kode_walas]|';
        } else if ($data[0]["kode_walas"] == $this->req->getVar('update_wali_kelas') && $data[0]["kelas"] != $this->req->getVar('update_kelas')) {
            $unique = '';
        }
        // d($data);
        // dd($unique);
        $valid = [
            'update_tingkat' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Tingkat Barang Harus di isi',
                ],
            ],
            'update_kelas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Spesifikasi Harus di isi',
                ],
            ],
            'update_wali_kelas' => [
                'rules' => $unique . 'required',
                'errors' => [
                    'required' => 'Lokasi Harus di isi',
                    'is_unique' => 'Guru sudah terdaftar',
                ],
            ],
        ];

        if (!$this->validate($valid)) {
            return redirect()->to(base_url('Kelas'))->withInput();
        } else {
            $data = [
                'id' => $this->req->getVar('id'),
                'tingkat' => $this->req->getVar('update_tingkat'),
                'kelas' => $this->req->getVar('update_kelas'),
                'kode_walas' => $this->req->getVar('update_wali_kelas'),
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

    public function hapus($id)
    {
        $kelas = $this->kelas->find($id);
        if (!$kelas) {
            session()->setFlashdata('warning', 'Data yang di cari tidak ada');
            return redirect()->to(base_url('TahunPelajaran'));
        }
        $this->kelas->delete($id);
        session()->setFlashdata('success', 'Data berhasil di hapus');
        return redirect()->to(base_url('Kelas'));
    }
}
