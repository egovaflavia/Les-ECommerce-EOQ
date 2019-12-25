<?php
session_start();
include 'components/koneksi.php'
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Plaza Yulia Furniture</title>
	<?php include 'components/head.php' ?>
</head>

<body>

	<?php include 'components/top_bar.php' ?>

	<div class="container">
		<div id="gototop"> </div>

		<?php include 'components/low-bar.php' ?>

		<?php include 'components/menu.php' ?>

		<div class="row">
			<?php include 'components/side_bar.php' ?>

			<?php include 'content.php' ?>
		</div>

		<?php include 'components/footer.php' ?>
	</div><!-- /container -->

	<?php include 'components/copyright.php' ?>
	<a href="#" class="gotop"><i class="icon-double-angle-up"></i></a>
	<!-- Placed at the end of the document so the pages load faster -->
	<?php include 'components/scripts.php' ?>
</body>

</html>