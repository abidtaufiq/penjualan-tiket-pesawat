<div class="panel box-shadow-none content-header">
  <div class="panel-body capitalize">
    <div class="col-md-12">
        <h3 class="animated fadeInLeft"><?= $judul ?></h3>
        <p class="animated fadeInDown">
          <?= $folder?> <span class="fa-angle-right fa"></span> <?= $p ?>
        </p>
    </div>
  </div>
</div>

<div class="col-md-12 top-20 padding-0">
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-body">
        <div class="table-responsive">
        <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>#</th>
              <th>ID Penerbangan</th>
              <th>Bandara</th>
              <th>Kota</th>
              <th>Tgl Penerbangan</th>
              <th>Asal</th>
              <th>Tujuan</th>
              <th>Jam Berangkat</th>
              <th>Jam Tiba</th>
              <th>Tipe Pesawat</th>
              <th>Kursi Ekonomi</th>
              <th>Kursi Bisnis</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $no = 1;
            foreach ($val as $data) {
           ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $data->id_penerbangan; ?></td>
              <td><?= $data->bandara; ?></td>
              <td><?= $data->kota; ?></td>
              <td><?= $data->tgl_penerbangan; ?></td>
              <td><?= $data->asal; ?></td>
              <td><?= $data->tujuan; ?></td>
              <td><?= $data->jam_berangkat; ?></td>
              <td><?= $data->jam_tiba; ?></td>
              <td><?= $data->tipe_pesawat; ?></td>
              <td><?= $data->jml_kursi_ekonomi; ?></td>
              <td><?= $data->jml_kursi_bisnis; ?></td>
            </tr>
            <?php } ?>
          </tbody>
          </table>
        </div>
    </div>
  </div>
</div>  
</div>