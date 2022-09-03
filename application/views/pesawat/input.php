<?php
    if ($btn == "Edit") {
      $data = $val->row_array();
    }else{
      $data['id_pesawat'] = $id;
      $data['tipe_pesawat'] = "";
      $data['jml_kursi_ekonomi'] = "";
      $data['jml_kursi_bisnis'] = "";
    }
 ?>

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
          <div class="col-md-12">
            <?= form_open_multipart($url); ?>
              <div>
                <div class="form-group">
                <label class="col-sm-2 control-label text-right">ID Pesawat</label>
                <div class="col-sm-10">
                  <input type="text" name="id_pesawat" class="form-control" required value="<?= $data['id_pesawat']; ?>" readonly>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label text-right">Tipe</label>
                  <div class="col-sm-10">
                    <input type="text" name="tipe_pesawat" value="<?= $data['tipe_pesawat'];?>" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label text-right">Kursi Ekonomi</label>
                  <div class="col-sm-10">
                    <input type="number" name="jml_kursi_ekonomi" value="<?= $data['jml_kursi_ekonomi'];?>" min="0" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label text-right">Kursi Bisnis</label>
                  <div class="col-sm-10">
                    <input type="number" name="jml_kursi_bisnis" value="<?= $data['jml_kursi_bisnis'];?>" min="0" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <input type="submit" value="<?= $btn; ?>" class="btn btn-raised btn-primary">
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