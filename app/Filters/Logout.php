<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Logout implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // dd($request);
        // jika user sudah login
        if (session()->get('logged_in')) {
            return redirect()->to(base_url('/home'));
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
