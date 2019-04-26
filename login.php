<?php
header('Access-Control-Allow-Origin: http://localhost:4200');
header('Access-Control-Allow-Headers: X-Requested-With, Content-Type, Origin, Authorization, Accept, Client-Security-Token, Accept-Encoding');


session_start();    // start session (note to self: moved this)


//$login_error = NULL;

// retrieve data from the request
$postdata = file_get_contents("php://input");

// process data
// (this example simply extracts the data and restructures them back)
$request = json_decode($postdata);

//echo $request;

$issue = "none";

//// sent response (in json format) back to the front end
//echo json_encode(['data'=>$response]);


// $_SERVER['REQUEST_METHOD'] == "POST" &&
if (strlen($request->username) > 0)
{
    $user = trim($request->username);
    if (!ctype_alnum($user))   // ctype_alnum() check if the values contain only alphanumeric data
        $issue = "username";
        // sent response (in json format) back to the front end
        //reject('Username');

    if (isset($request->pwd))
    {
        $pwd = trim($request->pwd);
        if (!ctype_alnum($pwd)) {
            $issue = "password";
            // sent response (in json format) back to the front end
            //reject('Password');
        }else
        {
            if(checkPassword($user, $pwd) == 0){
                //$login_error = "Username or password is incorrect, please try again";
                $issue = "not in DB";
                // sent response (in json format) back to the front end
            }
            else {
                // set session attributes
                $_SESSION['user'] = $user;
                $_SESSION['pwd'] = $pwd;

                $issue = "no issues here";
                // redirect the browser to another page using the header() function to specify the target URL
                // header("Location: home.php");
                // sent response (in json format) back to the front end
            }
        }
    }
}

$response = [
    'issue' => $issue
];

echo json_encode(['data'=>$response]);

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

// Define a function to handle failed validation attempts
function reject($entry)
{
    exit();    // exit the current script, no value is returned
}

?>
