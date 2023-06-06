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
    <script type="text/javascript" src="./js/member_modify.js"></script>
</head>
<body id="page-top">
<header class="masthead">
    <?php include "header.php"; ?>
</header>
<?php
$con = mysqli_connect("localhost", "user1", "12345", "sample");
$sql = "select * from members where id='$userid'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

$pass = $row["pass"];
$name = $row["name"];

$email = $row["email"];
mysqli_close($con);
?>
<section class="page-section" id="modify-info">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">Modify Info</h2>
            <h3 class="section-subheading text-muted">Please Enter Your Information</h3>
        </div>
        <form name="member_form" method="post" action="member_modify.php?id=<?= $userid ?>">
            <div class="row align-items-stretch mb-5">
                <div class="col-md-6">
                    <div class="form id">
                        <div class="col1 my-2">Your ID : <?= $userid ?></div>
                    </div>
                    <div class="clear"></div>
                    <div class="form">
                        <input class="form-control" id="pass" type="password" placeholder="Your Password *"
                               data-sb-validations="required" name="pass" value="<?= $pass ?>"/>
                        <div class="invalid-feedback" data-sb-feedback="pass:required">Password is required.</div>
                    </div>
                    <div class="clear"></div>
                    <div class="form-group mb-md-0">
                        <!-- Password number input-->
                        <input class="form-control" id="pass_confirm" type="password" placeholder="Your Password_Confirm *"
                               data-sb-validations="required" name="pass_confirm" value="<?= $pass ?>"/>
                        <div class="invalid-feedback" data-sb-feedback="pass_confirm:required">Password_Confirm is required.</div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <!-- Name input-->
                        <input class="form-control" id="name" type="text" placeholder="Your Name *"
                               data-sb-validations="required" name="name" value="<?= $name ?>"/>
                        <div class="invalid-feedback" data-sb-feedback="name:required">A name is required.</div>
                    </div>
                    <div class="clear"></div>
                    <div class="form-group">
                        <!-- Email address input-->
                        <input class="form-control" id="email" type="email" placeholder="Your Email *"
                               data-sb-validations="required,email" name="email" value="<?= $email ?>"/>
                        <div class="invalid-feedback" data-sb-feedback="email:required">An email is required.</div>
                        <div class="invalid-feedback" data-sb-feedback="email:email">Email is not valid.</div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="text-center gap-5">
                <button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit" onclick="check_input()">
                    SUBMIT
                </button>
                <button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit" onclick="reset_form()">
                    CLEAR
                </button>
            </div>
        </form>
    </div>
</section>
<footer>
    <?php include "footer.php"; ?>
</footer>
</body>
</html>

