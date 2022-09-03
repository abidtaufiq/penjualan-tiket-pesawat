<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel"><?= $jd; ?></h4>
</div>
<div class="modal-body">
    <a href="<?= site_url();?>penerbangan/p/input" class="btn btn-raised btn-primary" style="margin-bottom: 10px;">+Tambah</a>
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
              <td width="100">
                <button class="btn btn-primary btn-raised" onclick="pilihpenerbangan('<?= $data->id_penerbangan; ?>')" data-dismiss="modal">Pilih</button>
              </td>
            </tr>
            <?php } ?>
          </tbody>
        </table>
    </div>
</div>