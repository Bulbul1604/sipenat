<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>Invoice<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
   <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
         <div class="card-body p-4">
            <div class="table-responsive">
               <table class="table text-wrap mb-0 align-middle" id="transactionTable">
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
                              <?php if ($transaction->in_status == "belum lunas") : ?>
                                 <span class="badge text-sm text-bg-danger">Belum Lunas
                                 <?php elseif ($transaction->in_status == "lunas") : ?>
                                    <span class="badge text-sm text-bg-success">Lunas
                                    <?php endif; ?>
                                    </span>
                           </td>
                           <td class="border-bottom-0 d-flex gap-2">
                              <a href="<?= site_url('invoice/unduh/' . $transaction->tid); ?>" target="_blank" class="btn btn-sm btn-primary"><i class="ti ti-download"></i> Unduh Invoice</a>
                              <?php if (session('role') == 'kapal') : ?>
                                 <a href="<?= site_url('invoice/upload/' . $transaction->tid); ?>" class="btn btn-sm btn-primary"><i class="ti ti-upload"></i> Upload Bukti</a>
                              <?php endif; ?>
                              <?php if (session('role') == 'keuangan') : ?>
                                 <?php if ($transaction->in_status == "belum lunas") : ?>
                                    <a href="<?= site_url('invoice/konfirmasi/' . $transaction->in_id); ?>" class="btn btn-sm btn-success"><i class="ti ti-check"></i> Konfirmasi</a>
                                 <?php endif ?>
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
      $('#transactionTable').DataTable({
         order: [
            [4, 'desc']
         ],
      });
   });
</script>
<?= $this->endSection() ?>
