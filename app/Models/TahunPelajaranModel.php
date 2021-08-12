<?php

namespace App\Models;

use CodeIgniter\Model;

class TahunPelajaranModel extends Model
{
    protected $table = 'tahun_pelajaran';
    protected $allowedFields = ['tahun_awal', 'tahun_akhir', 'status'];
    public function getTahunPelajaran($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }

    public function getActive($status)
    {
        return $this->where(['status' => $status])->first();
    }

    public function updateJumlah($jml, $id)
    {
        return $this->query("UPDATE barang SET jumlah = '$jml' WHERE id_barang = $id ");
    }
}
