<?php
$num  = $_GET["num"];
$page  = $_GET["page"];
$con = mysqli_connect("localhost", "user1", "12345", "sample");
$sql = "select * from board";
$result = mysqli_query($con, $sql);

$row = mysqli_fetch_array($result);
$option5_choice      = $row["option5_choice"];
$hit = $row["hit"];

$new_hit = $hit - 1;
$new_option5_choice = $option5_choice + 1;
$sql1 = "update board set option5_choice=$new_option5_choice";
$sql2 = "update board set hit=$new_hit";
mysqli_query($con, $sql1);
mysqli_query($con, $sql2);

echo("
              <script>
                location.href = 'board_view.php?num=$num&page=$page';
              </script>
            ")

?>