<!DOCTYPE html>
<html>
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

<?php session_start(); // make sessions available ?>


<?php
// Set session variables can be removed by specifying their element name to unset() function.
// A session can be completely terminated by calling the session_destroy() function.

// Check if any session variables are set and retrieve all stored names and values
if (count($_SESSION) > 0)
{
    foreach ($_SESSION as $key => $value)
    {
        // Deletes the variable (array element) where the value is stored in this PHP.
        // However, the session object still remains on the server.
        unset($_SESSION[$key]);
    }
    session_destroy();     // complete terminate the session
}

header("Location: login.php");
?>


</body>
</html>