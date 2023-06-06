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
    <script>
        function check_input() {
            if (!document.message_form.subject.value) {
                alert("제목을 입력하세요!");
                document.message_form.subject.focus();
                return;
            }
            if (!document.message_form.content.value) {
                alert("내용을 입력하세요!");
                document.message_form.content.focus();
                return;
            }
            document.message_form.submit();
        }
    </script>
</head>
<body id="page-top">
<header class="masthead">
    <?php include "header.php"; ?>
</header>
<section class="page-section" id="reply_message">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Reply Message</h2>
        </div>
        <?php
        $num = $_GET["num"];

        $con = mysqli_connect("localhost", "user1", "12345", "sample");
        $sql = "select * from message where num=$num";
        $result = mysqli_query($con, $sql);

        $row = mysqli_fetch_array($result);
        $send_id = $row["send_id"];
        $rv_id = $row["rv_id"];
        $subject = $row["subject"];
        $content = $row["content"];

        $subject = "RE: " . $subject;

        $content = "> " . $content;
        $content = str_replace("\n", "\n>", $content);
        $content = "\n\n\n-----------------------------------------------\n" . $content;

        $result2 = mysqli_query($con, "select name from members where id='$send_id'");
        $record = mysqli_fetch_array($result2);
        $send_name = $record["name"];
        ?>
        <form name="message_form" method="post" action="message_insert.php?send_id=<?= $userid ?>">
            <input type="hidden" name="rv_id" value="<?= $send_id ?>">
            <div class="row justify-content-center my-5">
                <div id="write_msg" class="col-md-6">
                    <div class="form id">
                        <div class="col1 my-2">Sender : <?= $userid ?></div>
                    </div>
                    <div class="form-group">
                        <div class="col1 my-2">Receiver ID : <?= $send_name ?>(<?= $send_id ?>)</div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="subject" type="text" placeholder="Title"
                               data-sb-validations="required" name="subject" value="<?= $subject ?>"/>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Title is required.</div>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" id="content" placeholder="What do you want to send?"
                                  data-sb-validations="required" name="content"><?= $content ?></textarea>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Content is required.</div>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center gap-3">
                <div class="col-md-2 text-center text-lg"><a href="message_box.php?mode=rv">Receive Message Box</a></div>
                <div class="col-md-2 text-center text-lg"><a href="message_box.php?mode=send">Send Message Box</a></div>
            </div>
            <br/>
            <div class="text-center">
                <button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit"
                        onclick="check_input()">
                    Send
                </button>
            </div>
        </form>
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
