<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel"><?= $jd; ?></h4>
</div>
<div class="modal-body">
    <a href="<?= site_url();?>customer/p/input" class="btn btn-raised btn-primary" style="margin-bottom: 10px;">+Tambah</a>
    <div class="table-responsive">
      <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>#</th>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Kota</th>
            <th>Negara</th>
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
            <td><?= $data->id_customer; ?></td>
            <td><?= $data->nama; ?></td>
            <td><?= $data->email; ?></td>
            <td><?= $data->kota; ?></td>
            <td><?= $data->negara; ?></td>
            <td width="160">
              <button class="btn btn-primary btn-raised" onclick="pilihcustomer('<?= $data->id_customer; ?>')" data-dismiss="modal">Pilih</button>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
</div>