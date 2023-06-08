<meta charset="utf-8">
<?php
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

    $subject = $_POST["subject"];
    $option1 = $_POST["option1"];
    $option2 = $_POST["option2"];
    $option3 = $_POST["option3"];
    $option4 = $_POST["option4"];
    $option5 = $_POST["option5"];

	$subject = htmlspecialchars($subject, ENT_QUOTES);
	$option1 = htmlspecialchars($option1, ENT_QUOTES);
    $option2 = htmlspecialchars($option2, ENT_QUOTES);
    $option3 = htmlspecialchars($option3, ENT_QUOTES);
    $option4 = htmlspecialchars($option4, ENT_QUOTES);
    $option5 = htmlspecialchars($option5, ENT_QUOTES);

	$regist_day = date("Y-m-d (H:i)");  // 현재의 '년-월-일-시-분'을 저장

	$con = mysqli_connect("localhost", "user1", "12345", "sample");

	$sql = "insert into board (id, name, subject, option1, option2, option3, option4, option5, regist_day, hit, option1_choice, option2_choice, option3_choice, option4_choice, option5_choice) ";
    $sql .= "VALUES ('$userid', '$username', '$subject', ";

    if (!empty($option1)) {
        $sql .= "'$option1', ";
    } else {
        $sql .= "NULL, ";
    }

    if (!empty($option2)) {
        $sql .= "'$option2', ";
    } else {
        $sql .= "NULL, ";
    }

    if (!empty($option3)) {
        $sql .= "'$option3', ";
    } else {
        $sql .= "NULL, ";
    }

    if (!empty($option4)) {
        $sql .= "'$option4', ";
    } else {
        $sql .= "NULL, ";
    }

    if (!empty($option5)) {
        $sql .= "'$option5', ";
    } else {
        $sql .= "NULL, ";
    }

    $sql .= "'$regist_day', 0, 0, 0, 0, 0, 0)";
	mysqli_query($con, $sql);  // $sql 에 저장된 명령 실행
	mysqli_close($con);                // DB 연결 끊기

	echo "
	   <script>
	    location.href = 'board_list.php';
	   </script>
	";
?>

  
