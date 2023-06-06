<?php
$id = $_GET["id"];

$con = mysqli_connect("localhost", "user1", "12345", "sample");

$sql = "SELECT * FROM members WHERE id='$id'";
$result = mysqli_query($con, $sql);

$num_record = mysqli_num_rows($result);

if ($num_record) {
    $duplicate_error = "아이디는 중복됩니다. 다른 아이디를 사용해 주세요!";
} else {
    $duplicate_error = "";
}

mysqli_close($con);

echo "<script>window.opener.postMessage('$duplicate_error', '*');</script>";
?>