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
  $get_id = mysqli_query($con,"SELECT user_id FROM users WHERE username='$username' ");
  $rows = mysqli_fetch_assoc($get_id);
  $userid = $rows["user_id"]; 
		}
else{
	//this is for normal user
	$username = @$_SESSION["user"]; 
  $get_id = mysqli_query($con,"SELECT user_id FROM users WHERE username='$username' ");
  $rows = mysqli_fetch_assoc($get_id);
  $userid = $rows["user_id"];
	}



$time = time();	


    
if(isset($_POST['userid2'])){
	$user2 = $_POST['user2'];

	 $query2 = mysqli_query($con,"SELECT * FROM login_details WHERE (($time - last_activity) < 10) AND (username = '$user2') ");




 if(mysqli_num_rows($query2) == 1)
 {
  $status = '<span style="color:green; font-size:12px"><small>Online</small></span>';
 }
 else
 {
  $status = '<span style="color:red; font-size:12px"><small>Offline</small></span>';
 }




echo $status;
}

//


?>