<aside class="left-sidebar">
   <!-- Sidebar scroll-->
   <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
         <a href="<?= site_url('/'); ?>" class="mt-5">
            <h3 style="letter-spacing: 3px; color: #11142D; font-family: 'Righteous', cursive;"><strong>SIPenAT</strong></h3>
         </a>
         <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
         </div>
      </div>
      <!-- Sidebar navigation-->
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
         <ul id="sidebarnav">
            <li class="nav-small-cap">
               <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
               <span class="hide-menu">Home</span>
            </li>
            <li class="sidebar-item">
               <a class="sidebar-link" href="<?= site_url(); ?>dashboard" aria-expanded="false">
                  <span>
                     <i class="ti ti-layout-dashboard"></i>
                  </span>
                  <span class="hide-menu">Dashboard</span>
               </a>
            </li>
            <li class="nav-small-cap">
               <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
               <span class="hide-menu">COMPONENTS</span>
            </li>
            <?php if (session('role') == 'superadmin') : ?>
               <li class="sidebar-item">
                  <a class="sidebar-link" href="<?= site_url(); ?>user" aria-expanded="false">
                     <span>
                        <i class="ti ti-users"></i>
                     </span>
                     <span class="hide-menu">Pengguna</span>
                  </a>
               </li>
            <?php endif; ?>
            <li class="sidebar-item">
               <a class="sidebar-link" href="<?= site_url(); ?>request" aria-expanded="false">
                  <span>
                     <i class="ti ti-article"></i>
                  </span>
                  <span class="hide-menu">Permohonan</span>
               </a>
            </li>
            <?php if (session('role') != 'kapal') : ?>
               <li class="sidebar-item">
                  <a class="sidebar-link" href="<?= site_url(); ?>transaction" aria-expanded="false">
                     <span>
                        <i class="ti ti-files"></i>
                     </span>
                     <span class="hide-menu">Bukti Permintaan</span>
                  </a>
               </li>
            <?php endif; ?>
            <?php if (session('role') != 'operasional') : ?>
               <li class="sidebar-item">
                  <a class="sidebar-link" href="<?= site_url(); ?>invoice" aria-expanded="false">
                     <span>
                        <i class="ti ti-file-invoice"></i>
                     </span>
                     <span class="hide-menu">Invoice</span>
                  </a>
               </li>
            <?php endif; ?>
         </ul>
      </nav>
      <!-- End Sidebar navigation -->
   </div>
   <!-- End Sidebar scroll-->
</aside>
