<div class="panel box-shadow-none content-header">
  <div class="panel-body">
    <div class="col-md-12">
        <h3 class="animated fadeInLeft"><?= $judul ?></h3>
        <p class="animated fadeInDown">
          Beranda <span class="fa-angle-right fa"></span> Index
        </p>
        <?php 
            if ($this->session->flashdata('success')) {
         ?>
         <div class="alert alert-success alert-dismissible fade in" role="alert" style="opacity: 0.5;">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <?= $this->session->flashdata('success'); ?>
          </div>
          <?php } ?>
    </div>
  </div>
</div>

 <div class="col-md-12" style="padding:20px;">
  <div class="col-md-12 padding-0">
    <div class="col-md-12 padding-0">
      <div class="col-md-12 padding-0">
<?php if ($this->session->userdata['level'] == "admin") {?>        
        <a href="<?= site_url() ?>customer/p/view">
          <div class="col-md-4">
            <div class="panel box-v1">
              <div class="panel-heading bg-white border-none">
                <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                  <h4 class="text-left">Customer</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                   <h4><span class="icon-user icons icon text-right"></span></h4>
                </div>
              </div>
                <div class="panel-body text-center">
                 <h1><?= $tb_customer;?></h1>
                 <p>Data</p>
                  <hr/>
                </div>
            </div>
          </div>
        </a>

        <a href="<?= site_url() ?>pesawat/p/view">
          <div class="col-md-4">
            <div class="panel box-v1">
              <div class="panel-heading bg-white border-none">
                <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                  <h4 class="text-left">Pesawat</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                   <h4><span class="icon-plane icons icon text-right"></span></h4>
                </div>
              </div>
                <div class="panel-body text-center">
                  <h1><?= $tb_pesawat;?></h1>
                  <p>Data</p>
                  <hr/>
                </div>
            </div>
          </div>
        </a>

        <a href="<?= site_url() ?>bandara/p/view">
          <div class="col-md-4">
            <div class="panel box-v1">
              <div class="panel-heading bg-white border-none">
                <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                  <h4 class="text-left">Bandara</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                   <h4><span class="fa fa-building-o icons icon text-right"></span></h4>
                </div>
              </div>
                <div class="panel-body text-center">
                  <h1><?= $tb_bandara;?></h1>
                  <p>Data</p>
                  <hr/>
                </div>
            </div>
          </div>
        </a>

        <a href="<?= site_url() ?>penerbangan/p/view">
          <div class="col-md-4">
            <div class="panel box-v1">
              <div class="panel-heading bg-white border-none">
                <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                  <h4 class="text-left">Penerbangan</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                   <h4><span class="fa fa-clipboard icons icon text-right"></span></h4>
                </div>
              </div>
                <div class="panel-body text-center">
                 <h1><?= $tb_penerbangan;?></h1>
                 <p>Data</p>
                  <hr/>
                </div>
            </div>
          </div>
        </a>
        
        <a href="<?= site_url() ?>tarif/p/view">
          <div class="col-md-4">
            <div class="panel box-v1">
              <div class="panel-heading bg-white border-none">
                <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                  <h4 class="text-left">Tarif</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                   <h4><span class="fa fa-dollar icons icon text-right"></span></h4>
                </div>
              </div>
                <div class="panel-body text-center">
                 <h1><?= $tb_tarif_penerbangan;?></h1>
                 <p>Data</p>
                  <hr/>
                </div>
            </div>
          </div>
        </a>
        
        <a href="<?= site_url() ?>backup/p/view">
          <div class="col-md-4">
            <div class="panel box-v1">
              <div class="panel-heading bg-white border-none">
                <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                  <h4 class="text-left">Back Up</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                   <h4><span class="fa fa-download icons icon text-right"></span></h4>
                </div>
              </div>
                <div class="panel-body text-center">
                 <h1>Back Up</h1>
                 <p>Database</p>
                  <hr/>
                </div>
            </div>
          </div>
        </a>

<?php }elseif ($this->session->userdata['level'] == "petugas") {?>

        <a href="<?= site_url() ?>booking/p/view">
          <div class="col-md-4">
            <div class="panel box-v1">
              <div class="panel-heading bg-white border-none">
                <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                  <h4 class="text-left">Booking</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                   <h4><span class="fa icon-briefcase icons icon text-right"></span></h4>
                </div>
              </div>
                <div class="panel-body text-center">
                 <h1><?= $tb_booking;?></h1>
                 <p>Data</p>
                  <hr/>
                </div>
            </div>
          </div>
        </a>

        <a href="<?= site_url() ?>jadwal/p/view">
          <div class="col-md-4">
            <div class="panel box-v1">
              <div class="panel-heading bg-white border-none">
                <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                  <h4 class="text-left">Jadwal</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                   <h4><span class="fa fa-list  icons icon text-right"></span></h4>
                </div>
              </div>
                <div class="panel-body text-center">
                 <h1>Jadwal</h1>
                 <p>Penerbangan</p>
                  <hr/>
                </div>
            </div>
          </div>
        </a>

<?php }elseif ($this->session->userdata['level'] == "manager") {?>
        <a href="<?= site_url() ?>laporan/p/view">
          <div class="col-md-4">
            <div class="panel box-v1">
              <div class="panel-heading bg-white border-none">
                <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                  <h4 class="text-left">Laporan</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                   <h4><span class="fa fa-file-o icons icon text-right"></span></h4>
                </div>
              </div>
                <div class="panel-body text-center">
                 <h1><?= $tb_booking;?></h1>
                 <p>Data</p>
                  <hr/>
                </div>
            </div>
          </div>
        </a>
<?php } ?>

<!-- Super User -->
<?php if ($this->session->userdata['level'] == "superuser") {?>        
        <a href="<?= site_url() ?>customer/p/view">
          <div class="col-md-4">
            <div class="panel box-v1">
              <div class="panel-heading bg-white border-none">
                <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                  <h4 class="text-left">Customer</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                   <h4><span class="icon-user icons icon text-right"></span></h4>
                </div>
              </div>
                <div class="panel-body text-center">
                 <h1><?= $tb_customer;?></h1>
                 <p>Data</p>
                  <hr/>
                </div>
            </div>
          </div>
        </a>

        <a href="<?= site_url() ?>pesawat/p/view">
          <div class="col-md-4">
            <div class="panel box-v1">
              <div class="panel-heading bg-white border-none">
                <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                  <h4 class="text-left">Pesawat</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                   <h4><span class="icon-plane icons icon text-right"></span></h4>
                </div>
              </div>
                <div class="panel-body text-center">
                  <h1><?= $tb_pesawat;?></h1>
                  <p>Data</p>
                  <hr/>
                </div>
            </div>
          </div>
        </a>

        <a href="<?= site_url() ?>bandara/p/view">
          <div class="col-md-4">
            <div class="panel box-v1">
              <div class="panel-heading bg-white border-none">
                <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                  <h4 class="text-left">Bandara</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                   <h4><span class="fa fa-building-o icons icon text-right"></span></h4>
                </div>
              </div>
                <div class="panel-body text-center">
                  <h1><?= $tb_bandara;?></h1>
                  <p>Data</p>
                  <hr/>
                </div>
            </div>
          </div>
        </a>

        <a href="<?= site_url() ?>penerbangan/p/view">
          <div class="col-md-4">
            <div class="panel box-v1">
              <div class="panel-heading bg-white border-none">
                <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                  <h4 class="text-left">Penerbangan</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                   <h4><span class="fa fa-clipboard icons icon text-right"></span></h4>
                </div>
              </div>
                <div class="panel-body text-center">
                 <h1><?= $tb_penerbangan;?></h1>
                 <p>Data</p>
                  <hr/>
                </div>
            </div>
          </div>
        </a>
        
        <a href="<?= site_url() ?>tarif/p/view">
          <div class="col-md-4">
            <div class="panel box-v1">
              <div class="panel-heading bg-white border-none">
                <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                  <h4 class="text-left">Tarif</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                   <h4><span class="fa fa-dollar icons icon text-right"></span></h4>
                </div>
              </div>
                <div class="panel-body text-center">
                 <h1><?= $tb_tarif_penerbangan;?></h1>
                 <p>Data</p>
                  <hr/>
                </div>
            </div>
          </div>
        </a>

        <a href="<?= site_url() ?>booking/p/view">
          <div class="col-md-4">
            <div class="panel box-v1">
              <div class="panel-heading bg-white border-none">
                <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                  <h4 class="text-left">Booking</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                   <h4><span class="fa icon-briefcase icons icon text-right"></span></h4>
                </div>
              </div>
                <div class="panel-body text-center">
                 <h1><?= $tb_booking;?></h1>
                 <p>Data</p>
                  <hr/>
                </div>
            </div>
          </div>
        </a>

        <a href="<?= site_url() ?>jadwal/p/view">
          <div class="col-md-4">
            <div class="panel box-v1">
              <div class="panel-heading bg-white border-none">
                <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                  <h4 class="text-left">Jadwal</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                   <h4><span class="fa fa-list  icons icon text-right"></span></h4>
                </div>
              </div>
                <div class="panel-body text-center">
                 <h1>Jadwal</h1>
                 <p>Penerbangan</p>
                  <hr/>
                </div>
            </div>
          </div>
        </a>

        <a href="<?= site_url() ?>laporan/p/view">
          <div class="col-md-4">
            <div class="panel box-v1">
              <div class="panel-heading bg-white border-none">
                <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                  <h4 class="text-left">Laporan</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                   <h4><span class="fa fa-file-o icons icon text-right"></span></h4>
                </div>
              </div>
                <div class="panel-body text-center">
                 <h1><?= $tb_booking;?></h1>
                 <p>Data</p>
                  <hr/>
                </div>
            </div>
          </div>
        </a>

        <a href="<?= site_url() ?>backup/p/view">
          <div class="col-md-4">
            <div class="panel box-v1">
              <div class="panel-heading bg-white border-none">
                <div class="col-md-6 col-sm-6 col-xs-6 text-left padding-0">
                  <h4 class="text-left">Back Up</h4>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-right">
                   <h4><span class="fa fa-download icons icon text-right"></span></h4>
                </div>
              </div>
                <div class="panel-body text-center">
                 <h1>Back Up</h1>
                 <p>Database</p>
                  <hr/>
                </div>
            </div>
          </div>
        </a>
        
<?php } ?>
<!-- END Superuser -->
      </div>
    </div>
  </div>
</div>