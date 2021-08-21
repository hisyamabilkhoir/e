<?php

namespace App\Models;

use CodeIgniter\Model;

class KelasModel extends Model
{
    protected $table = 'kelas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['kelas', 'tingkat', 'kode_walas', 'id_tahun_pelajaran', 'status'];


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
            ->select(['pegawai.kode', 'kelas.id', 'kelas.tingkat', 'pegawai.nama', 'kelas.kelas'])
            ->get()
            ->getResultArray();
    }

    public function getDetailKelas($id_kelas)
    {
        return $this->table('kelas')
            ->join('anggota_kelas', 'anggota_kelas.id_kelas = kelas.id')
            ->join('siswa', 'siswa.kode = anggota_kelas.kode_siswa')
            ->where(['kelas.id' => $id_kelas, 'anggota_kelas.id_kelas' => $id_kelas,])
            ->select(['siswa.nomor_induk', 'siswa.nama_lengkap', 'siswa.jk'])
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
}
