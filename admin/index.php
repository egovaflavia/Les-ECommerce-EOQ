<?php
session_start();
include 'components/koneksi.php';

if (empty($_SESSION['admin'])) {
  echo "
  <script>alert('Harap login terlebih dahulu');window.location='login.php'</script>;
  ";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Administrator</title>
  <?php include 'components/head.php'; ?>
</head>

<body>
  <div id="wrapper">
    <!-- Sidebar -->
    <?php include 'components/menu.php'; ?>

    <?php include 'content.php'; ?>

  </div><!-- /#wrapper -->

  <?php include 'components/scripts.php'; ?>

</body>

</html>