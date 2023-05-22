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
	$userid2 = $_POST['userid2'];
	$user2 = $_POST['user2'];

//	 $query2 = mysqli_query($con,"SELECT * FROM login_details WHERE (($time - last_activity) < 10) AND (username = '$user2') ");




  function fetch_is_type_status($from, $con, $userid)
{
	$query6 = mysqli_query($con,"SELECT is_type FROM login_details WHERE user_id = '$from' AND to_id = '$userid' ORDER BY last_activity DESC LIMIT 1");
$row6 = mysqli_fetch_array($query6);
$output = '';
$is_type = $row6["is_type"];
  if($is_type == 'yes')
  {
   $output = ' - <small><em><span class="text-muted">Typing...</span></em></small>';
  }
 return $output;
}



  $to = $userid;
  $from = $userid2;


echo $status = fetch_is_type_status($from, $con, $userid);
}

//


?>