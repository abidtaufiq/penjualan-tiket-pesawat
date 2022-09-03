<!DOCTYPE html>
<html>
<head>
  <title><?= $judul;?></title>
  <script src="<?= base_url('assets/js/jquery.min.js');?>"></script>
  <style type="text/css">
    body{
      background: #f0f3f4;
      padding: 0px;
      margin: 0;
      font-family: Consolas;
      color: #6d6d6d;
    }
    .box{
      width: 400px;
      height: auto;
      padding: 10px;
      border: 1px dashed #dedfe0;
      background: #fff;
    }
    p,h1,h2,h3,h4,h5{
      padding: 0;
      margin: 0;
    }
  </style>
</head>
<body>
  <div class="content">
    <?php 
      foreach ($val as $data) {
     ?>
    <div class="box">
      <p><h3 style="margin-bottom: 10px;"><?= $data->kelas; ?> CLASS : BOARDING PASS</h3></p>
      <table>
        <tr>
          <td colspan="2">
            <p>Name</p>
            <h3><?= $data->nama; ?></h3>
          </td>
        </tr>
        <tr>
          <td width="100px">
            <p>Flight</p>
            <p><?= $data->id_penerbangan; ?></p>
          </td>
          <td>
            <p>Date</p>
            <p><?= date('Y/m/d',strtotime($data->tgl_penerbangan)); ?></p>
          </td>
        </tr>
        <tr>
          <td>
            <p>From</p>
            <p><?= $data->asal; ?></p>
          </td>
          <td>
            <p>To</p>
            <p><?= $data->tujuan; ?></p>
          </td>
        </tr>
      </table>
      <br>
      <p>PINTU KEBERANGKATAN AKAN DI TUTUP 15 MENIT SEBELUM JAM KEBERANGKATAN</p>
      <br>
      <p><?= $data->id_booking; ?></p>
    </div>
    <?php } ?>
  </div>
  <script type="text/javascript">
    $(document).ready(function () {
      print();
      setInterval(function () {
        close()
      },0);
    });
  </script>
</body>
</html>