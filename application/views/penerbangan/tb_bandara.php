<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel"><?= $jd; ?></h4>
</div>
<div class="modal-body">
    <a href="<?= site_url();?>bandara/p/input" class="btn btn-raised btn-primary" style="margin-bottom: 10px;">+Tambah</a>
    <div class="table-responsive">
        <table id="datatables-example" class="table table-striped table-bordered" width="100%" cellspacing="0">
            <thead>
                <tr>
                <th>#</th>
                <th>ID</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Kota</th>
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
                <td><?= $data->id_bandara; ?></td>
                <td><?= $data->kode; ?></td>
                <td><?= $data->nama; ?></td>
                <td><?= $data->kota; ?></td>
                <td width="60">
                    <button class="btn btn-primary btn-raised" onclick="<?= $btn; ?>('<?= $data->id_bandara; ?>')" data-dismiss="modal">Pilih</button>
                </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>