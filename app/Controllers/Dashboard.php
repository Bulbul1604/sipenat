<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RequestModel;

class Dashboard extends BaseController
{
   public function index()
   {
      $permohonan = new RequestModel();
      $id = session('user_id');
      $role = session('role');
      if ($role == 'kapal') {
         $data['all'] = $permohonan->findAll();
         $data['proses'] = $permohonan->where('status', 'proses')->where('user_id', $id)->findAll();
         $data['selesai'] = $permohonan->where('status', 'sukses')->where('user_id', $id)->findAll();
      } else {
         $data['all'] = $permohonan->findAll();
         $data['proses'] = $permohonan->where('status', 'proses')->findAll();
         $data['selesai'] = $permohonan->where('status', 'sukses')->findAll();
      }
      return view('dashboard/index', $data);
   }
}
