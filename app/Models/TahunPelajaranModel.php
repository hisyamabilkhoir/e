<?php

namespace App\Models;

use CodeIgniter\Model;

class TahunPelajaranModel extends Model
{
    protected $table = 'tahun_pelajaran';
    protected $allowedFields = ['tahun_awal', 'tahun_akhir', 'status', 'titimangsa_siswa_baru', 'titimangsa_semester_ganjil', 'titimangsa_semester_genap'];
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

    public function getNotActive($status)
    {
        return $this->where(['status' => $status])
            ->select('id')
            ->findAll();
    }

    public function updateJumlah($jml, $id)
    {
        return $this->query("UPDATE barang SET jumlah = '$jml' WHERE id_barang = $id ");
    }
}