<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
   protected $table            = 'users';
   protected $primaryKey       = 'id';
   protected $useAutoIncrement = true;
   protected $returnType       = 'object';
   protected $useTimestamps = false;
   protected $allowedFields    = [
      'username', 'password', 'phone', 'role'
   ];
}
