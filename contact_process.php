<?php include ('./inc/header.inc.php');  ?>

<!--==========================
    Intro Section
  ============================-->
  
  <section id="intro-others" style="margin-top:100px;">

  </section><!-- #intro -->
<?php
	//check to see if the score is set
	
	if(isset($_POST['submit'])){
	$name = mysqli_real_escape_string($con,htmlentities(trim($_POST['name'])));
	$email = mysqli_real_escape_string($con,htmlentities(trim($_POST['email'])));
	$subject = mysqli_real_escape_string($con,htmlentities(trim($_POST['subject'])));
	$message = mysqli_real_escape_string($con,htmlentities(trim($_POST['message'])));
	
	
	
	/* prepare the message for the e-mail */
$to = "support@teacherx.org, ask@teacherx.org, olukayodefadairo@gmail.com";


$subject = 'Message from '.$name;


$body = <<<EOD
<br><hr></br>
Subject: $subject <br><br>
Name: $name <br><br>
Email: $email <br><br>
Message: $message <br>
EOD;
		$headers = "FROM: $email\r\n";
		$headers .= "Content-type: text/html\r\n";
		
			mail($to, $subject, $body, $headers);
	
	
	 mysqli_query($con,"INSERT INTO contact_form VALUES('', '$name', '$email', '$subject', '$message') ");		
	echo '<p style="text-align:center; color:green; margin-top: 50px;">Your message has been sent. Thank you!</p>';
	
	}
	
	if(isset($_POST['submit_sub'])){
	$email_sub = mysqli_real_escape_string($con,htmlentities(trim($_POST['email'])));
	
	 mysqli_query($con,"INSERT INTO email_sub VALUES('', '$email_sub') ");		
	echo '<p style="text-align:center; color:green; margin-top: 50px;">Your have successfully subscribe to our newsletter. Thank you!</p>';
	}

?>

<?php include ('./inc/footer.inc.php');  ?>