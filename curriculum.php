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

     <title>Self Defense Curriculum</title>
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

    <nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="home.php">Home</a></li>
        <li class="breadcrumb-item active" aria-current="page">Curriculum</li>
    </ol>
</nav>
</section>

<section class="highlight">   <!-- 14. add section surrounding the grid, center it -->
    <div class="container main">
        <div class="row">
            <div class="col-md-12">
                <h2><a href="focusCurriculum.php?week=1"><b>Week 1</b></a></h2>
                <p class="curriculum">Palm + Hammer Strikes
                </p>
            </div>
            <div class="col-md-12">
                <h2><a href="focusCurriculum.php?week=2"><b>Week 2</b></a></h2>
                <p class="curriculum">Kicks
                </p>
            </div>
            <div class="col-md-12">
                <h2><a href="focusCurriculum.php?week=3"><b>Week 3</b></a></h2>
                <p class="curriculum">Introduction to Trapping
                </p>
            </div>
            <div class="col-md-12">
                <h2><a href="focusCurriculum.php?week=4"><b>Week 4</b></a></h2>
                <p class="curriculum">Couch Attacks
                </p>
            </div>
            <div class="col-md-12">
                <h2><a href="focusCurriculum.php?week=5"><b>Week 5</b></a></h2>
                <p class="curriculum">Standing Chokeholds
                </p>
            </div>
            <div class="col-md-12">
                <h2><a href="focusCurriculum.php?week=6"><b>Week 6</b></a></h2>
                <p class="curriculum">Ground Chokeholds
                </p>
            </div>
            <div class="col-md-12">
                <h2><a href="focusCurriculum.php?week=7"><b>Week 7</b></a></h2>
                <p class="curriculum">Ground Trapping
                </p>
            </div>
            <div class="col-md-12">
                <h2><a href="focusCurriculum.php?week=8"><b>Week 8</b></a></h2>
                <p class="curriculum">Combining Techniques
                </p>
            </div>
        </div>
    </div>

    <?php
    }
    else
    // redirect to login
    header('Location: http://localhost:4200/');

    ?>

</section>

    <!--need to get collapsible portion to work-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

</body>
</html>
