<!DOCTYPE html>
<html>
<head>
	<title><?= $judul?></title>
</head>
<body>
	<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">
            	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">
				<?php 
					if ($val == null ) {
						?>
						<center>
							<h1>Error 404</h1>
							<h3>DATA KOSONG</h3>
						</center>
						<?php
					}else{
						?>
				<div class="head">
					<h2>laporan transaksi Bandara jaya</h2>
					<h2>jl. Perjuangan KM 22 Pati</h2>
					<p style="font-weight: normal;text-transform: capitalize;">No Telepon : (025) XXX-XXX-XXX Email : <span style="text-transform: none;">bandara-jaya@gmail.com</span> no Handphone : 089-XXX-XXX-XXX</p>
					<p style="font-weight: normal;">========================================================================================================</p>
				</div>
				<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
					<thead>
						<tr>
							<th>#</th>
							<th>ID Booking</th>
							<th>Tgl Booking</th>
							<th>Penumpang</th>
							<th>Status</th>
							<th>Total Tarif</th>
						</tr>
					</thead>
					<tbody>
					<?php 
						$jml = 0;
						$no= 1; 
						foreach ($val as $data) {
					 ?>
						<tr>
							<td><?= $no++; ?>.</td>
							<td><?= $data->id_booking; ?></td>
							<td><?= date("d/m/Y",strtotime($data->tgl_booking)); ?></td>
							<td><?= $data->jumlah_penumpang; ?></td>
							<td><?= $data->status_bayar	; ?></td>
							<td>Rp <?= number_format($data->total_tarif,0,".","."); ?></td>
						</tr>
					<?php $jml = $jml+$data->total_tarif; } ?>
						<tr>
							<td colspan="5" style="text-align: center;font-weight: bold;">Total seluruh transaksi</td>
							<td>Rp <?= number_format($jml,0,".","."); ?></td>
						</tr>
					</tbody>
				</table>
				<?php 
					if (isset($bln)) {
						$x =	date("F", strtotime($bln))." ".date("Y", strtotime($thn));
					}else{
						$x =	date("d/m/Y", strtotime($tgl1))." - ".date("d-m-Y", strtotime($tgl2));
					}
				 ?>
				<i>Periode <?= $x ?></i>
				<div class="row clearfix">
					<div class="ttd">
						<p>Pati, <?= date('d F Y'); ?></p>
						<p>Mengetahui</p>
						<p>Pimpinan</p>
						<br><br><br>
						<p style="font-weight: bold;">Abid Taufiq R.</p>
					</div>
				</div>
						<?php
					}
				 ?>
            </div>
        </div>
    </div>
</div>
<script src="<?= base_url('assets/plugins/bootstrap/js/bootstrap.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery.min.js') ?>"></script>

<!-- Bootstrap Core Css -->
<link href="<?= base_url('assets/plugins/bootstrap/css/bootstrap.css'); ?>" rel="stylesheet">
<style type="text/css">
	.head{
		text-align: center;
		text-transform: uppercase;
		font-weight: bold;
		margin:20px 0;
	}
	h2,h3,p{
		margin: 0;
		padding: 0;
	}
	.ttd{
		float: right;
		margin: 20px;
	}
</style>
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