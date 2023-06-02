<?= $this->extend('app') ?>

<?= $this->section('content') ?>
<main>
   <!-- Section -->
   <section class="min-vh-100 d-flex align-items-center bg-soft">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-12 col-md-8 col-lg-6">
               <div class="signin-inner mt-3 mt-lg-0 bg-white shadow border rounded border-light w-100">
                  <div class="row gx-0">
                     <div class="col-12 px-3 py-5 px-sm-5 px-md-6">
                        <div class="text-center text-md-center mb-4 mt-md-0">
                           <a href="<?= site_url('/'); ?>">
                              <h1 class="mb-0 h4 font-weight-bolder" style="letter-spacing: 6px; font-family: 'Righteous', cursive;">SIPenAT</h1>
                              <p class="mt-1 mb-3">Sistem Informasi Penjualan Air Tawar</p>
                           </a>
                        </div>
                        <form action="<?= site_url('login'); ?>" method="post" class="mt-4">
                           <?= csrf_field(); ?>
                           <div class="form-group mb-4">
                              <label for="username">Username</label>
                              <div class="input-group">
                                 <span class="input-group-text" id="basic-addon1"><span class="fas fa-user"></span></span>
                                 <input type="text" class="form-control" name="username" id="username">
                              </div>
                           </div>
                           <!-- End of Form -->
                           <div class="form-group">
                              <!-- Form -->
                              <div class="form-group mb-4">
                                 <label for="password">Password</label>
                                 <div class="input-group">
                                    <span class="input-group-text" id="basic-addon2"><span class="fas fa-unlock-alt"></span></span>
                                    <input type="password" name="password" class="form-control" id="password">
                                 </div>
                              </div>
                           </div>
                           <button type="submit" class="btn btn-block btn-dark">Masuk</button>
                        </form>
                        <div class="d-flex justify-content-center align-items-center mt-4">
                           <span class="font-weight-normal">
                              Belum punya akun?
                              <a href="<?= base_url('register'); ?>" class="font-weight-bold">Silahkan buat akun.</a>
                           </span>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
</main>

<?= $this->endSection() ?>
