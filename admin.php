<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc.php');  ?>   

 <h2 class="mb-3 bread text-center">Admin Login</h2>
 
<?php


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
    
    $user_query = mysqli_query($con,"SELECT * FROM admin WHERE username ='$username'  LIMIT 1") or die(mysqli_error());


    $user_count = mysqli_num_rows($user_query);//use to count the numbers of rows if it exist
    if($user_count > 0){ //if count = 1, do the while loop and createa session for phone_login
    while($user_row = mysqli_fetch_array($user_query)){

      if(password_verify($user_password, $user_row['password'])){

      $user = $user_row["username"];
      
      $_SESSION["userId"] = session_id();
      $_SESSION["loginType"] = "admin";
    
    $_SESSION["admin_teacherx"] = $user;
    
      //................................................
      header("location: admin_page.php");
    exit();
    
    
     
      }else{
          $errormsg = 'Wrong admin user details';
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

             
            
              
             
              <div class="form-group">
                <input type="submit" value="Login" name="submit" class="btn btn-primary py-3 px-5">
              </div>
            </form>


           
        
    </div>


          
          </div>

         
        </div>
      </div>
    </section>


   <?php include ('./inc/footer.inc.php');  ?> 