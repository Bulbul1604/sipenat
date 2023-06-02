<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>Pengguna<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
   <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
         <div class="card-body p-4">
            <div class="d-flex justify-content-end mb-3">
               <button type="button" class="btn btn-primary m-1" data-bs-toggle="modal" data-bs-target="#tambahDataUser"><i class="ti ti-circle-plus me-1"></i> Tambah Data</button>
            </div>
            <div class="table-responsive">
               <table class="table text-wrap mb-0 align-middle" id="userTable">
                  <thead class="text-dark fs-4">
                     <tr>
                        <th class="border-bottom-0">
                           <h6 class="fw-semibold mb-0">Username</h6>
                        </th>
                        <th class="border-bottom-0">
                           <h6 class="fw-semibold mb-0">Phone</h6>
                        </th>
                        <th class="border-bottom-0">
                           <h6 class="fw-semibold mb-0">Role</h6>
                        </th>
                        <th class="border-bottom-0">
                           <h6 class="fw-semibold mb-0">Aksi</h6>
                        </th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php foreach ($users as $user) : ?>
                        <tr>
                           <td class="border-bottom-0">
                              <h6 class="fw-semibold mb-1"><?= ucwords($user->username) ?></h6>
                           </td>
                           <td class="border-bottom-0">
                              <h6 class="mb-1"><?= strtoupper($user->phone) ?></h6>
                           </td>
                           <td class="border-bottom-0">
                              <h6 class="mb-1"><?= ucwords($user->role) ?></h6>
                           </td>
                           <td class="border-bottom-0">
                              <a href="<?= site_url('user/delete/' . $user->id); ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus data ?');"><i class="ti ti-trash"></i> Hapus</a>
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
<div class="modal fade" id="tambahDataUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="tambahDataUserLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h1 class="modal-title fs-5" id="tambahDataUserLabel">Permohonan Pengisian Air</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
         </div>
         <div class="modal-body">
            <form method="post" action="<?= site_url('user/save'); ?>">
               <?= csrf_field(); ?>
               <input type="hidden" name="user_id" id="user_id" value="<?= session('user_id') ?>">
               <div class="mb-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" id="username" name="username" required>
               </div>
               <div class="mb-3">
                  <label for="phone" class="form-label">No. WhatsApp</label>
                  <input type="number" class="form-control" id="phone" name="phone" required>
               </div>
               <div class="mb-3">
                  <label for="role" class="form-label">Role</label>
                  <select name="role" id="role" class="form-select" required>
                     <option value="">Pilih salah satu</option>
                     <option value="kapal">Penanggung Jawab Kapal</option>
                     <option value="operasional">Bagian Operasional</option>
                     <option value="keuangan">Bagian Keuangan</option>
                  </select>
               </div>
               <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection() ?>

<?= $this->section('afterScript') ?>
<script>
   $(document).ready(function() {
      $('#userTable').DataTable({
         order: [
            [3, 'asc']
         ],
      });
   });
</script>
<?= $this->endSection() ?>
