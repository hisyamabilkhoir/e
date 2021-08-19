<?php

namespace App\Controllers;

use App\Models\PegawaiModel;
use App\Models\KelasModel;
use App\Models\TahunPelajaranModel;

class Auth extends BaseController
{
    public function __construct()
    {

        $this->pegawai = new PegawaiModel();
        $this->kelas = new KelasModel();
        $this->tahun_pelajaran = new TahunPelajaranModel();
    }

    public function index()
    {
        return view("auth/login");
    }

    public function forgotpassword()
    {
        return view("auth/lupa_password");
    }

    public function proces_login()
    {

        $email = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        //$user = $this->db->get_where('user', ['akun_email' => $email])->row_array();
        $tahunActive = $this->tahun_pelajaran->getActive('1');
        $user = $this->pegawai->where(['akun_email' => $email])->first();
        $walas = $this->kelas->where(['kode_walas' => $user['kode'], 'id_tahun_pelajaran' => $tahunActive['id']])->first();
        // d($user);

        if ($walas == null) {
            $walas = false;
        } else {
            $walas = $walas['id'];
        }

        if ($user) {
            //jika usernya aktif
            if ($user['status'] == 1) {
                //cek password
                if ($password == $user['akun_password']) {
                    // dd($walas);
                    $data = [
                        'email' => $user['akun_email'],
                        'level' => $user['level'],
                        'is_walas' => $walas,
                        'logged_in'     => true,
                    ];
                    // $this->session->set_userdata($data);
                    session()->set($data);

                    if ($data['level'] == 1) {
                        return redirect()->to(base_url('/home'));
                    } else if ($data['level'] == 2) {
                        return redirect()->to("/home");
                    } else if ($data['level'] == 3) {
                        return redirect()->to("/home");
                    } else if ($data['level'] == 4) {
                        return redirect()->to("/home");
                    }
                } else {
                    session()->setFlashdata('msg', 'Password salah !');
                    return redirect()->to("/auth");
                }
            } else {
                session()->setFlashdata('msg', 'Email Belum Diaktivasi !');
                return redirect()->to("/auth");
            }
        } else {
            session()->setFlashdata('msg', 'Email Tidak Terdaftar!');
            return redirect()->to("/auth");
        }
    }

    public function logout()
    {
        // session() = session();
        session()->destroy();

        session()->setFlashdata('msg', 'Berhasil Logout!');
        // session()->des
        return redirect()->to("/auth");
        //return redirect()->to("/");
    }
}
