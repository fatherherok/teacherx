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

$time=time();

 if(isset($_POST['action'])){
         $action = $_POST['action'];  
         $id = $_POST['id'];   


         
        
          if($action == 'like'){

                    $query2 = mysqli_query($con,"SELECT * FROM posts WHERE post_id = '$id' " );
                    $row2 = mysqli_fetch_assoc($query2);
                    $added_by = $row2['added_by'];



                   mysqli_query($con,"UPDATE posts SET post_likes=post_likes+1 WHERE post_id='$id'  ");
                  mysqli_query($con,"INSERT INTO likes VALUES('', '$username', '$added_by', '$id', 'unread',  'unread', '$time')");
            }

         else if($action == 'unlike'){
                   mysqli_query($con,"UPDATE posts SET post_likes=post_likes-1 WHERE post_id='$id'  ");
                   mysqli_query($con,"DELETE FROM likes WHERE post_id = '$id' AND like_by = '$username' ");
            }    


                       $query = mysqli_query($con,"SELECT * FROM posts WHERE post_id='$id' ");
                      $row = mysqli_fetch_assoc($query);
                      $like = $row['post_likes'];

                      $data = array(
                  'like' => $like,        
                );
              echo json_encode($data);


    }
?>
           