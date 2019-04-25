<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <!-- 2. include meta tag to ensure proper rendering and touch zooming
           (bootstrap is designed to be responsive to mobile.
           Mobile-first styles are part of the core framework.)
     -->
    <meta name="author" content="Hannah Thompson and Sarah Piekarski">

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- the width=device-width part sets the width of the page to follow
            the screen-width of the device (which wil vary depending on the device)
         the initial-scale=1 part sets the initialize zoom level when the page
            is first loaded by the browser.
     -->

     <title>Training Videos</title>
    <!--include boostrap-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" />


    <!-- required scripts for IE -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!--include stylesheet-->
    <link rel="stylesheet" href="styles/styling.css" />

</head>

<body>
<section class="fixed-top">
<header>
    <nav class="navbar navbar-expand-md navbar-dark">
        <a href="home.php" class="navbar-left"><img src="EmpowerLogo.png" alt="Empower Logo" width="250" height="60"></a>

        <!--WHY IS THIS TOGGLER NOT WORKING?!-->
        <!-- <div class="container">    -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- </div> -->

        <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="home.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="videos.php">Training Videos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="curriculum.php">Curriculum</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="testimonials.php">Testimonials</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </nav>

</header>

    <?php session_start(); // make sessions available ?>
    <?php
    if (isset($_SESSION['user']))
    {
    ?>

    <!--add breadcrumb trail-->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Training Videos</li>
    </ol>
</nav>
</section>

<section class="highlight">
    <div class="container main">
        <div class="row">
            <div class="col-md-4" align="center">
                <iframe width ="200" height="200" src="https://www.youtube.com/embed/yyTc9OGqYTo"></iframe>
                <h4><a href="focusVideo.php?week=1">Palm + Hammer Strikes</a></h4>
            </div>
            <div class="col-md-4" align="center">
                <iframe width ="200" height="200" src="https://www.youtube.com/embed/2h-i5kVKJqI"></iframe>
                <h4><a href="focusVideo.php?week=2">Kicks</a></h4>
            </div>
            <div class="col-md-4" align="center">
                <iframe width ="200" height="200" src="https://www.youtube.com/embed/v6KPcQwbIr4"></iframe>
                <h4><a href="focusVideo.php?week=3">Trapping</a></h4>
            </div>
            <div class="col-md-4" align="center">
                <iframe width ="200" height="200" src="https://www.youtube.com/embed/m7wgQlmrmdc"></iframe>
                <h4><a href="focusVideo.php?week=4">Couch Attacks</a></h4>
            </div>
            <div class="col-md-4" align="center">
                <iframe width ="200" height="200" src="https://www.youtube.com/embed/7xLV0LGB4As"></iframe>
                <h4><a href="focusVideo.php?week=5">Standing Chokehold</a></h4>
            </div>
            <div class="col-md-4" align="center">
                <iframe width ="200" height="200" src="https://www.youtube.com/embed/OGqW507y-5E"></iframe>
                <h4><a href="focusVideo.php?week=6">Ground Chokehold</a></h4>

            </div>
            <div class="col-md-4" align="center">
                <iframe width ="200" height="200" src="https://www.youtube.com/embed/DFWwOwyC6_Y"></iframe>
                <h4><a href="focusVideo.php?week=7">Ground Trapping</a></h4>

            </div>
            <div class="col-md-4" align="center">
                <iframe width ="200" height="200" src="https://www.youtube.com/embed/MQ-EPYKFie4"></iframe>
                <h4><a href="focusVideo.php?week=8">Combining Techniques</a></h4>

            </div>



        </div>
    </div>
</section>

<?php
}
else
// redirect to the login page
header('Location: http://localhost:4200/');

?>

    <!--need to get collapsible portion to work-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

</body>
</html>
