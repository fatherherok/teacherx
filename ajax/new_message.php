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
	$to = $_POST['userid2'];
$from = $userid;

	
$query = mysqli_query($con,"SELECT * FROM chat_message WHERE from_user_id = '$to' AND to_user_id = '$from' AND status = '1' ");

$count = mysqli_num_rows($query);

if($count > 0){
echo '<div class="chat-messages sticky_chat "><div class="message-box-holder"><div class="message-box message-sticky">
        You have '.$count.' new messages <span class="fa fa-sort-desc" style="font-size:20px"></span>
</div></div></div>';
}


}

//


?>