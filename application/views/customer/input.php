<?php
    if ($btn == "Edit") {
      $data = $val->row_array();
    }else{
      $data['id_customer'] = $id;
      $data['nama'] = "";
      $data['email'] = "";
      $data['kota'] = "";
      $data['negara'] = "";
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
                <label class="col-sm-2 control-label text-right">ID Customer</label>
                <div class="col-sm-10">
                  <input type="text" name="id_customer" class="form-control" required value="<?= $data['id_customer']; ?>" readonly>
                </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label text-right">Nama</label>
                  <div class="col-sm-10">
                    <input type="text" name="nama" value="<?= $data['nama'];?>" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label text-right">Email</label>
                  <div class="col-sm-10">
                    <input type="email" name="email" value="<?= $data['email'];?>" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label text-right">Kota</label>
                  <div class="col-sm-10">
                    <input type="text" name="kota" value="<?= $data['kota'];?>" class="form-control" required>
                  </div>
                </div>
                <div class="form-group">
                  <label class="col-sm-2 control-label text-right">Negara</label>
                  <div class="col-sm-10">
                    <input type="text" name="negara" value="<?= $data['negara'];?>" class="form-control" required>
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