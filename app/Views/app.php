<!--

=========================================================
* Swipe - Mobile App One Page Bootstrap 5 Template
=========================================================

* Product Page: https://themesberg.com/product/bootstrap/swipe-free-mobile-app-one-page-bootstrap-5-template
* Copyright 2020 Themesberg (https://www.themesberg.com)

* Coded by https://themesberg.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. Contact us if you want to remove it.

-->
<!DOCTYPE html>
<html lang="en">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
   <!-- Primary Meta Tags -->
   <title>Sistem Informasi Penjualan Air Tawar</title>
   <link href="https://fonts.googleapis.com/css2?family=Righteous&display=swap" rel="stylesheet">
   <!-- Favicon -->
   <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url(); ?>assets/favicon.svg">
   <!-- Fontawesome -->
   <link type="text/css" href="<?= base_url(); ?>assets/vendors/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
   <!-- Swipe CSS -->
   <link type="text/css" href="<?= base_url(); ?>assets/css/swipe.css" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.css">
</head>

<body>

   <?= $this->renderSection('content') ?>

   <!-- Core -->
   <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
   <script src="<?= base_url(); ?>assets/vendors/popper.js/dist/umd/popper.min.js"></script>
   <script src="<?= base_url(); ?>assets/vendors/bootstrap/dist/js/bootstrap.min.js"></script>
   <script src="<?= base_url(); ?>assets/vendors/headroom.js/dist/headroom.min.js"></script>
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

</body>

</html>
