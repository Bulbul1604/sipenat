<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>Buat Invoice<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
   <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
         <div class="card-body p-4">
            <form method="post" action="<?= site_url('invoice/save'); ?>">
               <?= csrf_field(); ?>
               <input type="hidden" name="transaction_id" id="transaction_id" value="<?= $transaction->tid ?>">
               <div class="mb-3">
                  <label for="in_id" class="form-label">No. Invoice</label>
                  <input type="text" class="form-control" id="in_id" name="in_id" value="<?= $no_in ?>" required readonly>
               </div>
               <div class="mb-3">
                  <label for="in_date" class="form-label">Tgl. Invoice</label>
                  <input type="date" class="form-control" id="in_date" name="in_date" required>
               </div>
               <div class="mb-3">
                  <label for="in_to" class="form-label">Kepada</label>
                  <input type="text" class="form-control" id="in_to" name="in_to" value="<?= strtoupper($transaction->name) ?>" required>
               </div>
               <div class="mb-3">
                  <label for="about" class="form-label">Perihal</label>
                  <input type="text" class="form-control" id="about" name="about" required>
               </div>
               <div class="mb-3">
                  <label for="address" class="form-label">Alamat</label>
                  <input type="text" class="form-control" id="address" name="address" required>
               </div>
               <div class="mb-3">
                  <label for="in_information" class="form-label">Keterangan</label>
                  <input type="text" class="form-control" id="in_information" name="in_information" required>
               </div>
               <div class="mb-3">
                  <label for="in_total" class="form-label">Jumlah</label>
                  <input type="number" class="form-control" id="in_total" name="in_total" required>
               </div>
               <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection() ?>
