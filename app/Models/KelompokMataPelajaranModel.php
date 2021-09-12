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

        return $this->db->table('kelompok_mata_pelajaran')
            ->join('kelas', 'kelas.id = kelompok_mata_pelajaran.id_kelas')
            ->where(['kelas.id' => $id, 'kelompok_mata_pelajaran.id_kelas' => $id])
            ->select(['kelompok_mata_pelajaran.nama_kelompok', 'kelompok_mata_pelajaran.id_kelas', 'kelas.kelas'])
            ->get()
            ->getResultArray();
    }

    public function getKelompokMapel($id = false)
    {
        if ($id == false) {
            return $this->findAll();
        }

        return $this->where(['id' => $id])->first();
    }


    public function getDataKelompokMapel($awal, $akhir, $id)
    {
        $kelompok_mapel = $this->table('kelompok_mata_pelajaran')
            ->join('kelas', 'kelas.id = kelompok_mata_pelajaran.id_kelas')
            ->join('tahun_pelajaran', 'kelas.id_tahun_pelajaran = tahun_pelajaran.id')
            ->where(['tahun_pelajaran.tahun_awal' => $awal, 'tahun_pelajaran.tahun_akhir' => $akhir, 'kelompok_mata_pelajaran.id_kelas' => $id])
            ->select(['kelas.tingkat', 'kelas.kelas', 'kelompok_mata_pelajaran.id', 'kelompok_mata_pelajaran.nama_kelompok', 'kelompok_mata_pelajaran.id_kelas'])
            ->get()
            ->getResultArray();

        $jumlah_kelompok_mapel = count($kelompok_mapel);

        $mapel = $this->db->table('mata_pelajaran')
            ->join('kelas', 'kelas.id = mata_pelajaran.id_kelas')
            ->join('kelompok_mata_pelajaran', 'kelompok_mata_pelajaran.id = mata_pelajaran.id_kelompok_mapel_kelas')
            ->join('pegawai', 'pegawai.kode = mata_pelajaran.kode_guru')
            ->where(['mata_pelajaran.id_kelas' => $id, 'kelompok_mata_pelajaran.id_kelas' => $id])
            ->select(['mata_pelajaran.nama_mapel', 'mata_pelajaran.id_kelompok_mapel_kelas', 'mata_pelajaran.id', 'pegawai.nama'])
            ->get()
            ->getResultArray();

        $jm = count($mapel);

        for ($a = 0; $a < $jumlah_kelompok_mapel; $a++) {
            if (!isset($kelompok_mapel[$a]['pelajaran'])) {
                $kelompok_mapel[$a]['pelajaran'] = [];
                for ($i = 0; $i < $jm; $i++) {
                    if ($kelompok_mapel[$a]['id'] == $mapel[$i]['id_kelompok_mapel_kelas']) {
                        $kelompok_mapel[$a]['pelajaran'][] = $mapel[$i];
                    }
                }
            }
        }

        return $kelompok_mapel;
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

    public function updateKelompokMapelValid($idKelas, $nama_kelompok, $idTahun)
    {
        return $this->db->table('kelompok_mata_pelajaran')
            ->join('kelas', 'kelas.id = kelompok_mata_pelajaran.id_kelas')
            ->join('pegawai', 'pegawai.kode = kelas.kode_walas')
            ->where(['kelompok_mata_pelajaran.nama_kelompok' => $nama_kelompok, 'kelompok_mata_pelajaran.id_kelas' => $idKelas, 'kelas.id_tahun_pelajaran' => $idTahun])
            ->select(['kelompok_mata_pelajaran.nama_kelompok', 'pegawai.kode', 'kelompok_mata_pelajaran.id_kelas', 'kelompok_mata_pelajaran.id'])
            ->get()
            ->getResultArray();

        // ->where(['kelompok_mata_pelajaran.nama_kelompok' => $nama_kelompok, 'kelas.id' => $idKelas, 'kelas.id_tahun_pelajaran' => $idTahun])
        // ->select(['kelompok_mata_pelajaran.nama_kelompok', 'kelompok_mata_pelajaran.id_kelas', 'kelompok_mata_pelajaran.id'])
    }
}
