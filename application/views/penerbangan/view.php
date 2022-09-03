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
    <div class="panel-heading">
      <a href="<?= site_url();?>penerbangan/p/input" class="btn btn-raised btn-primary">+Tambah</a>
    </div>
      <div class="panel-body">
         <?php 
            if ($this->session->flashdata('success')) {
         ?>
         <div class="alert alert-success alert-dismissible fade in" role="alert" style="opacity: 0.5;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <?= $this->session->flashdata('success'); ?>
          </div>
          <?php } ?>
        <div class="table-responsive">
        <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>ID Penerbangan</th>
            <th>Bandara</th>
            <th>Pesawat</th>
            <th>Tgl Penerbangan</th>
            <th>Asal</th>
            <th>Tujuan</th>
            <th>Jam Berangkat</th>
            <th>Jam Tiba</th>
            <th>Bandara Tujuan</th>
            <th>Opsi</th>
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
            <td><?= $data->pesawat; ?></td>
            <td><?= $data->tgl_penerbangan; ?></td>
            <td><?= $data->asal; ?></td>
            <td><?= $data->tujuan; ?></td>
            <td><?= $data->jam_berangkat; ?></td>
            <td><?= $data->jam_tiba; ?></td>
            <td><?= $data->bandara_tujuan; ?></td>
            <td width="100">
              <a href="<?= site_url();?>penerbangan/hapus/<?= $data->id_penerbangan;?>" onclick="return confirm('Anda yakin ingin menghapus data ?')" class="btn btn-raised btn-danger">Hapus</a>
            </td>
          </tr>
          <?php } ?>
        </tbody>
          </table>
        </div>
    </div>
  </div>
</div>  
</div>