<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12">
        <h3 class="animated fadeInLeft"><?= $judul ?></h3>
        <p class="animated fadeInDown">
          Laporan <span class="fa-angle-right fa"></span> View
        </p>
    </div>
  </div>
</div>

<div class="col-md-12" style="padding:20px;">
    <div class="col-md-12 padding-0">
        <div class="panel box-v3">
          <div class="panel-body">
				    <div class="col-md-12">
                <p>Pilih Jenis Laporan</p>
                <select class="col-md-6 form-control" id="jenis" onchange="pilih()">
                  <option value="">--Pilih--</option>
                  <option value="tanggal">Tanggal</option>
                  <option value="bulan">Bulan</option>
                </select>
              </div>
              <div id="typeBulan" hidden="">
              <?= form_open_multipart('laporan/bulan','target=_blank'); ?>
                <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                  <div class="form-group">
                    <label for="dari">Bulan</label>
                    <select name="bulan" class="form-control show-tick" required="">
                      <option value="">--Pilih Bulan--</option>
                      <option value="01">Januari</option>
                      <option value="02">Februari</option>
                      <option value="03">Maret</option>
                      <option value="04">April</option>
                      <option value="05">Mei</option>
                      <option value="06">Juni</option>
                      <option value="07">Juli</option>
                      <option value="08">Agustus</option>
                      <option value="09">September</option>
                      <option value="10">Oktober</option>
                      <option value="11">November</option>
                      <option value="12">Desember</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-primary btn-raised"><i class="fa fa-print"></i> Print</button>
              </div>
              <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <label for="sampai">Tahun</label>
                  <select name="tahun" class="form-control" required="">
                    <?php
                      $mulai= date('Y') - 19;
                      for($i = $mulai;$i<$mulai + 20;$i++){
                          $sel = $i == date('Y') ? ' selected="selected"' : '';
                          echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
                      }
                    ?>
                  </select>
                </div>
              </div>
            <?= form_close() ?>
          </div>
          <div id="typeTanggal" hidden="">
          <?= form_open_multipart('laporan/taggal','target=_blank'); ?>
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <label for="dari">Bulan</label>
                  <input type="date" name="tgl1" class="form-control" required="">
                </div>
                <button type="submit" class="btn btn-primary btn-raised"><i class="fa fa-print"></i> Print</button>
            </div>
            <div class="col-md-6 col-lg-6 col-sm-6 col-xs-6">
                <div class="form-group">
                  <label for="dari">Bulan</label>
                  <input type="date" name="tgl2" class="form-control" required="">
                </div>
            </div>
          <?= form_close();?>
       </div>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

function pilih() {
  var jenis = $("#jenis").val();
  if ( jenis == "tanggal") {
    $("#typeBulan").hide();
    $("#typeTanggal").show();
  }else{
    $("#typeBulan").show();
    $("#typeTanggal").hide();
  }
}
</script>