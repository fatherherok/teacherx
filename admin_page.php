<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc.php'); 
if(!isset($_SESSION["admin_teacherx"] )){

  header('Location: index.php');
  exit();
}

 ?>   



     <h2 class="mb-3 bread text-center">Admin Page Panel</h2>
 
 <section class="ftco-section">
    	<div class="container">
    		<div class="row d-flex">
                
    			<div class="col-lg-4  ftco-animate">
    				<div class=" d-md-flex" style=" bordeR: 1px solid #d0e5fb; margin-bottom: 20px;">
    					
    					<div class="text p-4">
    						<h3><a href="approve-blog.php">Approve Blog Post</a></h3>
    						
    						<p>Check pending blog articles for approval </p>
    						
                            <p><a href="approve-blog.php" class="btn btn-primary" style="background-color: #b81e1e; border: 1px solid #b81e1e">Click Here</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-4  ftco-animate">
    				<div class=" d-md-flex" style=" bordeR: 1px solid #d0e5fb; margin-bottom: 20px;">
    					
    					<div class="text p-4">
    						<h3><a href="block-users.php">Block/Unblock Users </a></h3>
    						
    						<p>Block or unblock users reported  </p>
    						
                            <p><a href="block-users.php" class="btn btn-primary" style="background-color: #b81e1e; border: 1px solid #b81e1e">Click Here</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-4  ftco-animate">
    				<div class=" d-md-flex" style=" border: 1px solid #d0e5fb; margin-bottom: 20px;">
    					
    					<div class="text p-4">
    						<h3><a href="upload-course.php">Upload Course</a></h3>
    						
    						<p>Upload course free or paid </p>
    						
                            <p><a href="upload-course.php" class="btn btn-primary" style="background-color: #b81e1e; border: 1px solid #b81e1e">Click Here</a></p>
    					</div>
    				</div>
    			</div>
    			<div class="col-lg-4  ftco-animate">
    				<div class=" d-md-flex" style=" border: 1px solid #d0e5fb; margin-bottom: 20px;">
    					
    					<div class="text p-4">
    						<h3><a href="upload-opportunity.php">Upload Opportunity</a></h3>
    						
    						<p>Check pending blog articles for approval </p>
    						
                            <p><a href="upload-opportunity.php" class="btn btn-primary" style="background-color: #b81e1e; border: 1px solid #b81e1e">Click Here</a></p>
    					</div>
    				</div>
    			</div>

                <div class="col-lg-4  ftco-animate">
                    <div class=" d-md-flex" style=" border: 1px solid #d0e5fb; margin-bottom: 20px;">
                        
                        <div class="text p-4">
                            <h3><a href="stat.php">User Statistics</a></h3>
                            
                            <p>Check pending blog articles for approval </p>
                            
                            <p><a href="stat.php" class="btn btn-primary" style="background-color: #b81e1e; border: 1px solid #b81e1e">Click Here</a></p>
                        </div>
                    </div>
                </div>


    		</div>
    	</div>
    </section>

   

   


   <?php include ('./inc/footer.inc.php');  ?> 