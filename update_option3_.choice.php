<?php
$num  = $_GET["num"];
$page  = $_GET["page"];
$con = mysqli_connect("localhost", "user1", "12345", "sample");
$sql = "select * from board";
$result = mysqli_query($con, $sql);

$row = mysqli_fetch_array($result);
$option3_choice      = $row["option3_choice"];
$hit = $row["hit"];

$new_hit = $hit - 1;
$new_option3_choice = $option3_choice + 1;
$sql1 = "update board set option3_choice=$new_option3_choice";
$sql2 = "update board set hit=$new_hit";
mysqli_query($con, $sql1);
mysqli_query($con, $sql2);

echo("
              <script>
                location.href = 'board_view.php?num=$num&page=$page';
              </script>
            ")

?>