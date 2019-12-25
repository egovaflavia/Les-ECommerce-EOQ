  <div id="page-wrapper">

    <div class="row">
      <div class="col-lg-12">
        <h1>Pelanggan </h1>
        <ol class="breadcrumb">
          <li class=""><a href="index.php"> Home</a></li>
          <li class="active"> Admin</li>
        </ol>
      </div>
    </div><!-- /.row -->

    <div class="row">
      <div class="col-lg-12">
        <a href="index.php?page=aksi_pelanggan/tambah" class="btn btn-primary">Tambah Data</a>
        <br><br>
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped tablesorter">
            <thead>
              <tr>
                <th width="15px">No</th>
                <th>Username</th>
                <th>Password</th>
                <th>Email</th>
                <th>Telpon</th>
                <th>Alamat</th>
                <th width="138px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $get = $koneksi->query("SELECT * FROM pelanggan");
              while ($row = $get->fetch_object()) {
                ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $row->username ?></td>
                  <td><?php echo $row->password ?></td>
                  <td><?php echo $row->email ?></td>
                  <td><?php echo $row->no_telp ?></td>
                  <td><?php echo $row->alamat ?></td>
                  <td>
                    <a href="index.php?page=aksi_pelanggan/edit&idpelanggan=<?php echo $row->id_pelanggan ?>" class="btn btn-warning">Edit</a>
                    <a href="index.php?page=aksi_pelanggan/hapus&idpelanggan=<?php echo $row->id_pelanggan ?>" class="btn btn-danger">Hapus</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div><!-- /.row -->
  </div><!-- /#page-wrapper -->