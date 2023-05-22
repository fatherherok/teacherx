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
?>
<?php
if(isset($_POST['editpost_id'])){
	$query = mysqli_query($con,"SELECT * FROM posts WHERE post_id = '".$_POST['editpost_id']."' ");
		$row = mysqli_fetch_array($query);
		
	
		
		$user = $row['added_by'];
	if($user != $username){
		die('you are not allowed');
		exit();
		}else{
		
		echo json_encode($row);	
		}
	
	}
?>
