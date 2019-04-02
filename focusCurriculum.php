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
    <title>Curriculum</title>
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

<!--get info from last page-->
<?php
$week_number = $_GET['week'];
echo $week_number;
// will allow us to use errors
//libxml_use_internal_errors(true);
// get your XML locally (keep room for error
$xml = simplexml_load_file("curriculum.xml") or die("Error: Can not create object");
// ERROR HANDLING
// if xml failed, print all errors
if($xml == false){
    foreach(libxml_get_errors() as $error){
        // gets message attribute from error
        echo"$error->message <br/>";
    }
}
// get info
$title= $xml->week[$week_number-1]->title;
$text= $xml->week[$week_number-1]->text;
$text2= $xml->week[$week_number-1]->text2;
$videoLink= $xml->week[$week_number-1]->videoLink;
$videoName= $xml->week[$week_number-1]->videoName;
?>

<section class="fixed-top">
    <header>
        <nav class="navbar navbar-expand-md navbar-dark">
            <a href="home.html" class="navbar-left"><img src="EmpowerLogo.png" alt="Empower Logo" width="250" height="60"></a>
            <!--WHY IS THIS TOGGLER NOT WORKING?!-->
            <!-- <div class="container">    -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- </div> -->
            <div class="collapse navbar-collapse justify-content-end" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="home.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="videos.html">Training Videos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="curriculum.html">Curriculum</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="testimonials.html">Testimonials</a>
                    </li>
                </ul>
            </div>
        </nav>

    </header>




    <!--add breadcrumb trail-->
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="home.html">Home</a></li>
            <li class="breadcrumb-item"><a href="curriculum.html">Curriculum</a></li>
            <li class="breadcrumb-item active" aria-current="page">Week <?php echo $week_number; ?></li>
        </ol>
    </nav>
</section>
<section class="highlight main">   <!-- 14. add section surrounding the grid, center it -->
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1><b>Week <?php echo $week_number; ?></b></h1>
                <h3><?php echo $title; ?></h3>
                <p><?php echo $text ."<br/><br/>" .$text2;?>
                </p>
            </div>
            <!--add in actual video here later-->
            <div class="col-md-4 align-self-center" align="center">
                <!--add in actual video later-->
                <iframe width ="200" height="200" src="<?php echo $videoLink; ?>"></iframe>
                <h4><a href="focusVideo.php?week=<?php echo $week_number; ?>"><?php echo $videoName; ?></a></h4>
            </div>
        </div>
    </div>
</section>
<!--need to get collapsible portion to work-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>

</body>
</html>