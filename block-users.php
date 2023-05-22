<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc.php'); 

if(!isset($_SESSION["admin_teacherx"] )){

  header('Location: index.php');
  exit();
}

 ?>   

     <h2 class="mb-3 bread text-center">Block Users</h2>

   <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        
<?php




if(isset($_POST['submit1'])){
   $block = mysqli_real_escape_string($con,htmlentities(trim($_POST['block'])));

      if($block){ 

        //......................................
        $user_query = mysqli_query($con,"SELECT * FROM users WHERE username='$block' LIMIT 1") or die(mysqli_error());
    $user_count = mysqli_num_rows($user_query);//use to count the numbers of rows if it exist
    if($user_count > 0){ //if count = 1, do the while loop and createa session for phone_login

     mysqli_query($con,"UPDATE users SET active='no' WHERE username='$block' ") or die(mysqli_error()); 
           $successmsg = 'You successfully BLOCKED '.$block;
       }else{
        $errormsg = 'Sorry the username do not exist in the database';
       }  
       //........................................................................................


       }else{
        $errormsg = 'You have not entered the usersname to BLOCK';
       }   
}


if(isset($_POST['submit2'])){
   $unblock = mysqli_real_escape_string($con,htmlentities(trim($_POST['unblock'])));

      if($unblock){ 
      //......................................
        $user_query = mysqli_query($con,"SELECT * FROM users WHERE username='$unblock' LIMIT 1") or die(mysqli_error());
    $user_count = mysqli_num_rows($user_query);//use to count the numbers of rows if it exist
    if($user_count > 0){ //if count = 1, do the while loop and createa session for phone_login

     mysqli_query($con,"UPDATE users SET active='yes' WHERE username='$unblock' ") or die(mysqli_error()); 
           $successmsg = 'You successfully UNBLOCKED '.$unblock;
       }else{
        $errormsg = 'Sorry the username do not exist in the database';
       }  
       //........................................................................................




       }else{
         $errormsg = 'You have not entered the usersname to UNBLOCK';
       }   
}

?>


        <div class="row block-9">
          <div class="col-md-3 pr-md-5">

          </div>
        	 	
          <div class="col-md-6 pr-md-5">
            <form action="" role="form" method="post">


                                                        <?php if (isset($errormsg)) : ?>
                                                              <div class="error1"><?php echo $errormsg; ?></div>  
                                                         <?php endif; ?>
                                                         <?php if (isset($successmsg)) : ?>
                                                               <div class="success1"><?php echo $successmsg; ?></div> 
                                                        <?php endif; ?>


             <div class="form-group">
              <label>Block User</label>
                <input type="text" class="form-control" name="block" placeholder="Enter usersname">
              </div>
             
              

              <div class="form-group">
                <input type="submit" value="Block User" name="submit1" id="p-form" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          



           <form role="form" class="form-horizontal" action="" method="post">

                           <div class="form-group">
                            <label>Unblock User</label>
                            <div >
                              <input type="text" class="form-control" name="unblock" placeholder="Enter usersname">
                            </div>
                          </div>
                          <div class="form-group">
                            <div>
                              <button class="btn btn-success  py-3 px-5" type="input" name="submit2">Unblock Users</button>
                            </div>
                          </div>
                        </form>
          </div>

        
        </div>


<?php $query = mysqli_query($con,"SELECT * FROM users WHERE active='no' ") or die (mysqli_error());           ?> 
                          
                          <h3 style="text-align: center; color: #b81e1e; margin-top: 50px;">BLOCKED USERS</h3>
              <table class="table table-advance">

                                <?php $i=1; while($row = mysqli_fetch_assoc($query)) :               ?> 
              <?php
              $username = $row['username']; 

?>

                <tr>
                   <td><b><?php echo $i; ?></b></td>
                <td><b><?php echo $username; ?></b></td>
                    
              </tr>

              <?php $i++; endwhile; ?>
                            </table>





      </div>
    </section>


   <?php include ('./inc/footer.inc.php');  ?> 