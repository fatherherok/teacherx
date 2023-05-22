<?php

$page_title = 'Teacherx';
$id = (int)$_GET['id'];



?>

<?php include ('./inc/header.inc.php');



                              //to check if paid..........
                              $get = mysqli_query($con,"SELECT ordered_id FROM ordered_resource WHERE course_id='$id' AND username='$username' ") or die (mysqli_error());

                              $checker = mysqli_num_rows($get);

                         if($checker < 1 ){
                         	header("Location: index.php");
                         	exit();
                         }

  ?>   
    

<h2 class="mb-3 bread text-center">Courses</h2>


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
    <!-- Courses -->

	<div class="courses">
		<div class="container">
			<div class="row">

				 <?php

$gett = mysqli_query($con,"SELECT * FROM resources WHERE id = '$id' ") or die (mysqli_error());    


// $get_query = mysqli_query($con,"SELECT * FROM blog ORDER BY blog_id DESC");  

						$row=mysqli_fetch_array($gett);
							 
                
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
                $material = $row['material'];
                $material_ext = $row['material_ext'];
                // $link1 = $row['link1'];
                // $link2 = $row['link2'];
                // $link3 = $row['link3'];

                if($cost == 0){
                	$cost = 'Free';
                }else{
                	$cost = '<del>N</del>'.number_format($cost);
                }



                $description = htmlspecialchars_decode($description);

                $description = html_entity_decode($description);

                  $description = nl2br($description);  
          
  
                
                if($post_pix == ''){
                    $post_pix = 'img/blog.jpg';
                    }else{
                    $post_pix = 'uploads_blog/album/'.$post_pix;
                        }
        
                ?>

				<!-- Courses Main Content -->
				<div class="col-lg-8">
					<div class="courses_search_container" style="padding: 20px;">
						
							<h3 style="text-align: center;"><?php echo $title; ?></h3>
						
					</div>

					<ul id="searches" style="margin-left: -5px; width: 230px; list-style: square;"> </ul>

					<div class="courses_container">
						<div class="row courses_row">


							

							
							<!-- Course -->
							<div class="col-lg-12 course_col">
								<div class="course">
									<div class="course_image"><a href="#"><img src="<?php echo $post_pix; ?>" alt="" width="100%"></a></div>
									<div class="course_body">
										<h3 class="course_title"><a href="#"><?php echo $title; ?></a></h3>
										<div class="course_teacher">Resource Code: <b><?php echo $pin; ?></b></div>
										<div class="course_text">
											<p><?php echo $description; ?></p>
										</div>

										<?php if($material != '') : ?>
										<p style="font-size: 15px; margin-bottom: 20px;"><b>Resource Material:</b> <span style=" color: #b81e1e"><?php echo substr($material,0,100); ?> (<?php echo $material_ext; ?>)</span>
										 <a href="uploads_mat/<?php echo $material; ?>" download><i class="fa fa-download"></i></a></p>
										<?php endif; ?>


										

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
$getr =  mysqli_query($con,"SELECT id FROM resources  ") or die (mysqli_error());


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
        
$get_r = mysqli_query($con,"SELECT * FROM resources 
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