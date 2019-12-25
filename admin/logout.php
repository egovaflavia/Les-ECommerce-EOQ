<?php
session_start();

//menghilangkan SESSION pelanggan
session_destroy();

echo "<script>alert('Anda Telah Logout');</script>";
echo "<script>location='login.php';</script>";
?>