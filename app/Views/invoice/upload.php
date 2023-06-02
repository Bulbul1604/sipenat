<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>Bukti Permintaan Air<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
   <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
         <div class="card-body p-4">
            <form method="post" action="<?= site_url('invoice/postUpload/' . $invoice->in_id); ?>" enctype="multipart/form-data">
               <?= csrf_field(); ?>
               <div class="mb-3">
                  <label for="in_id" class="form-label">No. Invoice</label>
                  <input type="text" class="form-control" id="in_id" name="in_id" value="<?= strtoupper($invoice->in_id) ?>" required readonly>
               </div>
               <div class="mb-3">
                  <label for="name" class="form-label">Pemilik/ Agen</label>
                  <input type="text" class="form-control" id="name" name="name" value="<?= strtoupper($invoice->name) ?>" required readonly>
               </div>
               <div class="mb-3">
                  <label for="ship" class="form-label">Nama Kapal</label>
                  <input type="text" class="form-control" id="ship" name="ship" value="<?= strtoupper($invoice->ship) ?>" required readonly>
               </div>
               <div class="mb-3">
                  <label for="in_proof" class="form-label">Upload Bukti Pembayaran</label>
                  <input type="file" class="form-control" id="in_proof" name="in_proof" required>
               </div>
               <button type=" submit" class="btn btn-primary">Kirim</button>
            </form>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection() ?>
