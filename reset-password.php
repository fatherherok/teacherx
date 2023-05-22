<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc.php');  ?>   


   <h2 class="mb-3 bread text-center">RESET PASSWORD </h2>
    

   
<section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h4 text-center"></h2>
          </div>

           										     
        </div>
        <div class="row block-9">

        	 <div class="col-md-3 pr-md-5">

        	 </div>
          <div class="col-md-6 pr-md-5">
               <h2>Reset forgotten password here</h2>



<?php
if(isset($_GET['email']) && isset($_GET['token'])){
  $email = mysqli_real_escape_string($con,$_GET['email']);
  $token = mysqli_real_escape_string($con,$_GET['token']);
  
  $query = mysqli_query($con,"SELECT * FROM users WHERE email='$email' AND token='$token' ");
  $row = mysqli_fetch_assoc($query);
  $username = $row['username'];
  if(mysqli_num_rows($query)>0){
    $str = '0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
    $str = str_shuffle($str);
    $str = substr($str, 0, 6);
    $password = password_hash($str, PASSWORD_DEFAULT);

  //to update the user password
  $query_password = mysqli_query($con,"UPDATE users SET password='$password',token=''  WHERE email='$email' ");
  $successmsg = '<h4 style="color:white;">Your new password is <strong style="color:#183153">'. $str.'</strong><br>
  You can <a href="login.php">login here</a> and go to your dashboard to change your password</h4>

   <div class="row">
                
              <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7"><input type="text" class="form-control" value="'.$str.'" id="copy_clip"></div>
               <div class="col-lg-5 col-md-5 col-sm-5 col-xs-5"><button type="button" class="btn btn-primary btn-sm" onclick="copy_clip()" >Copy</button></div>
             </div>' ; 
    }
    else{
      $errormsg = 'Please check your link or contact the admin';
      }
  
  }else{
  header("Location: index.php");
  exit();
    }

?>


             

               <script type="text/javascript">
                function copy_clip(){
                  var copyText = document.getElementById("copy_clip");
                  copyText.select();
                  copyText.setSelectionRange(0, 99999);
                  document.execCommand("copy");
                //  alert("Copied the text: " + copyText.value);

                }
              </script>
          											<?php if (isset($errormsg)) : ?>
                                                              <div class="error1"><?php echo $errormsg; ?></div>  
                                                         <?php endif; ?>
                                                         <?php if (isset($successmsg)) : ?>
                                                               <div class="success1"><?php echo $successmsg; ?></div> 
                                                        <?php endif; ?>
                                                        

        
         </div>


          
          </div>

         
        </div>
      </div>
    </section>

   <?php include ('./inc/footer.inc.php');  ?> 