<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>상품등록 폼</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/product.css">
<link rel="stylesheet" href="./css/bootstrap.min.css">
<link rel="stylesheet" href="./css/bar.css">
<script>
  function check_mall() {
      if (!document.product_form.product_name.value)
      {
          alert("상품명을 입력하세요!");
          document.product_form.product_name.focus();
          return;
      }
      if (!document.product_form.point.value)
      {
          alert("내용을 입력하세요!");
          document.product_form.point.focus();
          return;
      }
      document.product_form.submit();
   }
</script>
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
	    <h3 id="product_title">
	    		상품등록 > 등록
		</h3>
	    <form  name="product_form" method="post" action="point_mall_insert.php" enctype="multipart/form-data">
	    	 <ul id="product_form">
	    		<li>
	    			<span class="col1">상품명 : </span>
	    			<span class="col2"><input name="product_name" type="text"></span>
	    		</li>
          <li>
	    			<span class="col1">포인트 : </span>
	    			<span class="col2"><input name="point" type="text"></span>
	    		</li>

	    		<li>
			        <span class="col1"> 첨부 파일</span>
			        <span class="col2"><input type="file" name="upfile"></span>
			    </li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_mall()">완료</button></li>
				<li><button type="button" onclick="location.href='point_mall_list.php'">목록</button></li>
			</ul>
	    </form>
	</div>
</section>
<footer style="background-color: #000000; color: #ffffff">
    <?php include "footer.php";?>
</footer>
<script src="js/jquery-2.1.3.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
