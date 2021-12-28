<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>GOODPANG</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/main.css">
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/bar.css">
</head>

<body>
	<header>
    	<?php include "point_mall_header.php";?>
    </header>
		<?php
		if (!$userid )
		{
			echo("<script>
					alert('로그인 후 이용해주세요!');
					history.go(-1);
					</script>
				");
			exit;
		}
		?>
	<section>
	    <?php include "point_mall_main.php";?>
	</section>
	<footer style="background-color: #000000; color: #ffffff">
    	<?php include "footer.php";?>
    </footer>
		<script src="js/jquery-2.1.3.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
</body>
</html>
