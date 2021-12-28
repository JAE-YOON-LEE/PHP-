<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>로그인</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bar.css">

  <script>
  function check_member()
  {
     if (!document.member_form.id.value) {
         alert("아이디를 입력하세요!");
         document.member_form.id.focus();
         return;
     }

     if (!document.member_form.pass.value) {
         alert("비밀번호를 입력하세요!");
         document.member_form.pass.focus();
         return;
     }

     if (!document.member_form.pass_confirm.value) {
         alert("비밀번호확인을 입력하세요!");
         document.member_form.pass_confirm.focus();
         return;
     }

     if (!document.member_form.name.value) {
         alert("이름을 입력하세요!");
         document.member_form.name.focus();
         return;
     }

     if (!document.member_form.email1.value) {
         alert("이메일 주소를 입력하세요!");
         document.member_form.email1.focus();
         return;
     }

     if (!document.member_form.email2.value) {
         alert("이메일 주소를 입력하세요!");
         document.member_form.email2.focus();
         return;
     }

     if (!document.member_form.address.value) {
         alert("주소를 입력하세요!");
         document.member_form.name.focus();
         return;
     }

     if (document.member_form.pass.value !=
           document.member_form.pass_confirm.value) {
         alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
         document.member_form.pass.focus();
         document.member_form.pass.select();
         return;
     }

     if (document.member_form.checked_id.value !="y") {
         alert("중복확인을 해주세요");
         document.member_form.pass.focus();
         document.member_form.pass.select();
         return;
     }




     document.member_form.submit();
  }

  function reset_form() {
     document.member_form.id.value = "";
     document.member_form.pass.value = "";
     document.member_form.pass_confirm.value = "";
     document.member_form.name.value = "";
     document.member_form.email1.value = "";
     document.member_form.email2.value = "";
     document.member_form.address.value = "";
     document.member_form.id.focus();
     return;
  }

  function check_login()
  {
      if (!document.login_form.id.value)
      {
          alert("아이디를 입력하세요");
          document.login_form.id.focus();
          return;
      }

      if (!document.login_form.pass.value)
      {
          alert("비밀번호를 입력하세요");
          document.login_form.pass.focus();
          return;
      }
      document.login_form.submit();
  }
  function check_id() {
    window.open("member_check_id.php?id=" + document.member_form.id.value,
        "IDcheck",
         "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");
         document.member_form.checked_id.value = "y";
       }


  </script>

</head>

<body>
  <header>
    	<?php include "header.php";?>
    </header>
  <style type="text/css">
    .panel-login {
      border-color: #ccc;
      -webkit-box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
      -moz-box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
      box-shadow: 0px 2px 3px 0px rgba(0, 0, 0, 0.2);
    }

    .panel-login>.panel-heading {
      color: #00415d;
      background-color: #fff;
      border-color: #fff;
      text-align: center;
    }

    .panel-login>.panel-heading a {
      text-decoration: none;
      color: #666;
      font-weight: bold;
      font-size: 15px;
      -webkit-transition: all 0.1s linear;
      -moz-transition: all 0.1s linear;
      transition: all 0.1s linear;
    }

    .panel-login>.panel-heading a.active {
      color: #029f5b;
      font-size: 18px;
    }

    .panel-login>.panel-heading hr {
      margin-top: 10px;
      margin-bottom: 0px;
      clear: both;
      border: 0;
      height: 1px;
      background-image: -webkit-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
      background-image: -moz-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
      background-image: -ms-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
      background-image: -o-linear-gradient(left, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.15), rgba(0, 0, 0, 0));
    }

    .panel-login input[type="text"],
    .panel-login input[type="email"],
    .panel-login input[type="password"] {
      height: 45px;
      border: 1px solid #ddd;
      font-size: 16px;
      -webkit-transition: all 0.1s linear;
      -moz-transition: all 0.1s linear;
      transition: all 0.1s linear;
    }

    .panel-login input:hover,
    .panel-login input:focus {
      outline: none;
      -webkit-box-shadow: none;
      -moz-box-shadow: none;
      box-shadow: none;
      border-color: #ccc;
    }

    .btn-login {
      background-color: #59B2E0;
      outline: none;
      color: #fff;
      font-size: 14px;
      height: auto;
      font-weight: normal;
      padding: 14px 0;
      text-transform: uppercase;
      border-color: #59B2E6;
    }

    .btn-login:hover,
    .btn-login:focus {
      color: #fff;
      background-color: #53A3CD;
      border-color: #53A3CD;
    }

    .forgot-password {
      text-decoration: underline;
      color: #888;
    }

    .forgot-password:hover,
    .forgot-password:focus {
      text-decoration: underline;
      color: #666;
    }

    .btn-register {
      background-color: #1CB94E;
      outline: none;
      color: #fff;
      font-size: 14px;
      height: auto;
      font-weight: normal;
      padding: 14px 0;
      text-transform: uppercase;
      border-color: #1CB94A;
    }

    .btn-register:hover,
    .btn-register:focus {
      color: #fff;
      background-color: #1CA347;
      border-color: #1CA347;
    }
  </style>

  <div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="panel panel-login">
          <div class="panel-heading">
            <div class="row">
              <div class="col-xs-6">
                <a href="login_form"  id="login-form-link">로그인</a>
              </div>
              <div class="col-xs-6">
                <a href="member_form" class="active" id="register-form-link">회원가입</a>
              </div>
            </div>
            <hr>
          </div>
          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form id="login-form" name="login_form" method="post" action="login.php" role="form" style="display: none;">
                  <div class="form-group">
                    <input type="text" name="id" id="userID" tabindex="1" class="form-control" placeholder="아이디" value="">
                  </div>
                  <div class="form-group">
                    <input type="password" name="pass" id="password" tabindex="2" class="form-control" placeholder="비밀번호">
                  </div>
                  <div class="form-group text-center">
                    <input type="checkbox" tabindex="3" class="" name="remember" id="remember">
                    <label for="remember">아이디 기억하기</label>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="button" onclick="check_login()" name="login-submit" id="login-submit" tabindex="4" class="form-control btn btn-login" value="로그인">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="text-center">
                          <a href="find_password_form.php" tabindex="5" class="forgot-password">비밀번호를 잊어버리셨나요?</a>
                        </div>
                      </div>
                    </div>
                  </div>
                </form>


                <form id="register-form" name="member_form" method="post" action="member_insert.php" role="form" style="display: block;">
                  <div class="form-group">

                    <input type="hidden" name="checked_id" value="">

                    <div class="row">
                      <div class="col-sm-9">
                    <input type="text" name="id" id="username" tabindex="1" class="form-control" placeholder="아이디" value="" >
                  </div>
                  <div class="col-sm-3">
                    <input type="button" onclick="check_id()" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="중복확인">
                  </div>
                </div>
              </div>
                  <div class="form-group">
                    <input type="password" name="pass" id="password" tabindex="2" class="form-control" placeholder="비밀번호">
                  </div>
                  <div class="form-group">
                    <input type="password" name="pass_confirm" id="confirm-password" tabindex="2" class="form-control" placeholder="비밀번호 확인">
                  </div>
                  <div class="form-group">
                    <input type="text" name="name" id="name" tabindex="1" class="form-control" placeholder="이름" value="">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6">
                        <input type="text" name="email1" id="email1" tabindex="1" class="form-control" placeholder="이메일1(사용자계정)" value="">
                      </div>
                      <div class="col-sm-6">
                        <input type="text" name="email2" id="email2" tabindex="1" class="form-control" placeholder="이메일2(이메일서버)" value="">
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <input type="text" name="address" id="address" tabindex="1" class="form-control" placeholder="주소" value="">
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-sm-6 col-sm-offset-3">
                        <input type="button" onclick="check_member()" name="register-submit" id="register-submit" tabindex="4" class="form-control btn btn-register" value="가입하기">
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="js/jquery-2.1.3.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script type="text/javascript">
    $(function() {

      $('#login-form-link').click(function(e) {
        $("#login-form").delay(100).fadeIn(100);
        $("#register-form").fadeOut(100);
        $('#register-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
      });
      $('#register-form-link').click(function(e) {
        $("#register-form").delay(100).fadeIn(100);
        $("#login-form").fadeOut(100);
        $('#login-form-link').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();
      });

    });
  </script>
  <footer style="background-color: #000000; color: #ffffff">
    	<?php include "footer.php";?>
    </footer>

</body>

</html>
