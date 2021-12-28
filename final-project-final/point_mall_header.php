<script type="text/javascript" src="./js/login.js"></script>
<?php
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";
    if (isset($_SESSION["userlevel"])) $userlevel = $_SESSION["userlevel"];
    else $userlevel = "";
    if (isset($_SESSION["userpoint"])) $userpoint = $_SESSION["userpoint"];
    else $userpoint = "";
?>

  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <a href="index.php" class="navbar-brand easysLogo">GOODPANG</a>
      </div>
      <div class="collapse navbar-collapse navbar-ex1-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li class="active"><a href="index.php">HOME<span class="sr-only"></span></a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">MENU<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="basket_list.php">장바구니</a></li>
              <li><a href="product_list.php">상품관리</a></li>
              <li><a href="order_list.php">주문현황</a></li>
              <li><a href="used_index.php">중고장터</a></li>
              <li><a href="point_mall_index.php">포인트몰</a></li>
            </ul>
          </li>
        </ul>
        <form class="navbar-form navbar-left" name="search" action="search_point_mall_main.php" method="post">
          <div class="form-group">
            <input type="text" name="search" value="" class="form-control" placeholder="내용을 입력하세요.">
          </div>
          <button type="submit" name="tool" class="btn btn-default">검색</button>
        </form>
        <ul class="nav navbar-nav navbar-right">
          <?php
              if(!$userid) {
          ?>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">접속하기<span class="caret"></span></a>
            <ul class="dropdown-menu">
              <li><a href="login_form.php">로그인</a></li>
              <li><a href="member_form.php">회원가입</a></li>
            </ul>
          </li>
          <?php
              } else {
                          $logged = $username."(".$userid.")님[Level:".$userlevel.", Point:".$userpoint."]";
          ?>
                          <li><a><?=$logged?></a></li>
                          <li><a href="logout.php">로그아웃</a> </li>
                          <li><a href="member_modify_form.php">정보 수정</a></li>
          <?php
              }
          ?>
          <?php
              if($userlevel==1) {
          ?>

                          <li><a href="admin.php">관리자 모드</a></li>
          <?php
              }
          ?>
        </ul>
      </div>
    </div>
  </nav>
