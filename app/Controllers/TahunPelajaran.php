<?php

namespace App\Controllers;

use App\Models\TahunPelajaranModel;


class TahunPelajaran extends BaseController
{


    protected $tahun_pelajaran;
    public function __construct()
    {
        $this->tahun_pelajaran = new TahunPelajaranModel();

        $this->req = \Config\Services::request();
    }

    public function index()
    {
        $data = [
            "tahunPelajaran" => $this->tahun_pelajaran->getTahunPelajaran(),
        ];
        return view('dashboard/tahun_pelajaran/index', $data);
    }

    public function tambah()
    {

        if ($this->req->getVar('active') == '1') {
            $resultTP = $this->tahun_pelajaran->getActive($this->req->getVar('active'));
            if ($resultTP != null) {
                $resultTP["status"] = 0;
                $this->tahun_pelajaran->save([
                    'id' => $resultTP["id"],
                    'tahun_awal' => $resultTP["tahun_awal"],
                    'tahun_akhir' => $resultTP["tahun_akhir"],
                    'status' => '0',
                ]);
            }

            $this->tahun_pelajaran->save([
                'tahun_awal' => $this->req->getVar('awal'),
                'tahun_akhir' => $this->req->getVar('akhir'),
                'status' => $this->req->getVar('active')
            ]);
            return redirect()->to(base_url('TahunPelajaran'));
        }

        $this->tahun_pelajaran->save([
            'tahun_awal' => $this->req->getVar('awal'),
            'tahun_akhir' => $this->req->getVar('akhir'),
            'status' => $this->req->getVar('active')
        ]);
        return redirect()->to(base_url('TahunPelajaran'));
    }

    public function update()
    {
        if ($this->req->getVar('active') == '1') {
            $resultTP = $this->tahun_pelajaran->getActive($this->req->getVar('active'));
            if ($resultTP != null) {
                $resultTP["status"] = 0;
                $this->tahun_pelajaran->save([
                    'id' => $resultTP["id"],
                    'tahun_awal' => $resultTP["tahun_awal"],
                    'tahun_akhir' => $resultTP["tahun_akhir"],
                    'status' => '0',
                ]);
                $this->tahun_pelajaran->save([
                    'id' => $this->req->getVar('id'),
                    'tahun_awal' => $this->req->getVar('awal'),
                    'tahun_akhir' => $this->req->getVar('akhir'),
                    'status' => $this->req->getVar('active')
                ]);
                return redirect()->to(base_url('TahunPelajaran'));
            }
        }

        $this->tahun_pelajaran->save([
            'id' => $this->req->getVar('id'),
            'tahun_awal' => $this->req->getVar('awal'),
            'tahun_akhir' => $this->req->getVar('akhir'),
            'status' => $this->req->getVar('active')
        ]);
        return redirect()->to(base_url('TahunPelajaran'));
    }

    public function hapus($id)
    {
        $user = $this->tahun_pelajaran->find($id);
        $this->tahun_pelajaran->delete($id);
        return redirect()->to(base_url('TahunPelajaran'));
    }
}