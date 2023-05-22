<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc.php'); 

if(isset($username)){
  header("Location: index.php");
}
 ?>   


    <?php
      
       function pin_generator(){
    global $con;
    $generated_pin = rand(100000,999999);
    if($generated_pin == 0){
      pin_generator();
    }
    else{
      return $generated_pin;
    } 
    
  }

  if(isset($_POST['submit'])){
  $username = mysqli_real_escape_string($con,htmlentities(trim($_POST['username'])));
  $country = mysqli_real_escape_string($con,htmlentities(trim($_POST['country'])));
   $gender = mysqli_real_escape_string($con,htmlentities(trim($_POST['gender'])));
  $email = mysqli_real_escape_string($con,htmlentities(trim($_POST['email'])));
  $pass = mysqli_real_escape_string($con,htmlentities(trim($_POST['pass'])));
  $cpass = mysqli_real_escape_string($con,htmlentities(trim($_POST['cpass'])));


if(!isset($_POST['teacher'])){
  $errormsg = 'Please indicate if you are a teacher or not';
}else{
  $teacher = mysqli_real_escape_string($con,htmlentities(trim($_POST['teacher'])));
  


  $username = strtolower($username);

  if($username && $country && $email && $pass && $cpass && $gender){
  

       // $password = md5($pass);
       // $cpassword = md5($cpass);

         $password = password_hash($pass, PASSWORD_DEFAULT);
        $cpassword = password_hash($cpass, PASSWORD_DEFAULT);

        $email_check = mysqli_query($con,"SELECT email FROM users WHERE email = '$email' ");
    $emailCount = mysqli_num_rows($email_check);//use to count the numbers of rows if it exist
    $user_check = mysqli_query($con,"SELECT username FROM users WHERE username = '$username' ");
    $userCount = mysqli_num_rows($user_check);//use to count the numbers of rows if it exist
//$phone_check = mysqli_query($con,"SELECT phone FROM users WHERE phone = '$phone' ");
  //  $phoneCount = mysqli_num_rows($phone_check);//use to count the numbers of rows if it exist
    
  
  if($pass == $cpass){
    if(strlen($username)>30 || strlen($username)<5){
            $errormsg = 'Your username must be between 5 and 30 characters';
            }elseif($emailCount == 1){
              
      $errormsg = 'The email has already been used by another user';
    }
    elseif($userCount == 1){      
      $errormsg = 'The username has already been used by another user';
    }
    elseif(preg_match("/^[0-9a-zA-Z_]{4,}$/", $username) === 0){

$errormsg = 'Username must not contain space but only digits, letters and underscore';

    }



            else{


//to send activation key to the user mail
				$str = '0123456789qwertyuiopasdfghjklzxcvbnmQWERTYUIOPASDFGHJKLZXCVBNM';
				$str = str_shuffle($str);
				$str = substr($str, 0, 15);
				
 
 mysqli_query($con, "INSERT INTO users(username, email, teacher, gender, country, password, join_names) VALUES('$username', '$email',  '$teacher', '$gender',  '$country', '$password', '$username') ") or die(mysqli_error());
   mysqli_query($con, "INSERT INTO tempusers VALUES('', '$username', '',  '$email', '$teacher',  '$password', '$str') ") or die(mysqli_error());

     mysqli_query($con, "INSERT INTO email VALUES('', '$username', '$email', 'no') ") or die(mysqli_error());
    mysqli_query($con, "INSERT INTO login_details VALUES('', '$username', '', '', 'no', '') ") or die(mysqli_error());


 //now send email to the user
  $user = ucfirst($username);



     $url = '<a href="http://teacherx.org/activate_account.php?key='.$str.'" style="background:#720c0c;color:white; text-align:center; border-radius:5px; padding:10px; text-decoration:none;"> Click to activate your account </a>';
  
$body = '<div class="email-background" style="background: #eee;padding: 10px; ">
          
            <div class="email-container" style="max-width: 600px;background: white; color: black; font-family: Tahoma, Geneva, sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px; padding: 20px;">
              <div style="text-align: center;"><img src="https://www.teacherx.org/img/logo.jpg" style="max-width: 100%;"></div>';
       $body .= <<<EOD
<br>
Dear <strong>$username</strong>,<br><br>

Please click on the following link to activate your account<br><br>
$url <br><br>
This message is being sent to you due to your registration on teacherx.org <br><br>

<strong>If the link does not apppear clickable or does not open a browser window when you click it, please copy and paste into your
browser.</strong><br><br>

This message is being sent to $email<br><br>

SUPPORT: <br>
For any support with respect to your relationship with us, you can always contact us on info@teacherx.org<br><br>

If you are not $username and you receive this message by mistake, kindly discard this message.<br><br>

TeacherX Project Team.

EOD;

    $body .= '</div>';   
    
  $subject = "TeacherX account activation";

//echo '->'.mail($email_owner, $subject, $body, $headers);

  

  $from = "TeacherX <info@teacherx.org>";
$to = $email;



$headers = "FROM: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    
      mail($to, $subject, $body, $headers);


//email ends here...........................  









  $successmsg = '<p style="color:white;">Successfully registered. Please check your inbox or SPAM FOLDER and click the link sent to your email to  activate your account</p>';

    
      }
  }else{
    $errormsg = '<p style="color:white;">Sorry your passwords do not match</p>';
    }
  
  }
  else{
  $errormsg = '<p style="color:white;">Please all the fields are required</p>'; 
    }
  
  
}//if teacher radio is selected......................

  }

?>
     <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h4 text-center">Submit all required fields</h2>
          </div>

           										     
        </div>
        <div class="row block-9">

        	 <div class="col-md-3 pr-md-5">
        	 </div>
          <div class="col-md-6 pr-md-5">
             <h2>REGISTER</h2>

          											                       <?php if (isset($errormsg)) : ?>
                                                              <div class="error1"><?php echo $errormsg; ?></div>  
                                                         <?php endif; ?>
                                                         <?php if (isset($successmsg)) : ?>
                                                               <div class="success1"><?php echo $successmsg; ?></div> 
                                                        <?php endif; ?>

            <form action="" method="post">
              <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Your Username">
              </div>
               
              <div class="form-group">
                <input type="text" class="form-control" name="email" placeholder="Your Email">
              </div>
              <div class="form-group">
              	<p>Are you a teacher?</p>

                <label><input type="radio" class="form-control" name="teacher" value="yes"> Yes</label> &nbsp;  &nbsp; &nbsp;
               <label><input type="radio" class="form-control" name="teacher" value="No"> No</label> &nbsp;  &nbsp; &nbsp;
                
              </div>

                      <div class="form-group">
                            
                               <select name="gender" class="form-control">
                               <option value="">Your Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="other">Others</option>
                            
                                 
                               </select>
                         </div>




                         <div class="form-group">
                            
                               <select name="country" class="form-control">
                               <option value="">Select Your Country</option>

                               <?php
                                $queryCountry =  mysqli_query($con, "SELECT * FROM country ORDER BY nicename ASC");
                                mysqli_num_rows($queryCountry);
                               ?>
                                <?php while($rowCountry = mysqli_fetch_assoc($queryCountry)) : ?>
                                 <?php
                                $nicename = $rowCountry['nicename'];
                               
                               ?> 
                                <option value="<?php echo $nicename; ?>"><?php echo $nicename; ?></option>
                              <?php endwhile; ?>

                                 
                               </select>
                         </div>






              <div class="form-group">
                <input type="password" class="form-control" placeholder="Your password" name="pass" id="password-field">
                <span class="fa fa-eye field-icon toggle-password" id="pass-status" aria-hidden="true" onclick="viewPassword()" 
          style="float: right; margin-left: -25px; margin-top: -30px; margin-right: 10px; position: relative; z-index: 1; color: #174b85 "></span>
              </div>

              <div class="form-group">
                <input type="password" class="form-control" placeholder="Confirm password" name="cpass"  id="password-field2">
                <span class="fa fa-eye field-icon toggle-password" id="pass-status2" aria-hidden="true" onclick="viewPassword2()" 
          style="float: right; margin-left: -25px; margin-top: -30px; margin-right: 10px; position: relative; z-index: 1; color: #174b85"></span>
            	</div>
             
              <div class="form-group">
                <input type="submit" value="Sign Up" name="submit" class="btn btn-primary py-3 px-5">
              </div>
            </form>


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


                                                             function viewPassword2()
                                                              {
                                                                var passwordInput = document.getElementById('password-field2');
                                                                var passStatus = document.getElementById('pass-status2');
                                                               
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
        
    </div>


          
          </div>

         
        </div>
      </div>
    </section>

   <?php include ('./inc/footer.inc.php');  ?> 