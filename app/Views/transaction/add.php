<?= $this->extend('layouts/app') ?>

<?= $this->section('title') ?>Bukti Permintaan Air<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="row">
   <div class="col-lg-12 d-flex align-items-stretch">
      <div class="card w-100">
         <div class="card-body p-4">
            <form method="post" action="<?= site_url('transaction/save'); ?>">
               <?= csrf_field(); ?>
               <input type="hidden" name="request_id" id="request_id" value="<?= $request->id ?>">
               <div class="row">
                  <div class="col-12 col-md-6 mb-3">
                     <label for="a_no" class="form-label">Berdasarkan permohonan bentuk I A No.<span class="text-danger">*</span></label>
                     <input type="text" class="form-control" id="a_no" name="a_no" required>
                  </div>
                  <div class="col-12 col-md-6 mb-3">
                     <label for="tgl_a_no" class="form-label">Tgl.<span class="text-danger">*</span></label>
                     <input type="date" class="form-control" id="tgl_a_no" name="tgl_a_no" required>
                  </div>
               </div>
               <div class="row">
                  <div class="col-12 col-md-6 mb-3">
                     <label for="spk_no" class="form-label">SPK No.</label>
                     <input type="text" class="form-control" id="spk_no" name="spk_no">
                  </div>
                  <div class="col-12 col-md-6 mb-3">
                     <label for="tgl_spk_no" class="form-label">Tgl.</label>
                     <input type="date" class="form-control" id="tgl_spk_no" name="tgl_spk_no">
                  </div>
               </div>
               <div class="mb-3">
                  <label for="ship" class="form-label">KLM/ KM/ MV/ LCT/ TB</label>
                  <input type="text" class="form-control" id="ship" name="ship" value="<?= strtoupper($request->ship) ?>" required>
               </div>
               <div class="mb-3">
                  <label for="flag" class="form-label">Bendera</label>
                  <input type="text" class="form-control" id="flag" name="flag" value="<?= strtoupper($request->flag) ?>" required>
               </div>
               <div class="mb-3">
                  <label for="lean" class="form-label">Bertambat di</label>
                  <input type="text" class="form-control" id="lean" name="lean" value="<?= strtoupper($request->lean) ?>" required>
               </div>
               <div class="mb-3">
                  <label for="name" class="form-label">Pemilik/ Agen</label>
                  <input type="text" class="form-control" id="name" name="name" value="<?= strtoupper($request->name) ?>" required>
               </div>
               <div class="mb-3">
                  <label for="date" class="form-label">Tanggal Pengisian</label>
                  <input type="date" class="form-control" id="date" name="date" value="<?= $request->date ?>" required>
               </div>
               <div class="mb-3">
                  <label for="requests" class="form-label">Air Tawar</label>
                  <input type="text" class="form-control" id="requests" name="requests" value="<?= $request->requests ?>" required>
               </div>
               <hr />
               <div class="row">
                  <div class="col-12 col-md-4 mb-3">
                     <label for="tgl_start" class="form-label">Mulai : Tanggal/ Jam Pelayanan<span class="text-danger">*</span></label>
                     <input type="date" class="form-control" id="tgl_start" name="tgl_start" required>
                  </div>
                  <div class="col-12 col-md-4 mb-3">
                     <label for="priod1_start" class="form-label">Mulai : Masa I/ Dalam Jam Kerja<span class="text-danger">*</span></label>
                     <input type="time" class="form-control" id="priod1_start" name="priod1_start" required>
                  </div>
                  <div class="col-12 col-md-4 mb-3">
                     <label for="priod2_start" class="form-label">Mulai : Masa II/ Diluar Jam Kerja</label>
                     <input type="time" class="form-control" id="priod2_start" name="priod2_start">
                  </div>
               </div>
               <div class="row">
                  <div class="col-12 col-md-4 mb-3">
                     <label for="tgl_finish" class="form-label">Selesai : Tanggal/ Jam Pelayanan<span class="text-danger">*</span></label>
                     <input type="date" class="form-control" id="tgl_finish" name="tgl_finish" required>
                  </div>
                  <div class="col-12 col-md-4 mb-3">
                     <label for="priod1_finish" class="form-label">Selesai : Masa I/ Dalam Jam Kerja<span class="text-danger">*</span></label>
                     <input type="time" class="form-control" id="priod1_finish" name="priod1_finish" required>
                  </div>
                  <div class="col-12 col-md-4 mb-3">
                     <label for="priod2_finish" class="form-label">Selesai : Masa II/ Diluar Jam Kerja</label>
                     <input type="time" class="form-control" id="priod2_finish" name="priod2_finish">
                  </div>
               </div>
               <hr />
               <div class="row">
                  <div class="col-12 col-md-4 mb-3">
                     <label for="meter_one_end" class="form-label">Meteran Pertama : Angka Akhir<span class="text-danger">*</span></label>
                     <input type="text" class="form-control" id="meter_one_end" name="meter_one_end" required>
                  </div>
                  <div class="col-12 col-md-4 mb-3">
                     <label for="meter_two_end" class="form-label">Meteran Kedua : Angka Akhir<span class="text-danger">*</span></label>
                     <input type="text" class="form-control" id="meter_two_end" name="meter_two_end" required>
                  </div>
                  <div class="col-12 col-md-4 mb-3">
                     <label for="meter_three_end" class="form-label">Meteran Ketiga : Angka Akhir<span class="text-danger">*</span></label>
                     <input type="text" class="form-control" id="meter_three_end" name="meter_three_end" required>
                  </div>
               </div>
               <div class="row">
                  <div class="col-12 col-md-4 mb-3">
                     <label for="meter_one_beginning" class="form-label">Meteran Pertama : Angka Awal<span class="text-danger">*</span></label>
                     <input type="text" class="form-control" id="meter_one_beginning" name="meter_one_beginning" required>
                  </div>
                  <div class="col-12 col-md-4 mb-3">
                     <label for="meter_two_beginning" class="form-label">Meteran Kedua : Angka Awal<span class="text-danger">*</span></label>
                     <input type="text" class="form-control" id="meter_two_beginning" name="meter_two_beginning" required>
                  </div>
                  <div class="col-12 col-md-4 mb-3">
                     <label for="meter_three_beginning" class="form-label">Meteran Ketiga : Angka Awal<span class="text-danger">*</span></label>
                     <input type="text" class="form-control" id="meter_three_beginning" name="meter_three_beginning" required>
                  </div>
               </div>
               <div class="row">
                  <div class="col-12 col-md-4 mb-3">
                     <label for="meter_one_reception" class="form-label">Meteran Pertama : Penerimaan<span class="text-danger">*</span></label>
                     <div class="input-group mb-3">
                        <input type="text" class="form-control" id="meter_one_reception" name="meter_one_reception" required>
                        <span class="input-group-text"> ton/ m3</span>
                     </div>
                  </div>
                  <div class="col-12 col-md-4 mb-3">
                     <label for="meter_two_reception" class="form-label">Meteran Kedua : Penerimaan<span class="text-danger">*</span></label>
                     <div class="input-group mb-3">
                        <input type="text" class="form-control" id="meter_two_reception" name="meter_two_reception" required>
                        <span class="input-group-text"> ton/ m3</span>
                     </div>
                  </div>
                  <div class="col-12 col-md-4 mb-3">
                     <label for="meter_three_reception" class="form-label">Meteran Ketiga : Penerimaan<span class="text-danger">*</span></label>
                     <div class="input-group mb-3">
                        <input type="text" class="form-control" id="meter_three_reception" name="meter_three_reception" required>
                        <span class="input-group-text"> ton/ m3</span>
                     </div>
                  </div>
               </div>
               <hr />
               <div class="mb-3 col-md-4 col-12 mx-auto text-center">
                  <label for="total" class="form-label">Jumlah</label>
                  <div class="input-group mb-3">
                     <input type="text" class="form-control" id="total" name="total" required>
                     <span class="input-group-text"> ton/ m3</span>
                  </div>
               </div>
               <div class="mb-3">
                  <label for="flow_meter" class="form-label">Tonage Penjualan Air Berdasarkan Flow Meter</label>
                  <textarea name="flow_meter" id="flow_meter" class="form-control" cols="3" required></textarea>
               </div>
               <hr />
               <div class="mb-3">
                  <label for="keterangan" class="form-label">K E T E R A N G A N</label>
                  <textarea name="keterangan" id="keterangan" class="form-control" cols="3"></textarea>
               </div>
               <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
         </div>
      </div>
   </div>
</div>
<?= $this->endSection() ?>
