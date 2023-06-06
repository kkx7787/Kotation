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
    <script type="text/javascript" src="./js/login.js"></script>
</head>
<body id="page-top">
<header class="masthead">
    <?php include "header.php"; ?>
</header>
<section class="page-section" id="sign-in">
    <div class="container">
        <div class="text-center">
            <h2 class="section-heading text-uppercase">SignIn</h2>
        </div>
        <form name="login_form" method="post" action="login.php">
            <div class="row justify-content-center my-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <input class="form-control" id="id" type="text" placeholder="Your ID *"
                               data-sb-validations="required" name="id"/>
                        <div class="invalid-feedback" data-sb-feedback="id:required">ID is required.</div>
                    </div>
                    <div class="form-group">
                        <input class="form-control" id="pass" type="password" placeholder="Your Password *"
                               data-sb-validations="required" name="pass"/>
                        <div class="invalid-feedback" data-sb-feedback="pass:required">Password is required.</div>
                    </div>
                </div>
            </div>
            <div class="text-center text-lg"><a href="signup.php">Are you not a member yet?</a></div>
            <br/>
            <div class="text-center">
                <button class="btn btn-primary btn-xl text-uppercase" id="submitButton" type="submit" onclick="check_input()">
                    Login
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
