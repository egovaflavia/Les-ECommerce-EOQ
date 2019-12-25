  <div id="page-wrapper">

    <div class="row">
      <div class="col-lg-12">
        <h1> Admin </h1>
        <ol class="breadcrumb">
          <li class=""><a href="index.php"> Home</a></li>
          <li class="active"> Admin</li>
        </ol>
      </div>
    </div><!-- /.row -->

    <div class="row">
      <div class="col-lg-12">
        <a href="index.php?page=aksi_admin/tambah" class="btn btn-primary">Tambah Data</a>
        <br><br>
        <div class="table-responsive">
          <table class="table table-bordered table-hover table-striped tablesorter">
            <thead>
              <tr>
                <th width="15px">No</th>
                <th>Username</th>
                <th>Password</th>
                <th width="138px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $no = 1;
              $get = $koneksi->query("SELECT * FROM admin");
              while ($row = $get->fetch_object()) {
              ?>
                <tr>
                  <td><?php echo $no++ ?></td>
                  <td><?php echo $row->username ?></td>
                  <td><?php echo $row->password ?></td>
                  <td>
                    <a href="index.php?page=aksi_admin/edit&idadmin=<?php echo $row->id_admin ?>" class="btn btn-warning">Edit</a>
                    <a href="index.php?page=aksi_admin/hapus&idadmin=<?php echo $row->id_admin ?>" class="btn btn-danger">Hapus</a>
                  </td>
                </tr>
              <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div><!-- /.row -->
  </div><!-- /#page-wrapper -->