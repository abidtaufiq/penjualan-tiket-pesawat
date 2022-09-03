<div class="panel box-shadow-none content-header">
  <div class="panel-body capitalize">
    <div class="col-md-12">
        <h3 class="animated fadeInLeft"><?= $judul ?></h3>
        <p class="animated fadeInDown capitalize">
          <?= $folder?> <span class="fa-angle-right fa"></span> <?= $p ?> <span class="fa-angle-right fa"></span>  <?= $btn ?>
        </p>
    </div>
  </div>
</div>

<div class="form-element">
  <div class="col-md-12 padding-0">
    <div class="col-md-12">
      <div class="panel form-element-padding">
        <div class="panel-body">
          <div class="alert alert-info alert-dismissible fade in" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            Pastikan bahwa semua data telah anda isi. Jika ingin berpindah form silahkan klik salah satu menu di bawah ini.
          </div>

          <div class="col-md-12">
            <?= form_open_multipart($url); ?>
             <div class="col-md-12">
               <ul id="tabs-demo4" class="nav nav-tabs nav-tabs-v3" role="tablist">
                <li role="presentation" class="active">
                  <a href="#tabs-demo4-area1" id="tabs-demo4-1" role="tab" data-toggle="tab" aria-expanded="true">Bandara</a>
                </li>
                <li role="presentation" class="">
                  <a href="#tabs-demo4-area2" role="tab" id="tabs-demo4-2" data-toggle="tab" aria-expanded="false">Pesawat</a>
                </li>
                <li role="presentation">
                  <a href="#tabs-demo4-area3" id="tabs-demo4-3" role="tab" data-toggle="tab" aria-expanded="false">Penerbangan</a>
                </li>
              </ul>
              <div id="tabsDemo4Content" class="tab-content tab-content-v3">
                <div role="tabpanel" class="tab-pane fade active in" id="tabs-demo4-area1" aria-labelledby="tabs-demo4-area1">
                  <div class="form-group">
                <label class="col-sm-2 control-label text-right">ID Bandara</label>
                <div class="col-sm-10">
                  <input type="text" name="id_bandara" id="id_bandara" class="form-control" required onclick="bandara('pilihbandara')" data-toggle="modal" data-target="#modal" readonly placeholder="Klik di sini">
                </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label text-right">Kode Bandara</label>
                  <div class="col-sm-10">
                    <input type="text" name="kode" id="kode" class="form-control" required readonly="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label text-right">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" id="nama_bandara" class="form-control" required readonly="">
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label text-right">Kota</label>
                  <div class="col-sm-10">
                    <input type="text" name="kota" id="kota" class="form-control" required readonly="">
                  </div>
                </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tabs-demo4-area2" aria-labelledby="tabs-demo4-area2">
                  <div class="form-group">
                    <label class="col-sm-2 control-label text-right">ID Pesawat</label>
                    <div class="col-sm-10">
                      <input type="text" name="id_pesawat" id="id_pesawat" class="form-control" required readonly="" onclick="pesawat()" data-toggle="modal" data-target="#modal" placeholder="klik di sini">
                    </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label text-right">Tipe Pesawat</label>
                      <div class="col-sm-10">
                        <input type="text" name="tipe" id="tipe" class="form-control" required readonly="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label text-right">Jml Kursi Ekonomi</label>
                      <div class="col-sm-10">
                        <input type="number" min="0" name="ekonomi" id="ekonomi" class="form-control" required readonly="">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 control-label text-right">Jml Kursi Bisnis</label>
                      <div class="col-sm-10">
                        <input type="number" min="0" name="bisnis" id="bisnis" class="form-control" required readonly="">
                      </div>
                    </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tabs-demo4-area3" aria-labelledby="tabs-demo4-area3">
                  <div class="form-group">
                  <label class="col-sm-2 control-label text-right">ID Penerbangan</label>
                  <div class="col-sm-10">
                    <input type="text" name="id_penerbangan" class="form-control" required value="<?= $id; ?>" readonly>
                  </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label text-right">Tgl Penerbangan</label>
                    <div class="col-sm-10">
                      <input type="date" name="tgl_penerbangan" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label text-right">Asal</label>
                    <div class="col-sm-10">
                      <input type="text" name="asal" id="asal" class="form-control" required readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label text-right">Bandara Tujuan</label>
                    <div class="col-sm-10">
                      <input type="text" name="bandara_tujuan" class="form-control" placeholder="Klik di sini" id="namaBandaraTujuan" onclick="bandara('pilihBandaraTujuan')" data-toggle="modal" data-target="#modal" required readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label text-right">Tujuan</label>
                    <div class="col-sm-10">
                      <input type="text" name="tujuan" id="tujuan" class="form-control" required readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label text-right">Jam Berangkat</label>
                    <div class="col-sm-10">
                      <input type="time" name="jam_berangkat" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label text-right">Jam Tiba</label>
                    <div class="col-sm-10">
                      <input type="time" name="jam_tiba" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="<?= $btn; ?>" class="btn btn-raised btn-primary">
                    <input type="reset" value="Reset" class="btn btn-raised btn-warning">
                  </div>
                </div>
              </div>
            </div>
            <?= form_close();?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  function bandara(btn) {
    $.ajax({
      url: "<?= site_url('penerbangan/modalbandara'); ?>",
      type : "post",
      data : { btn : btn },
      success:function (page) {
        $(".modal-content").html(page);
      }
    })
  }
  function pilihbandara(id) {
    $.ajax({
      url : "<?= site_url('penerbangan/valbandara') ?>",
      type : "post",
      dataType : "json",
      data : {
        id : id
      },
      success:function(val) {
        $("#id_bandara").val(val.id_bandara);
        $("#kode").val(val.kode);
        $("#nama_bandara").val(val.nama);
        $("#kota").val(val.kota);
        $("#asal").val(val.kota);
      }
    })
  }
  function pesawat() {
    $.ajax({
      url: "<?= site_url('penerbangan/modalpesawat'); ?>",
      success:function (page) {
        $(".modal-content").html(page);
      }
    })
  }
  function pilihpesawat(id) {
    $.ajax({
      url : "<?= site_url('penerbangan/valpesawat') ?>",
      type : "post",
      dataType : "json",
      data : {
        id : id
      },
      success:function(val) {
        $("#id_pesawat").val(val.id_pesawat);
        $("#tipe").val(val.tipe);
        $("#ekonomi").val(val.ekonomi);
        $("#bisnis").val(val.bisnis);
      }
    })
  }
  function pilihBandaraTujuan(id) {
    $.ajax({
      url : "<?= site_url('penerbangan/valbandara') ?>",
      type : "post",
      dataType : "json",
      data : {
        id : id
      },
      success:function(val) {
        $("#namaBandaraTujuan").val(val.nama);
        $("#tujuan").val(val.kota);
      }
    })
  }
</script>