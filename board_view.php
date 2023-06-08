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
    <link rel="stylesheet" type="text/css" href="./css/board.css">
    <link rel="stylesheet" type="text/css" href="./css/graph.scss">
    <link href="css/styles.css" rel="stylesheet"/>
    <script>
        function add_option1_choice() {
            $option1_choice = 0;
        }
    </script>
</head>
<body id="page-top">
<header class="masthead">
    <?php include "header.php"; ?>
</header>
<section>
   	<div id="board_box">
	    <h3 class="title">
			게시판 > 내용보기
		</h3>
<?php
	$num  = $_GET["num"];
	$page  = $_GET["page"];

	$con = mysqli_connect("localhost", "user1", "12345", "sample");
	$sql = "select * from board where num=$num";
	$result = mysqli_query($con, $sql);

	$row = mysqli_fetch_array($result);
	$id      = $row["id"];
	$name      = $row["name"];
	$regist_day = $row["regist_day"];
	$subject    = $row["subject"];
	$option1    = $row["option1"];
    $option2    = $row["option2"];
    $option3    = $row["option3"];
    $option4    = $row["option4"];
    $option5    = $row["option5"];
	$hit          = $row["hit"];
    $option1_choice      = $row["option1_choice"];
    $option2_choice      = $row["option2_choice"];
    $option3_choice      = $row["option3_choice"];
    $option4_choice      = $row["option4_choice"];
    $option5_choice      = $row["option5_choice"];

	$option1 = str_replace(" ", "&nbsp;", $option1);
	$option1 = str_replace("\n", "<br>", $option1);

    $option2 = str_replace(" ", "&nbsp;", $option2);
    $option2 = str_replace("\n", "<br>", $option2);

    $option3 = str_replace(" ", "&nbsp;", $option3);
    $option3 = str_replace("\n", "<br>", $option3);

    $option4 = str_replace(" ", "&nbsp;", $option4);
    $option4 = str_replace("\n", "<br>", $option4);

    $option5 = str_replace(" ", "&nbsp;", $option5);
    $option5 = str_replace("\n", "<br>", $option5);

	$new_hit = $hit + 1;
	$sql = "update board set hit=$new_hit where num=$num";

	mysqli_query($con, $sql);
?>
	    <ul id="view_content">
			<li>
				<span class="col1"><b>제목 :</b> <?=$subject?></span>
				<span class="col2"><?=$name?> | <?=$regist_day?></span>
			</li>
            <?php if ((!empty($option1_choice) || !empty($option2_choice) ||
                !empty($option3_choice) || !empty($option4_choice) || !empty($option5_choice))): ?>
            <div class="stats_graph_box">
                <div class="graph">
                    <?php if (!empty($option1)): ?>
                        <div class="bar green" style="width: <?= number_format(($option1_choice / ($option1_choice + $option2_choice + $option3_choice + $option4_choice + $option5_choice)) * 100, 1) ?>%;">
                            <dl class="desc">
                                <dt><?= $option1 ?></dt>
                                <dd><em><?= $option1_choice ?></em>개(<?= number_format(($option1_choice / ($option1_choice + $option2_choice + $option3_choice + $option4_choice + $option5_choice)) * 100, 1)?>%)</dd>
                            </dl>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($option2)): ?>
                        <div class="bar pink" style="width: <?= number_format(($option2_choice / ($option1_choice + $option2_choice + $option3_choice + $option4_choice + $option5_choice)) * 100, 1) ?>%;">
                            <dl class="desc">
                                <dt><?= $option2 ?></dt>
                                <dd><em><?= $option2_choice ?></em>개(<?= number_format(($option2_choice / ($option1_choice + $option2_choice + $option3_choice + $option4_choice + $option5_choice)) * 100, 1)?>%)</dd>
                            </dl>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($option3)): ?>
                        <div class="bar clear" style="width: <?= number_format(($option3_choice / ($option1_choice + $option2_choice + $option3_choice + $option4_choice + $option5_choice)) * 100, 1) ?>%;">
                            <dl class="desc">
                                <dt><?= $option3 ?></dt>
                                <dd><em><?= $option3_choice ?></em>개(<?= number_format(($option3_choice / ($option1_choice + $option2_choice + $option3_choice + $option4_choice + $option5_choice)) * 100, 1)?>%)</dd>
                            </dl>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($option4)): ?>
                        <div class="bar orange" style="width: <?= number_format(($option4_choice / ($option1_choice + $option2_choice + $option3_choice + $option4_choice + $option5_choice)) * 100, 1) ?>%;">
                            <dl class="desc">
                                <dt><?= $option4 ?></dt>
                                <dd><em><?= $option4_choice ?></em>개(<?= number_format(($option4_choice / ($option1_choice + $option2_choice + $option3_choice + $option4_choice + $option5_choice)) * 100, 1)?>%)</dd>
                            </dl>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($option5)): ?>
                        <div class="bar blue" style="width: <?= number_format(($option5_choice / ($option1_choice + $option2_choice + $option3_choice + $option4_choice + $option5_choice)) * 100, 1) ?>%;">
                            <dl class="desc">
                                <dt><?= $option5 ?></dt>
                                <dd><em><?= $option5_choice ?></em>개(<?= number_format(($option5_choice / ($option1_choice + $option2_choice + $option3_choice + $option4_choice + $option5_choice)) * 100, 1)?>%)</dd>
                            </dl>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
			<li>
                <?php if (!empty($option1)): ?>
                    <?= $option1 ?> : <?= $option1_choice ?>
                    <?php if (!empty($option1_choice)): ?>
                    (<?= number_format(($option1_choice / ($option1_choice + $option2_choice + $option3_choice + $option4_choice + $option5_choice)) * 100, 1) ?>%)
                    <?php endif; ?>
                    <br/>
                <?php endif; ?>

                <?php if (!empty($option2)): ?>
                    <?= $option2 ?> : <?= $option2_choice ?>
                    <?php if (!empty($option2_choice)): ?>
                    (<?= number_format(($option2_choice / ($option1_choice + $option2_choice + $option3_choice + $option4_choice + $option5_choice)) * 100, 1) ?>%)
                    <?php endif; ?>
                    <br/>
                <?php endif; ?>

                <?php if (!empty($option3)): ?>
                    <?= $option3 ?> : <?= $option3_choice ?>
                    <?php if (!empty($option3_choice)): ?>
                    (<?= number_format(($option3_choice / ($option1_choice + $option2_choice + $option3_choice + $option4_choice + $option5_choice)) * 100, 1) ?>%)
                    <?php endif; ?>
                    <br/>
                <?php endif; ?>

                <?php if (!empty($option4)): ?>
                    <?= $option4 ?> : <?= $option4_choice ?>
                    <?php if (!empty($option4_choice)): ?>
                    (<?= number_format(($option4_choice / ($option1_choice + $option2_choice + $option3_choice + $option4_choice + $option5_choice)) * 100, 1) ?>%)
                    <?php endif; ?>
                    <br/>
                <?php endif; ?>

                <?php if (!empty($option5)): ?>
                    <?= $option5 ?> : <?= $option5_choice ?>
                    <?php if (!empty($option5_choice)): ?>
                    (<?= number_format(($option5_choice / ($option1_choice + $option2_choice + $option3_choice + $option4_choice + $option5_choice)) * 100, 1) ?>%)
                    <?php endif; ?>
                    <br/>
                <?php endif; ?>
			</li>
	    </ul>
        <div class="text-center gap-5">
            <br/>
            <?php if (!empty($option1)): ?>
                <button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit"
                        onclick="location.href='update_option1_choice.php?num=<?=$num?>&page=<?=$page?>'">
                    <?= $option1 ?>
                </button>
            <?php endif; ?>

            <?php if (!empty($option2)): ?>
                <button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit"
                        onclick="location.href='update_option2_choice.php?num=<?=$num?>&page=<?=$page?>'">
                    <?= $option2 ?>
                </button>
            <?php endif; ?>

            <?php if (!empty($option3)): ?>
                <button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit"
                        onclick="location.href='update_option3_choice.php?num=<?=$num?>&page=<?=$page?>'">
                    <?= $option3 ?>
                </button>
            <?php endif; ?>

            <?php if (!empty($option4)): ?>
                <button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit"
                        onclick="location.href='update_option4_choice.php?num=<?=$num?>&page=<?=$page?>'">
                    <?= $option4 ?>
                </button>
            <?php endif; ?>

            <?php if (!empty($option5)): ?>
                <button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit"
                        onclick="location.href='update_option5_choice.php?num=<?=$num?>&page=<?=$page?>'">
                    <?= $option5 ?>
                </button>
            <?php endif; ?>

        </div>
        <ul class="buttons">
            <li><button onclick="location.href='board_list.php?page=<?=$page?>'">목록</button></li>
            <li><button onclick="location.href='board_delete.php?num=<?=$num?>&page=<?=$page?>'">삭제</button></li>
            <li><button onclick="location.href='board_form.php'">글쓰기</button></li>
        </ul>
	</div> <!-- board_box -->
</section>
<footer>
    <?php include "footer.php";?>
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
