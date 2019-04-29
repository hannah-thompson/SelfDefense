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

    <title>Women's Self Defense</title>

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
    <header>
        <nav class="navbar navbar-expand-md navbar-dark fixed-top">
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
    if (isset($_SESSION['user']) or (isset($_GET["user"])))
    {
    ?>

    <!--add jumbotron with image background-->
    <div class="jumbotron main" >
        <div class="container">
            <p id="jumbo-words">LIVE LIFE EMPOWERED</p>
            <h1>Learn self defense</h1>
        </div>
    </div>

    <section class="highlight">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <h2>Who We Are</a></h2>
                    <p> Sed ut perspiciatis unde omnis iste natus error sit
                       voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae
                       ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                       Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                       consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.</p>
                    <img src='logo.png' class="center" width="400" height="200">
                </div>
                <div class="col-md-6">
                    <img src='logo.png' class="center" width="400" height="200">
                    <h2>Why Self Defense?</a></h2>
                    <p> Sed ut perspiciatis unde omnis iste natus error sit
                       voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae
                       ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.
                       Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia
                       consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt.
                    </p>
                </div>

            </div>
        </div>
    </section>

        <?php
        if(isset($_GET['user'])){
    $_SESSION["user"] = $_GET["user"];}}
    else
    // redirect to the login page
    header('Location: http://localhost:4200/');

    ?>

    <!--need to get collapsible portion to work-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
</body>
</html>
