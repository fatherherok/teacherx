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
 $output = '';
if($_POST['action']  == 'act2'){
$query2 = mysqli_query($con,"SELECT * FROM chat_message WHERE to_user_id = '$userid' AND status = 1 ");
echo $count_num2 = mysqli_num_rows($query2);
}
    

?>

<li>
