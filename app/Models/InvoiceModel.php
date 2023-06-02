<?php

namespace App\Models;

use CodeIgniter\Model;


class InvoiceModel extends Model
{
   protected $table            = 'invoices';
   protected $primaryKey       = 'in_id';
   protected $useAutoIncrement = false;
   protected $returnType       = 'object';
   protected $useTimestamps = false;
   protected $allowedFields    = [
      'in_id', 'transaction_id', 'in_date', 'about', 'in_to', 'address', 'in_information', 'in_total', 'in_proof', 'in_status'
   ];

   public function joinInvWithTransaction()
   {
      return $this->select('*')
         ->select('transactions.id as tid', FALSE)
         ->join('transactions', 'transactions.id=invoices.transaction_id')
         ->join('requests', 'requests.id=transactions.request_id')
         ->where('transactions.tra_process', 'sukses')
         ->get()->getResult();
   }
   public function joinInvWithTransactionId($id)
   {
      return $this->select('*')
         ->join('transactions', 'transactions.id=invoices.transaction_id')
         ->join('requests', 'requests.id=transactions.request_id')
         ->where('transactions.id', $id)
         ->first();
   }
}
