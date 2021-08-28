<?php

namespace App\Models;

use CodeIgniter\Model;

class AnggotaKelasModel extends Model
{
    protected $table = 'anggota_kelas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id', 'kode_siswa', 'id_kelas', 'absensi_ganjil', 'catatan_walas_ganjil', 'nilai_sikap_ganjil', 'absensi_genap', 'catatan_walas_genap', 'nilai_sikap_genap', 'status_lanjut'];
}
