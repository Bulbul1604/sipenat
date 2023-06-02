<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\RequestModel;

class Request extends BaseController
{
   protected $requests;
   public function __construct()
   {
      $this->requests = new RequestModel();
      $this->helpers = ['form', 'url'];
   }
   public function index()
   {
      $userId = session('user_id');
      if (session('role') == 'kapal') {
         $data['requests'] = $this->requests->where('user_id', $userId)->findAll();
      }
      if (session('role') == 'superadmin' || session('role') == 'keuangan' || session('role') == 'operasional') {
         $data['requests'] = $this->requests->findAll();
      }
      return view('request/index', $data);
   }
   public function save()
   {
      $validation = $this->validate([
         'name' => ['rules'  => 'required', 'errors' => ['required' => 'Masukkan Nama Pemilik/ Agen.']],
         'ship' => ['rules'  => 'required', 'errors' => ['required' => 'Masukkan Nama Kapal.']],
         'flag' => ['rules'  => 'required', 'errors' => ['required' => 'Masukkan Bendera Kapal.']],
         'requests' => ['rules'  => 'required', 'errors' => ['required' => 'Masukkan Banyak Permintaan Pengisian Air.']],
         'lean' => ['rules'  => 'required', 'errors' => ['required' => 'Masukkan Lokasi Sandar Kapal.']],
         'date' => ['rules'  => 'required', 'errors' => ['required' => 'Isi Tanggal Pengisian Air.']],
      ]);
      if (!$validation) {
         return view('index', ['validation' => $this->validator]);
      }
      $this->requests->insert([
         'user_id'   => $this->request->getVar('user_id'),
         'name'   => strtolower($this->request->getVar('name')),
         'ship'   => strtolower($this->request->getVar('ship')),
         'flag'   => strtolower($this->request->getVar('flag')),
         'requests'   => strtolower($this->request->getVar('requests')),
         'lean'   => strtolower($this->request->getVar('lean')),
         'date'   => $this->request->getVar('date'),
         'status'   => 'proses',
         'information'   => 'Menunggu konfirmasi bagian operasional dan keuangan',
      ]);
      session()->setFlashdata("success", "Permohonan berhasil dikirim. Menunggu konfirmasi bagian operasional dan keuangan.");
      return redirect()->to(base_url('request'));
   }
   public function show($id)
   {
      $data['request'] = $this->requests->where('id', $id)->first();
      return view('request/show', $data);
   }
   public function confirm($id)
   {
      $this->requests->update($id, [
         'status' => 'konfirmasi',
         'information' => 'Menunggu Persetujuan Bagian Keuangan',
      ]);
      session()->setFlashdata("success", "Permohonan berhasil dikonfirmasi. Menunggu Persetujuan Bagian Keuangan");
      return redirect()->to(base_url('request'));
   }
   public function bill($id)
   {
      $value = $this->request->getVar('tagihan');
      if ($value == 'iya') {
         $status = 'gagal';
         $information = 'Terdapat tagihan pengisian sebelumnya. Silahkan lunasi terlebih dahulu sebelum melakukan transaksi';
         $proses = NULL;
      }
      if ($value == 'tidak') {
         $status = 'sukses';
         $information = 'Proses permohonan pengisian air berhasil. Bagian Operasional akan melakukan pengisian air tawar ke kapal';
         $proses = 'proses';
      }
      $this->requests->update($id, [
         'status' => $status,
         'information' => $information,
         'process' => $proses,
      ]);
      session()->setFlashdata("success", "Permohonan berhasil dikonfirmasi.");
      return redirect()->to(base_url('request'));
   }
}
