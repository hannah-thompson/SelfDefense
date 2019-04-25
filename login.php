<!--Authors: Hannah Thompson and Sarah Piekarski-->
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
            if(checkPassword($user, $pwd) == 0){
                $login_error = "Username or password is incorrect, please try again";
            }
            else {
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


<?php
function checkPassword($user, $pass){
    require("connect-db.php");
    $query = "SELECT * FROM login WHERE username = :username and password = :password";
    $statement = $db->prepare($query);
    $statement->bindValue(":username", $user);
    $statement->bindValue(":password", $pass);
    $statement->execute();

    $results = $statement->fetchAll();
    $statement->closecursor();
    return count($results);
}
?>
