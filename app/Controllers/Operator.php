<?php

namespace App\Controllers;

use App\Models\PegawaiModel;

class Operator extends BaseController
{
    protected $pegawai;
    public function __construct()
    {
        $this->pegawai = new PegawaiModel();
        $this->req = \Config\Services::request();
    }

    public function index()
    {

        $data = [
            'validation' => \Config\Services::validation(),
            "pegawai" => $this->pegawai->getPegawai(),
        ];

        return view('dashboard/operator/index', $data);
    }

    public function tambah()
    {

        if (!$this->validate([
            'nama'          => [
                'rules' => 'required|min_length[3]|max_length[20]',
                'errors' => [
                    'required' => 'Masukkan nama terlebih dahulu',
                    'min_length' => 'Masukkan minimal 3 huruf',
                    'max_length' => 'Masukkan jangan lebih dari 20 huruf',
                ],
            ],
            'email'         => [
                'rules' => 'required|max_length[50]|valid_email|is_unique[pegawai.akun_email]',
                'errors' => [
                    'required' => 'Masukkan nama terlebih dahulu',
                    'max_length' => 'Masukkan jangan lebih dari 50 huruf',
                    'valid_email' => 'Email Tidak valid',
                    'is_unique' => 'Email sudah ada',
                ]
            ],
            'password'      => [
                'rules' => 'required|max_length[200]',
                'errors' => [
                    'required' => 'Masukkan password terlebih dahulu',
                    'max_length' => 'Masukkan password jangan lebih dari 200 huruf',
                ],
            ],
            'Confirmpassword'      => [
                'confpassword'  => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi password yang anda masukkan salah'
                ],
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/operator')->withInput()->with('validation', $validation);
        }

        helper('text');
        $code_random = random_string('alnum', 7);
        $code = strtoupper($code_random);

        $this->pegawai->insert([
            'kode' => $code,
            'nama' => $this->request->getVar('nama'),
            'akun_email' => $this->request->getVar('email'),
            'akun_password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'status' => 1,
            'level' => (int)$this->request->getVar('level')
        ]);

        session()->setFlashdata('msg', 'Data Berhasil ditambahkan');

        return redirect()->to('/operator');
    }

    public function detail_pegawai($kode)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'dp' => $this->pegawai->getPegawai($kode),

        ];


        return redirect()->to('/operator' . $data);
        // return view('dashboard/operator/index', $data);
    }

    public function hapus($kode)
    {


        $this->pegawai->delete(['kode' => $kode]);

        session()->setFlashdata('msg', 'Data Berhasil dihapus !');

        return redirect()->to(base_url('Operator'));
    }

    public function ubah($kode)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            "pegawai" => $this->pegawai->getPegawai($kode),
        ];

        return view('dashboard/operator/ubah', $data);
    }

    public function proses_ubah()
    {
        $kode = $this->request->getVar('kode');


        //cek data pegawai untuk validasi ubah
        $data_pegawai = $this->pegawai->getPegawai($kode);

        if ($data_pegawai['akun_email'] == $this->request->getVar('email')) {
            $rule_email = 'required';
        } else {
            $rule_email = 'required|is_unique[pegawai.akun_email]|valid_email|max_length[50]';
        }

        if ($data_pegawai['nip'] == $this->request->getVar('nip')) {
            $rule_nip = 'required';
        } else {
            $rule_nip = 'required|numeric|is_unique[pegawai.nip]';
        }

        if ($data_pegawai['nik'] == $this->request->getVar('nik')) {
            $rule_nik = 'required';
        } else {
            $rule_nik = 'required|numeric|is_unique[pegawai.nik]';
        }




        if (!$this->validate([
            'nama'          => [
                'rules' => 'required|min_length[3]|max_length[20]',
                'errors' => [
                    'required' => 'Masukkan nama terlebih dahulu',
                    'min_length' => 'Masukkan minimal 3 huruf',
                    'max_length' => 'Masukkan jangan lebih dari 20 huruf',
                ],
            ],
            'nip'          => [
                'rules' => $rule_nip,
                'errors' => [
                    'required' => 'Masukkan nip terlebih dahulu',
                    'numeric' => 'Hanya boleh diisi angka !',
                    'is_unique' => 'nip sudah ada',
                ],
            ],
            'nik'          => [
                'rules' => $rule_nik,
                'errors' => [
                    'required' => 'Masukkan nik terlebih dahulu',
                    'numeric' => 'Hanya boleh diisi angka !',
                    'is_unique' => 'nik sudah ada',
                ],
            ],
            'email'         => [
                'rules' => $rule_email,
                'errors' => [
                    'required' => 'Masukkan email terlebih dahulu',
                    'max_length' => 'Masukkan jangan lebih dari 50 huruf',
                    'valid_email' => 'Email Tidak valid',
                    'is_unique' => 'Email sudah ada',
                ]
            ],
            'password'      => [
                'rules' => 'required|max_length[200]',
                'errors' => [
                    'required' => 'Masukkan password terlebih dahulu',
                    'max_length' => 'Masukkan password jangan lebih dari 200 huruf',
                ],
            ],
            'Confirmpassword'      => [
                'confpassword'  => 'matches[password]',
                'errors' => [
                    'matches' => 'Konfirmasi password yang anda masukkan salah'
                ],
            ]
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to(base_url('/operator/ubah/' . $kode))->withInput()->with('validation', $validation);
        }


        $this->pegawai->save([
            'kode' => $kode,
            'nip' => $this->request->getVar('nip'),
            'nik' => $this->request->getVar('nik'),
            'nama' => $this->request->getVar('nama'),
            'akun_email' => $this->request->getVar('email'),
            'akun_password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            'status' => 1,
            'level' => $this->request->getVar('level')
        ]);

        session()->setFlashdata('msg', 'Data Berhasil diubah !');

        return redirect()->to('/operator');
    }
}
