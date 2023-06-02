<!doctype html>
<html lang="en">

<head>
   <?= $this->include('layouts/_head') ?>
</head>

<body>
   <!--  Body Wrapper -->
   <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
      <!-- Sidebar Start -->
      <?= $this->include('layouts/_sidebar') ?>
      <!--  Sidebar End -->
      <!--  Main wrapper -->
      <div class="body-wrapper">
         <!--  Header Start -->
         <?= $this->include('layouts/_navbar') ?>
         <!--  Header End -->
         <div class="container-fluid">
            <!-- <div class="card">
               <div class="card-body"> -->
            <h5 class="card-title fw-semibold mb-4"> <?= $this->renderSection('title') ?></h5>
            <?= $this->renderSection('content') ?>
            <!-- </div>
            </div> -->
         </div>
      </div>
   </div>

   <?= $this->renderSection('beforeScript') ?>
   <?= $this->include('layouts/_script') ?>
   <?= $this->renderSection('afterScript') ?>
</body>

</html>
