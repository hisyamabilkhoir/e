<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Level implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // dd($request);
        // jika user sudah login
        if (session()->get('logged_in') == 'pegawai') {
            // maka redirct ke halaman login
            return redirect()->to(base_url('/'));
        } else if (session()->get('logged_in') == 'admin') {
            return redirect()->to(base_url('/admin'));
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}