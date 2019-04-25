<?php session_start();    // start session
?>

<?php
$login_error = NULL;
// Define a function to handle failed validation attempts
function reject($entry)
{
    exit();    // exit the current script, no value is returned
}

if ($_SERVER['REQUEST_METHOD'] == "POST" && strlen($_POST['username']) > 0)
{
    $user = trim($_POST['username']);
    if (!ctype_alnum($user))   // ctype_alnum() check if the values contain only alphanumeric data
        reject('Username');

    if (isset($_POST['pwd']))
    {
        $pwd = trim($_POST['pwd']);
        if (!ctype_alnum($pwd))
            reject('Password');
        else
        {
            if(checkUsername($user) > 0){
                $login_error = "Username is already taken, please try again";
            }
            else {
                createAccount($user, $pwd);
                // set session attributes
                $_SESSION['user'] = $user;
                $_SESSION['pwd'] = $pwd;

                // redirect the browser to another page using the header() function to specify the target URL
                header("Location: home.php");
            }
        }
    }
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

    <title>Women's Self Defense Log In</title>

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



<form class="main form-center center" id="loginForm" action="<?php $_SERVER['PHP_SELF']?>" method="post">
    <h3>Create a New Account</h3>
    <div class="form-group">
        <label for="username">Username</label>
        <input type="text" class="form-control" name="username" id="username" autofocus required>
    </div>

    <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" name="pwd" id="pwd" required>
        <span class="error" id="login-note"><?php echo $login_error?></span>
    </div>

    <input type="submit" id="signinSubmit" class="btn btn-primary" value="Submit">
<!--    <input type="button" id="signinCancel" class="btn btn-secondary" value="Cancel" onclick="window.location='http://localhost:4200/';">-->
<!--    change to direct back to our login module in Angular -->
    <a href="http://localhost:4200/" class="btn btn-secondary" id="cancel" name="cancel" class="btn btn-default">Cancel</a>
</form>



<?php
function checkUsername($user){
    require("connect-db.php");
    $query = "SELECT * FROM login WHERE username = :username";
    $statement = $db->prepare($query);
    $statement->bindValue(":username", $user);
    $statement->execute();

    $results = $statement->fetchAll();
    $statement->closecursor();
    echo json_encode($results);
    return count($results);
}

function createAccount($user, $pass){
    require("connect-db.php");
    $query = "INSERT INTO login (username, password) VALUES (:username, :password)";
    $statement = $db->prepare($query);
    $statement->bindValue(":username", $user);
    $statement->bindValue(":password", $pass);
    $statement->execute();
    $statement->closecursor();
}
?>

<!--need to get collapsible portion to work-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
<script src="mainJS.JS" type = "text/javascript"></script>

</body>
</html>
