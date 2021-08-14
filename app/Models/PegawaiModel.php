<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table = 'pegawai';
    protected $allowedFields = ['nama', 'nip', 'nik', 'akun_email', 'akun_password', 'status', 'level'];
    public function getPegawai($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getWalas($level)
    {
        return $this->where(['level' => $level])->findAll();
    }
}
