<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'kode';
    protected $allowedFields = [
        'kode',
        'nomor_induk', 'nisn', 'nik', 'nama_lengkap', 'tempat_lahir', 'tgl_lahir', 'jk', 'agama', 'status_dalam_keluarga', 'anak_ke', 'alamat_siswa', 'nomor_handphone_peserta_didik', 'sekolah_asal', 'kelas_diterima', 'tgl_diterima', 'nama_ayah', 'nama_ibu', 'alamat_ortu', 'nomor_telpon_ortu', 'pekerjaan_ayah', 'pekerjaan_ibu', 'nama_wali', 'alamat_wali', 'nomor_telpon_wali', 'pekerjaan_wali', 'status'
    ];

    public function getSiswa($kode = false)
    {
        if ($kode == false) {
            return $this->findAll();
        }

        return $this->where(['kode' => $kode])->first();
    }

    public function getDataSiswa($status)
    {
        return $this->table('siswa')
            ->where(['siswa.status' => $status])
            ->select(['kode', 'nomor_induk', 'nama_lengkap'])
            ->get()
            ->getResultArray();
    }
}
