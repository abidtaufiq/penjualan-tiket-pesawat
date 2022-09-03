<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12 capitalize">
      <h3 class="animated fadeInLeft"><?= $judul ?></h3>
      <p class="animated fadeInDown">
        <?= $folder?> <span class="fa-angle-right fa"></span> <?= $p ?>
      </p>
    </div>
      <div class="col-md-12">
       <div class="alert alert-info alert-dismissible fade in" role="alert">
         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        Dimohon untuk menyelesaikan proses pemesanan sampai selesai. Jangan memuat ulang halaman (<i>reload</i>) atau beralih ke halaman yang lain.
      </div>
    </div>
  </div>
</div>

<?= form_open_multipart($url,'target=_blank'); ?>

<!-- Passenger -->
<?php 
  $x = 1;
  while ($x < $this->session->userdata('jumlah_penumpang')) {
    $x++;
 ?>
<div class="form-element">
  <div class="col-md-12 padding-0">
    <div class="col-md-12">
      <div class="panel form-element-padding">
       <div class="panel-body" style="padding-bottom:30px;">
        <div class="col-md-12">
          <div class="form-group">
            <label class="col-sm-2 control-label text-right">ID Detail Booking</label>
            <div class="col-sm-10">
              <input type="text" name="id_dtl_booking[]" id="id_dtl_booking" value="<?= $this->session->userdata('id_detail'); ?>" class="form-control" required readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label text-right">Nama</label>
            <div class="col-sm-10">
              <input type="text" name="nama[]" id="nama" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label text-right">Nomer Kursi</label>
            <div class="col-sm-10">
              <?php 
                if ($this->session->userdata('kelas') == "Ekonomi") {
                  $kls = "EKO";
                }else{
                  $kls = "BIS";
                }
               ?>
              <input type="text" name="no_kursi[]" id="no_kursi" value="<?= $kls; ?>" class="form-control" min="0" required maxlength="6">
            </div>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php 
  }
?>

<div class="form-element">
  <div class="col-md-12 padding-0">
    <div class="col-md-12">
      <div class="panel form-element-padding">
       <div class="panel-body" style="padding-bottom:30px;">
        <div class="col-md-12">
          <div class="form-group">
            <label class="col-sm-2 control-label text-right">ID Detail Booking</label>
            <div class="col-sm-10">
              <input type="text" name="id_dtl_booking[]" id="id_dtl_booking" value="<?= $this->session->userdata('id_detail'); ?>" class="form-control" required readonly>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label text-right">Nama</label>
            <div class="col-sm-10">
              <input type="text" name="nama[]" id="nama" class="form-control" required>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label text-right">Nomer Kursi</label>
            <div class="col-sm-10">
              <?php 
                if ($this->session->userdata('kelas') == "Ekonomi") {
                  $kls = "EKO";
                }else{
                  $kls = "BIS";
                }
               ?>
              <input type="text" name="no_kursi[]" id="no_kursi" value="<?= $kls; ?>" class="form-control" min="0" required maxlength="6">
            </div>
          </div>
          <input type="hidden" name="id_detail" value="<?= $this->session->userdata('id_detail'); ?>">
          <div class="form-group">
              <input type="submit" value="Simpan" class="btn btn-raised btn-primary" onclick="url()">
              <input type="reset" value="Reset" class="btn btn-raised btn-warning">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Passenger -->
<?= form_close(); ?>

<script type="text/javascript">
  function url() {
    setInterval(function () {
      window.location='/booking/p/view';
    },150)
  }
</script>