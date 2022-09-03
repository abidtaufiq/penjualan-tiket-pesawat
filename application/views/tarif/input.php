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
              <ul id="tabs-demo4" class="nav nav-tabs nav-tabs-v3" role="tablist">
                <li role="presentation" class="active">
                  <a href="#tabs-demo4-area1" id="tabs-demo4-1" role="tab" data-toggle="tab" aria-expanded="true">Penerbangan</a>
                </li>
                <li role="presentation" class="">
                  <a href="#tabs-demo4-area2" role="tab" id="tabs-demo4-2" data-toggle="tab" aria-expanded="false">Tarif</a>
                </li>
              </ul>
              <div id="tabsDemo4Content" class="tab-content tab-content-v3">
                <div role="tabpanel" class="tab-pane fade active in" id="tabs-demo4-area1" aria-labelledby="tabs-demo4-area1">
                  <div class="form-group">
                    <label class="col-sm-2 control-label text-right">ID Penerbangan</label>
                    <div class="col-sm-10">
                    <input type="text" name="id_penerbangan" id="id_penerbangan" class="form-control" required readonly placeholder="Klik di sini" onclick="penerbangan()" data-toggle="modal" data-target="#modal">
                  </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label text-right">Tgl Penerbangan</label>
                    <div class="col-sm-10">
                      <input type="date" id="tgl_penerbangan" name="tgl_penerbangan" class="form-control" required readonly="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label text-right">Asal</label>
                    <div class="col-sm-10">
                      <input type="text" id="asal" name="asal" class="form-control" required readonly="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label text-right">Tujuan</label>
                    <div class="col-sm-10">
                      <input type="text" id="tujuan" name="tujuan" class="form-control" required readonly="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label text-right">Jam Berangkat</label>
                    <div class="col-sm-10">
                      <input type="time" id="jam_berangkat" name="jam_berangkat" class="form-control" required readonly="">
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label text-right">Jam Tiba</label>
                    <div class="col-sm-10">
                      <input type="time" id="jam_tiba" name="jam_tiba" class="form-control" required readonly="">
                    </div>
                  </div>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tabs-demo4-area2" aria-labelledby="tabs-demo4-area2">
                  <div class="form-group">
                    <label class="col-sm-2 control-label text-right">ID Tarif</label>
                    <div class="col-sm-10">
                      <input type="text" name="id_tarif" class="form-control" required value="<?= $id; ?>" readonly>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label text-right">Kelas</label>
                    <div class="col-sm-10">
                      <select name="kelas" class="form-control" style="margin-top:0px;" required="">
                        <option value="">--Pilih--</option>
                        <option value="Ekonomi">Ekonomi</option>
                        <option value="Bisnis">Bisnis</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group">
                    <label class="col-sm-2 control-label text-right">Tarif</label>
                    <div class="col-sm-10">
                      <input type="number" name="tarif" class="form-control" required>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Simpan" class="btn btn-raised btn-primary">
                    <input type="reset" value="Reset" class="btn btn-raised btn-warning">
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
  function penerbangan() {
    $.ajax({
      url: "<?= site_url('tarif/modalpenerbangan'); ?>",
      success:function (page) {
        $(".modal-content").html(page);
      }
    })
  }
  function pilihpenerbangan(id) {
    $.ajax({
      url : "<?= site_url('tarif/valpenerbangan') ?>",
      type : "post",
      dataType : "json",
      data : {
        id : id
      },
      success:function(val) {
        $("#id_penerbangan").val(val.id_penerbangan);
        $("#tgl_penerbangan").val(val.tgl_penerbangan);
        $("#asal").val(val.asal);
        $("#tujuan").val(val.tujuan);
        $("#jam_berangkat").val(val.jam_berangkat);
        $("#jam_tiba").val(val.jam_tiba);
      }
    })
  }
</script>