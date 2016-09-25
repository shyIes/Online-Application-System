<?php
session_start();
if(!isset($_SESSION["username"]))
{
    header("Location:admin_login.php");
}
$expireAfter = 10;

//Check to see if our "last action" session
//variable has been set.
if(isset($_SESSION['last_action'])){

    //Figure out how many seconds have passed
    //since the user was last active.
    $secondsInactive = time() - $_SESSION['last_action'];

    //Convert our minutes into seconds.
    $expireAfterSeconds = $expireAfter * 60;

    //Check to see if they have been inactive for too long.
    if($secondsInactive >= $expireAfterSeconds){
        //User has been inactive for too long.
        //Kill their session.
        session_unset();
        session_destroy();
        header("Location:admin_logout.php");
    }

}

//Assign the current timestamp as the user's
//latest activity
$_SESSION['last_action'] = time();
?>
