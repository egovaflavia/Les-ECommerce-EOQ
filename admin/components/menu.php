<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <!-- Brand and toggle get grouped for better mobile display -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.php">Yulia Furniture</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav">
      <li class=""><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Master <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?page=tabel_admin"><i class="fa fa-bar-chart-o"></i> Admin</a></li>
          <li><a href="index.php?page=tabel_pelanggan"><i class="fa fa-bar-chart-o"></i> Pelanggan</a></li>
          <li><a href="index.php?page=tabel_kategori"><i class="fa fa-bar-chart-o"></i> Kategori</a></li>
          <li><a href="index.php?page=tabel_supplier"><i class="fa fa-table"></i> Supplier</a></li>
          <li><a href="index.php?page=tabel_ongkir"><i class="fa fa-edit"></i> Ongkos Kirim</a></li>
          <li><a href="index.php?page=tabel_barang"><i class="fa fa-font"></i> Barang</a></li>
          <li><a href="index.php?page=tabel_eoq"><i class="fa fa-desktop"></i> Eoq</a></li>
          <li><a href="index.php?page=tabel_pembelian"><i class="fa fa-bar-chart-o"></i> Supply Barang</a></li>
        </ul>
      </li>
      <li><a href="index.php?page=tabel_pemesanan"><i class="fa fa-desktop"></i> Pemesanan</a></li>
      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-caret-square-o-down"></i> Laporan <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?page=laporan_barang"><i class="fa fa-wrench"></i> Laporan Barang</a></li>
          <li><a href="index.php?page=laporan_penjualan_bulanan"><i class="fa fa-bar-chart-o"></i> Laporan Penjualan Bulanan </a></li>
          <li><a href="index.php?page=laporan_penjualan_tahunan"><i class="fa fa-bar-chart-o"></i> Laporan Penjualan Tahunan </a></li>
          <li><a href="index.php?page=laporan_eoq"><i class="fa fa-bar-chart-o"></i> Laporan Eoq</a></li>
          <li><a href="index.php?page=laporan_penjualan_harian"><i class="fa fa-bar-chart-o"></i> Laporan Penjualan Harian </a></li>
        </ul>
      </li>
    </ul>

    <ul class="nav navbar-nav navbar-right navbar-user">
      <li class="dropdown user-dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> <?php echo $_SESSION['admin']['username'] ?> <b class="caret"></b></a>
        <ul class="dropdown-menu">
          <li><a href="index.php?page=logout"><i class="fa fa-power-off"></i> Log Out</a></li>
        </ul>
      </li>
    </ul>
  </div><!-- /.navbar-collapse -->
</nav>