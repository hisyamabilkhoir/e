<?php

namespace App\Models;

use CodeIgniter\Model;

class MataPelajaranModel extends Model
{
    protected $table = 'mata_pelajaran';
    protected $primaryKey = 'id';
    protected $allowedFields = ['id_kelas', 'id_tahun', 'id_kelompok_mapel_kelas', 'nama_mapel', 'kode_guru', 'bobot_nilai_harian_pengetahuan', 'bobot_nilai_akhir_pengetahuan', 'bobot_nilai_harian_keterampilan', 'bobot_nilai_akhir_keterampilan', 'interval_pengetahuan', 'interval_kompetensi', 'kalimat_kurang_pengetahuan', 'kalimat_kurang_keterampilan'];

    public function getMatapelajaran($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }
}