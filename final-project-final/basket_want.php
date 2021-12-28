<?php
  $num   = $_GET["num"];


	$con = mysqli_connect("localhost", "user1", "12345", "goodpang");
	$sql = "select * from product_my where num=$num";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);

  $num_match = mysqli_num_rows($result);

  $num            = $row["num"];
  $id             = $row["id"];
  $name           = $row["name"];
  $product_name   = $row["product_name"];
  $memo           = $row["memo"];
  $price          = $row["price"];
  $regist_day     = $row["regist_day"];
  $file_copied     = $row["file_copied"];
  ?>

  <!DOCTYPE html>
  <html>
  <head>
  <meta charset="utf-8">
  <title>장바구니 수량 결정</title>
  <link rel="stylesheet" type="text/css" href="./css/common.css">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/bar.css">
  </head>
  <body>
  <header>
      <?php include "header.php";?>
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
  <center>
    <form name="wantbasket" method="post" action="basket_insert.php">
      <input type="hidden" name="num" value="<?=$num?>">
      <table border="0" cellspacing="50" cellpadding="10">
        <tr>
          <td><img src="./data/<?=$file_copied?>"></td>
          <td><b><?=$product_name?></b><br><br>
                  <?=$memo?><br><br>
                  <?=number_format($price)?>원<br><br>
                  수량 :

                  <select name="count">
                    <option value="1">1</option>
                    <script type="text/javascript">
                    for(var i = 2; i < 501; i++){
                      document.write("<option value="+i+">"+i+"</option>");
                    }
                    </script>
                    </select><br><br>
                    <input type="submit" value="장바구니담기"><br><br>
                  </tr>
                  <tr>
                    <td colspan="2" style="padding-top:50px" align="center">
                      <input type="button" onClick="location.href='index.php'" value="목록으로"></td>
                  </tr>
                </table><br><br>
              </form>
            </center>
  <footer style="background-color: #000000; color: #ffffff">
      <?php include "footer_search.php"?>
  </footer>
  <script src="js/jquery-2.1.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
  </html>
