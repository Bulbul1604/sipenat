<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\InvoiceModel;
use App\Models\TransactionModel;
use PhpOffice\PhpWord\TemplateProcessor;

class Invoice extends BaseController
{
   protected $transactions, $inv;
   public function __construct()
   {
      $this->transactions = new TransactionModel();
      $this->inv = new InvoiceModel();
      $this->helpers = ['form', 'url'];
   }
   public function index()
   {
      $data['transactions'] = $this->inv->joinInvWithTransaction();
      return view('invoice/index', $data);
   }
   public function add($id)
   {
      $data['transaction'] = $this->transactions->joinTransactionWithRequestId($id);
      $data['no_in'] = 'INV' . rand(100000, 10000000) . date('His');
      return view('invoice/add', $data);
   }
   public function save()
   {
      $transactionsId = $this->request->getVar('transaction_id');
      $this->transactions->update($transactionsId, [
         'tra_process' => 'sukses',
      ]);
      $this->inv->insert([
         'transaction_id' => strtolower($this->request->getVar('transaction_id')),
         'in_id' => strtolower($this->request->getVar('in_id')),
         'in_date' => strtolower($this->request->getVar('in_date')),
         'in_to' => strtolower($this->request->getVar('in_to')),
         'about' => strtolower($this->request->getVar('about')),
         'address' => strtolower($this->request->getVar('address')),
         'in_information' => strtolower($this->request->getVar('in_information')),
         'in_total' => strtolower($this->request->getVar('in_total')),
         'in_status' => 'belum lunas',
      ]);
      session()->setFlashdata("success", "Invoice Berhasil Dibuat.");
      return redirect()->to(base_url('invoice'));
   }
   public function unduh($id)
   {
      $data = $this->inv->where('transaction_id', $id)->first();
      $in_total = floatval($data->in_total);
      $ppn = $in_total * 0.11;
      $grand_total = $in_total + $ppn;
      $word = new TemplateProcessor('template\invocie.docx');
      $word->setValues([
         'in_id' => strtoupper($data->in_id),
         'in_date' => date('d F Y', strtotime($data->in_date)),
         'about' => ucwords($data->about),
         'to' => ucwords($data->in_to),
         'address' => ucwords($data->address),
         'in_information' => ucwords($data->in_information),
         'in_total' => number_format($data->in_total, 0, ",", "."),
         'ppn' => number_format($ppn, 0, ",", "."),
         'grand_total' => number_format($grand_total, 0, ",", "."),
      ]);
      $pathToSave = "template/buktiPenerimaanAir.docx";
      $word->saveAs($pathToSave);
      header("Content-Description: File Transfer");
      header('Content-Disposition: attachment; filename="invocie.docx"');
      header('Content-Type: application/vnd.openxmlformats-officedocument.wordprocessingml.document');
      readfile($pathToSave);
   }
   public function upload($id)
   {
      $data['invoice'] = $this->inv->joinInvWithTransactionId($id);
      return view('invoice/upload', $data);
   }
   public function postUpload($id)
   {
      $dataBerkas = $this->request->getFile('in_proof');
      $fileName = $dataBerkas->getRandomName();
      $this->inv->update($id, [
         'in_proof' => $fileName,
      ]);
      $dataBerkas->move('uploads/bukti_pembayaran/', $fileName);
      session()->setFlashdata('success', 'Bukti pembayaran berhasil diupload');
      return redirect()->to(base_url('invoice'));
   }
   public function konfirmasi($id)
   {
      $data['invoice'] = $this->inv->where('in_id', $id)->first();
      return view('invoice/konf', $data);
   }
   public function postKonfirmasi($id)
   {
      $this->inv->update($id, [
         'in_status' => 'lunas',
      ]);
      session()->setFlashdata('success', 'Bukti pembayaran berhasil dikonfirmasi');
      return redirect()->to(base_url('invoice'));
   }
}
