<?php

    $num   = $_GET["num"];
    $page   = $_GET["page"];

    $con = mysqli_connect("localhost", "user1", "12345", "goodpang");
    $sql = "delete from order_my where num = $num";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'order_list.php?page=$page';
	     </script>
	   ";
?>
