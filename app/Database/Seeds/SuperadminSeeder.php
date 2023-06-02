<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class SuperadminSeeder extends Seeder
{
   public function run()
   {
      $data = [
         'username' => 'superadmin',
         'password' => password_hash('123qweasdzxc', PASSWORD_BCRYPT),
         'phone' => null,
         'role' => 'superadmin',
      ];
      $this->db->table('users')->insert($data);
   }
}
