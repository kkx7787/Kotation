<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <meta name="description" content=""/>
    <meta name="author" content=""/>
    <title>Kotation</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico"/>
    <!-- Font Awesome icons (free version)-->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <!-- Google fonts-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css"/>
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css"/>
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="css/styles.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="./css/common.css">
    <link rel="stylesheet" type="text/css" href="./css/message.css">
</head>
<body id="page-top">
<header class="masthead">
    <?php include "header.php"; ?>
</header>
<section class="page-section" id="message_box">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">
                <?php
                if (isset($_GET["page"]))
                    $page = $_GET["page"];
                else
                    $page = 1;

                $mode = $_GET["mode"];

                if ($mode == "send")
                    echo "Send Message Box";
                else
                    echo "Receive Message Box";
                ?>
            </h2>
        </div>
        <br/>
        <br/>
        <div class="text-center">
            <ul id="message">
                <li>
                    <span class="col1">번호</span>
                    <span class="col2">제목</span>
                    <span class="col3">
<?php
if ($mode == "send")
    echo "받은이";
else
    echo "보낸이";
?>
					</span>
                    <span class="col4">등록일</span>
                </li>
                <?php
                $con = mysqli_connect("localhost", "user1", "12345", "sample");

                if ($mode == "send")
                    $sql = "select * from message where send_id='$userid' order by num desc";
                else
                    $sql = "select * from message where rv_id='$userid' order by num desc";

                $result = mysqli_query($con, $sql);
                $total_record = mysqli_num_rows($result); // 전체 글 수

                $scale = 10;

                // 전체 페이지 수($total_page) 계산
                if ($total_record % $scale == 0)
                    $total_page = floor($total_record / $scale);
                else
                    $total_page = floor($total_record / $scale) + 1;

                // 표시할 페이지($page)에 따라 $start 계산
                $start = ($page - 1) * $scale;

                $number = $total_record - $start;

                for ($i = $start; $i < $start + $scale && $i < $total_record; $i++) {
                    mysqli_data_seek($result, $i);
                    // 가져올 레코드로 위치(포인터) 이동
                    $row = mysqli_fetch_array($result);
                    // 하나의 레코드 가져오기
                    $num = $row["num"];
                    $subject = $row["subject"];
                    $regist_day = $row["regist_day"];

                    if ($mode == "send")
                        $msg_id = $row["rv_id"];
                    else
                        $msg_id = $row["send_id"];

                    $result2 = mysqli_query($con, "select name from members where id='$msg_id'");
                    $record = mysqli_fetch_array($result2);
                    $msg_name = $record["name"];
                    ?>
                    <li>
                        <span class="col1"><?= $number ?></span>
                        <span class="col2"><a
                                    href="message_view.php?mode=<?= $mode ?>&num=<?= $num ?>"><?= $subject ?></a></span>
                        <span class="col3"><?= $msg_name ?></span>
                        <span class="col4"><?= $regist_day ?></span>
                    </li>
                    <?php
                    $number--;
                }
                mysqli_close($con);
                ?>
            </ul>
            <ul id="page_num">
                <?php
                if ($total_page >= 2 && $page >= 2) {
                    $new_page = $page - 1;
                    echo "<li><a href='message_box.php?mode=$mode&page=$new_page'>◀ 이전</a> </li>";
                } else
                    echo "<li>&nbsp;</li>";

                // 게시판 목록 하단에 페이지 링크 번호 출력
                for ($i = 1; $i <= $total_page; $i++) {
                    if ($page == $i)     // 현재 페이지 번호 링크 안함
                    {
                        echo "<li><b> $i </b></li>";
                    } else {
                        echo "<li> <a href='message_box.php?mode=$mode&page=$i'> $i </a> <li>";
                    }
                }
                if ($total_page >= 2 && $page != $total_page) {
                    $new_page = $page + 1;
                    echo "<li> <a href='message_box.php?mode=$mode&page=$new_page'>다음 ▶</a> </li>";
                } else
                    echo "<li>&nbsp;</li>";
                ?>
            </ul> <!-- page -->
            <ul class="buttons">
                <li class="col-md-2 text-center text-lg"><button onclick="location.href='message_box.php?mode=rv'">Receive Message Box</button></li>
                <li class="col-md-2 text-center text-lg"><button onclick="location.href='message_box.php?mode=send'">Send Message Box</button></li>
                <li class="col-md-2 text-center text-lg"><button onclick="location.href='message_form.php?mode=send'">Send Message</button></li>
            </ul>
        </div> <!-- message_box -->
</section>
<footer>
    <?php include "footer.php"; ?>
</footer>
<!-- Bootstrap core JS-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Core theme JS-->
<script src="js/scripts.js"></script>
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<!-- * *                               SB Forms JS                               * *-->
<!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
<!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
<script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
</body>
</html>
