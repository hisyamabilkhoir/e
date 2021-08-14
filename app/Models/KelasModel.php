<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kelas', 'tingkat', 'kode_walas', 'id_tahun_pelajaran'];


    public function getKelas($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }
        return $this->where(['id' => $id])->first();
    }
    public function getDataKelas($awal, $akhir)
    {
        return $this->table('kelas')
            ->join('pegawai', 'pegawai.kode = kelas.kode_walas')
            ->join('tahun_pelajaran', 'kelas.id_tahun_pelajaran = tahun_pelajaran.id')
            ->where(['tahun_pelajaran.tahun_awal' => $awal, 'tahun_pelajaran.tahun_akhir' => $akhir,])
            ->select(['pegawai.kode', 'kelas.tingkat', 'pegawai.nama', 'kelas.kelas'])
            ->get()
            ->getResultArray();
    }
}
