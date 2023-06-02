<?php

namespace App\Models;

use CodeIgniter\Model;

class DetailTransactionModel extends Model
{
   protected $table            = 'detail_transactions';
   protected $primaryKey       = 'id';
   protected $useAutoIncrement = true;
   protected $returnType       = 'object';
   protected $useTimestamps    = false;
   protected $allowedFields    = [
      'transaction_id', 'tgl_start', 'priod1_start', 'priod2_start', 'tgl_finish', 'priod1_finish', 'priod2_finish', 'meter_one_end', 'meter_two_end', 'meter_three_end', 'meter_one_beginning', 'meter_two_beginning', 'meter_three_beginning', 'meter_one_reception', 'meter_two_reception', 'meter_three_reception', 'total', 'flow_meter', 'information'
   ];
}
