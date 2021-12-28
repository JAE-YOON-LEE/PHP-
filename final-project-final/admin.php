<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>회원 관리</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/admin.css">
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
   	<div id="admin_box">
	    <h3 id="member_title">
	    	관리자 모드 > 회원 관리
		</h3>
	    <ul id="member_list">
				<li>
					<span class="col1">번호</span>
					<span class="col2">아이디</span>
					<span class="col3">이름</span>
					<span class="col4">레벨</span>
					<span class="col5">포인트</span>
					<span class="col6">가입일</span>
          <span class="col7">주소</span>
					<span class="col8">수정</span>
					<span class="col9">삭제</span>
				</li>
<?php
if (isset($_GET["page"]))
  $page = $_GET["page"];
else
  $page = 1;

	$con = mysqli_connect("localhost", "user1", "12345", "goodpang");
	$sql = "select * from members order by num desc";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result); // 전체 회원 수

	$number = $total_record;


  $scale = 6;


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

      $num         = $row["num"];
	    $id          = $row["id"];
	    $name        = $row["name"];
	    $level       = $row["level"];
      $point       = $row["point"];
      $regist_day  = $row["regist_day"];
      $address  = $row["address"];

?>



		<li>
		<form method="post" action="admin_member_update.php?num=<?=$num?>">
			<span class="col1"><?=$number?></span>
			<span class="col2"><?=$id?></a></span>
			<span class="col3"><?=$name?></span>
			<span class="col4"><input type="text" name="level" value="<?=$level?>"></span>
			<span class="col5"><input type="text" name="point" value="<?=$point?>"></span>
			<span class="col6"><?=$regist_day?></span>
      <span class="col7"><?=$address?></span>
			<span class="col8"><button type="submit">수정</button></span>
			<span class="col9"><button type="button" onclick="location.href='admin_member_delete.php?num=<?=$num?>'">삭제</button></span>
		</form>
		</li>

<?php
   	   $number--;
   }

?>
	    </ul>

      <ul id="page_num">
<?php
	if ($total_page>=2 && $page >= 2)
	{
		$new_page = $page-1;
		echo "<li><a href='admin.php?page=$new_page'>◀ 이전</a> </li>";
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
			echo "<li><a href='admin.php?page=$i'> $i </a><li>";
		}
   	}
   	if ($total_page>=2 && $page != $total_page)
   	{
		$new_page = $page+1;
		echo "<li> <a href='admin.php?page=$new_page'>다음 ▶</a> </li>";
	}
	else
		echo "<li>&nbsp;</li>";
?>
			</ul>


      <div id="admin_box">
  	    <h3 id="order_title">
  	    	관리자 모드 > 주문목록
  		</h3>
  	    <ul id="order_list">
  				<li>
            <span class="col1">번호</span>
            <span class="col2">아이디</span>
            <span class="col3">상품명</span>
            <span class="col4">가격</span>
  					<span class="col5">수량</span>
            <span class="col6">총액</span>
            <span class="col7">주소</span>
            <span class="col8">상태</span>
  					<span class="col9">수정</span>
  				</li>
  <?php

  if (isset($_GET["page2"]))
    $page2 = $_GET["page2"];
  else
    $page2 = 1;

  	$con = mysqli_connect("localhost", "user1", "12345", "goodpang");
  	$sql = "select * from order_my order by num desc";
  	$result = mysqli_query($con, $sql);
  	$total_record = mysqli_num_rows($result); // 전체 회원 수

  	$number = $total_record;


    $scale = 6;


  	if ($total_record % $scale == 0)
  		$total_page = floor($total_record/$scale);
  	else
  		$total_page = floor($total_record/$scale) + 1;


  	$start = ($page2 - 1) * $scale;

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
  		<form method="post" action="admin_order_check_update.php?num=<?=$num?>">
  			<span class="col1"><?=$number?></span>
        <span class="col2"><?=$id?></span>
        <span class="col3" align="center"><?=$product_name?></a></span>
        <span class="col4"><?=number_format($price)?>원</span>
        <span class="col5"><?=$count?></span>
        <span class="col6"><?=number_format($totalmoney)?>원</span>
        <span class="col7"><?=$address?>&nbsp<?=$address2?></span>
        <span class="col8"><input type="text" name="order_check" value="<?=$order_check?>"></span>
  			<span class="col9"><button type="submit">수정</button></span>
  		</form>
  		</li>

  <?php
     	   $number--;
     }

  ?>
  	    </ul>
        <ul id="page_num">
  <?php
  	if ($total_page>=2 && $page2 >= 2)
  	{
  		$new_page2 = $page2-1;
  		echo "<li><a href='admin.php?page2=$new_page2'>◀ 이전</a> </li>";
  	}
  	else
  		echo "<li>&nbsp;</li>";


     	for ($i=1; $i<=$total_page; $i++)
     	{
  		if ($page2 == $i)
  		{
  			echo "<li><b> $i </b></li>";
  		}
  		else
  		{
  			echo "<li><a href='admin.php?page2=$i'> $i </a><li>";
  		}
     	}
     	if ($total_page>=2 && $page2 != $total_page)
     	{
  		$new_page2 = $page2+1;
  		echo "<li> <a href='admin.php?page2=$new_page2'>다음 ▶</a> </li>";
  	}
  	else
  		echo "<li>&nbsp;</li>";
  ?>
  			</ul>

	    <h3 id="member_title">
	    	관리자 모드 > 댓글 관리
		</h3>
	    <ul id="board_list">
		<li class="title">
			<span class="col1">선택</span>
			<span class="col2">번호</span>
			<span class="col3">이름</span>
			<span class="col4">내용</span>
			<span class="col5">휴대번호</span>
			<span class="col6">작성일</span>
		</li>
		<form method="post" action="admin_board_delete.php">
<?php

if (isset($_GET["page3"]))
  $page3 = $_GET["page3"];
else
  $page3 = 1;

	$sql = "select * from board order by num desc";
	$result = mysqli_query($con, $sql);
	$total_record = mysqli_num_rows($result);

	$number = $total_record;


  $scale = 6;


  if ($total_record % $scale == 0)
    $total_page = floor($total_record/$scale);
  else
    $total_page = floor($total_record/$scale) + 1;


  $start = ($page3 - 1) * $scale;

  $number = $total_record - $start;

   for ($i=$start; $i<$start+$scale && $i < $total_record; $i++)
   {
      mysqli_data_seek($result, $i);

      $row = mysqli_fetch_array($result);

      $num         = $row["num"];
      $name        = $row["name"];
      $content        = $row["content"];
      $phonenumber       = $row["phonenumber"];

      $regist_day  = $row["regist_day"];
      $regist_day  = substr($regist_day, 0, 10)



?>
		<li>
			<span class="col1"><input type="checkbox" name="item[]" value="<?=$num?>"></span>
			<span class="col2"><?=$number?></span>
			<span class="col3"><?=$name?></span>
      <span class="col4" align="center"><?=$content?></span>
			<span class="col5"><?=$phonenumber?></span>
			<span class="col6"><?=$regist_day?></span>
		</li>
<?php
   	   $number--;
   }
   mysqli_close($con);
?>

				<button type="submit">선택된 글 삭제</button>
			</form>
	    </ul>

      <ul id="page_num">
<?php
  if ($total_page>=2 && $page3 >= 2)
  {
    $new_page3 = $page3-1;
    echo "<li><a href='admin.php?page3=$new_page3'>◀ 이전</a> </li>";
  }
  else
    echo "<li>&nbsp;</li>";


    for ($i=1; $i<=$total_page; $i++)
    {
    if ($page3 == $i)
    {
      echo "<li><b> $i </b></li>";
    }
    else
    {
      echo "<li><a href='admin.php?page3=$i'> $i </a><li>";
    }
    }
    if ($total_page>=2 && $page3 != $total_page)
    {
    $new_page3 = $page3+1;
    echo "<li> <a href='admin.php?page3=$new_page3'>다음 ▶</a> </li>";
  }
  else
    echo "<li>&nbsp;</li>";
?>
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
