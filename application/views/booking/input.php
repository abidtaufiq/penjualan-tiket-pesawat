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
        <h4>Jadwal Penerbangan Hari Ini</h4>
      </div>
      <div class="panel-body">
        <?= form_open_multipart('booking/p/input'); ?>
          <div class="form-group">
            <label>Kota Asal</label>
            <input type="text" name="kotaAsal" class="form-control" id="kotaAsal" value="<?= $this->input->post('kotaAsal') ?>">
          </div>
          <div class="form-group">
            <label>Kota Tujuan</label>
            <input type="text" name="kotaTujuan" class="form-control" id="KotaTujuan" value="<?= $this->input->post('kotaTujuan') ?>">
          </div>
          <div class="form-group">
            <input type="submit" name="" value="Cari" class="btn btn-raised btn-primary">
            <button class="btn btn-raised btn-warning" onclick="kosong()">Reset</button>
          </div>
        <?= form_close(); ?>
        <hr>
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
              <th>Kelas</th>
              <th>Tarif</th>
              <th>Opsi</th>
            </tr>
          </thead>
          <tbody>
          <?php 
            $no = 1;
            foreach ($valjadwal as $data) {
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
              <td><?= $data->kelas; ?></td>
              <td>Rp. <?= number_format($data->tarif,0); ?></td>
              <td>
                <button class="btn btn-primary btn-raised" onclick="pilihjadwal('<?= $data->id_penerbangan; ?>','<?= $data->id_tarif; ?>')">Pilih</button>
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

<?= form_open_multipart($url); ?>
<!-- Customer -->
<div class="form-element">
  <div class="col-md-12 padding-0">
    <div class="col-md-12">
      <div class="panel form-element-padding">
        <div class="panel-heading">
         <h4>Customer</h4>
        </div>
         <div class="panel-body" style="padding-bottom:30px;">
          <div class="col-md-12">
            <div class="form-group">
              <label class="col-sm-2 control-label text-right">ID Customer</label>
              <div class="col-sm-10">
                <input type="text" name="id_customer" class="form-control" required id="id_customer" readonly required placeholder="klik di sini" onclick="customer()" data-toggle="modal" data-target="#modal">
              </div>
            </div>
              <div class="form-group">
                <label class="col-sm-2 control-label text-right">Nama</label>
                <div class="col-sm-10">
                  <input type="text" name="nama" id="nama_customer" class="form-control" required readonly>
                </div>
              </div>
            <div class="form-group">
                <label class="col-sm-2 control-label text-right">Email</label>
                <div class="col-sm-10">
                  <input type="email" name="email" id="email" class="form-control" required readonly>
                </div>
            </div>
              <div class="form-group">
                <label class="col-sm-2 control-label text-right">Kota</label>
                <div class="col-sm-10">
                  <input type="text" name="kota" id="kota" class="form-control" required readonly>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-2 control-label text-right">Negara</label>
                <div class="col-sm-10">
                  <input type="text" name="negara" id="negara" class="form-control" required readonly>
                </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- End Customer -->

<!-- Penerbangan -->
<div class="form-element">
  <div class="col-md-12 padding-0">
    <div class="col-md-12">
      <div class="panel form-element-padding">
        <div class="panel-heading">
         <h4>Penerbangan</h4>
        </div>
         <div class="panel-body" style="padding-bottom:30px;">
          <div class="col-md-12">
            <div class="form-group">
              <label class="col-sm-2 control-label text-right">ID Penerbangan</label>
              <div class="col-sm-10">
                <input type="text" name="id_penerbangan" id="id_penerbangan" class="form-control" required readonly>
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
            <div class="form-group">
              <label class="col-sm-2 control-label text-right">Bandara Tujuan</label>
              <div class="col-sm-10">
                <input type="text" id="bandara_tujuan" name="bandara_tujuan" class="form-control" required readonly="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Penerbangan -->

<!-- Tarif -->
<div class="form-element">
  <div class="col-md-12 padding-0">
    <div class="col-md-12">
      <div class="panel form-element-padding">
        <div class="panel-heading">
         <h4>Tarif</h4>
        </div>
         <div class="panel-body" style="padding-bottom:30px;">
          <div class="col-md-12">
            <div class="form-group">
              <label class="col-sm-2 control-label text-right">ID Tarif</label>
              <div class="col-sm-10">
                <input type="text" name="id_tarif" id="id_tarif" class="form-control" required readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label text-right">Kelas</label>
              <div class="col-sm-10">
                <input type="text" name="kelas" id="kelas" class="form-control" required readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label text-right">Tarif</label>
              <div class="col-sm-10">
                <input type="text" name="tarif" id="tarif" class="form-control" required readonly>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Tarif -->

<!-- Booking -->
<div class="form-element">
  <div class="col-md-12 padding-0">
    <div class="col-md-12">
      <div class="panel form-element-padding">
        <div class="panel-heading">
         <h4>Booking</h4>
        </div>
         <div class="panel-body" style="padding-bottom:30px;">
          <div class="col-md-12">
            <input type="text" name="id_pesawat" id="id_pesawat" hidden="">
            <div class="form-group">
              <label class="col-sm-2 control-label text-right">ID Booking</label>
              <div class="col-sm-10">
                <input type="text" name="id_booking" id="id_booking" value="<?= $id; ?>" class="form-control" required readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label text-right">Tgl Booking</label>
              <div class="col-sm-10">
                <input type="date" name="tgl_booking" id="tgl_booking" class="form-control" value="<?= date('Y-m-d') ?>" required readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label text-right">Jumlah Penumpang</label>
              <div class="col-sm-10">
                <input type="number" name="jumlah_penumpang" id="jumlah_penumpang" class="form-control" min="0" required onkeyup="tot_tarif()" onchange="tot_tarif()" onfocus="tot_tarif()">
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label text-right">Total Tarif</label>
              <div class="col-sm-10">
                <input type="text" name="total_tarif" id="total_tarif" class="form-control" required readonly>
              </div>
            </div>
            <div class="form-group">
              <label class="col-sm-2 control-label text-right">Status Bayar</label>
              <div class="col-sm-10">
                <input type="text" name="status_bayar" id="status_bayar" class="form-control" required>
              </div>
            </div>
            <div class="form-group">
                <input type="submit" value="Simpan" class="btn btn-raised btn-primary">
                <input type="reset" value="Reset" class="btn btn-raised btn-warning">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END Booking -->
<?= form_close(); ?>

<script type="text/javascript">
  function pilihjadwal(id_penerbangan,id_tarif) {
    $.ajax({
      url : "<?= site_url('booking/datajadwal') ?>",
      type : "post",
      dataType : "json",
      data : {
        id_penerbangan : id_penerbangan,
        id_tarif : id_tarif
      },
      success:function(val) {
        $("#id_penerbangan").val(val.id_penerbangan);
        $("#tgl_penerbangan").val(val.tgl_penerbangan);
        $("#asal").val(val.asal);
        $("#tujuan").val(val.tujuan);
        $("#jam_berangkat").val(val.jam_berangkat);
        $("#jam_tiba").val(val.jam_tiba);
        $("#bandara_tujuan").val(val.bandara_tujuan);
        $("#id_pesawat").val(val.id_pesawat);

        $("#id_tarif").val(val.id_tarif);
        $("#kelas").val(val.kelas);
        $("#tarif").val(val.tarif);

      }
    })
  }
  function customer() {
    $.ajax({
      url: "<?= site_url('booking/modalcustomer'); ?>",
      success:function (page) {
        $(".modal-content").html(page);
      }
    })
  }
  function pilihcustomer(id) {
    $.ajax({
      url : "<?= site_url('booking/valcustomer') ?>",
      type : "post",
      dataType : "json",
      data : {
        id : id
      },
      success:function(val) {
        $("#id_customer").val(val.id_customer);
        $("#nama_customer").val(val.nama);
        $("#email").val(val.email);
        $("#kota").val(val.kota);
        $("#negara").val(val.negara);
      }
    })
  }
  function tot_tarif() {
    var tarif = $("#tarif").val();
    var jumlah_penumpang = $("#jumlah_penumpang").val();
    var hsl = tarif * jumlah_penumpang;
    $("#total_tarif").val(hsl);
  }
  function kosong() {
    $("#KotaAsal").val("");
    $("#KotaTujuan").val("");
  }
</script>
