<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Tambah Pelanggan </h1>
            <ol class="breadcrumb">
                <li class=""><a href="index.php"> Home</a></li>
                <li class="active"> Admin</li>
            </ol>
        </div>
    </div><!-- /.row -->
    <?php
    $id = $_GET['idpelanggan'];
    $get = $koneksi->query("SELECT * FROM pelanggan WHERE id_pelanggan =$id");
    $rows = $get->fetch_object();
    ?>
    <div class="row">
        <div class="col-lg-6">
            <a href="index.php?page=tabel_pelanggan" class="btn btn-primary">Kembali</a>
            <br><br>
            <form method="post" role="form">

                <div class="form-group">
                    <label>Username</label>
                    <input type="hidden" value="<?php echo $rows->id_pelanggan  ?>" name="id_pelanggan" class="form-control">
                    <input value="<?php echo $rows->username  ?>" name="username" class="form-control">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input value="<?php echo $rows->password  ?>" name="password" class="form-control">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input value="<?php echo $rows->email  ?>" name="email" class="form-control">
                </div>

                <div class="form-group">
                    <label>Telpon</label>
                    <input value="<?php echo $rows->no_telp  ?>" name="no_telp" class="form-control">
                </div>

                <div class="form-group">
                    <label>Alamat</label>
                    <input value="<?php echo $rows->alamat  ?>" name="alamat" class="form-control">
                </div>

                <button name="edit" type="submit" class="btn btn-success">edit</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>
            <?php
            if (isset($_POST['edit'])) {
                $id_pelanggan = $_POST['id_pelanggan'];
                $username = $_POST['username'];
                $password = $_POST['password'];
                $email = $_POST['email'];
                $no_telp = $_POST['no_telp'];
                $alamat = $_POST['alamat'];

                $edit = $koneksi->query("UPDATE pelanggan SET   `username` = '$username',
                                                                `password` ='$password',
                                                                `email` ='$email',
                                                                `no_telp` ='$no_telp',
                                                                `alamat`='$alamat'
                                                                WHERE id_pelanggan = '$id_pelanggan' ");

                if ($edit) {
                    echo "<script>
                    alert('Data berhasil di edit');
                    location='index.php?page=tabel_pelanggan';
                    </script>";
                } else {
                    echo "<script>
                    alert('Data gagal di edit');
                    location='index.php?page=tabel_pelanggan';
                    </script>";
                }
            }
            ?>
        </div>
    </div><!-- /.row -->
</div><!-- /#page-wrapper -->