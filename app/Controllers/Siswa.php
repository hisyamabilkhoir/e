<?php

namespace App\Controllers;

use PHPExcel;
use PHPExcel_IOFactory;


use App\Models\SiswaModel;

class Siswa extends BaseController
{
    protected $siswa;
    public function __construct()
    {
        helper("form");
        $this->siswa = new SiswaModel();
        $this->req = \Config\Services::request();
    }

    public function index()
    {
        $currentPage = $this->request->getVar('page_siswa') ? $this->request->getVar('page_siswa') : 1;

        $keyword = $this->request->getVar('keyword');
        if ($keyword) {
            $siswa = $this->siswa->search($keyword);
        } else {
            $siswa = $this->siswa;
        }

        $data = [
            'validation' => \Config\Services::validation(),
            //'siswa' => $this->siswa->findAll(),
            'siswa' => $siswa->paginate(7, 'siswa'),
            'pager' => $this->siswa->pager,
            'currentPage' => $currentPage
        ];
        return view('dashboard/siswa/index', $data);
    }



    public function tambah()
    {
        $data = [
            'validation' => \Config\Services::validation(),
        ];
        return view('dashboard/siswa/tambah', $data);
    }

    public function proses_tambah()
    {
        if (!$this->validate([
            'nis'          => [
                'rules' => 'required|numeric|is_unique[siswa.nomor_induk]',
                'errors' => [
                    'required' => 'Masukkan nis terlebih dahulu',
                    'numeric' => 'Hanya boleh diisi angka !',
                    'is_unique' => 'nis sudah terdaftar !',
                ],
            ],
            'nisn'          => [
                'rules' => 'required|numeric|is_unique[siswa.nisn]',
                'errors' => [
                    'required' => 'Masukkan nisn terlebih dahulu',
                    'numeric' => 'Hanya boleh diisi angka !',
                    'is_unique' => 'nisn sudah terdaftar !',
                ],
            ],
            'nik'          => [
                'rules' => 'required|numeric|is_unique[siswa.nik]',
                'errors' => [
                    'required' => 'Masukkan nik terlebih dahulu',
                    'numeric' => 'Hanya boleh diisi angka !',
                    'is_unique' => 'nik sudah terdaftar !',
                ],
            ],
            'nama'          => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Masukkan nama terlebih dahulu',
                    'min_length' => 'Masukkan minimal 3 huruf',
                ],
            ],
            'tempat_lahir'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan tempat lahir terlebih dahulu',
                ],
            ],
            'tanggal_lahir'          => [
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'Masukkan tanggal lahir terlebih dahulu',
                    'valid_date' => 'format tanggal tidak valid !',
                ],
            ],
            'agama'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan agama terlebih dahulu',
                ],
            ],
            'status_dalam_keluarga'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan status dalam keluarga terlebih dahulu',
                ],
            ],
            'anak_ke'          => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'isi kolom ini terlebih dahulu',
                    'numeric' => 'harap isi dengan angka !',
                ],
            ],
            'alamat_siswa'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan alamat terlebih dahulu',
                ],
            ],
            'no_hp_siswa'          => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Masukkan nomor handphone siswa !',
                    'numeric' => 'Hanya boleh diisi angka !',
                ],
            ],
            'asal_sekolah'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan asal sekolah terlebih dahulu',
                ],
            ],
            'kelas_diterima'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan kelas diterima terlebih dahulu',
                ],
            ],
            'tanggal_diterima'          => [
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'Masukkan tanggal diterima terlebih dahulu',
                    'valid_date' => 'format tanggal tidak valid !',
                ],
            ],
            'nama_ayah'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan nama ayah terlebih dahulu',
                ],
            ],
            'nama_ibu'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan nama ibu terlebih dahulu',
                ],
            ],
            'alamat_ortu'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan alamat orang tua terlebih dahulu',
                ],
            ],
            'pekerjaan_ayah'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan pekerjaan ayah terlebih dahulu',
                ],
            ],
            'pekerjaan_ibu'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan pekerjaan ibu terlebih dahulu',
                ],
            ],
            'no_telepon_ortu'          => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Masukkan nomor handphone orang tua !',
                    'numeric' => 'Hanya boleh diisi angka !',
                ],
            ],
            'nama_wali'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan nama wali terlebih dahulu',
                ],
            ],
            'alamat_wali'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan alamat wali terlebih dahulu',
                ],
            ],
            'no_telepon_wali'          => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Masukkan nomor handphone wali !',
                    'numeric' => 'Hanya boleh diisi angka !',
                ],
            ],
            'pekerjaan_wali'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan pekerjaan wali terlebih dahulu',
                ],
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/siswa/tambah')->withInput()->with('validation', $validation);
        }

        helper('text');
        $code_random = random_string('alnum', 7);
        $code = strtoupper($code_random);


        $this->siswa->insert([
            'kode' => $code,
            'nomor_induk' => $this->req->getVar('nis'),
            'nisn' => $this->req->getVar('nisn'),
            'nik' => $this->req->getVar('nik'),
            'nama_lengkap' => $this->req->getVar('nama'),
            'tempat_lahir' => $this->req->getVar('tempat_lahir'),
            'tgl_lahir' => $this->req->getVar('tanggal_lahir'),
            'jk' => $this->req->getVar('jk'),
            'agama' => $this->req->getVar('agama'),
            'status_dalam_keluarga' => $this->req->getVar('status_dalam_keluarga'),
            'anak_ke' => (int)$this->req->getVar('anak_ke'),
            'alamat_siswa' => $this->req->getVar('alamat_siswa'),
            'nomor_handphone_peserta_didik' => $this->req->getVar('no_hp_siswa'),
            'sekolah_asal' => $this->req->getVar('asal_sekolah'),
            'kelas_diterima' => $this->req->getVar('kelas_diterima'),
            'tgl_diterima' => $this->req->getVar('tanggal_diterima'),
            'nama_ayah' => $this->req->getVar('nama_ayah'),
            'nama_ibu' => $this->req->getVar('nama_ibu'),
            'alamat_ortu' => $this->req->getVar('alamat_ortu'),
            'nomor_telpon_ortu' => $this->req->getVar('no_telepon_ortu'),
            'pekerjaan_ayah' => $this->req->getVar('pekerjaan_ayah'),
            'pekerjaan_ibu' => $this->req->getVar('pekerjaan_ibu'),
            'nama_wali' => $this->req->getVar('nama_wali'),
            'alamat_wali' => $this->req->getVar('alamat_wali'),
            'nomor_telpon_wali' => $this->req->getVar('no_telepon_wali'),
            'pekerjaan_wali' => $this->req->getVar('pekerjaan_wali'),
            'status' => 1,
        ]);


        session()->setFlashdata('msg', 'Data Berhasil ditambahkan');

        return redirect()->to('/siswa');
    }



    //Function Ubah Siswa !!!!!
    public function ubah($kode)
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'siswa' => $this->siswa->getSiswa($kode),
        ];

        return view('dashboard/siswa/ubah', $data);
    }

    public function proses_ubah()
    {
        $kode = $this->request->getVar('kode');

        $data_siswa = $this->siswa->getSiswa($kode);

        if ($data_siswa['nomor_induk'] == $this->request->getVar('nis')) {
            $rule_nis = 'required';
        } else {
            $rule_nis = 'required|numeric|is_unique[siswa.nomor_induk]';
        }

        if ($data_siswa['nisn'] == $this->request->getVar('nisn')) {
            $rule_nisn = 'required';
        } else {
            $rule_nisn = 'required|numeric|is_unique[siswa.nisn]';
        }

        if ($data_siswa['nik'] == $this->request->getVar('nik')) {
            $rule_nik = 'required';
        } else {
            $rule_nik = 'required|numeric|is_unique[siswa.nik]';
        }

        if (!$this->validate([
            'nis'          => [
                'rules' => $rule_nis,
                'errors' => [
                    'required' => 'Masukkan nis terlebih dahulu',
                    'numeric' => 'Hanya boleh diisi angka !',
                    'is_unique' => 'nis sudah terdaftar !',
                ],
            ],
            'nisn'          => [
                'rules' => $rule_nisn,
                'errors' => [
                    'required' => 'Masukkan nisn terlebih dahulu',
                    'numeric' => 'Hanya boleh diisi angka !',
                    'is_unique' => 'nisn sudah terdaftar !',
                ],
            ],
            'nik'          => [
                'rules' => $rule_nik,
                'errors' => [
                    'required' => 'Masukkan nik terlebih dahulu',
                    'numeric' => 'Hanya boleh diisi angka !',
                    'is_unique' => 'nik sudah terdaftar !',
                ],
            ],
            'nama'          => [
                'rules' => 'required|min_length[3]',
                'errors' => [
                    'required' => 'Masukkan nama terlebih dahulu',
                    'min_length' => 'Masukkan minimal 3 huruf',
                ],
            ],
            'tempat_lahir'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan tempat lahir terlebih dahulu',
                ],
            ],
            'tanggal_lahir'          => [
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'Masukkan tanggal lahir terlebih dahulu',
                    'valid_date' => 'format tanggal tidak valid !',
                ],
            ],
            'agama'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan agama terlebih dahulu',
                ],
            ],
            'status_dalam_keluarga'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan status dalam keluarga terlebih dahulu',
                ],
            ],
            'anak_ke'          => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'isi kolom ini terlebih dahulu',
                    'numeric' => 'harap isi dengan angka !',
                ],
            ],
            'alamat_siswa'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan alamat terlebih dahulu',
                ],
            ],
            'no_hp_siswa'          => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Masukkan nomor handphone siswa !',
                    'numeric' => 'Hanya boleh diisi angka !',
                ],
            ],
            'asal_sekolah'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan asal sekolah terlebih dahulu',
                ],
            ],
            'kelas_diterima'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan kelas diterima terlebih dahulu',
                ],
            ],
            'tanggal_diterima'          => [
                'rules' => 'required|valid_date',
                'errors' => [
                    'required' => 'Masukkan tanggal diterima terlebih dahulu',
                    'valid_date' => 'format tanggal tidak valid !',
                ],
            ],
            'nama_ayah'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan nama ayah terlebih dahulu',
                ],
            ],
            'nama_ibu'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan nama ibu terlebih dahulu',
                ],
            ],
            'alamat_ortu'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan alamat orang tua terlebih dahulu',
                ],
            ],
            'pekerjaan_ayah'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan pekerjaan ayah terlebih dahulu',
                ],
            ],
            'pekerjaan_ibu'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan pekerjaan ibu terlebih dahulu',
                ],
            ],
            'no_telepon_ortu'          => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Masukkan nomor handphone orang tua !',
                    'numeric' => 'Hanya boleh diisi angka !',
                ],
            ],
            'nama_wali'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan nama wali terlebih dahulu',
                ],
            ],
            'alamat_wali'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan alamat wali terlebih dahulu',
                ],
            ],
            'no_telepon_wali'          => [
                'rules' => 'required|numeric',
                'errors' => [
                    'required' => 'Masukkan nomor handphone wali !',
                    'numeric' => 'Hanya boleh diisi angka !',
                ],
            ],
            'pekerjaan_wali'          => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Masukkan pekerjaan wali terlebih dahulu',
                ],
            ],
        ])) {
            $validation = \Config\Services::validation();
            return redirect()->to('/siswa/ubah/' . $kode)->withInput()->with('validation', $validation);
        }



        $this->siswa->save([
            'kode' => $kode,
            'nomor_induk' => $this->req->getVar('nis'),
            'nisn' => $this->req->getVar('nisn'),
            'nik' => $this->req->getVar('nik'),
            'nama_lengkap' => $this->req->getVar('nama'),
            'tempat_lahir' => $this->req->getVar('tempat_lahir'),
            'tgl_lahir' => $this->req->getVar('tanggal_lahir'),
            'jk' => $this->req->getVar('jk'),
            'agama' => $this->req->getVar('agama'),
            'status_dalam_keluarga' => $this->req->getVar('status_dalam_keluarga'),
            'anak_ke' => (int)$this->req->getVar('anak_ke'),
            'alamat_siswa' => $this->req->getVar('alamat_siswa'),
            'nomor_handphone_peserta_didik' => $this->req->getVar('no_hp_siswa'),
            'sekolah_asal' => $this->req->getVar('asal_sekolah'),
            'kelas_diterima' => $this->req->getVar('kelas_diterima'),
            'tgl_diterima' => $this->req->getVar('tanggal_diterima'),
            'nama_ayah' => $this->req->getVar('nama_ayah'),
            'nama_ibu' => $this->req->getVar('nama_ibu'),
            'alamat_ortu' => $this->req->getVar('alamat_ortu'),
            'nomor_telpon_ortu' => $this->req->getVar('no_telepon_ortu'),
            'pekerjaan_ayah' => $this->req->getVar('pekerjaan_ayah'),
            'pekerjaan_ibu' => $this->req->getVar('pekerjaan_ibu'),
            'nama_wali' => $this->req->getVar('nama_wali'),
            'alamat_wali' => $this->req->getVar('alamat_wali'),
            'nomor_telpon_wali' => $this->req->getVar('no_telepon_wali'),
            'pekerjaan_wali' => $this->req->getVar('pekerjaan_wali'),
            // 'status' => 1,
        ]);


        session()->setFlashdata('msg', 'Data Berhasil diubah !');

        return redirect()->to('/siswa');
    }

    public function hapus($kode)
    {

        $this->siswa->delete(['kode' => $kode]);

        session()->setFlashdata('msg', 'Data Berhasil dihapus !');

        return redirect()->to(base_url('/siswa'));
    }

    public function download()
    {
        return $this->response->download('public/excel/contoh.xlsx', null);
    }

    public function view_import()
    {
        return view('dashboard/siswa/view_import');
    }

    public function prosesExcel()
    {
        $file = $this->request->getFile('file_excel');
        $ext = $file->getClientExtension();

        //$inputFileType = 'Xlsx';

        if ($ext == 'xls') {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
        } else {
            $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        }

        //$reader =  \PhpOffice\PhpSpreadsheet\IOFactory::createReader($inputFileType);


        $spreadsheet = $render->load($file);
        $sheet = $spreadsheet->getActiveSheet()->toArray();

        foreach ($sheet as $x => $excel) {
            //skip judul tabel
            if ($x == 0) {
                continue;
            }

            helper('text');
            $code_random = random_string('alnum', 7);
            $code = strtoupper($code_random);

            //format tanggal lahir
            $tgl_lahir = strtotime($excel['5']);
            $tanggal_lahir = date('Y-m-d', $tgl_lahir);

            //format tanggal diterima
            $tgl_diterima = strtotime($excel['14']);
            $tanggal_diterima = date('Y-m-d', $tgl_diterima);

            $this->siswa->insert([
                'kode' => $code,
                'nomor_induk' => $excel['0'],
                'nisn' => $excel['1'],
                'nik' => $excel['2'],
                'nama_lengkap' => $excel['3'],
                'tempat_lahir' => $excel['4'],
                'tgl_lahir' => $tanggal_lahir,
                'jk' => $excel['6'],
                'agama' => $excel['7'],
                'status_dalam_keluarga' => $excel['8'],
                'anak_ke' => $excel['9'],
                'alamat_siswa' => $excel['10'],
                'nomor_handphone_peserta_didik' => $excel['11'],
                'sekolah_asal' => $excel['12'],
                'kelas_diterima' => $excel['13'],
                'tgl_diterima' => $tanggal_diterima,
                'nama_ayah' => $excel['15'],
                'nama_ibu' => $excel['16'],
                'alamat_ortu' => $excel['17'],
                'nomor_telpon_ortu' => $excel['18'],
                'pekerjaan_ayah' => $excel['19'],
                'pekerjaan_ibu' => $excel['20'],
                'nama_wali' => $excel['21'],
                'alamat_wali' => $excel['22'],
                'nomor_telpon_wali' => $excel['23'],
                'pekerjaan_wali' => $excel['24'],
                'status' => 1,
            ]);
        }

        session()->setFlashdata('msg', 'Data Siswa Berhasil ditambahkan !');
        return redirect()->to(base_url('/siswa'));
    }
}
