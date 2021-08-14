<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table = 'pegawai';
    protected $allowedFields = ['kode', 'nip', 'nik', 'nama', 'akun_email', 'akun_password', 'status', 'level'];

    public function getPegawai($kode = false)
    {
        if ($kode == false) {
            return $this->findAll();
        }

        return $this->where(['kode' => $kode])->first();
    }
}