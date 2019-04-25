<?php session_start(); // make sessions available ?>

<?php
$title_error = '';
$test_error = '';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title_error = '';
    $test_error = '';
    $title = NULL;
    $author = NULL;
    $testimonial = NULL;
    if(isset($_COOKIE['numPost'])){
        $numPost = $_COOKIE['numPost'];
    }else{
        $numPost = 0;
    }
    // Check title
    if(empty($_POST['title'])){
        $title_error = "Please provide a title";
    }
    else{
        $title_error = NULL;
        $title = $_POST['title'];

        // Check author
        if(empty($_POST['author'])){
            $author = 'Anonymous';
        }
        else{
            $author = $_POST['author'];
        }

        // Check testimonial
        if(empty($_POST['testimonial'])){
            $test_error = "Please provide your testimonial";
        }elseif($numPost >= 3){
            $test_error = "You can not post more than 3 times in one hour.";
        }else{
            $test_error = NULL;
            $testimonial = $_POST['testimonial'];
            $user = $_SESSION['user'];
            addTestimonial($user, $title, $author, $testimonial);
            // create a cookie to track number of posts
            if(!isset($_COOKIE['numPost'])){
                setcookie('numPost', 1 , time()+3600);
            }else{
                $currentNum = $_COOKIE['numPost'];
                // update cookie
                setcookie('numPost', $currentNum+1 , time()+3600);
            }
            header("Location: testimonials.php");
        }
    }

}
?>

<?php

function addTestimonial($user, $title, $author, $test){
    require('connect-db.php');
    $query = "INSERT INTO testimonials (username, title, author, testimonial, t) VALUES (:username, :title, :author, :testimonial, :t)";
    $statement = $db->prepare($query);
    $statement->bindValue(':username', $user);
    $statement->bindValue(':title', $title);
    $statement->bindValue(':author', $author);
    $statement->bindValue(':testimonial', $test);
    $statement->bindValue(':t', time());
    $statement->execute();
    $statement->closeCursor();
}
?>

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
    <title>Write Testimonial</title>
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


    <?php
    if (isset($_SESSION['user']))
    {
    ?>

    <!--add breadcrumb trail-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.php">Home</a></li>
            <li class="breadcrumb-item"><a href="testimonials.php">Testimonials</a></li>
            <li class="breadcrumb-item active" aria-current="page">Write A Testimonial</li>
        </ol>
    </nav>
</section>

<form class="main form-center center" id="testForm" action="<?php $_SERVER['PHP_SELF']?>" method="post" onsubmit="return(submitTest())">
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Enter title" autofocus>
        <span class="error" id="title-note"><?php echo $title_error?></span>
    </div>

    <div class="form-group">
        <label for="author">Author</label>
        <input type="text" class="form-control" name="author" id="author" placeholder="Enter name">
        <small id="emailHelp" class="form-text text-muted">Leave this field empty to remain anonymous</small>
    </div>

    <div class="form-group">
        <label for="testimonial">Testimonial</label>
        <textarea class="form-control" id="testimonial" name="testimonial" rows="5" placeholder="Please provide your testimonial"></textarea>
        <span class="error" id="test-note"><?php echo $test_error?></span>
    </div>

    <input type="submit" id="testSubmit" class="btn btn-primary" value="Submit">
    <input type="button" id="testCancel" class="btn btn-secondary" value="Cancel">
</form>


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
<script src="mainJS.JS" type = "text/javascript"></script>


</html>

