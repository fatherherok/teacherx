<?php session_start();
 include ('./../inc/connect.inc.php'); ?>
<?php
if(isset($_SESSION["user"]) ){
	//this is for shop owner
$username = $_SESSION["user"];

$get= mysqli_query($con,"SELECT * FROM users WHERE username='$username' ");
	$rows = mysqli_fetch_assoc($get);
	$user_id = $rows["user_id"];
	$username = $rows["username"];	
	}
	else if(isset($_COOKIE['user_log_in'])){
		
$username = $_COOKIE['user_log_in'];	
	$get= mysqli_query($con,"SELECT * FROM users WHERE username='$username' ");
	$rows = mysqli_fetch_assoc($get);
	$user_id = $rows["user_id"];
	$username = $rows["username"];		
		}
?>
<?php
//password variables
if(isset($_POST['oldpassword'])){
$oldpassword= @mysqli_real_escape_string($con,htmlentities(trim($_POST['oldpassword'])));
$newpassword= @mysqli_real_escape_string($con,htmlentities(trim($_POST['newpassword'])));
$cnewpassword = @mysqli_real_escape_string($con,htmlentities(trim($_POST['cnewpassword'])));


	//$update = $_POST['updatepass'];ust a shortcut for the line below
	if($oldpassword && $newpassword && $cnewpassword){
		//after the form has been submitted	
		$password_query = mysqli_query($con,"SELECT * FROM users WHERE username='$username' ");
		  $user_count = mysqli_num_rows($password_query);//use to count the numbers of rows if it exist
		   if($user_count > 0){ //if count = 1, do the while loop and createa session for phone_login

		while($row=mysqli_fetch_array($password_query)){
			$db_password = $row['password'];
			
			 if(password_verify($oldpassword, $row['password'])){
			//md5 old password before checking for match
		
			 
				 if($newpassword == $cnewpassword){
					 if(strlen($newpassword)<=4){
						 echo 'Sorry, your password must be more than four characters';
						 }
					else{ 
					 //md5 the new password before adding into the database
					  $newpassword_hash =  password_hash($newpassword, PASSWORD_DEFAULT);
					// update the user's password
					$query_update = mysqli_query($con,"UPDATE users SET password='$newpassword_hash' where username = '$username' ");
					echo "SUCCESS! Your password has been updated";
				 	}
					 
					 }
					else{
						echo "Your two new password do not match";
						}
				
			}
			else{
				echo "Wrong user details";	
				}//pasword_verify


			}//while..........

			}else{
				echo "That information is incorrect, try again!";	
				}//p

		


	}
	else{
		echo 'Please fill all the required fields';
		}	

	}
?>
<?php if (isset($errorfill)) : ?>
 <div class="error1"><?php echo $errorfill; ?></div>
 <?php endif; ?>
 <?php if (isset($success)) : ?>
	<div class="success1"><?php echo $success; ?></div>	
 <?php endif; ?>
