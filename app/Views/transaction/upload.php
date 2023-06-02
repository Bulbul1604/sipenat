<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>Bukti Permintaan Air<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
   <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
         <div class="card-body p-4">
            <form method="post" action="<?= site_url('transaction/postUpload/' . $transaction->tid); ?>" enctype="multipart/form-data">
               <?= csrf_field(); ?>
               <div class="mb-3">
                  <label for="name" class="form-label">Pemilik/ Agen</label>
                  <input type="text" class="form-control" id="name" name="name" value="<?= strtoupper($transaction->name) ?>" required readonly>
               </div>
               <div class="mb-3">
                  <label for="ship" class="form-label">Nama Kapal</label>
                  <input type="text" class="form-control" id="ship" name="ship" value="<?= strtoupper($transaction->ship) ?>" required readonly>
               </div>
               <div class="mb-3">
                  <label for="tra_document" class="form-label">Upload Bukti Permintaan Air TTD</label>
                  <input type="file" class="form-control" id="tra_document" name="tra_document" required>
               </div>
               <button type=" submit" class="btn btn-primary">Kirim</button>
            </form>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection() ?>
