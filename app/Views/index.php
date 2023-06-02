<?= $this->extend('app') ?>

<?= $this->section('content') ?>
<header class="header-global" id="home">
   <nav id="navbar-main" aria-label="Primary navigation" class="navbar navbar-main navbar-expand-lg navbar-theme-primary headroom navbar-light navbar-theme-secondary">
      <div class="container">
         <a href="<?= base_url(); ?>"><span class="font-weight-bolder" style="letter-spacing: 3px; font-family: 'Righteous', cursive;">SIPenAT</span></a>
         <div class="d-flex align-items-centen">
            <?php if (session('logged_in') == FALSE) : ?>
               <a href="<?= base_url('login'); ?>" class="btn btn-sm btn-tertiary text-white d-inline animate-up-2">Masuk<i class="fas fa-sign-in-alt ml-2"></i></a>
            <?php else : ?>
               <a href="<?= base_url('dashboard') ?>" class="btn btn-sm btn-outline-tertiary d-inline animate-up-2"><?= ucwords(session('username')); ?></a>
            <?php endif; ?>
         </div>
      </div>
   </nav>
</header>
<main>
   <!-- Hero -->
   <section class="section section-header text-dark pb-md-8">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-12 col-md-10 text-center mb-3">
               <h1 class="display-3 font-weight-bolder mb-4" style="letter-spacing: 6px; font-family: 'Righteous', cursive;">
                  SIPenAT
               </h1>
               <p class="my-5 lh-lg" style="font-size: 1rem; font-weight: 500;">Sistem Informasi Penjualan Air Tawar (SIPenAT) merupakan sebuah sistem yang digunakan untuk proses pembelian air tawar ke kapal melalui Perumda AUJ Kota Bontang.</p>
            </div>
            <div class="col-12 col-md-10 d-flex justify-content-center">
               <img class="d-inline-block" src="<?= base_url(); ?>assets/img/illustrations.png" alt="Illustration Water Form Freepik" width="620">
            </div>
         </div>
      </div>
   </section>
</main>

<!-- Modal Pengisian Air -->
<div class="modal fade" id="pengisianAir" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="pengisianAirLabel" aria-hidden="true">
   <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="pengisianAirLabel">Permohonan Pengisian Air</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body px-5">
            <?php if (isset($validation)) : ?>
               <div class="alert alert-danger alert-dismissible show fade">
                  <?= $validation->listErrors() ?>
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
               </div>
            <?php endif; ?>
            <form action="<?= site_url('/'); ?>" method="post" enctype="multipart/form-data">
               <?= csrf_field(); ?>
               <div class="mb-3">
                  <label for="name" class="form-label">Nama Penanggung Jawab</label>
                  <input type="text" class="form-control" name="name" id="name" placeholder="Surya Awaliya" required>
               </div>
               <div class="mb-3">
                  <label for="phone" class="form-label">Nomor WA</label>
                  <input type="number" class="form-control" name="phone" id="phone" placeholder="081234567890" required>
               </div>
               <div class="mb-3">
                  <label for="date" class="form-label">Tanggal</label>
                  <input type="date" class="form-control" name="date" id="date" required>
               </div>
               <div class="mb-3">
                  <label for="ship" class="form-label">Nama Kapal</label>
                  <input type="text" class="form-control" name="ship" id="ship" placeholder="KM Binaiya" required>
               </div>
               <div class="mb-3">
                  <label for="document" class="form-label">Surat Pengisian Air</label>
                  <input type="file" class="form-control" required name="document" id="document">
               </div>
               <div class="text-end">
                  <button type="submit" class="btn btn-dark">Simpan</button>
               </div>
            </form>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection() ?>
