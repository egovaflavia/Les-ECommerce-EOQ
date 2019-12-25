<?php
$barang = mysqli_num_rows($koneksi->query("SELECT * FROM barang"));
$penjualan = mysqli_num_rows($koneksi->query("SELECT * FROM penjualan"));
$supplier = mysqli_num_rows($koneksi->query("SELECT * FROM supplier"));
$pelanggan = mysqli_num_rows($koneksi->query("SELECT * FROM pelanggan"));
?>
<div id="page-wrapper">
  <div class="row">
    <div class="col-lg-12">
      <h1>Home </h1>
      <ol class="breadcrumb">
        <li class="active"><i class="fa fa-dashboard"></i> Home</li>
      </ol>
      <div class="alert alert-success alert-dismissable">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        Selamat Datang di Halaman Administrator <b>Yulia Funiture</b>.
      </div>
    </div>
  </div><!-- /.row -->

  <div class="row">
    <div class="col-lg-3">
      <div class="panel panel-info">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-6">
              <i class=""></i>
            </div>
            <div class="col-xs-6 text-right">
              <p class="announcement-heading"><?php echo $barang ?></p>
              <p class="announcement-text">Barang</p>
            </div>
          </div>
        </div>
        <a href="index.php?page=tabel_barang">
          <div class="panel-footer announcement-bottom">
            <div class="row">
              <div class="col-xs-6">
                Lihat
              </div>
              <div class="col-xs-6 text-right">
                <i class=""></i>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="panel panel-warning">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-6">
              <i class=""></i>
            </div>
            <div class="col-xs-6 text-right">
              <p class="announcement-heading"><?php echo $penjualan ?></p>
              <p class="announcement-text">Penjualan</p>
            </div>
          </div>
        </div>
        <a href="index.php?page=tabel_penjualan">
          <div class="panel-footer announcement-bottom">
            <div class="row">
              <div class="col-xs-6">
                Lihat
              </div>
              <div class="col-xs-6 text-right">
                <i class="fa fa-arrow-circle-right"></i>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="panel panel-danger">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-6">
              <i class=""></i>
            </div>
            <div class="col-xs-6 text-right">
              <p class="announcement-heading"><?php echo $supplier ?></p>
              <p class="announcement-text">Supplier</p>
            </div>
          </div>
        </div>
        <a href="index.php?page=tabel_supplier">
          <div class="panel-footer announcement-bottom">
            <div class="row">
              <div class="col-xs-6">
                Lihat
              </div>
              <div class="col-xs-6 text-right">
                <i class="fa fa-arrow-circle-right"></i>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
    <div class="col-lg-3">
      <div class="panel panel-success">
        <div class="panel-heading">
          <div class="row">
            <div class="col-xs-6">
              <i class=""></i>
            </div>
            <div class="col-xs-6 text-right">
              <p class="announcement-heading"><?php echo $pelanggan ?></p>
              <p class="announcement-text">Pelanggan</p>
            </div>
          </div>
        </div>
        <a href="index.php?page=tabel_pelanggan">
          <div class="panel-footer announcement-bottom">
            <div class="row">
              <div class="col-xs-6">
                Lihat
              </div>
              <div class="col-xs-6 text-right">
                <i class="fa fa-arrow-circle-right"></i>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>
  </div><!-- /.row -->
</div><!-- /#page-wrapper -->