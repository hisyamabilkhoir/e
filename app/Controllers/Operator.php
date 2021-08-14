<?php

namespace App\Controllers;

use App\Models\PegawaiModel;

class Operator extends BaseController
{
    protected $pegawai;
    public function __construct()
    {
        $this->pegawai = new PegawaiModel();
        //$this->req = \Config\Services::request();
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
        $code_random = random_string('alnum', 6,);
        $code = strtoupper($code_random);

        $this->pegawai->save([
            'kode' => $code,
            'nama' => $this->request->getVar('nama'),
            'akun_email' => $this->request->getVar('email'),
            'akun_password' => $this->request->getVar('password'),
            'status' => 1,
            'level' => $this->request->getVar('level')
        ]);

        // session()->setFlashdata('msg', 'Data Berhasil ditambahkan');

        return redirect()->to('/home');
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

    public function hapus($id)
    {
        //$user = $this->tahun_pelajaran->find($id);
        $this->pegawai->delete($id);
        return redirect()->to(base_url('Operator'));
    }
}