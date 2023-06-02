<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>Bukti Permintaan Air<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
   <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
         <div class="card-body p-4">
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
                     <?php foreach ($transactions as $transaction) : ?>
                        <tr>
                           <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-1"><?= strtoupper($transaction->name) ?></h6>
                           </td>
                           <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-1"><?= strtoupper($transaction->ship) ?></h6>
                           </td>
                           <td class="border-bottom-0">
                              <h6 class="mb-1"><?= strtoupper($transaction->flag) ?></h6>
                           </td>
                           <td class="border-bottom-0">
                              <h6 class="mb-1"><?= date('d F Y', strtotime($transaction->date)) ?></h6>
                           </td>
                           <td class="border-bottom-0">
                              <?php if ($transaction->tra_process == "proses") : ?>
                                 <span class="badge text-sm text-bg-info">Proses
                                 <?php elseif ($transaction->tra_process == "sukses") : ?>
                                    <span class="badge text-sm text-bg-success">Sukses
                                    <?php endif; ?>
                                    </span>
                           </td>
                           <td class="border-bottom-0">
                              <?php if (session('role') == 'operasional') : ?>
                                 <?php if ($transaction->process == "selesai") : ?>
                                    <a href="<?= site_url('transaction/unduh/' . $transaction->id); ?>" target="_blank" class="btn btn-sm btn-info"><i class="ti ti-download"></i> Unduh</a>
                                 <?php endif ?>
                                 <a href="<?= site_url('transaction/upload/' . $transaction->tid); ?>" class="btn btn-sm btn-primary"><i class="ti ti-upload"></i> Upload</a>
                              <?php endif; ?>
                              <?php if (session('role') == 'keuangan') : ?>
                                 <?php if ($transaction->tra_document != null) : ?>
                                    <a href="<?= site_url('invoice/add/' . $transaction->tid); ?>" class="btn btn-sm btn-info"><i class="ti ti-file"></i> Buat Invoice</a>
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

<?= $this->section('afterScript') ?>
<script>
   $(document).ready(function() {
      $('#requestTable').DataTable({
         order: [
            [4, 'asc']
         ],
      });
   });
</script>
<?= $this->endSection() ?>
