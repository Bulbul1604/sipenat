<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>Permohonan Pengisian Air<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
   <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
         <div class="card-body p-4">
            <div class="d-flex justify-content-end mb-3">
               <?php if (session('role') == "kapal") : ?>
                  <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#permohonanPengisianAir"><i class="ti ti-circle-plus me-1"></i> Permohonan Pengisian Air</button>
               <?php endif ?>
            </div>
            <div class="table-responsive">
               <table class="table text-wrap mb-0 align-middle" id="requestTable">
                  <thead class="text-dark fs-4">
                     <tr>
                        <th class="border-bottom-0">
                           <h6 class="fw-semibold mb-0">Pemilik/ Agen</h6>
                        </th>
                        <th class="border-bottom-0">
                           <h6 class="fw-semibold mb-0">Nama Kapal</h6>
                        </th>
                        <th class="border-bottom-0">
                           <h6 class="fw-semibold mb-0">Bendera</h6>
                        </th>
                        <th class="border-bottom-0">
                           <h6 class="fw-semibold mb-0">Tanggal Pengisian</h6>
                        </th>
                        <th class="border-bottom-0">
                           <h6 class="fw-semibold mb-0">Status</h6>
                        </th>
                        <th class="border-bottom-0">
                           <h6 class="fw-semibold mb-0">Aksi</h6>
                        </th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($requests as $request) : ?>
                        <tr>
                           <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-1"><?= strtoupper($request->name) ?></h6>
                           </td>
                           <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-1"><?= strtoupper($request->ship) ?></h6>
                           </td>
                           <td class="border-bottom-0">
                              <h6 class="mb-1"><?= strtoupper($request->flag) ?></h6>
                           </td>
                           <td class="border-bottom-0">
                              <h6 class="mb-1"><?= date('d F Y', strtotime($request->date)) ?></h6>
                           </td>
                           <td class="border-bottom-0">
                              <?php if ($request->status == "gagal") : ?>
                                 <span class="badge text-sm text-bg-danger">Gagal
                                 <?php elseif ($request->status == "proses") : ?>
                                    <span class="badge text-sm text-bg-warning">Proses
                                    <?php elseif ($request->status == "konfirmasi") : ?>
                                       <span class="badge text-sm text-bg-info">Konfirmasi
                                       <?php elseif ($request->status == "sukses") : ?>
                                          <span class="badge text-sm text-bg-success">Sukses
                                          <?php endif; ?>
                                          </span>
                           </td>
                           <td class="border-bottom-0">
                              <a href="<?= site_url('request/show/' . $request->id); ?>" class="btn btn-sm btn-info"><i class="ti ti-info-circle"></i> Info</a>
                              <?php if (session('role') == 'operasional' || session('role') == 'superadmin') : ?>
                                 <?php if ($request->status == "proses") : ?>
                                    <a href="<?= site_url('request/confirm/' . $request->id); ?>" onclick="return confirm('Konfirmasi Permintaan ?')" class="btn btn-sm btn-primary"><i class="ti ti-checks"></i> Konfirmasi</a>
                                 <?php endif; ?>
                                 <?php if ($request->status == "sukses") : ?>
                                    <a href="<?= site_url('transaction/add/' . $request->id); ?>" class="btn btn-sm btn-primary"><i class="ti ti-file"></i> Bukti Permintaan</a>
                                 <?php endif; ?>
                              <?php endif; ?>
                           </td>
                        </tr>
                     <?php endforeach; ?>
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('beforeScript') ?>
<!-- Modal -->
<div class="modal fade" id="permohonanPengisianAir" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="permohonanPengisianAirLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="permohonanPengisianAirLabel">Permohonan Pengisian Air</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form method="post" action="<?= site_url('request/save'); ?>">
               <?= csrf_field(); ?>
               <input type="hidden" name="user_id" id="user_id" value="<?= session('user_id') ?>">
               <div class="mb-3">
                  <label for="name" class="form-label">Pemilik/ Agen</label>
                  <input type="text" class="form-control" id="name" name="name">
               </div>
               <div class="mb-3">
                  <label for="ship" class="form-label">Nama Kapal</label>
                  <input type="text" class="form-control" id="ship" name="ship">
                  <div id="ship" class="form-text">Silahkan isikan nama kapal yang benar.</div>
               </div>
               <div class="mb-3">
                  <label for="flag" class="form-label">Bendera</label>
                  <input type="text" class="form-control" id="flag" name="flag">
               </div>
               <div class="mb-3">
                  <label for="requests" class="form-label">Banyak Permintaan</label>
                  <div class="input-group mb-3">
                     <input type="text" class="form-control" id="requests" name="requests">
                     <span class="input-group-text">TON</span>
                  </div>
               </div>
               <div class="mb-3">
                  <label for="date" class="form-label">Tanggal Pengisian</label>
                  <input type="date" class="form-control" id="date" name="date">
               </div>
               <div class="mb-3">
                  <label for="lean" class="form-label">Sandar</label>
                  <input type="text" class="form-control" id="lean" name="lean">
               </div>
               <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('afterScript') ?>
<script>
   $(document).ready(function() {
      $('#requestTable').DataTable({
         order: [
            [3, 'asc']
         ],
      });
   });
</script>
<?= $this->endSection() ?>
