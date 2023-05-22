<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc.php'); 

if(isset($username)){
  header("Location: index.php");
}
 ?>   

 

<?php
 $email = '';
if(isset($_POST['submit'])){
    if(get_magic_quotes_gpc()){
      $_POST['name'] = stripslashes($_POST['name']);

      }
  
    if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/", $_POST['name'])){
      $email = mysqli_real_escape_string($con,$_POST['name']);
      }
    else{
      $errormsg = 'Your email is invalid';
      }
      
    if(empty($_POST["name"])){
      $errormsg = 'You have not submitted your username or email or phone number';
      }
    else if(empty($_POST["pass"])){
      $errormsg = 'You have not submitted your password';
      } 
    else{
    
      
    $username = preg_replace('#[^a-zA-Z0-9$_-]#i', '', $_POST["name"]);
   // $user_password = preg_replace('#[^a-zA-Z0-9$_-]#i', '', $_POST["pass"]);
     $user_password = htmlspecialchars($_POST["pass"]);
    //$user_password_md5 = md5($user_password);
    
    $user_query = mysqli_query($con,"SELECT * FROM users WHERE
         (username='$username' OR phone='$username' OR email='$email')  LIMIT 1") or die(mysqli_error());
    $user_count = mysqli_num_rows($user_query);//use to count the numbers of rows if it exist
    if($user_count > 0){ //if count = 1, do the while loop and createa session for phone_login
    while($user_row = mysqli_fetch_array($user_query)){

      if(password_verify($user_password, $user_row['password'])){

      $userId = $user_row["user_id"];
      $user_name = $user_row["username"];
       $active = $user_row["active"];
      
      $_SESSION["userId"] = session_id();
      $_SESSION["loginType"] = "user";


        $_SESSION["user_id"] = $userId;
        $_SESSION["user"] = $user_name;


        if($active == 'yes'){

          //to set the cookie................................
    if(($_POST['user_remember']) == 'on'){
      $user_expire = time()+60*60*24*7*52;
      setcookie('user_log_in', $_SESSION["user"], $user_expire);
      }
      //................................................
      header("location: community.php");
    exit();

      }else{
           $errormsg = 'Sorry, this user account has been not yet activated or is blocked, please contact our support team';
      }//if not active(blocked users).........

      }else{
          $errormsg = 'Wrong user details';
        }//if password_verify.........

    }

  
    

   
  
    
    
    }
    else{
    $errormsg = 'That information is incorrect, try again!';
    }
    }
  }
?>
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
               <h2>LOGIN</h2>


          											<?php if (isset($errormsg)) : ?>
                                                              <div class="error1"><?php echo $errormsg; ?></div>  
                                                         <?php endif; ?>
                                                         <?php if (isset($successmsg)) : ?>
                                                               <div class="success1"><?php echo $successmsg; ?></div> 
                                                        <?php endif; ?>
                                                        <script type="text/javascript">
                                              
                                                          function viewPassword()
                                                              {
                                                                var passwordInput = document.getElementById('password-field');
                                                                var passStatus = document.getElementById('pass-status');
                                                               
                                                                if (passwordInput.type == 'password'){
                                                                  passwordInput.type='text';
                                                                  passStatus.className='fa fa-eye-slash';
                                                                  
                                                                }
                                                                else{
                                                                  passwordInput.type='password';
                                                                  passStatus.className='fa fa-eye';
                                                                }
                                                              }


                                                        </script>

            <form action="" method="post">
              <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Enter username, email or phone number" autofocus>
              </div>
             	
             	<div class="form-group">
             		 <input type="password" class="form-control" id="password-field" name="pass" placeholder="Password" <?php if(isset($_GET["pass"])){echo 'value="'.$_GET["pass"].'"';} ?> ><span class="fa fa-eye field-icon toggle-password" id="pass-status" aria-hidden="true" onclick="viewPassword()" 
          style="float: right; margin-left: -25px; margin-top: -30px; margin-right: 10px; position: relative; z-index: 1; color: #174b85"></span>
             	</div>

             	<label class="checkbox">
            <span><input type="checkbox" name="user_remember" > <span style="color: #174b85">Remember me</span></span>
        	</label>
            <span style=" float: right;"><a href="javascript:;" class="forgot"> Forgot Password?</a></span>
            
              
             
              <div class="form-group">
                <input type="submit" value="Login" name="submit" class="btn btn-primary py-3 px-5">
              </div>
            </form>

               <script type="text/javascript">
               $(document).on('click', '.forgot', function() {

                            $('#modalforgotpassword').modal("show");
                                

                                });

   $(document).on('click', '#forget-pass', function() {

       // alert('wwwwww');
             $('#display-pass').html("<p><img src='img/loaderIcon.gif' /></p>");

           var email = document.getElementById('email').value;
             if (email.length == 0)  {
                                   // alert(text);
                                    $("#display-pass").html("<p style='color:white'>Please enter your email</p>");
                                    return_color();
                                }
                              else{
        

               $.ajax({
                            url:"ajax/forgot-password.php",
                            method:"POST",
                            data:{email:email},
                            
                            success:function(data){
                               //the return value from json is giving to the below id(s)

                               $('#display-pass').html(data);

                                                      
                      
                             $('#form_wall')[0].reset();
                               
                              }
                          });

                }//validate..........

              });


</script>
           
        
    </div>


          
          </div>

         
        </div>
      </div>
    </section>

   <?php include ('./inc/footer.inc.php');  ?> 