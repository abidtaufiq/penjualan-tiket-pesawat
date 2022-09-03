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
      <a href="<?= site_url();?>booking/p/input" class="btn btn-raised btn-primary">+Tambah</a>
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
            <th>ID Booking</th>
            <th>Customer</th>
            <th>Tgl Booking</th>
            <th>Jumlah Penumpang</th>
            <th>Total Tarif</th>
            <th>Status Bayar</th>
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
            <td><?= $data->id_booking; ?></td>
            <td><?= ""; ?></td>
            <td><?= $data->tgl_booking; ?></td>
            <td><?= $data->jumlah_penumpang; ?></td>
            <td><?= $data->total_tarif; ?></td>
            <td><?= $data->status_bayar; ?></td>
            <td width="100">
              <a href="<?= site_url();?>booking/hapus/<?= $data->id_booking;?>/<?= $data->id_detail;?>/<?= $data->kelas;?>/<?= $data->jumlah_penumpang;?>/<?= $data->id_pesawat;?>" onclick="return confirm('Anda yakin ingin menghapus data ?')" class="btn btn-raised btn-danger">Hapus</a>
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