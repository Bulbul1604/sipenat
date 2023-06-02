<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class RedirectIfAuthenticated implements FilterInterface
{
   public function before(RequestInterface $request, $arguments = null)
   {
      if (session('logged_in')) {
         return redirect()->to(site_url('dashboard'));
      }
   }

   public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
   {
      //
   }
}