<?php

$page_title = 'Teacherx';
$id = (int)$_GET['id'];
?>

<?php include ('./inc/header.inc.php');  ?>   
       <h2 class="mb-3 bread text-center">Course Payment</h2>
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
    

  $invoice =  pin_generator();






//get user info
    $query_pr = mysqli_query($con,"SELECT * FROM users WHERE username='$username' ");
    $resu = mysqli_fetch_assoc($query_pr);
    $email = $resu['email']; 
    $phone = $resu['phone']; 
    $lname = $resu['lname']; 






$gett = mysqli_query($con,"SELECT * FROM course WHERE id = '$id' ") or die (mysqli_error()); 


    


// $get_query = mysqli_query($con,"SELECT * FROM blog ORDER BY blog_id DESC");  

						$row=mysqli_fetch_array($gett);
							 
                
                $course_id = $row['id'];
                $title = $row['title'];
                $category = $row['category'];
                $description = $row['description'];
                $course_mode = $row['mode'];
                $cost = $row['cost'];
                $date = $row['date'];
                 $view = $row['view'];
                $sale = $row['sale'];
                 $post_pix = $row['pix'];
                $pin = $row['pin'];

                $pprice = $row['cost'];
               

  $naira = $cost * 100;
   //  $naira = 1000;
    



                $description = htmlspecialchars_decode($description);

                $description = html_entity_decode($description);

                  $description = nl2br($description);  
          
    //$time = time();
date_default_timezone_set('Africa/Lagos');
 $current_time = date('Y-m-d h:i:s');


 mysqli_query($con,"INSERT INTO ordered_course VALUES('', '$current_time', '$username', '$pprice', '$course_id',  '$invoice', 'no', '') ") or die(mysqli_error());	
                ?>

<script>
  function payWithPaystack(){
    var handler = PaystackPop.setup({
      key: 'pk_live_7a67b22bed3cffafcf32273c039ca99828fbb78e',
      email: '<?php echo $email; ?>',
      amount: <?php echo $naira; ?>,
      currency: "NGN",
      ref: ''+Math.floor((Math.random() * 1000000000) + 1), // generates a pseudo-unique reference. Please replace with a reference you generated. Or remove the line entirely so our API will generate one for you
      firstname: '<?php echo $username; ?>',
      lastname: '<?php echo $lname; ?>',
      // label: "Optional string that replaces customer email"
      metadata: {
         custom_fields: [
            {
               display_name: "<?php echo $username; ?>",
                variable_name: "<?php echo $lname; ?>",
                value: "<?php echo $phone; ?>"
            }
         ]
      },
callback: function(response){
  window.location = "https://www.teacherx.org/callback.php?invoice=" + <?php echo $invoice; ?> +"&reference=" + response.reference;
}

,
      onClose: function(){
          alert('window closed');
      }
    });
    handler.openIframe();
  }
  
</script>

    <!-- Courses -->

	<div class="courses">
		<div class="container">
			<div class="row">

				

				<!-- Courses Main Content -->
				<div class="col-lg-8">
					<div class="courses_search_container" style="padding: 20px;">
						
							<h3 style="text-align: center;">Make Payment</h3>
						
					</div>

					<ul id="searches" style="margin-left: -5px; width: 230px; list-style: square;"> </ul>

					<div class="courses_container">
						<div class="row courses_row">


							

							
							<!-- Course -->
							<div class="col-lg-12 course_col">
								<div class="course">
									
									
									<div class="text-center"><img src="img/cards.jpg"></div>
									<table class="table">
										<?php if(isset($username)) : ?>
										<tr>
											<td>Title</td>
											<td><?php echo $title; ?></td>
										</tr>
										<tr>
											<td>Category</td>
											<td><?php echo $category; ?></td>
										</tr>
										<tr>
											
											<td colspan="2"><?php echo substr($description,0,250); ?>... </td>
										</tr>
										
										<tr>
											<td>Cost</td>
											<td><del>N</del><?php echo number_format($cost); ?></td>
										</tr>

										<tr>
											<td colspan="2"><button type="button" onclick="payWithPaystack()" style="background: red; color: white;" class="btn btn-danger btn-block">Pay Now</button>
												<script src="https://js.paystack.co/v1/inline.js"></script>
											</td>

											
										</tr>


										
          


										<?php else :  ?>
										<tr>
											<td colspan="2"><b>Please make sure you are logged in before you can make payment</b></td>
											
										</tr>
										<tr>
											<td><a href="login.php" class="btn btn-primary">Login</a></td>
											<td><a href="register.php" class="btn btn-primary">Sign Up</a></td>
										</tr>
										<?php endif; ?>
									</table>

								</div>
							</div>

							
							

							

						</div>
						
					</div>
				</div>

				<!-- Courses Sidebar -->
				<div class="col-lg-4">
					<div class="sidebar">

						<!-- Categories -->
						<div class="sidebar_section">
							<div class="sidebar_section_title">Categories</div>
							<div class="sidebar_categories">
								<ul>
									<li><a href="course-category.php?category=Teaching Productivity Tools">Teaching Productivity Tools</a></li>
									<li><a href="course-category.php?category=Content Creation">Content Creation</a></li>
									<li><a href="course-category.php?category=Sustainable Development Goals">Sustainable Development Goals</a></li>
									<li><a href="course-category.php?category=How to Teach Online">How to Teach Online</a></li>
									<li><a href="course-category.php?category=Inclusive Teaching">Inclusive Teaching</a></li>
									<li><a href="course-category.php?category=Language Teaching">Language Teaching</a></li>
									<li><a href="course-category.php?category=STEM Teaching">STEM Teaching</a></li>
									<li><a href="course-category.php?category=Lesson Presentation and Delivery">Lesson Presentation & Delivery</a></li>
									<li><a href="course-category.php?category=Business and Management">Business & Management</a></li>
									<li><a href="course-category.php?category=Creative Arts and Media">Creative Arts & Media</a></li>
									<li><a href="course-category.php?category=IT & Computer Science">IT & Computer Science</a></li>
									<li><a href="course-category.php?category=Psychology and Mental Health">Psychology & Mental Health</a></li>
								</ul>
							</div>
						</div>

						 <?php
//for pagination of the  list on the homepage
$getr =  mysqli_query($con,"SELECT id FROM course  ") or die (mysqli_error());


$total = mysqli_num_rows($getr);

$limit =(isset($_GET['limit'])) ? (int)$_GET['limit'] : 8;
$page =(isset($_GET['page'])) ? (int)$_GET['page'] : 1;
(int)$link = 2;
$row_start = (($page - 1) * $limit);
(int)$limit = 8;
//$page = 1;

$last = ceil($total / $limit);

$start = (($page - $link) > 0) ? $page - $link : 1;
$end = (($page + $link) < $last) ? $page + $link : $last;       
        
$get_r = mysqli_query($con,"SELECT * FROM course 
ORDER BY sale DESC LIMIT $row_start, $limit  ") or die (mysqli_error()); 


    


// $get_query = mysqli_query($con,"SELECT * FROM blog ORDER BY blog_id DESC");  ?>
						<!-- Latest Course -->
						<div class="sidebar_section">
							<div class="sidebar_section_title">Latest Courses</div>
							<div class="sidebar_latest">

								 <?php while($rowr=mysqli_fetch_array($get_r)) : ?>

								 	 <?php 
                
                $idr = $rowr['id'];
                $titler = $rowr['title'];
                $categoryr = $rowr['category'];
                $descriptionr = $rowr['description'];
                $course_moder = $rowr['mode'];
                $costr = $rowr['cost'];
                $dater = $rowr['date'];
                 $viewr = $rowr['view'];
                $saler = $rowr['sale'];
                 $post_pixr = $rowr['pix'];
                $pinr = $rowr['pin'];

                if($costr == 0){
                	$costr = 'Free';
                }else{
                	$costr = '<del>N</del>'.$costr;
                }



                $descriptionr = htmlspecialchars_decode($descriptionr);

                $descriptionr = html_entity_decode($descriptionr);

          
  
                
                if($post_pixr == ''){
                    $post_pixr = 'img/blog.jpg';
                    }else{
                    $post_pixr = 'uploads_blog/thumbs/'.$post_pixr;
                        }
        
                ?>
								<!-- Latest Course -->
								<div class="latest d-flex flex-row align-items-start justify-content-start">
									<div class="latest_image"><div><img src="<?php echo $post_pixr; ?>" alt=""></div></div>
									<div class="latest_content">
										<div class="latest_title"><a href="course.php?id=<?php echo $idr; ?>"><?php echo $title; ?>e</a></div>
										<div class="latest_price"><?php echo $costr; ?></div>
									</div>
								</div>

					 <?php endwhile;   ?>		

							</div>
						</div>

						


						<!-- Banner -->
						<div class="sidebar_section">
							<div class="sidebar_banner d-flex flex-column align-items-center justify-content-center text-center">
								<div class="sidebar_banner_background" style="background-image:url(img/banner_1.jpg)"></div>
								<div class="sidebar_banner_overlay"></div>
								<div class="sidebar_banner_content">
									<div class="banner_title">Free Book</div>
									<div class="banner_button"><a href="#">download now</a></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
   


   <?php include ('./inc/footer.inc.php');  ?> 