<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="description" content="Miminium Admin Template v.1">
	<meta name="author" content="Isna Nur Azis">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Jadwal Penerbangan</title>

	<!-- start: Css -->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css">

	<!-- plugins -->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/plugins/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/plugins/simple-line-icons.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/plugins/animate.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/plugins/fullcalendar.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/plugins/datatables.bootstrap.min.css" />
	<link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
	<!-- end: Css -->

	<link rel="shortcut icon" href="<?= base_url(); ?>assets/img/logomi.png">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body id="mimin" class="dashboard boxed container padding-0">
	<!-- start: Header -->
	<nav class="navbar container navbar-default header navbar-fixed-top">
		<div class="col-md-12 nav-wrapper">
			<div class="navbar-header" style="width:100%;">
				<a href="" class="navbar-brand">
					<b>TIKETING PESAWAT</b>
				</a>
				<button class="bnt btn-default pull-right" id="login"><i class="fa fa-user"></i> Login</button>
			</div>
		</div>
	</nav>
	<!-- end: Header -->

	<div class="container-fluid mimin-wrapper bg-light-grey">

		<!-- start: content -->
		<div style="width: 100%;margin-top: 55px;">
			<div class="panel" style="width: 100%;">
				<div class="panel-body" style="width: 100%;">
					<?= form_open_multipart('jadwal/index'); ?>
					<div class="col-md-4">
						<div class="form-group">
							<label>Kota Asal</label>
							<input type="text" name="kotaAsal" class="form-control" id="asal" value="<?= $this->input->post('kotaAsal') ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Kota Tujuan</label>
							<input type="text" name="kotaTujuan" class="form-control" id="tujuan" value="<?= $this->input->post('kotaTujuan') ?>">
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label>Tanggal Penerbangan</label>
							<input type="date" name="tgl" class="form-control" id="tgl" value="<?= $this->input->post('tgl') ?>">
						</div>
					</div>
					<div class="form-group">
						<input type="submit" name="" value="Cari" class="btn btn-raised btn-primary">
						<button class="btn btn-raised btn-warning" onclick="kosong()">Reset</button>
					</div>
					<?= form_close(); ?>
					<hr>
					<p>Jadwal Penerbangan Hari Ini</p>
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
				<br>
				<center>
					Copyright &#169; <script type='text/javascript'>var creditsyear = new Date();document.write(creditsyear.getFullYear());</script> <a expr:href='data:blog.homepageUrl'><data:blog.title/></a>. All rights reserved.
				</center>
			</div>
		</div>
		<!-- end: content -->
	</div>

	<!-- start: Javascript -->
	<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/jquery.ui.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>


	<!-- plugins -->
	<script src="<?= base_url(); ?>assets/js/plugins/moment.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugins/fullcalendar.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugins/jquery.nicescroll.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugins/jquery.datatables.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugins/datatables.bootstrap.min.js"></script>


	<!-- custom -->
	<script src="<?= base_url(); ?>assets/js/main.js"></script>
	<script type="text/javascript">
		$('#login').click(function() {
			window.location.href = '<?= base_url() ?>sign_in/p/view'
		})
		$(document).ready(function() {
			$('#datatables-example').DataTable();
		});

		function kosong() {
			$("#asal").val("");
			$("#tujuan").val("");
			$("#tgl").val("");
		}
	</script>
</body>

</html>
