<div id="page-wrapper">

    <div class="row">
        <div class="col-lg-12">
            <h1>Home </h1>
            <ol class="breadcrumb">
                <li class=""><a href="index.php"> Home</a></li>
                <li class="active"> Edit Admin</li>
            </ol>
        </div>
    </div><!-- /.row -->

    <?php
    $id = $_GET['idadmin'];
    $get = $koneksi->query("SELECT * FROM admin WHERE id_admin =$id");
    $rows = $get->fetch_object();
    // var_dump($rows);
    ?>
    <div class="row">
        <div class="col-lg-6">
            <a href="index.php?page=tabel_admin" class="btn btn-primary">Kembali</a>
            <br><br>
            <form method="post" role="form">

                <div class="form-group">
                    <label>Username</label>
                    <input type="hidden" value="<?php echo $rows->id_admin  ?>" name="id_admin" class="form-control">
                    <input value="<?php echo $rows->username  ?>" name="username" class="form-control">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input value="<?php echo $rows->password  ?>" name="password" class="form-control">
                </div>

                <button name="edit" type="submit" class="btn btn-success">edit</button>
                <button type="reset" class="btn btn-warning">Reset</button>
            </form>
            <?php
            if (isset($_POST['edit'])) {
                $id_admin = $_POST['id_admin'];
                $username = $_POST['username'];
                $password = $_POST['password'];

                $edit = $koneksi->query("UPDATE admin SET   `username` = '$username',
                                                            `password` = '$password'
                                                            WHERE `id_admin` = '$id_admin'");

                if ($edit) {
                    echo "<script>
                alert('Data berhasil di edit');
                location='index.php?page=tabel_admin';
                </script>";
                } else {
                    echo "<script>
                alert('Data gagal di edit');
                location='index.php?page=tabel_admin';
                </script>";
                }
            }
            ?>
        </div>
    </div><!-- /.row -->
</div><!-- /#page-wrapper -->