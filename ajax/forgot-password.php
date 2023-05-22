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
 


 if(isset($_POST['email'])){
$email = mysqli_real_escape_string($con,$_POST['email']);
$query = mysqli_query($con,htmlentities(trim("SELECT * FROM users WHERE email= '$email' ")));
$rowU = mysqli_fetch_assoc($query);
$user = ucfirst($rowU['username']);
  if(mysqli_num_rows($query)>0){
    $str = '0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
    $str = str_shuffle($str);
    $str = substr($str, 0, 15);
    //now send email to the user
     $url = '<a href="http://teacherx.org/reset-password.php?token='.$str.'&email='.$email.'" style="background:#192330;color:white; text-align:center; border-radius:5px; padding:10px; text-decoration:none;"> Reset your Password </a>';
  
  $body = '<div class="email-background" style="background: #eee;padding: 10px;">
          
            <div class="email-container" style="max-width: 600px;background: white; color: black; font-family: Tahoma, Geneva, sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px; padding: 10px;">
              <div style="text-align: center;"><img src="http://teacherx.org/img/logo.png" style="max-width: 100%;"></div>
        <h3 style="text-align: center;">Welcome to TeacherX</h3>';
         $body .= <<<EOD
<hr><br>
  
Dear $user,<br><br><br>

Please click $url <br><br> to reset  your password

This message is being sent to $email because you asked to reset your password <br><br>

If the link does not apppear clickable or does not open a browser window when you click it, please copy and paste into your
browser.<br><br>
SUPPORT: <br>
For any support with respect to your relationship with us, you can always contact us on info@teacherx.org<br><br>

If you are not $user and you receive this message by mistake, kindly discard this message.
EOD;

    $body .= '</div>';  
    
  $subject = "Reset Password: FROM TeacherX";

//echo '->'.mail($email_owner, $subject, $body, $headers);

  

  $from = "TeacherX <info@teacherx.org>";
$to = $email;



$headers = "FROM: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    
      mail($to, $subject, $body, $headers);


//email ends here...........................    
     
    // mail($email, $subject, $url, $headers);
    //update the the token field in the table
    $token_query = mysqli_query($con,"UPDATE users SET token = '$str' WHERE email='$email' "); 
    echo '<span style="color:#fea314">Please click the link sent to '.$to.' to reset your password</span>'; //please work on this
    }
    else{
      echo '<span style="color:white; background-color:red; border-radius:10px; padding:5px;">Please check your inputs</h4>';
      }



}  


 

 ?>  
 