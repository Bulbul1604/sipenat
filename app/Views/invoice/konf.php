<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>Konfirmasi Bukti Pembayaran<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
   <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
         <div class="card-body p-4">
            <form method="post" action="<?= site_url('invoice/postKonfirmasi/' . $invoice->in_id); ?>" enctype="multipart/form-data">
               <?= csrf_field(); ?>
               <div class="mb-3">
                  <label for="in_id" class="form-label">No. Invoice</label>
                  <input type="text" class="form-control" id="in_id" name="in_id" value="<?= strtoupper($invoice->in_id) ?>" required readonly>
               </div>
               <div class="mb-3">
                  <a href="<?= site_url('uploads/bukti_pembayaran/' . $invoice->in_proof); ?>" target="_blank" class="fw-semibold">Unduh bukti pembayaran</a>
               </div>
               <button type=" submit" class="btn btn-primary">Konfirmasi Pembayaran</button>
            </form>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection() ?>
