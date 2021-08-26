<?php

namespace App\Models;

use CodeIgniter\Model;

class KelompokMataPelajaranModel extends Model
{
    protected $table = 'kelompok_mata_pelajaran';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_kelas', 'nama_kelompok', 'id_induk'];

    public function getKelompokMatapelajaran($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }


    public function getDataKelompokMapel($awal, $akhir)
    {
        return $this->table('kelompok_mata_pelajaran')
            ->join('kelas', 'kelas.id = kelompok_mata_pelajaran.id_kelas')
            ->join('tahun_pelajaran', 'kelas.id_tahun_pelajaran = tahun_pelajaran.id')
            ->where(['tahun_pelajaran.tahun_awal' => $awal, 'tahun_pelajaran.tahun_akhir' => $akhir,])
            ->select(['kelas.tingkat', 'kelas.kelas', 'kelompok_mata_pelajaran.id', 'kelompok_mata_pelajaran.nama_kelompok'])
            ->get()
            ->getResultArray();
    }

    public function getWalas($id_tahun_pelajaran, $kode_walas)
    {
        return $this->table('kelas')
            ->where(['kelas.id_tahun_pelajaran' => $id_tahun_pelajaran, 'kelas.kode_walas' => $kode_walas])
            ->select(['id', 'kelas', 'kode_walas'])
            ->get()
            ->getResultArray();
    }


    // public function getKelas($id_kelas)
    // {
    //     return $this->table('kelompok_mata_pelajaran')
    //         ->where(['kelompok_mata_pelajaran.id_kelas' => $id_kelas])
    //         ->select(['id', 'id_kelas'])
    //         ->get()
    //         ->getResultArray();
    // }

    public function getKelas($id_kelas, $nama_kelompok)
    {
        return $this->where(['id_kelas' => $id_kelas, 'nama_kelompok' => $nama_kelompok])->first();
    }
}