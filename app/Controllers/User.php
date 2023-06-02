<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class User extends BaseController
{
   protected $user;
   public function __construct()
   {
      $this->user = new UserModel();
      $this->helpers = ['form', 'url'];
   }
   public function index()
   {
      $data['users'] = $this->user->where('role !=', 'superadmin')->findAll();
      return view('user/index', $data);
   }
   public function save()
   {
      $this->user->insert([
         'username'   => strtolower($this->request->getVar('username')),
         'password'   => password_hash(strtolower($this->request->getVar('username')), PASSWORD_BCRYPT),
         'phone'   => strtolower($this->request->getVar('phone')),
         'role'   => strtolower($this->request->getVar('role')),
      ]);
      session()->setFlashdata("success", "Data pengguna berhasil ditambahkan.");
      return redirect()->to(base_url('user'));
   }
   public function delete($id)
   {
      $this->user->delete($id);
      session()->setFlashdata('success', 'Data pengguna berhasil dihapus');
      return redirect()->to(base_url('user'));
   }
}
