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
    <link rel="stylesheet" type="text/css" href="./css/board_form.css">
    <link href="css/styles.css" rel="stylesheet"/>
    <script>
        function check_input() {
            if (!document.board_form.subject.value) {
                alert("제목을 입력하세요!");
                document.board_form.subject.focus();
                return;
            }
            if (!document.board_form.content.value) {
                alert("내용을 입력하세요!");
                document.board_form.content.focus();
                return;
            }
            document.board_form.submit();
        }

        function addOption() {
            var e = document.getElementsByClassName("hidden");
            5 == e.length ? alert("5개 이상 선택지를 추가할 수 없습니다.") : e[0].classList.remove("hidden")
        }

        function delOption() {
            var e = document.getElementsByClassName("answers"),
                t = e.length - document.getElementsByClassName("hidden").length - 2;
            1 > t ? alert("선택지는 최소 2개 필요합니다.") : e[t].className += " hidden"
        }
    </script>
</head>
<body id="page-top">
<header class="masthead">
    <?php include "header.php"; ?>
</header>
<section class="page-section" id="board_form">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Create Vote</h2>
        </div>
        <div id="board_box">
            <ul class="buttons">
                <li class="col-md-2 text-center text-lg">
                    <button onclick="addOption()">Increase</button>
                </li>
                <li class="col-md-2 text-center text-lg">
                    <button onclick="delOption()">Decrease</button>
                </li>
            </ul>
        </div>
        <form name="board_form" method="post" action="board_insert.php" enctype="multipart/form-data">
            <div class="row justify-content-center my-5">
                <div id="write_msg" class="col-md-6">
                    <div class="form id">
                        <div class="col1 my-2">Name : <?= $username ?></div>
                    </div>
                    <div class="form-group">
                        <br/>
                        <textarea class="form-control" id="subject" type="text" placeholder="Vote Title"
                                  data-sb-validations="required" name="subject"></textarea>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Vote Title is required.</div>
                    </div>
                    <div class="answers">
                        <br/>
                        <input class="form-control" id="option1"
                               placeholder="Please enter the contents of the option"
                               data-sb-validations="required" name="option1"/>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Content is required.</div>
                    </div>
                    <div class="answers">
                        <br/>
                        <input class="form-control" id="option2"
                               placeholder="Please enter the contents of the option"
                               data-sb-validations="required" name="option2"/>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Content is required.</div>
                    </div>
                    <div class="answers hidden">
                        <br/>
                        <input class="form-control" id="option3"
                               placeholder="Please enter the contents of the option"
                               data-sb-validations="required" name="option3"/>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Content is required.</div>
                    </div>
                    <div class="answers hidden">
                        <br/>
                        <input class="form-control" id="option4"
                               placeholder="Please enter the contents of the option"
                               data-sb-validations="required" name="option4"/>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Content is required.</div>
                    </div>
                    <div class="answers hidden">
                        <br/>
                        <input class="form-control" id="option5"
                               placeholder="Please enter the contents of the option"
                               data-sb-validations="required" name="option5"/>
                        <div class="invalid-feedback" data-sb-feedback="name:required">Content is required.</div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="text-center">
                <button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit"
                        onclick="check_input()">
                    Create
                </button>
            </div>
        </form>
        <div class="text-center">
            <br/>
            <button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit"
                    onclick="location.href='board_list.php'">
                list
            </button>
        </div>
    </div>
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
