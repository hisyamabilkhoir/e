<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaKelasModel extends Model
{
    protected $table = 'anggota_kelas';
    protected $primaryKey = 'kode';
    protected $allowedFields = ['kode', 'kode_siswa', 'absensi_ganjil', 'catatan_walas_ganjil', 'nilai_sikap_ganjil', 'absensi_genap', 'catatan_walas_genap', 'nilai_sikap_genap', 'status_lanjut'];
}
