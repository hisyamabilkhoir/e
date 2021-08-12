<?php

namespace App\Controllers;

use App\Models\PegawaiModel;

class Auth extends BaseController
{
    public function __construct()
    {

        $this->pegawai = new PegawaiModel();
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

        $user = $this->pegawai->where(['akun_email' => $email])->first();

        if ($user) {
            //jika usernya aktif
            if ($user['status'] == 1) {
                //cek password
                if ($password == $user['akun_password']) {
                    $data = [
                        'email' => $user['akun_email'],
                        'level' => $user['level'],
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
                    } else if ($data['level'] == 5) {
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
        return redirect()->to(base_url());
        //return redirect()->to("/");
    }
}