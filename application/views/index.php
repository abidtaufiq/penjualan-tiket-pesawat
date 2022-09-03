<?php
    if ($this->session->userdata['level'] == "") {
       redirect(site_url('sign_in/p/view'));
    }else{

    }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="utf-8">
	<meta name="description" content="Tiketing Pesawat">
	<meta name="author" content="Riski Andriyanto">
	<meta name="keyword" content="">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title style="text-transform: capitalize;"><?= $judul ?></title>

    <!-- start: Css -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/bootstrap.min.css'); ?>">

      <!-- plugins -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/plugins/font-awesome.min.css'); ?>"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/plugins/simple-line-icons.css');?>"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/plugins/animate.min.css');?>"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/plugins/datatables.bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?= base_url();?>assets/css/plugins/bootstrap-material-datetimepicker.css"/>
    <link href="<?= base_url('assets/css/style.css')?>" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>assets/css/plugins/select2.min.css"/>
	<!-- end: Css -->

	<link rel="shortcut icon" href="<?= base_url('assets/img/logomi.png');?>">
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style type="text/css">
        .capitalize{
            text-transform: capitalize;
        }
    </style>
  </head>

 <body id="mimin" class="dashboard">
      <!-- start: Header -->
        <nav class="navbar navbar-default header navbar-fixed-top">
          <div class="col-md-12 nav-wrapper">
            <div class="navbar-header" style="width:100%;">
              <div class="opener-left-menu is-open">
                <span class="top"></span>
                <span class="middle"></span>
                <span class="bottom"></span>
              </div>
                <a href="<?= base_url();?>" class="navbar-brand">
                 <b style="text-transform: uppercase;">Tiketing Pesawat</b>
                </a>

              <ul class="nav navbar-nav navbar-right user-nav">
                <li class="user-name"><span><?= $this->session->userdata['user']; ?></span></li>
                  <li class="dropdown avatar-dropdown">
                   <img src="<?= base_url('assets/img/avatar.jpg');?>" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
                   <ul class="dropdown-menu user-dropdown">
                     <li><a href="#"><span class="fa fa-user"></span> My Profile</a></li>
                     <li role="separator" class="divider"></li>
                     <li class="more">
                      <ul>
                        <li><a href="<?= site_url() ?>sign_in/signout"><span class="fa fa-power-off "></span> Sign Out</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </div>
          </div>
        </nav>
      <!-- end: Header -->

      <div class="container-fluid mimin-wrapper">

          <!-- start:Left Menu -->
            <div id="left-menu">
              <div class="sub-left-menu scroll">
                <ul class="nav nav-list">
                    <li><div class="left-bg"></div></li>
                    <li class="time">
                      <h1 class="animated fadeInLeft">21:00</h1>
                      <p class="animated fadeInRight">Sat,October 1st 2029</p>
                    </li>
                    <li class="ripple">
                      <a href="<?= site_url('beranda/p/view'); ?>"><span class="fa fa-home"></span>Dashboard</a>
                    </li>
                    <?php  if ($this->session->userdata['level'] == "admin") {?>
                    <li class="ripple">
                      <a class="tree-toggle nav-header" href="javascript:voice(0)">
                        <span class="fa fa-check-square-o fa"></span> Input Data
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="<?= site_url(); ?>customer/p/view">Customer</a></li>
                        <li><a href="<?= site_url(); ?>bandara/p/view">Bandara</a></li>
                        <li><a href="<?= site_url(); ?>pesawat/p/view">Pesawat</a></li>
                        <li><a href="<?= site_url(); ?>penerbangan/p/view">Penerbangan</a></li>
                        <li><a href="<?= site_url(); ?>tarif/p/view">Tarif</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a href="<?= site_url('backup/p/view'); ?>"><span class="fa fa-download"></span>Back Up</a>
                    </li>
                    <?php }elseif ($this->session->userdata['level'] == "petugas") {?>
                    <li class="ripple">
                      <a href="<?= site_url(); ?>booking/p/view"><span class="fa fa-plane"></span> Booking</a>
                    </li>
                    <li class="ripple">
                      <a href="<?= site_url('jadwal/p/view'); ?>"><span class="fa-list-alt fa"></span>Jadwal</a>
                    </li>
                    <?php }elseif ($this->session->userdata['level'] == "manager") { ?>
                    <li class="ripple">
                      <a href="<?= site_url('laporan/p/view'); ?>"><span class="icons icon-doc"></span>Laporan</a>
                    </li>
                    <?php } ?>

                    <?php  if ($this->session->userdata['level'] == "superuser") {?>
                    <li class="ripple">
                      <a class="tree-toggle nav-header" href="javascript:voice(0)">
                        <span class="fa fa-check-square-o fa"></span> Input Data
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="<?= site_url(); ?>customer/p/view">Customer</a></li>
                        <li><a href="<?= site_url(); ?>bandara/p/view">Bandara</a></li>
                        <li><a href="<?= site_url(); ?>pesawat/p/view">Pesawat</a></li>
                        <li><a href="<?= site_url(); ?>penerbangan/p/view">Penerbangan</a></li>
                        <li><a href="<?= site_url(); ?>tarif/p/view">Tarif</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a href="<?= site_url(); ?>booking/p/view"><span class="fa fa-plane"></span> Booking</a>
                    </li>
                    <li class="ripple">
                      <a href="<?= site_url('jadwal/p/view'); ?>"><span class="fa-list-alt fa"></span>Jadwal</a>
                    </li>
                    <li class="ripple">
                      <a href="<?= site_url('laporan/p/view'); ?>"><span class="icons icon-doc"></span>Laporan</a>
                    </li>
                    <li class="ripple">
                      <a href="<?= site_url('backup/p/view'); ?>"><span class="fa fa-download"></span>Back Up</a>
                    </li>
                    <?php } ?>
                  </ul>
                </div>
            </div>
          <!-- end: Left Menu -->


          <!-- start: content -->
            <div id="content">
                <?php include  $folder."/".$p.".php" ; ?>
      		</div>
          <!-- end: content -->

        <!-- Modal -->
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">

            </div>
          </div>
        </div>
        <!-- End Modal -->
      </div>

      <!-- start: Mobile -->
      <div id="mimin-mobile" class="reverse">
        <div class="mimin-mobile-menu-list">
            <div class="col-md-12 sub-mimin-mobile-menu-list animated fadeInLeft">
                <ul class="nav nav-list">
                    <li class="ripple">
                      <a href="<?= site_url('beranda/p/view'); ?>"><span class="fa fa-dashboard"></span>Beranda</a>
                    </li>
                    <?php if ($this->session->userdata['level'] == "admin") {?>
                    <li class="ripple">
                      <a class="tree-toggle nav-header" href="#">
                        <span class="fa fa-check-square-o fa"></span> Input Data
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="<?= site_url(); ?>customer/p/view">Customer</a></li>
                        <li><a href="<?= site_url(); ?>bandara/p/view">Bandara</a></li>
                        <li><a href="<?= site_url(); ?>pesawat/p/view">Pesawat</a></li>
                        <li><a href="<?= site_url(); ?>penerbangan/p/view">Penerbangan</a></li>
                        <li><a href="<?= site_url(); ?>tarif/p/view">Tarif</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a href="<?= site_url('backup/p/view'); ?>"><span class="fa fa-download"></span>Back Up</a>
                    </li>
                    <?php }elseif($this->session->userdata['level'] == "petugas"){ ?>
                    <li class="ripple">
                      <a href="<?= site_url(); ?>booking/p/view"><span class="fa fa-plane"></span> Booking</a>
                    </li>
                    <?php }elseif($this->session->userdata['level'] == "manager"){ ?>
                    <li class="ripple">
                      <a href="<?= site_url('laporan/p/view'); ?>"><span class="icons icon-doc"></span>Laporan</a>
                    </li>
                    <?php } ?>

                    <?php if ($this->session->userdata['level'] == "superuser") {?>
                    <li class="ripple">
                      <a class="tree-toggle nav-header" href="#">
                        <span class="fa fa-check-square-o fa"></span> Input Data
                        <span class="fa-angle-right fa right-arrow text-right"></span>
                      </a>
                      <ul class="nav nav-list tree">
                        <li><a href="<?= site_url(); ?>customer/p/view">Customer</a></li>
                        <li><a href="<?= site_url(); ?>bandara/p/view">Bandara</a></li>
                        <li><a href="<?= site_url(); ?>pesawat/p/view">Pesawat</a></li>
                        <li><a href="<?= site_url(); ?>penerbangan/p/view">Penerbangan</a></li>
                        <li><a href="<?= site_url(); ?>tarif/p/view">Tarif</a></li>
                      </ul>
                    </li>
                    <li class="ripple">
                      <a href="<?= site_url(); ?>booking/p/view"><span class="fa fa-plane"></span> Booking</a>
                    </li>
                    <li class="ripple">
                      <a href="<?= site_url('laporan/p/view'); ?>"><span class="icons icon-doc"></span>Laporan</a>
                    </li>
                    <li class="ripple">
                      <a href="<?= site_url('backup/p/view'); ?>"><span class="fa fa-download"></span>Back Up</a>
                    </li>
                    <?php } ?>
                  </ul>
            </div>
        </div>
      </div>

      <!-- Mobile Menu -->
      <button id="mimin-mobile-menu-opener" class="animated rubberBand btn btn-circle btn-danger">
        <span class="fa fa-bars"></span>
      </button>
      <!-- end: Mobile -->

    <!-- start: Javascript -->
    <script src="<?= base_url('assets/js/jquery.min.js');?>"></script>
    <script src="<?= base_url('assets/js/jquery.ui.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/bootstrap.min.js');?>"></script>


    <!-- plugins -->
    <script src="<?= base_url('assets/js/plugins/moment.min.js'); ?>"></script>
    <script src="<?= base_url('assets/js/plugins/jquery.nicescroll.js') ?>"></script>
    <script src="<?= base_url();?>assets/js/plugins/jquery.datatables.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/datatables.bootstrap.min.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/bootstrap-material-datetimepicker.js"></script>
    <script src="<?= base_url();?>assets/js/plugins/jquery.mask.min.js"></script>
    <script src="<?= base_url(); ?>assets/js/plugins/select2.full.min.js"></script>
    <!-- end plugins -->


    <!-- custom -->
     <script src="<?= base_url('assets/js/main.js') ?>"></script>
     <script type="text/javascript">
        $(document).ready(function(){
            // data tables
            $('#datatables-example').DataTable();
            // end datatables

            // datepicker
            $('.dateAnimate').bootstrapMaterialDatePicker({ weekStart : 0, time: false,animation:true});
            $('.date').bootstrapMaterialDatePicker({ weekStart : 0, time: false});
            $('.time').bootstrapMaterialDatePicker({ date: false,format:'HH:mm',animation:true});
            $('.datetime').bootstrapMaterialDatePicker({ format : 'dddd DD MMMM YYYY - HH:mm',animation:true});
            $('.date-fr').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', lang : 'fr', weekStart : 1, cancelText : 'ANNULER'});
            $('.min-date').bootstrapMaterialDatePicker({ format : 'DD/MM/YYYY HH:mm', minDate : new Date() });
            // end datepicker

            // mask
            $('.mask-date').mask('00/00/0000');
            $('.mask-phone').mask('0000-0000-00000');
            $('.mask-money').mask('000.000.000.000.000,00', {reverse: true});
            // end mask
        });
        $(".select2-A").select2({
          placeholder: "Pilih Bandara",
          allowClear: true
        });

        $(".select2-B").select2({
          tags: true
        });
     </script>
  </body>
</html>