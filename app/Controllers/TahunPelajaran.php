<?php

namespace App\Controllers;

use App\Models\TahunPelajaranModel;


class TahunPelajaran extends BaseController
{


    protected $tahun_pelajaran;
    public function __construct()
    {
        $this->tahun_pelajaran = new TahunPelajaranModel();

        $this->req = \Config\Services::request();
    }

    public function index()
    {
        $data = [
            "tahunPelajaran" => $this->tahun_pelajaran->getTahunPelajaran(),
            "validation" => \Config\Services::validation(),
        ];
        return view('dashboard/tahun_pelajaran/index', $data);
    }

    public function tambah()
    {
        $valid = [
            'awal' => [
                'rules' => 'required|numeric|is_unique[tahun_pelajaran.tahun_awal]|min_length[4]|max_length[4]',
                'errors' => [
                    'numeric' => "Harus menggunakan angka",
                    'required' => 'Tingkat Barang Harus di isi',
                    'is_unique' => 'Tahun Awal Sudah ada',
                    'min_length' => 'Minimal 4 karakter',
                    'max_length' => 'Maximal 4 karakter',
                ],
            ],
            'akhir' => [
                'rules' => 'required|numeric|is_unique[tahun_pelajaran.tahun_akhir]|min_length[4]|max_length[4]',
                'errors' => [
                    'numeric' => "Harus menggunakan angka",
                    'required' => 'Spesifikasi Harus di isi',
                    'is_unique' => 'Tahun akhir sudah ada',
                    'min_length' => 'Minimal 4 karakter',
                    'max_length' => 'Maximal 4 karakter',
                ],
            ],
        ];

        if (!$this->validate($valid)) {
            return redirect()->to(base_url('TahunPelajaran'))->withInput();
        } else {
            if ($this->req->getVar('active') == '1') {
                $resultTP = $this->tahun_pelajaran->getActive($this->req->getVar('active'));
                if ($resultTP != null) {
                    $resultTP["status"] = 0;
                    $this->tahun_pelajaran->save([
                        'id' => $resultTP["id"],
                        'tahun_awal' => $resultTP["tahun_awal"],
                        'tahun_akhir' => $resultTP["tahun_akhir"],
                        'status' => '0',
                    ]);
                }

                $this->tahun_pelajaran->save([
                    'tahun_awal' => $this->req->getVar('awal'),
                    'tahun_akhir' => $this->req->getVar('akhir'),
                    'status' => $this->req->getVar('active')
                ]);
                return redirect()->to(base_url('TahunPelajaran'));
            }

            $this->tahun_pelajaran->save([
                'tahun_awal' => $this->req->getVar('awal'),
                'tahun_akhir' => $this->req->getVar('akhir'),
                'status' => $this->req->getVar('active')
            ]);
            return redirect()->to(base_url('TahunPelajaran'));
        }
    }

    public function update()
    {

        $id = $this->req->getVar('id');
        $awal = $this->req->getVar('update_awal');
        $akhir = $this->req->getVar('update_akhir');

        $uniqueAwal = '';
        $uniqueAkhir = '';
        $dataB = $this->tahun_pelajaran->getTahunPelajaran($id);
        if ($awal != $dataB['tahun_awal']) {
            $uniqueAwal = 'is_unique[tahun_pelajaran.tahun_awal]|';
        } elseif ($akhir != $dataB['tahun_akhir']) {
            $uniqueAkhir = 'is_unique[tahun_pelajaran.tahun_akhir]|';
        }

        $valid = [
            'update_awal' => [
                'rules' => $uniqueAwal . 'required|numeric|min_length[4]|max_length[4]',
                'errors' => [
                    'numeric' => "Harus menggunakan angka",
                    'required' => 'Tingkat Barang Harus di isi',
                    'is_unique' => 'Tahun Awal Sudah ada',
                    'min_length' => 'Minimal 4 karakter',
                    'max_length' => 'Maximal 4 karakter',
                ],
            ],
            'update_akhir' => [
                'rules' => $uniqueAkhir . 'required|numeric|min_length[4]|max_length[4]',
                'errors' => [
                    'numeric' => "Harus menggunakan angka",
                    'required' => 'Spesifikasi Harus di isi',
                    'is_unique' => 'Tahun akhir sudah ada',
                    'min_length' => 'Minimal 4 karakter',
                    'max_length' => 'Maximal 4 karakter',
                ],
            ],
        ];

        if (!$this->validate($valid)) {
            return redirect()->to(base_url('/TahunPelajaran'))->withInput();
        } else {
            if ($this->req->getVar('active') == '1') {
                $resultTP = $this->tahun_pelajaran->getActive($this->req->getVar('active'));
                if ($resultTP != null) {
                    $resultTP["status"] = 0;
                    $this->tahun_pelajaran->save([
                        'id' => $resultTP["id"],
                        'tahun_awal' => $resultTP["tahun_awal"],
                        'tahun_akhir' => $resultTP["tahun_akhir"],
                        'status' => '0',
                    ]);
                    $this->tahun_pelajaran->save([
                        'id' => $this->req->getVar('id'),
                        'tahun_awal' => $this->req->getVar('update_awal'),
                        'tahun_akhir' => $this->req->getVar('update_akhir'),
                        'status' => $this->req->getVar('active')
                    ]);
                    return redirect()->to(base_url('TahunPelajaran'));
                }
            }

            $this->tahun_pelajaran->save([
                'id' => $this->req->getVar('id'),
                'tahun_awal' => $this->req->getVar('update_awal'),
                'tahun_akhir' => $this->req->getVar('update_akhir'),
                'status' => $this->req->getVar('active')
            ]);
            return redirect()->to(base_url('TahunPelajaran'));
        }
    }

    public function hapus($id)
    {
        $user = $this->tahun_pelajaran->find($id);
        $this->tahun_pelajaran->delete($id);
        return redirect()->to(base_url('TahunPelajaran'));
    }
}
