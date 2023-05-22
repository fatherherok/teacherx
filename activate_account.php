<?php
session_start();
ob_start();
$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc.php');  ?>   

   <div class="hero-wrap2" style="background-image: url('img/bg_6.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>register</span></p>
            <h1 class="mb-3 bread">Account Activation</h1>
          </div>
        </div>
      </div>
    </div>
   
   <?php
   $key = $_GET['key'];
if(isset($_GET['key'])){
	
	
	$query = mysqli_query($con,"SELECT * FROM tempusers WHERE token = '$key' ") or die(mysqli_error());
	$row = mysqli_fetch_assoc($query);

	$username =  mysqli_real_escape_string($con,htmlspecialchars($row['username']));
	
	if(mysqli_num_rows($query)>0){
	
	mysqli_query($con,"UPDATE users SET active = 'yes' WHERE username = '$username' ") or die(mysqli_error());
	
	$query_del = mysqli_query($con,"DELETE FROM tempusers WHERE token = '$key' ") 
	or die (mysqli_error());

	
					$successmsg = 'Your account has been activated, you can now <a href="login.php">login here</a>';
			
		}
		else{
			$errormsg = 'Check your link or contact the admin <a href="contact.php">here</a>';
			
			}
	
	}else{
		header("Location: index.php");
	exit();
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