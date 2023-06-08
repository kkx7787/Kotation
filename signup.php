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
    <script>
        function check_input() {
            if (!document.member_form.id.value) {
                alert("아이디를 입력하세요!");
                document.member_form.id.focus();
                return;
            } else {
                check_id();
            }

            if (!document.member_form.pass.value) {
                alert("비밀번호를 입력하세요!");
                document.member_form.pass.focus();
                return;
            }

            if (!document.member_form.pass_confirm.value) {
                alert("비밀번호확인을 입력하세요!");
                document.member_form.pass_confirm.focus();
                return;
            }

            if (!document.member_form.name.value) {
                alert("이름을 입력하세요!");
                document.member_form.name.focus();
                return;
            }

            if (!document.member_form.email.value) {
                alert("이메일 주소를 입력하세요!");
                document.member_form.email.focus();
                return;
            }

            if (document.member_form.pass.value !=
                document.member_form.pass_confirm.value) {
                alert("비밀번호가 일치하지 않습니다.\n다시 입력해 주세요!");
                document.member_form.pass.focus();
                document.member_form.pass.select();
                return;
            }

            document.member_form.submit();
        }

        function reset_form() {
            document.member_form.id.value = "";
            document.member_form.pass.value = "";
            document.member_form.pass_confirm.value = "";
            document.member_form.name.value = "";
            document.member_form.email.value = "";
            document.member_form.id.focus();
            return;
        }

        function check_id() {
            var id = document.member_form.id.value;
            var win = window.open("member_check_id.php?id=" + id, "IDcheck", "left=700,top=300,width=350,height=200,scrollbars=no,resizable=yes");

            win.onmessage = function (event) {
                var duplicate_error = event.data;

                if (duplicate_error) {
                    alert(duplicate_error);
                    return false;
                }

                return true;
            };
        }
    </script>
</head>
<body id="page-top">
<header class="masthead">
    <?php include "header.php"; ?>
</header>
<section class="page-section" id="sign-up">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">SignUp</h2>
            <h3 class="section-subheading text-muted">Please Enter Your Information</h3>
        </div>
        <form name="member_form" method="post" action="member_insert.php">
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- ID input-->
                        <input class="form-control" id="id" type="text" placeholder="Your ID *"
                               data-sb-validations="required" name="id"/>
                        <div class="invalid-feedback" data-sb-feedback="id:required">ID is required.</div>
                    </div>
                    <div class="clear"></div>
                    <div class="form-group">
                        <!-- Password number input-->
                        <input class="form-control" id="pass" type="password" placeholder="Your Password *"
                               data-sb-validations="required" name="pass"/>
                        <div class="invalid-feedback" data-sb-feedback="pass:required">Password is required.</div>
                    </div>
                    <div class="clear"></div>
                    <div class="form-group mb-md-0">
                        <!-- Password number input-->
                        <input class="form-control" id="pass_confirm" type="password"
                               placeholder="Your Password_Confirm *"
                               data-sb-validations="required" name="pass_confirm"/>
                        <div class="invalid-feedback" data-sb-feedback="pass_confirm:required">Password_Confirm is
                            required.
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Name input-->
                        <input class="form-control" id="name" type="text" placeholder="Your Name *"
                               data-sb-validations="required" name="name"/>
                        <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                    </div>
                    <div class="clear"></div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <input class="form-control" id="email" type="email" placeholder="Your Email *"
                               data-sb-validations="required,email" name="email"/>
                        <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="text-center gap-5">
                <button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit"
                        onclick="check_input()">
                    SUBMIT
                </button>
            </div>
        </form>
        <div class="text-center gap-5">
            <br/>
            <button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit"
                    onclick="reset_form()">
                CLEAR
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

