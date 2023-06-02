<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Auth extends BaseController
{
   protected $model;
   public function __construct()
   {
      $this->model = new UserModel();
      $this->helpers = ['form', 'url'];
   }
   public function login()
   {
      return view('auth/login');
   }
   public function loginVerif()
   {
      $username = $this->request->getVar('username');
      $password = $this->request->getVar('password');
      $dataUser = $this->model->where([
         'username' => $username,
      ])->first();
      if (!$dataUser || !password_verify($password, $dataUser->password)) {
         session()->setFlashdata('error', 'Username atau Password Salah');
         return redirect()->back();
      }
      $set = [
         'user_id' => $dataUser->id,
         'username' => $dataUser->username,
         'phone' => $dataUser->phone,
         'role' => $dataUser->role,
         'logged_in' => TRUE
      ];
      session()->set($set);
      return redirect()->to(base_url('dashboard'));
   }
   public function register()
   {
      return view('auth/register');
   }
   public function registerVerif()
   {
      if (!$this->validate([
         'username' => ['rules' => 'required|is_unique[users.username]', 'errors' => ['required' => 'Masukkan Username.', 'is_unique' => 'Username Telah Terdaftar.']],
         'password' => ['rules' => 'required|min_length[4]', 'errors' => ['required' => 'Masukkab Kata Sandi', 'min_length' => 'Kata Sandi Minimal 4 Karakter',]],
         'phone' => ['rules' => 'required', 'errors' => ['required' => 'Masukkan Nomor WhatsApp',]],
      ])) {
         session()->setFlashdata('error', $this->validator->listErrors());
         return redirect()->back()->withInput();
      }
      $this->model->insert([
         'username' => $this->request->getVar('username'),
         'password' => password_hash($this->request->getVar('password'), PASSWORD_BCRYPT),
         'phone' => $this->request->getVar('phone'),
         'role' => 'kapal',
      ]);
      session()->setFlashdata("success", "Pendaftaran akun berhasil. Silahkan login!");
      return redirect()->to('login');
   }
   function logout()
   {
      session()->destroy();
      return redirect()->to('/');
   }
}
