<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel"><?= $jd; ?></h4>
</div>
<div class="modal-body">
    <a href="<?= site_url();?>pesawat/p/input" class="btn btn-raised btn-primary" style="margin-bottom: 10px;">+Tambah</a>
    <div class="table-responsive">
        <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>#</th>
                <th>ID</th>
                <th>Tipe</th>
                <th>Kursi Ekonomi</th>
                <th>Kursi Bisnis</th>
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
                <td><?= $data->id_pesawat; ?></td>
                <td><?= $data->tipe_pesawat; ?></td>
                <td><?= $data->jml_kursi_ekonomi; ?> Kursi</td>
                <td><?= $data->jml_kursi_bisnis; ?> Kursi</td>
                <td width="60">
                  <button class="btn btn-primary btn-raised" onclick="pilihpesawat('<?= $data->id_pesawat; ?>')" data-dismiss="modal">Pilih</button>
                </td>
              </tr>
              <?php } ?>
            </tbody>
        </table>
    </div>
</div>