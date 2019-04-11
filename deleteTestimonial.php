<?php session_start(); // make sessions available ?>

<?php
require('connect-db.php');
$query = "DELETE FROM testimonials WHERE username=:username and title=:title";
$statement = $db->prepare($query);
$statement->bindValue(':username', $_SESSION['user']);
$statement->bindValue(':title', $_GET['title']);
$statement->execute();
$statement->closeCursor();
header("Location: testimonials.php")
?>