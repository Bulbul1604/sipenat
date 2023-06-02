<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="<?= base_url(); ?>assets/js/sidebarmenu.js"></script>
<script src="<?= base_url(); ?>assets/js/app.min.js"></script>
<script src="<?= base_url(); ?>assets/libs/simplebar/dist/simplebar.js"></script>
<script>
   $(function() {
      <?php if (session()->has("success")) : ?>
         Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: '<?= session("success") ?>'
         })
      <?php endif; ?>

      <?php if (session()->has("error")) : ?>
         Swal.fire({
            icon: 'error',
            title: 'Gagal!',
            text: '<?= session("error") ?>'
         })
      <?php endif; ?>
   });
</script>
