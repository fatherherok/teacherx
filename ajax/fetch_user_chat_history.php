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
$to =  $_POST['to_user_id'];
$from = $userid;
//$message = $_POST['chat_message'];
 $status   = 1;



//$query= mysqli_query($con,"INSERT INTO chat_message VALUES ('', '$to', '$from', '$message', '$time', '$status')");	

 echo fetch_user_chat_history($userid, $to, $con, $time);

//..................................



function fetch_user_chat_history($from, $to, $con, $time)
{
 //$query3 = mysqli_query($con,"SELECT * FROM chat_message WHERE (from_user_id = '$from' AND to_user_id = '$to') OR (from_user_id = '$to' AND to_user_id = '$from')  ORDER BY chat_message_id ASC");


$query3 = mysqli_query($con,"SELECT *
  FROM `chat_message`
  LEFT JOIN `users`
  ON `chat_message`.`from_user_id` = `users`.`user_id`
  WHERE (`chat_message`.`from_user_id` = '$from'  AND `chat_message`.`to_user_id` = '$to' ) OR (`chat_message`.`from_user_id` = '$to'  AND `chat_message`.`to_user_id` = '$from' ) ORDER BY `chat_message`.`chat_message_id` ASC "); 





 $output = '<ul class="list-unstyled">';
 while($row3 = mysqli_fetch_array($query3))
 {
  $from_id = $row3["from_user_id"];
  $rowmessage = $row3["chat_message"];
  $status = $row3["status"];
  $chat_message_id = $row3["chat_message_id"];
$time_posted = $row3['time'];
 $pixd = $row3['post_pix'];
   $pix = "uploads_post/thumbs/$pixd";

 $rowmessage = nl2br($rowmessage);

$usernameto = $row3["username"];
$pixto = $row3["pix"];
  

    if($pixto==''){
    $profilepix_dbto = "img/b3.PNG";
    }
    else{
    $profilepix_dbto = "uploads/thumbs/$pixto";
      }

  //.............time..................

$diff = $time - $time_posted; // seconds
        $suffix = '';
        $count = '';
        switch(1)
          {
            case($diff < 60):
            $count = '';
            if($count===0)
              $count = 'a moment';
            else if($count==1)
              $suffix = 'a moment';
            else
              $suffix  = 'a moment';
            break; 
            
            case($diff > 60 && $diff < 3600):
            $count = floor($diff/60) ;
             if($count==1)
              $suffix = 'minute';
            else
              $suffix  = 'minutes';
            break;  
            
            case($diff > 3600 && $diff < 86400):
            $count = floor($diff/3600) ;
             if($count==1)
              $suffix = 'hour';
            else
              $suffix  = 'hours';
            break;
            
            case($diff > 86400 && $diff < 2629743):
            $count = floor($diff/86400) ;

             if($count==1)
              $suffix = 'day';
            else
              $suffix  = 'days';
            break;
            
            case($diff > 2629743 && $diff < 31556926):
            $count = floor($diff/2629743) ;
             if($count==1)
              $suffix = 'month';
            else
              $suffix  = 'months';
            break;
            
            case($diff > 31556926):
            $count = floor($diff/31556926) ;
             if($count==1)
              $suffix = 'year';
            else
              $suffix  = 'years';
            break;
          }


   //.....................time ends............   
 
  $chat_message = '';

  $tick = '';

 if($from  == $from_id)
  {




   $queryonline = mysqli_query($con,"SELECT * FROM login_details WHERE (($time - last_activity) < 10) AND (user_id = '$to') ");

 if(mysqli_num_rows($queryonline) == 1)
 {
  if($status == 1){
       $tick .= '<small class="fa fa-check"></small><small class="fa fa-check"></small>';
     }
     else if($status == 0){
       $tick .= '<small class="fa fa-check" style="color:blue;"></small><small class="fa fa-check" style="color:blue;"></small>';
     }
 }
 else
 {
  $tick .= '<small class="fa fa-check"></small>';
 }


    


    if($status == '2')
   {
    $chat_message = '<div class="chat-messages"><div class="message-box-holder"><div class="message-box"><em>You deleted this message </em>
    <p><small style="float:right; margin:0px 5px;"><em>'.$count.' '.$suffix.' ago</em></small></p></div></div></div>';

   }
   else
   {
     if($pixd != ''){
        $chat_message = '
       <div class="chat-messages"><div class="message-box-holder">
        <div class="message-box"><img src="'.$pix.'" class="img-fluid img-thumbnail" height="300" width="300"><b>'.$rowmessage.'
        <p><span style="float:right" class="label bg-theme02 remove_chat" id="'.$chat_message_id.'">x</span> <small style="float:right; margin:0px 5px;"><em>'.$count.' '.$suffix.' ago</em> '.$tick.'</small></p>
        </div></div></div>';
      }else{
      $chat_message = '
       <div class="chat-messages"><div class="message-box-holder">
        <div class="message-box">'.$rowmessage.'<p><span style="float:right" class="label bg-theme02 remove_chat" id="'.$chat_message_id.'">x</span> <small style="float:right; margin:0px 5px;"><em>'.$count.' '.$suffix.' ago</em> '.$tick.'</small></p>
        </div></div></div>';
          }
   }
  



  }
  else
  {
   

   if($status == '2')
   {
    $chat_message = '<p><a href="'.$usernameto.'""><img src="'.$profilepix_dbto.'" class="img-circle" width="30"><b> <span class="message-sender">'.$usernameto.'</span></a></p>
    <div class="chat-messages"><div class="message-box-holder">
        <div class="message-box message-partner">
        <em> deleted this message</em>
        <p><small style="float:right; margin-bottom: -8px;"><em>'.$count.' '.$suffix.' ago</em></small></p>
        </div></div></div>';
   }
   else
   {
     if($pixd != ''){
        $chat_message = '<a href="'.$usernameto.'""><img src="'.$profilepix_dbto.'" class="img-circle" width="30"><b> <span class="message-sender">'.$usernameto.'</span></a>
        <div class="chat-messages" style=""><div class="message-box-holder">
        <div class="message-box message-partner"> <img src="'.$pix.'" class="img-fluid img-thumbnail" height="300" width="300"><b>'.$rowmessage.'
        <p><small style="margin-top:-8px; float:right"> <em>'.$count.' '.$suffix.' ago</em></small></p>
        </div></div></div>

';
      }else{
      $chat_message = '<a href="'.$usernameto.'""><img src="'.$profilepix_dbto.'" class="img-circle" width="30"><b>  <span class="message-sender">'.$usernameto.'</span></a>
      <div class="chat-messages">
      <div class="message-box-holder">
        <div class="message-box message-partner">
'.$rowmessage.'
<p><small style="float:right; margin-bottom: -8px;"><em>'.$count.' '.$suffix.' ago</em></small></p>
</div></div></div>';
          }
   }
  // $usernameto = '<a href="'.$usernameto.'""><img src="'.$profilepix_dbto.'" class="img-circle" width="30"><b class="text-danger"></a></b>';


  }
  $output .= '
  
   <p>'.$chat_message.'</p>
  ';


 } //while...........
 $output .= '<a href="javascript:;" class="new_message'.$to.' update_chat'.$to.'"></a>

 </ul>';
 return $output;
}


//mysqli_query($con,"UPDATE chat_message SET status = '0' WHERE from_user_id = '$to' AND to_user_id = '$from' AND status = '1'");

?>