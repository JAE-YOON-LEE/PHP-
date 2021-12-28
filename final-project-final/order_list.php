<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>주문목록</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/order.css">
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
<section>
   	<div id="order_box">
	    <h3>
	    	주문현황
		</h3>
	    <ul id="order_list">
				<li>
					<span class="col1">상품명</span>
          <span class="col2">가격</span>
          <span class="col3">수량</span>
					<span class="col4">총액</span>
          <span class="col5">배송지</span>
          <span class="col6">상태</span>
          <span class="col7">기타</span>

				</li>
<?php
	if (isset($_GET["page"]))
		$page = $_GET["page"];
	else
		$page = 1;

	$con = mysqli_connect("localhost", "user1", "12345", "goodpang");
	$sql = "select * from order_my where id='$_SESSION[userid]' order by num desc";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result);

	$scale = 8;

	if ($total_record % $scale == 0)
		$total_page = floor($total_record/$scale);
	else
		$total_page = floor($total_record/$scale) + 1;

	$start = ($page - 1) * $scale;

	$number = $total_record - $start;

   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
   {
      mysqli_data_seek($result, $i);

      $row = mysqli_fetch_array($result);

	    $num            = $row["num"];
	    $id             = $row["id"];
	    $name           = $row["name"];
	    $product_name   = $row["product_name"];
      $count           = $row["count"];
      $price          = $row["price"];
      $totalmoney     = $row["totalmoney"];
      $address     = $row["address"];
      $address2     = $row["address2"];
      $order_check     = $row["order_check"];

?>
				<li>
					<span class="col1" align="center"><?=$product_name?></a></span>
          <span class="col2"><?=number_format($price)?>원</span>
					<span class="col3"><?=$count?></span>
					<span class="col4"><?=number_format($totalmoney)?>원</span>
          <span class="col5"><?=$address?>&nbsp<?=$address2?></span>
          <span class="col6"><?=$order_check?></span>
          <span class="col7"><a href="order_delete.php?num=<?=$num?>&page=<?=$page?>">취소</a></span>
				</li>
<?php
   	   $number--;
   }
   mysqli_close($con);

?>
	    	</ul>
			<ul id="page_num">
<?php
	if ($total_page>=2 && $page >= 2)
	{
		$new_page = $page-1;
		echo "<li><a href='order_list.php?page=$new_page'>◀ 이전</a> </li>";
	}
	else
		echo "<li>&nbsp;</li>";

   	for ($i=1; $i<=$total_page; $i++)
   	{
		if ($page == $i)
		{
			echo "<li><b> $i </b></li>";
		}
		else
		{
			echo "<li><a href='order_list.php?page=$i'> $i </a><li>";
		}
   	}
   	if ($total_page>=2 && $page != $total_page)
   	{
		$new_page = $page+1;
		echo "<li> <a href='order_list.php?page=$new_page'>다음 ▶</a> </li>";
	}
	else
		echo "<li>&nbsp;</li>";
?>

			</ul>
      <ul class="buttons">
					<button onclick="location.href='order_list_end.php'">포인트몰구매목록</button>
			</ul>
	</div>
</section>
<footer style="background-color: #000000; color: #ffffff">
    <?php include "footer.php";?>
</footer>
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
