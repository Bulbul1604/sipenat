<?php

namespace App\Models;

use CodeIgniter\Model;

class TransactionModel extends Model
{
   protected $table            = 'transactions';
   protected $primaryKey       = 'id';
   protected $useAutoIncrement = true;
   protected $returnType       = 'object';
   protected $useTimestamps = false;
   protected $allowedFields    = [
      'request_id', 'a_no', 'tgl_a_no', 'spk_no', 'tgl_spk_no', 'tra_process', 'tra_document'
   ];

   public function joinTransactionWithRequest()
   {
      return $this->select('*')
         ->select('transactions.id as tid', FALSE)
         ->join('requests', 'requests.id=transactions.request_id')
         // ->where('transactions.tra_document', null)
         ->get()->getResult();
   }
   public function transactionRequestWhere($id)
   {
      return $this->select('*')
         ->select('transactions.id as tid', FALSE)
         ->join('requests', 'requests.id=transactions.request_id')
         ->where('transactions.id', $id)
         ->first();
   }
   public function joinTransactionWithRequestId($id)
   {
      return $this->select('*')
         ->select('transactions.id as tid', FALSE)
         ->join('requests', 'requests.id=transactions.request_id')
         ->where('transactions.tra_process', 'proses')
         ->where('transactions.id', $id)
         ->first();
   }
}
