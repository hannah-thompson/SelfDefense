<!DOCTYPE html>
<html>
<head>
    <meta name="author" content="Hannah Thompson and Sarah Piekarski">

</head>

<body>
<?php

// note: changed these to own values
$hostname = 'localhost:3306';

$dbname = 'hmt5wa';

$username = 'hmt5wa';
$password = 'password';

$dsn = "mysql:host=$hostname;dbname=$dbname";



try {
    $db = new PDO($dsn, $username, $password);
}
catch (PDOException $e){
    $error_message = $e->getMessage();
    echo "<p> An error occured while connecting to the database: $error_message </p>";
}
catch (Exception $e){
    $error_message = $e->getMessage();
    echo "<p> Error message: $error_message </p>";
}
?>
</body>
</html>
