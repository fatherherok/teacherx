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
$phone= @mysqli_real_escape_string($con,htmlentities(trim($_POST['phone'])));
$lname= @mysqli_real_escape_string($con,htmlentities(trim($_POST['lname'])));
$fname = @mysqli_real_escape_string($con,htmlentities(trim($_POST['fname'])));
$subject = @mysqli_real_escape_string($con,htmlentities(trim($_POST['subject'])));
 $class_taken = @mysqli_real_escape_string($con,htmlentities(trim($_POST['class_taken'])));
$school = @mysqli_real_escape_string($con,htmlentities(trim($_POST['school'])));
$quali = @mysqli_real_escape_string($con,htmlentities(trim($_POST['quali'])));

$join_names = $username.' '.$lname.' '.$fname;


					// update the user's password
					$query_update = mysqli_query($con,"UPDATE users SET phone='$phone', lname='$lname', fname='$fname', subject='$subject', class='$class_taken', school='$school', quali='$quali', join_names='$join_names' WHERE username = '$username' ") or die(mysqli_error());
				mysqli_query($con,"UPDATE login_details SET user_id='$userid' WHERE username = '$username' ") or die(mysqli_error());

				
					echo 'SUCCESS! Your Profile has been updated.';
				

?>
<?php if (isset($errorfill)) : ?>
 <div class="error1"><?php echo $errorfill; ?></div>
 <?php endif; ?>
 <?php if (isset($success)) : ?>
	<div class="success1"><?php echo $success; ?></div>	
 <?php endif; ?>
