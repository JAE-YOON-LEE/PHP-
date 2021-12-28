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
  function check_product() {
      if (!document.product_form.product_name.value)
      {
          alert("제목을 입력하세요!");
          document.product_form.product_name.focus();
          return;
      }
      if (!document.product_form.memo.value)
      {
          alert("내용을 입력하세요!");
          document.product_form.memo.focus();
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
	    		상품등록 > 등록하기
		</h3>
	    <form  name="product_form" method="post" action="product_insert.php" enctype="multipart/form-data">
	    	 <ul id="product_form">
				<li>
					<span class="col1">이름 : </span>
					<span class="col2"><?=$username?></span>
				</li>
	    		<li>
	    			<span class="col1">상품명 : </span>
	    			<span class="col2"><input name="product_name" type="text"></span>
	    		</li>
          <li>
	    			<span class="col1">가격 : </span>
	    			<span class="col2"><input name="price" type="text"></span>
	    		</li>
	    		<li id="text_area">
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
	    				<textarea name="memo"></textarea>
	    			</span>
	    		</li>
	    		<li>
			        <span class="col1"> 첨부 파일</span>
			        <span class="col2"><input type="file" name="upfile"></span>
			    </li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_product()">완료</button></li>
				<li><button type="button" onclick="location.href='product_list.php'">목록</button></li>
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
