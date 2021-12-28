<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>상품목록</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/product.css">
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
   	<div id="product_box">
	    <h3>
	    	상품관리 > 목록보기
		</h3>
	    <ul id="product_list">
				<li>
					<span class="col1">번호</span>
					<span class="col2">상품명</span>
          <span class="col3">이미지</span>
          <span class="col4">상품설명</span>
          <span class="col5">가격</span>
					<span class="col6">등록일</span>
          <span class="col7">기타</span>

				</li>
<?php
	if (isset($_GET["page"]))
		$page = $_GET["page"];
	else
		$page = 1;

	$con = mysqli_connect("localhost", "user1", "12345", "goodpang");
	$sql = "select * from product_my where id='$_SESSION[userid]' order by num desc";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result);

	$scale = 4;


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
      $memo           = $row["memo"];
      $price          = $row["price"];
      $regist_day     = $row["regist_day"];
      $file_copied     = $row["file_copied"];

?>
				<li>
					<span class="col1" align="center"><?=$number?></span>
					<span class="col2"><?=$product_name?></a></span>
          <span class="col3"><img src="./data/<?=$file_copied?>" width="200px" height="200px"></span>
          <span class="col4"><?=$memo?></span>
					<span class="col5"><?=number_format($price)?>원</span>
					<span class="col6"><?=$regist_day?></span>
          <span class="col7"><a href="product_modify_form.php?num=<?=$num?>&page=<?=$page?>">수정</a><br><br>
          <a href="product_delete.php?num=<?=$num?>&page=<?=$page?>">삭제</a></span>
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
		echo "<li><a href='product_list.php?page=$new_page'>◀ 이전</a> </li>";
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
			echo "<li><a href='product_list.php?page=$i'> $i </a><li>";
		}
   	}
   	if ($total_page>=2 && $page != $total_page)
   	{
		$new_page = $page+1;
		echo "<li> <a href='product_list.php?page=$new_page'>다음 ▶</a> </li>";
	}
	else
		echo "<li>&nbsp;</li>";
?>
			</ul>
			<ul class="buttons">

        <?php
            if($_SESSION["userlevel"]==1) {
        ?>
                  <button onclick="location.href='point_mall_list.php'">포인트몰 상품목록</button>&nbsp&nbsp
        <?php
        	}
        ?>

<?php
    if($userid) {
?>
					<button onclick="location.href='product_form.php'">등록하기</button>
<?php
	} else {
?>
					<a href="javascript:alert('로그인 후 이용해 주세요!')"><button>글쓰기</button></a>
<?php
	}
?>
				</li>
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
