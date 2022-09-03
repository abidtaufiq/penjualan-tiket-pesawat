<?php
if (isset($this->session->userdata['level']) == "") {
} else {
	redirect(site_url('beranda/p/view'));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="description" content="Tiketing Penerbangan">
	<meta name="author" content="Riski Andriyanto">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $judul; ?></title>

	<!-- start: Css -->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/bootstrap.min.css">

	<!-- plugins -->
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/plugins/font-awesome.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/plugins/simple-line-icons.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/plugins/animate.min.css" />
	<link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/plugins/icheck/skins/flat/aero.css" />
	<link href="<?= base_url(); ?>assets/css/style.css" rel="stylesheet">
	<!-- end: Css -->

	<link rel="shortcut icon" href="<?= base_url(); ?>assets/img/logomi.png">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
	<style type="text/css">
		.judul {
			font-size: 80px;
		}
	</style>
</head>

<body id="mimin" class="dashboard form-signin-wrapper">

	<div class="container">

		<form class="form-signin" method="post" action="<?= site_url() ?>sign_in/proses">
			<div class="panel periodic-login">
				<div class="panel-body text-center">
					<h1 class="judul">SignIn</h1>
					<i class="icons icon-arrow-down"></i>
					<div class="form-group form-animate-text" style="margin-top:40px !important;">
						<input type="text" name="user" class="form-text" required>
						<span class="bar"></span>
						<label>Username</label>
					</div>
					<div class="form-group form-animate-text" style="margin-top:40px !important;">
						<input type="password" name="pass" class="form-text" required>
						<span class="bar"></span>
						<label>Password</label>
					</div>
					<label class="pull-left">
						<input type="checkbox" class="icheck pull-left" name="checkbox1" /> Remember me
					</label>
					<input type="submit" class="btn btn-default btn-raised col-md-12" value="SignIn" />
				</div>
				<?php
				if ($this->session->flashdata('success')) {
				?>
					<div class="alert alert-success alert-dismissible fade in" role="alert" style="opacity: 0.8;color:#ffffff;">
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
						<?= $this->session->flashdata('success'); ?>
					</div>
				<?php } ?>
			</div>
		</form>
	</div>

	<!-- end: Content -->
	<!-- start: Javascript -->
	<script src="<?= base_url(); ?>assets/js/jquery.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/jquery.ui.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/bootstrap.min.js"></script>

	<script src="<?= base_url(); ?>assets/js/plugins/moment.min.js"></script>
	<script src="<?= base_url(); ?>assets/js/plugins/icheck.min.js"></script>

	<!-- custom -->
	<script src="<?= base_url(); ?>assets/js/main.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('input').iCheck({
				checkboxClass: 'icheckbox_flat-aero',
				radioClass: 'iradio_flat-aero'
			});
		});
	</script>
	<!-- end: Javascript -->
</body>

</html>
