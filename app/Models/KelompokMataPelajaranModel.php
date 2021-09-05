<?php

namespace App\Models;

use CodeIgniter\Model;

class KelompokMataPelajaranModel extends Model
{
    protected $table = 'kelompok_mata_pelajaran';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_kelas', 'nama_kelompok', 'id_induk'];

    public function getKelompokById($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        //return $this->where(['id_kelas' => $id])->get()->getResultArray();
        return $this->db->table('kelompok_mata_pelajaran')
            ->join('kelas', 'kelas.id = kelompok_mata_pelajaran.id_kelas')
            ->where(['kelas.id' => $id, 'kelompok_mata_pelajaran.id_kelas' => $id])
            ->select(['kelompok_mata_pelajaran.nama_kelompok', 'kelompok_mata_pelajaran.id_kelas', 'kelas.kelas'])
            ->get()
            ->getResultArray();
    }


    public function getDataKelompokMapel($awal, $akhir, $id)
    {
        return $this->table('kelompok_mata_pelajaran')
            ->join('kelas', 'kelas.id = kelompok_mata_pelajaran.id_kelas')
            ->join('tahun_pelajaran', 'kelas.id_tahun_pelajaran = tahun_pelajaran.id')
            ->where(['tahun_pelajaran.tahun_awal' => $awal, 'tahun_pelajaran.tahun_akhir' => $akhir, 'kelompok_mata_pelajaran.id_kelas' => $id])
            ->select(['kelas.tingkat', 'kelas.kelas', 'kelompok_mata_pelajaran.id', 'kelompok_mata_pelajaran.nama_kelompok', 'kelompok_mata_pelajaran.id_kelas'])
            ->get()
            ->getResultArray();
    }


    public function getKelas($id_kelas, $nama_kelompok)
    {
        return $this->where(['id_kelas' => $id_kelas, 'nama_kelompok' => $nama_kelompok])->first();
    }


    public function getNamaKelas()
    {
        return $this->db->table('kelompok_mata_pelajaran')
            ->join('kelas', 'kelas.id = kelompok_mata_pelajaran.id_kelas')
            ->get()
            ->getResultArray();
    }

    public function getKelompokDetail($id)
    {
        return $this->where(['id' => $id])->first();
    }

    public function getDataPrint($id_kelas)
    {
        return $this->table('kelompok_mata_pelajaran')
            ->join('mata_pelajaran', 'mata_pelajaran.id_kelompok_mapel_kelas = kelompok_mata_pelajaran.id')
            ->where(['mata_pelajaran.id_kelas' => $id_kelas,])
            ->select(['kelompok_mata_pelajaran.nama_kelompok', 'mata_pelajaran.nama_mapel'])
            ->get()
            ->getResultArray();
    }
}