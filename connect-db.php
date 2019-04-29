<?php

// note: changed these to own values
$hostname = 'localhost:3306';

$dbname = 'spiekarski';

$username = 'spiekarski';
$password = 'sjppassword';

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
