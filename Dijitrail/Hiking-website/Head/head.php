<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dijitrail - Make, Discover</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="Bootstrap/js/scripts.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <link href="style.css" rel="stylesheet">
    <link href="../Bootstrap/css/styles.css" rel= "stylesheet">
    <link rel="stylesheet" href="../Bootstrap/css/heading.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top" id="mainNav">
        <div class = "container">
            <a class="navbar-brand js-scroll-trigger" href = "../Home/index.php"><img src="../Head/iji.png" width="50" height="50"></a>
            <button class="navbar-toggler navbar-toggler-right font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">Menu <i class="fas fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="../Gallery/index.php">Gallery</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="../About/About.php">About</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="../forum/Discover.php">Discover</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1"><a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="../directionsapi.php">Travel</a>
                    </li>
                <?php
                    //session variable possible from session_start function
                    if(isset($_SESSION["username"])){
                echo "<li class='nav-item mx-0 mx-lg-1'><a class='nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger' href='../Certifications/logOut.php'>Log out</a>
                </li>";
                }
                else {
                    echo "<li class='nav-item mx-0 mx-lg-1'><a class='nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger' href='../AccessingAccount/signIn.php'>Sign in</a>
                </li>";
                    echo "<li class='nav-item mx-0 mx-lg-1'><a class='nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger' href='../Enroll/enrolment.php'>Register</a>
                </li>";
                }
                ?>
                </ul>
            </div>
        </div>
    </nav>
    <div id = "wrapper">