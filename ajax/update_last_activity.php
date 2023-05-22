<?php session_start();
include ('./../inc/connect.inc.php');
?>
<?php
$username = ''; 
	$user_id = '';

if(!isset($_SESSION["user"]) && isset($_COOKIE['user_log_in'])){
	//this is for normal user
	$_SESSION["user"] = $_COOKIE['user_log_in'];
	$username = $_SESSION["user"];
		}
else{
	//this is for normal user
	$username = @$_SESSION["user"]; 
	}

$time = time();

$query = mysqli_query($con," UPDATE login_details SET last_activity = '$time' WHERE username = '$username' " );



?>