<?php
session_start();
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";
if (isset($_SESSION["username"])) $username = $_SESSION["username"];
else $username = "";
?>
<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
    <div class="container">
        <a class="navbar-brand" href="index.php">Kotation</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive"
                aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars ms-1"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                <?php
                if (!$userid) {
                    ?>
                    <li class="nav-item"><a class="nav-link" href="signup.php">SignUp</a></li>
                    <li class="nav-item"><a class="nav-link" href="signin.php">SignIn</a></li>
                    <?php
                } else {
                    $logged = $username . "(" . $userid . ")님";
                    ?>
                    <li class="nav-item"><a class="nav-link" href="board.php">Board</a></li>
                    <li class="nav-item"><a class="nav-link" href="message.php">Message</a></li>
                    <li class="nav-item"><a class="nav-link" href="signout.php">SignOut</a></li>
                    <li class="nav-item"><a class="nav-link" href="member_modify_form.php">Info</a></li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>
<div class="container">
    <div class="masthead-subheading">Share your concerns with others</div>
    <div class="masthead-heading text-uppercase">Yes or No</div>
    <a class="btn btn-primary btn-xl text-uppercase" href="#board">Reveal Your Opinion</a>
</div>