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
?>

<?php

//password variables	
$website= @mysqli_real_escape_string($con,htmlentities(trim($_POST['website'])));
$facebook= @mysqli_real_escape_string($con,htmlentities(trim($_POST['facebook'])));
$twitter = @mysqli_real_escape_string($con,htmlentities(trim($_POST['twitter'])));
$instagram = @mysqli_real_escape_string($con,htmlentities(trim($_POST['instagram'])));
 $linkedin = @mysqli_real_escape_string($con,htmlentities(trim($_POST['linkedin'])));



					// update the user's password
					$query_update = mysqli_query($con,"UPDATE users SET website='$website', facebook='$facebook', twitter='$twitter', instagram='$instagram', linkedin='$linkedin' WHERE username = '$username' ") or die(mysqli_error());
				

				
					echo 'SUCCESS! Your Social handles have been updated.';
				

?>
<?php if (isset($errorfill)) : ?>
 <div class="error1"><?php echo $errorfill; ?></div>
 <?php endif; ?>
 <?php if (isset($success)) : ?>
	<div class="success1"><?php echo $success; ?></div>	
 <?php endif; ?>
