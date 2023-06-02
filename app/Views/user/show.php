<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>Permohonan Pengisian Air<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
   <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
         <div class="card-header">
            <h5 class="fw-semibold" style="font-size: 0.9rem;">Detail Permohonan Pengisian Air</h5>
         </div>
         <div class="card-body p-4">
            <table class="table mb-0 align-middle" id="requestTable">
               <tr>
                  <th class="border-bottom-0">
                     <h6 class="fw-semibold mb-0">Pemilik/ Agen</h6>
                  </th>
                  <td class="border-bottom-0">:</td>
                  <td class="border-bottom-0">
                     <h6 class="fw-semibold mb-0"><?= strtoupper($request->name) ?></h6>
                  </td>
               </tr>
               <tr>
                  <th class="border-bottom-0">
                     <h6 class="fw-semibold mb-0">Nama Kapal</h6>
                  </th>
                  <td class="border-bottom-0">:</td>
                  <td class="border-bottom-0">
                     <h6 class="fw-semibold mb-0"><?= strtoupper($request->ship) ?></h6>
                  </td>
               </tr>
               <tr>
                  <th class="border-bottom-0">
                     <h6 class="fw-semibold mb-0">Bendera</h6>
                  </th>
                  <td class="border-bottom-0">:</td>
                  <td class="border-bottom-0">
                     <h6 class="fw-semibold mb-0"><?= strtoupper($request->flag) ?></h6>
                  </td>
               </tr>
               <tr>
                  <th class="border-bottom-0">
                     <h6 class="fw-semibold mb-0">Banyak Permintaan</h6>
                  </th>
                  <td class="border-bottom-0">:</td>
                  <td class="border-bottom-0">
                     <h6 class="fw-semibold mb-0"><?= strtoupper($request->requests) ?> TON</h6>
                  </td>
               </tr>
               <tr>
                  <th class="border-bottom-0">
                     <h6 class="fw-semibold mb-0">Tanggal Permintaan</h6>
                  </th>
                  <td class="border-bottom-0">:</td>
                  <td class="border-bottom-0">
                     <h6 class="fw-semibold mb-0"><?= date('d F Y', strtotime($request->date)) ?></h6>
                  </td>
               </tr>
               <tr>
                  <th class="border-bottom-0">
                     <h6 class="fw-semibold mb-0">Sandar</h6>
                  </th>
                  <td class="border-bottom-0">:</td>
                  <td class="border-bottom-0">
                     <h6 class="fw-semibold mb-0"><?= ucwords($request->lean) ?></h6>
                  </td>
               </tr>
               <tr>
                  <th class="border-bottom-0">
                     <h6 class="fw-semibold mb-0">Status</h6>
                  </th>
                  <td class="border-bottom-0">:</td>
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
               </tr>
               <tr>
                  <th class="border-bottom-0">
                     <h6 class="fw-semibold mb-0">Keterangan</h6>
                  </th>
                  <td class="border-bottom-0">:</td>
                  <td class="border-bottom-0">
                     <h6 class="fw-semibold mb-0"><?= ucwords($request->information) ?></h6>
                  </td>
               </tr>
            </table>
         </div>
         <div class="card-footer d-flex justify-content-end align-items-center gap-2">
            <a href="<?= site_url('request'); ?>" class="btn btn-sm btn-outline-primary">Kembali</a>
            <?php if (session('role') == 'keuangan' || session('role') == 'superadmin') : ?>
               <?php if ($request->status == "konfirmasi") : ?>
                  <button type="button" class="btn btn-sm btn-primary m-1" data-bs-toggle="modal" data-bs-target="#konfirmasi"><i class="ti ti-check"></i> Konfirmasi</button>
               <?php endif; ?>
            <?php endif; ?>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('beforeScript') ?>

<div class="modal fade" id="konfirmasi" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="konfirmasiLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="konfirmasiLabel">Konfirmasi Permohonan Pengisian Air</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form method="post" action="<?= site_url('request/bill/' . $request->id); ?>" enctype="multipart/form-data">
               <?= csrf_field(); ?>
               <div class="mb-3">
                  <label for="tagihan" class="form-label">Terdapat Tagihan Sebelumnya</label>
                  <select name="tagihan" id="tagihan" class="form-select" required>
                     <option value="">Silhakan pilih ...</option>
                     <option value="iya">Iya</option>
                     <option value="tidak">Tidak</option>
                  </select>
               </div>
               <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
         </div>
      </div>
   </div>
</div>

<?= $this->endSection() ?>
