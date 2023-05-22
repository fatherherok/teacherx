<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc.php');  ?>   
      <h2 class="mb-3 bread text-center"><?php echo ucfirst($username); ?> Paid Resourses</h2>


<script type="text/javascript">
	//search button 1
  //this is for the search button autosuggest drop down
  $(document).ready(function(){
    $('#auto').keyup(function(){
          
      var searches = $(this).val();
      $.post('ajax/search_course.php', {searches:searches}, function(data){
        $('#searches').html(data);
        });
      
        });
  });
</script>




			
	<?php
                              //for pagination of the  list on the homepage
                              $get_co = mysqli_query($con,"SELECT ordered_id FROM ordered_resource  ") or die (mysqli_error());

                              $total_co = mysqli_num_rows($get_co);
                              ?>
	<p class="text-center" style="font-size: 20px;">You have <?php echo $total_co; ?> paid course(s)</p>
    <!-- Courses -->

	<div class="courses">
		<div class="container">
			<div class="row">



				<!-- Courses Main Content -->
				<div class="col-lg-8">
					<div class="courses_search_container">
						<form action="search_course.php" method="get" id="courses_search_form" class="courses_search_form d-flex flex-row align-items-center justify-content-start">
							<input type="search" class="courses_search_input" id="auto" name="search" placeholder="Search Courses" required="required" >
							
							<button  class="courses_search_button" type="submit" value="Submit" name='submit'>search</button>
						</form>
					</div>

					<ul id="searches" style="margin-left: -5px; width: 230px; list-style: square;"> </ul>

					<div class="courses_container">
						<div class="row courses_row">


				 <?php

$get = mysqli_query($con,"SELECT *
  FROM `resources`
  LEFT JOIN `ordered_resource`
  ON `resources`.`id` = `ordered_resource`.`course_id`
  WHERE `ordered_resource`.`username` = '$username' "); 



//for pagination of the  list on the homepage
//$get = mysqli_query($con,"SELECT id FROM course  ") or die (mysqli_error());

$total = mysqli_num_rows($get);

$limit =(isset($_GET['limit'])) ? (int)$_GET['limit'] : 8;
$page =(isset($_GET['page'])) ? (int)$_GET['page'] : 1;
(int)$link = 2;
$row_start = (($page - 1) * $limit);
(int)$limit = 50;
//$page = 1;

$last = ceil($total / $limit);

$start = (($page - $link) > 0) ? $page - $link : 1;
$end = (($page + $link) < $last) ? $page + $link : $last;       
        
// $gett = mysqli_query($con,"SELECT * FROM course ORDER BY id DESC LIMIT $row_start, $limit  ") or die (mysqli_error()); 


$gett = mysqli_query($con,"SELECT *
  FROM `resources`
  LEFT JOIN `ordered_resource`
  ON `resources`.`id` = `ordered_resource`.`course_id`
  WHERE `ordered_resource`.`username` = '$username'   ORDER BY `ordered_resource`.`ordered_id` DESC LIMIT $row_start, $limit  "); 

    


// $get_query = mysqli_query($con,"SELECT * FROM blog ORDER BY blog_id DESC");  ?>
	
							
							<?php while($row=mysqli_fetch_array($gett)) : ?>

								 <?php 
                
                $id = $row['id'];
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

                if($cost == 0){
                	$cost = 'Free';
                }else{
                	$cost = '<del>N</del>'.number_format($cost);
                }



                $description = htmlspecialchars_decode($description);

                $description = html_entity_decode($description);

          
  
                
                if($post_pix == ''){
                    $post_pix = 'img/blog.jpg';
                    }else{
                    $post_pix = 'uploads_blog/thumbs/'.$post_pix;
                        }
        
                ?>

							
							<!-- Course -->
							<div class="col-lg-6 course_col">
								<div class="course">
									<div class="course_image"><a href="paid-resource.php?id=<?php echo $id; ?>"><img src="<?php echo $post_pix; ?>" alt="" width="100%"></a></div>
									<div class="course_body">
										<h3 class="course_title"><a href="paid-resource.php?id=<?php echo $id; ?>"><?php echo $title; ?></a></h3>
										<div class="course_teacher">Course Code: <b><?php echo $pin; ?></b></div>
										<div class="course_teacher">Category: <b><?php echo $category; ?></b></div>
										<div class="course_text">
											<p><?php echo substr($description,0,100); ?>... <a href="paid-resource.php?id=<?php echo $id; ?>" class="" style="">Check Out</a></p>

										</div>
									</div>
									<div class="course_footer">
										<div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
											<div class="course_info">
												<i class="fa fa-graduation-cap" aria-hidden="true"></i>
												<span>Mode: <?php echo $course_mode; ?></span>
											</div>
											<div class="course_info">
												<i class="fa fa-shopping-cart" aria-hidden="true"></i>
												<span><?php echo $sale; ?> Sales</span>
											</div>
											<div class="course_price ml-auto"><?php echo $cost; ?></div>

										</div>

									

									</div>
								</div>
							</div>

							  <?php endwhile;   ?>

							

							

						</div>
						<div class="row pagination_row">
							<div class="col">
								<div class="pagination_container d-flex flex-row align-items-center justify-content-start">
									


	 <div class="row mt-5">
          <div class="col text-center">
            <div class="block-27">
              <ul>

                <?php if($page == 1): ?>
                <li><a href="#">&lt;</a></li>
                <?php else : ?>
                  <li><a href="?limit=<?php echo $limit; ?>&page=<?php echo $page-1; ?>">&lt;</a></li>
                <?php endif; ?> 
                 <?php if($start > 1): ?>
                    <li><a href="?limit=<?php echo $limit; ?>&page=1">1</a></li>
                    <li class="disabled"><span>...</span></li>
                    <?php endif; ?>

                  <?php for($y = $start; $y <= $end; $y++) : ?>
                    <?php if($page == $y) : ?>
                      <li class="active"><span><a class="" href="?limit=<?php echo $limit; ?>&page=<?php echo $y; ?>"><?php echo $y; ?></a></span></li>
                       <?php else : ?>
                        <li><a href="?limit=<?php echo $limit; ?>&page=<?php echo $y; ?>"><?php echo $y; ?></a></li>
                    <?php endif; ?> 
                    <?php endfor; ?>


                   <?php if($end < $last): ?>
                    <li class="disabled"><span>...</span></li>
                    <li><a href="?limit=<?php echo $limit; ?>&page=<?php echo $last; ?>"><?php echo $last; ?></a></li>
                    <?php endif; ?>
                  
                    <?php if($page == $last): ?> 
                      <li><a href="#">&gt;</a></li>
                      <?php else : ?>
                      <li><a href="?limit=<?php echo $limit; ?>&page=<?php echo $page+1; ?>">&gt;</a></li>
                      <?php endif; ?>
              </ul>
            </div>
          </div>
        </div>






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
  
$get_r = mysqli_query($con,"SELECT * FROM resources 
ORDER BY sale DESC LIMIT 10  ") or die (mysqli_error()); 


    


// $get_query = mysqli_query($con,"SELECT * FROM blog ORDER BY blog_id DESC");  ?>
						<!-- Latest Course -->
						<div class="sidebar_section">
							<div class="sidebar_section_title">Popular Courses</div>
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
                	$costr = '$'.$costr;
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