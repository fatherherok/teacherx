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

	 $query2 = mysqli_query($con,"SELECT * FROM login_details WHERE (($time - last_activity) < 10) AND (username = '$user2') ");




  function count_unseen_message($from, $to, $con)
{

 $query5 = mysqli_query($con,"SELECT * FROM chat_message WHERE from_user_id = '$from' AND to_user_id = '$to' AND status = '1'");
$count = mysqli_num_rows($query5);
 $output = '';
 if(mysqli_num_rows($query5) > 0)
 {
  $output = '<span class="badge bg-warning">'.$count.'</span>';
 }
 return $output;
}


  $to = $userid;
  $from = $userid2;


echo $status = count_unseen_message($from, $to, $con);
}

//


?>