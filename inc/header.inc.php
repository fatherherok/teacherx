<?php 
session_start();
ob_start();
include ('./inc/connect.inc.php'); ?>
<?php
if(isset($_SESSION["user"]) ){
  //this is for shop owner
$username = $_SESSION["user"];

$get= mysqli_query($con,"SELECT * FROM users WHERE username='$username' ");
  $rows = mysqli_fetch_assoc($get);
  $user_id = $rows["user_id"];
  $username = $rows["username"]; 

      $pix = $rows["pix"];  

    if($pix==''){
    $profilepix_db = "img/b3.PNG";
    }
    else{
    $profilepix_db = "uploads/thumbs/$pix";
      }


  }
  else if(isset($_COOKIE['user_log_in'])){
    
$username = $_COOKIE['user_log_in'];      
  $get= mysqli_query($con,"SELECT * FROM users WHERE username='$username' ");
  $rows = mysqli_fetch_assoc($get);
  $user_id = $rows["user_id"];
  $username = $rows["username"]; 

   $pix = $rows["pix"];  

    if($pix==''){
    $profilepix_db = "img/b3.PNG";
    }
    else{
    $profilepix_db = "uploads/thumbs/$pix";
      }

      
    }
    
//this will make the social media works
 if(isset($_GET['u'])){
    $userP = mysqli_real_escape_string($con,$_GET['u']);
    if($userP){
      
      $query = mysqli_query($con,"SELECT * FROM users WHERE username='$userP' ");
      if(mysqli_num_rows($query)===1){
        $rowP = mysqli_fetch_assoc($query);



        $userP = $rowP['username'];
        $_SESSION["userP"] = $userP ;
        
      
      }
      else {
        echo "<meta http-equiv=\"refresh\" content=\"0; url=https://teacherx.org/index.php \" >";
        exit();
      }
    }
  }
  

if(isset($username)){
   $checkactive= mysqli_query($con,"SELECT * FROM users WHERE username='$username' AND active='no' ");
  if(mysqli_num_rows($checkactive)===1){
    if($_SESSION["user"] || $_COOKIE['user_log_in']){
$xyt = 60*60*24*7*52;
$user_expire = time()-$xyt;
setcookie('user_log_in', $_SESSION["user"],  $user_expire);
session_destroy();
header("Location: sign-in.php");
}
}


//to update profile 
//get this to insert as value inside the input form
    $query_profile = mysqli_query($con,"SELECT * FROM users WHERE username='$username' ");
    $result = mysqli_fetch_assoc($query_profile);
    $pixd = $result['pix']; 
$subject_teach = $result['subject']; 
$class_teach = $result['class']; 
$country = $result['country']; 

  if($pixd==''){
    $profilepixd = "img/b3.PNG";
    }
    else{
    $profilepixd = "uploads/thumbs/$pixd";
      }


}
  //the social media ends here
    
  //the social media ends here

    //to update time last activity......................
  $time = time();





 
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <title>TeacherX</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">

   
     <link rel="stylesheet" href="css/font-awesome.min.css">


  <link rel="stylesheet" type="text/css" href="css/line-awesome.css">


  <link rel="stylesheet" type="text/css" href="css/courses.css">
<link rel="stylesheet" type="text/css" href="css/courses_responsive.css">
   

<!---chatbox starts here -->
 <link href="css/style-responsive.css" rel="stylesheet">
  <link href="css/jquery-ui.theme.min.css" rel="stylesheet">
  <link href="css/jquery-ui.structure.min.css" rel="stylesheet">
  <link href="css/jquery-ui.min.css" rel="stylesheet">
  
 <link href="css/emojionearea.min.css" rel="stylesheet">

 <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>
  <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">     
    <link rel="stylesheet" href="css/style3.css">
<!---chatbox ends here -->


      <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
   <script src="js/jquery-3.2.0.min.js"></script>
   <script src="https://cdn.ckeditor.com/4.10.0/standard/ckeditor.js"></script>
  </head>
  <body>
    
  <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container">
      
      <a class="navbar-brand" href="index.php"><img src="img/logo.jpg" alt="Image" class="img-fluid"></a>

     
       
      

      <div class="collapse navbar-collapse" id="ftco-nav">
        <ul class="navbar-nav ml-auto">

           <?php  if(!isset($username)) :  ?>

          <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
          
          <li class="nav-item"><a href="courses.php" class="nav-link">Courses</a></li>
          <li class="nav-item"><a href="resources.php" class="nav-link">Resources</a></li>
          <li class="nav-item"><a href="login.php" class="nav-link">Community</a></li>
          <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="opportunity.php" class="nav-link">Opportunities</a></li>
         
          <li class="nav-item"><a href="register.php" class="nav-link"><span>Sign Up</span></a></li>


           <?php else : ?>
            <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
          <li class="nav-item"><a href="courses.php" class="nav-link">Courses</a></li>
          <li class="nav-item"><a href="resources.php" class="nav-link">Resources</a></li>
          <li class="nav-item"><a href="community.php" class="nav-link">Community</a></li>
                    <li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>
          <li class="nav-item"><a href="opportunity.php" class="nav-link">Opportunities</a></li>
          <li class="nav-item cta"><a href="logout.php" class="nav-link"><span>Logout</span></a></li>
            <?php endif; ?>

        </ul>
      </div>

        
         <?php  if(isset($username)) :  ?>
       <a class="navbar-brand" href="<?php echo $username; ?>" style="color: red; margin-left: 10px;  "><span class="fa fa-user"></span></a>

       <a class="navbar-brand" href="community.php" style="color: red; margin-left: 10px;  "><span class="fa fa-users"></span></a>

       <span class="cart-icon">
       <a class="navbar-brand" href="message.php" style="color: red;  "><i class="fa fa-envelope-o"></i>
        <span class="fetch_chat"></span>
        </a>
      </span>
 
      <a href="<?php echo $username; ?>"><img src="<?php echo  $profilepixd; ?>" alt="" class="img-fluid rounded-circle" height="45" width="45"  ></a>
        <?php else : ?>
           <ul class="navbar-nav ml-auto">
            <li class="nav-item cta"><a href="login.php" class="nav-link">Login</a></li>
            </ul>
         <?php endif; ?>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="oi oi-menu"></span>
      </button>

    </div>
  </nav>
    <!-- END nav -->


<script type="text/javascript">
    // script for following and unfollowing...................................              
  $(document).ready(function(){
    function fetch_follower()
    {
      var  view = '<?php echo $username; ?>'

      $.ajax({
        url:"ajax/fetch_follower.php",
        method:"POST",
        data:{view:view},
        
        success:function(data){
              $('.fetch_follower').html(data);
            }                 
        });
     }
    fetch_follower();
    
    setInterval(function(){
      fetch_follower();
    }, 1000);
  }); 


  $(document).ready(function(){
    function fetch_following()
    {
      var  view = '<?php echo $username; ?>'

      $.ajax({
        url:"ajax/fetch_following.php",
        method:"POST",
        data:{view:view},
        
        success:function(data){
              $('.fetch_following').html(data);
            }                 
        });
     }
    fetch_following();
    
    setInterval(function(){
      fetch_following();
    }, 1000);
  }); 



  
                setInterval(function(){
 
                 update_last_activity();
                 }, 5000);  


                function update_last_activity()
                 {


                  $.ajax({
                   url:"ajax/update_last_activity.php",
                   success:function()
                   {

                   }
                  })
                 }

                //fetch unread chat
         $(document).ready(function(){
    function fetch_unreadchat2()
    {
       action = 'act2'

      $.ajax({
        url:"ajax/fetch_unreadchat2.php",
        method:"POST",
        data:{action:action},
        
        success:function(data){
              $('.fetch_chat').html(data);
            }                 
        });
     }
    fetch_unreadchat2();
    
    setInterval(function(){
      fetch_unreadchat2();
    }, 5000);
  }); 

            </script>