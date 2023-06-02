<?php

namespace App\Models;

use CodeIgniter\Model;

class RequestModel extends Model
{
   protected $table            = 'requests';
   protected $primaryKey       = 'id';
   protected $useAutoIncrement = true;
   protected $returnType       = 'object';
   protected $useTimestamps = false;
   protected $allowedFields    = [
      'user_id', 'name', 'ship', 'flag', 'requests', 'lean', 'date', 'status', 'information', 'process'
   ];

   public function joinRequestWithUser($id)
   {
      return $this->select('*')
         ->select('requests.id as rid', FALSE)
         ->join('users', 'users.id=requests.user_id')
         ->where('requests.id', $id)
         ->first();
   }

   public function joinTransactionWithRequest($id)
   {
      return $this->select('*')
         ->join('transactions', 'transactions.request_id=requests.id')
         ->join('detail_transactions', 'detail_transactions.transaction_id=transactions.id')
         ->where('requests.process', 'selesai')
         ->where('requests.id', $id)
         ->first();
   }
}
