<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table = 'pegawai';
    protected $allowedFields = ['akun_email', 'akun_password', 'level'];

    // public function getKomik($slug = false)
    // {
    //     if ($slug == false) {
    //         return $this->findAll();
    //     }

    //     return $this->where(['slug' => $slug])->first();
    // }
}