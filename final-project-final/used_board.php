<?php

  $num   = $_GET["num"];

	$con = mysqli_connect("localhost", "user1", "12345", "goodpang");
	$sql = "select * from product_my where num=$num";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);

  $num            = $row["num"];
  $id             = $row["id"];
  $name           = $row["name"];
  $product_name   = $row["product_name"];
  $memo           = $row["memo"];
  $price          = $row["price"];
  $regist_day     = $row["regist_day"];
  $file_copied     = $row["file_copied"];
  mysqli_close($con);

  ?>

  <!DOCTYPE html>
  <html>
  <head>
  <meta charset="utf-8">
  <title>장바구니 결정</title>
  <link rel="stylesheet" type="text/css" href="./css/common.css">
  <link rel="stylesheet" type="text/css" href="./css/board1.css">
  <link rel="stylesheet" type="text/css" href="./css/used_main.css">
  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/bar.css">
  <script>
    function check_board() {
      if (!document.board_form.phonenumber.value)
      {
          alert("휴대번호를 입력하세요!");
          document.board_form.phonenumber.focus();
          return;
      }
        if (!document.board_form.content.value)
        {
            alert("내용을 입력하세요!");
            document.board_form.content.focus();
            return;
        }
        document.board_form.submit();
     }
  </script>

  </head>
  <body>
  <header>
      <?php include "used_header.php";?>
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
      <input type="hidden" name="num" value="<?=$num?>">
      <table border="0" cellspacing="50" cellpadding="10">
        <tr>
          <td><img src="./data/<?=$file_copied?>"  width="200px" height="200px"></td>
          <td><b><?=$product_name?></b><br><br>
                  <?=$memo?><br><br>
                  <?=number_format($price)?>원<br><br>
                  작성자 : <?=$name?>
          </td>
        </tr>
        <tr>
          <th colspan="2" >
             	<div id="board_box">
          	    <form  name="board_form" method="post" action="used_board_insert.php?num=<?=$num?>">
                  <input type="hidden" value="<?=$num?>">
          	    	 <ul id="board_form">
          				<li id="text_area1">
          					<span class="col1">이름 : </span>
          					<span class="col2"><?=$username?></span>
          				</li>
                  <li id="text_area1">
          					<span class="col1">연락처 : </span>
          					<span class="col2"><input type="text" name="phonenumber" value="" ></span>
          				</li>
          	    		<li id="text_area">
          	    			<span class="col1">내용 : </span>
          	    			<span class="col2">
          	    				<textarea name="content"></textarea>
                        <button type="button" onclick="check_board()">완료</button>
          	    			</span>
          	    		</li>

          	    	    </ul>

          	    </form>
          	</div>
          </th>
        </tr>
        <tr>

          <th colspan="2" style="padding-top:50px" align="center">

                <div id="latest">
            <h3 id="board_title">
                댓글목록
          </h3>
          <ul>

          <?php
              $con = mysqli_connect("localhost", "user1", "12345", "goodpang");
              $sql = "select * from board where product_num = $num order by num";
              $result = mysqli_query($con, $sql);
              $num_match = mysqli_num_rows($result);

              if ($num_match == 0 )
                  echo "댓글이 없습니다!";
              else
              {
                  while( $row = mysqli_fetch_array($result) )
                  {
                      $regist_day = substr($row["regist_day"], 0, 10);

          ?>

                          <li>
                              <span><?=$row["content"]?></span>
                              <span><?=$regist_day?></span>
                              <span><?=$row["name"]?></span>

                          <?php
                                  if($_SESSION["userid"]==$id or $_SESSION["userid"]=='이재윤') {
                              ?>
                                    <span><?=$row["phonenumber"]?></span>
                              <?php
                                  }
                              ?>

                          </li>
          <?php
                  }
              }
              mysqli_close($con);
          ?>
        </div>

        </th>

        </tr>
        <tr>
          <td colspan="2" style="padding-top:50px" align="center">
          <input type="button" onClick="location.href='used_index.php'" value="목록으로"></td>
          </tr>

          </table><br><br>

      </center>
  <footer style="background-color: #000000; color: #ffffff">
      <?php include "footer_search.php";?>
  </footer>
  <script src="js/jquery-2.1.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  </body>
  </html>
