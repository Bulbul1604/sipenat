<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\DetailTransactionModel;
use App\Models\RequestModel;
use App\Models\TransactionModel;
use PhpOffice\PhpWord\TemplateProcessor;

class Transaction extends BaseController
{
   protected $transactions, $requests, $detail;
   public function __construct()
   {
      $this->transactions = new TransactionModel();
      $this->requests = new RequestModel();
      $this->detail = new DetailTransactionModel();
      $this->helpers = ['form', 'url'];
   }
   public function index()
   {
      $data['transactions'] = $this->transactions->joinTransactionWithRequest();
      return view('transaction/index', $data);
   }
   public function add($id)
   {
      $data['request'] = $this->requests->where('id', $id)->first();
      return view('transaction/add', $data);
   }
   public function save()
   {
      $requestId = $this->request->getVar('request_id');
      $this->requests->update($requestId, [
         'process' => 'selesai',
      ]);
      $transaction = $this->transactions->insert([
         'request_id' => $requestId,
         'a_no' => strtolower($this->request->getVar('a_no')),
         'tgl_a_no' => strtolower($this->request->getVar('tgl_a_no')),
         'tgl_a_no' => strtolower($this->request->getVar('tgl_a_no')),
         'spk_no' => strtolower($this->request->getVar('spk_no')),
         'tgl_spk_no' => strtolower($this->request->getVar('tgl_spk_no')),
         'tra_process' => 'proses',
      ]);
      $tid = $transaction;
      $this->detail->insert([
         'transaction_id' => $tid,
         'tgl_start' => strtolower($this->request->getVar('tgl_start')),
         'priod1_start' => strtolower($this->request->getVar('priod1_start')),
         'priod2_start' => strtolower($this->request->getVar('priod2_start')),
         'tgl_finish' => strtolower($this->request->getVar('tgl_finish')),
         'priod1_finish' => strtolower($this->request->getVar('priod1_finish')),
         'priod2_finish' => strtolower($this->request->getVar('priod2_finish')),
         'meter_one_end' => strtolower($this->request->getVar('meter_one_end')),
         'meter_two_end' => strtolower($this->request->getVar('meter_two_end')),
         'meter_three_end' => strtolower($this->request->getVar('meter_three_end')),
         'meter_one_beginning' => strtolower($this->request->getVar('meter_one_beginning')),
         'meter_two_beginning' => strtolower($this->request->getVar('meter_two_beginning')),
         'meter_three_beginning' => strtolower($this->request->getVar('meter_three_beginning')),
         'meter_one_reception' => strtolower($this->request->getVar('meter_one_reception')),
         'meter_two_reception' => strtolower($this->request->getVar('meter_two_reception')),
         'meter_three_reception' => strtolower($this->request->getVar('meter_three_reception')),
         'total' => strtolower($this->request->getVar('total')),
         'flow_meter' => strtolower($this->request->getVar('flow_meter')),
         'information' => strtolower($this->request->getVar('information')),
      ]);
      session()->setFlashdata("success", "Bukti Permintaan Air Berhasil Dibuat.");
      return redirect()->to(base_url('transaction'));
   }
   public function unduh($id)
   {
      $data = $this->requests->joinTransactionWithRequest($id);
      $ln = strlen($data->transaction_id);
      if ($ln == 1) {
         $tra = '0000' . $data->transaction_id;
      } else if ($ln == 2) {
         $tra = '000' . $data->transaction_id;
      } elseif ($ln == 3) {
         $tra = '00' . $data->transaction_id;
      } elseif ($ln == 4) {
         $tra = '0' . $data->transaction_id;
      } else {
         $tra = $data->transaction_id;
      }
      $word = new TemplateProcessor('template\bukti_penerimaan_air.docx');
      $word->setValues([
         'transaction_id' => $tra,
         'a_no' => strtoupper($data->a_no),
         'tgl_a_no' => date('d F Y', strtotime($data->tgl_a_no)),
         'spk_no' => strtoupper($data->spk_no),
         'tgl_spk_no' => date('d F Y', strtotime($data->tgl_spk_no)),
         'ship' => strtoupper($data->ship),
         'flag' => strtoupper($data->flag),
         'lean' => strtoupper($data->lean),
         'name' => strtoupper($data->name),
         'date' => strtoupper($data->date),
         'requests' => strtoupper($data->requests),
         'tgl_start' => strtoupper($data->tgl_start),
         'priod1_start' => strtoupper($data->priod1_start),
         'priod2_start' => strtoupper($data->priod2_start),
         'tgl_finish' => strtoupper($data->tgl_finish),
         'priod1_finish' => strtoupper($data->priod1_finish),
         'priod2_finish' => strtoupper($data->priod2_finish),
         'meter_one_end' => strtoupper($data->meter_one_end),
         'meter_two_end' => strtoupper($data->meter_two_end),
         'meter_three_end' => strtoupper($data->meter_three_end),
         'meter_one_beginning' => strtoupper($data->meter_one_beginning),
         'meter_two_beginning' => strtoupper($data->meter_two_beginning),
         'meter_three_beginning' => strtoupper($data->meter_three_beginning),
         'meter_one_reception' => strtoupper($data->meter_one_reception),
         'meter_two_reception' => strtoupper($data->meter_two_reception),
         'meter_three_reception' => strtoupper($data->meter_three_reception),
         'total' => strtoupper($data->total),
         'flow_meter' => ucwords($data->flow_meter),
         'information' => ucwords($data->information),
      ]);
      $pathToSave = "template/buktiPenerimaanAir.docx";
      $word->saveAs($pathToSave);
      header("Content-Description: File Transfer");
      header('Content-Disposition: attachment; filename="bukti_penerimaan_air.docx"');
      header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
      readfile($pathToSave);
   }
   public function upload($id)
   {
      $data['transaction'] = $this->transactions->transactionRequestWhere($id);
      return view('transaction/upload', $data);
   }
   public function postUpload($id)
   {
      $dataBerkas = $this->request->getFile('tra_document');
      $fileName = $dataBerkas->getRandomName();
      $this->transactions->update($id, [
         'tra_document' => $fileName,
      ]);
      $dataBerkas->move('uploads/bukti/', $fileName);
      session()->setFlashdata('success', 'Bukti permintaan air berhasil diupload');
      return redirect()->to(base_url('transaction'));
   }
}
