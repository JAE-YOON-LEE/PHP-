<meta charset="utf-8">
<?php
  $num   = $_GET["num"];
    session_start();
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $userid = "";
    if (isset($_SESSION["username"])) $username = $_SESSION["username"];
    else $username = "";

    if ( !$userid )
    {
        echo("
                    <script>
                    alert('게시판 글쓰기는 로그인 후 이용해 주세요!');
                    history.go(-1)
                    </script>
        ");
                exit;
    }

    $content = $_POST["content"];
    $phonenumber = $_POST["phonenumber"];

	$regist_day = date("Y-m-d (H:i)");
	$con = mysqli_connect("localhost", "user1", "12345", "goodpang");

	$sql = "insert into board (id, name, phonenumber, content, regist_day, product_num) ";
	$sql .= "values('$userid', '$username', '$phonenumber', '$content', '$regist_day','$num')";
	mysqli_query($con, $sql);


	mysqli_close($con);

	echo "
	   <script>
	    location.href = 'used_board.php?num=$num';
	   </script>
	";
?>
