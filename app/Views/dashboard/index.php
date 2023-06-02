<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>Dashboard<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">

   <div class="col-lg-4">
      <div class="card overflow-hidden">
         <div class="card-body p-4">
            <div class="row alig n-items-start">
               <h5 class="card-title mb-9 fw-semibold">Total Permohonan</h5>
               <div class="col-8">
                  <div>
                     <h4 class="fw-semibold mb-3"><?= count($all) ?></h4>
                     <p class="fs-3 mb-0">Permohonan</p>
                  </div>
               </div>
               <div class="col-4">
                  <div class="d-flex justify-content-end">
                     <div class="text-white bg-info rounded-circle p-6 d-flex align-items-center justify-content-center">
                        <i class="ti ti-clipboard-text fs-6"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>


   <div class="col-lg-4">
      <div class="card overflow-hidden">
         <div class="card-body p-4">
            <div class="row alig n-items-start">
               <h5 class="card-title mb-9 fw-semibold">Total Permohonan Baru</h5>
               <div class="col-8">
                  <div>
                     <h4 class="fw-semibold mb-3"><?= count($proses) ?></h4>
                     <p class="fs-3 mb-0">Permohonan</p>
                  </div>
               </div>
               <div class="col-4">
                  <div class="d-flex justify-content-end">
                     <div class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                        <i class="ti ti-clipboard-plus fs-6"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>


   <div class="col-lg-4">
      <div class="card overflow-hidden">
         <div class="card-body p-4">
            <div class="row alig n-items-start">
               <h5 class="card-title mb-9 fw-semibold">Total Permohonan Selesai</h5>
               <div class="col-8">
                  <div>
                     <h4 class="fw-semibold mb-3"><?= count($selesai) ?></h4>
                     <p class="fs-3 mb-0">Permohonan</p>
                  </div>
               </div>
               <div class="col-4">
                  <div class="d-flex justify-content-end">
                     <div class="text-white bg-success rounded-circle p-6 d-flex align-items-center justify-content-center">
                        <i class="ti ti-file-check fs-6"></i>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>


</div>
<?= $this->endSection() ?>
