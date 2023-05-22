<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc.php');  ?>   
 

    <h2 class="mb-3 bread text-center">Check out Courses</h2>


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



				<!-- Courses Main Content -->
				<div class="col-lg-8">
					<div class="courses_search_container">
						<form action="search_course.php" method="get" id="courses_search_form" class="courses_search_form d-flex flex-row align-items-center justify-content-start">
							<input type="search" class="courses_search_input" id="auto" name="search" placeholder="Search Courses" required="required" >
							
							<button  class="courses_search_button" type="submit" value="Submit" name='submit'>search</button>
						</form>
					</div>

					<ul id="searches" style="margin-left: -5px; width: 230px; list-style: square;"> </ul>

					<h5>Your advance search results</h5>



<?php
    
$button = $_GET ['submit'];
$search = $_GET ['search']; 
  
if(strlen($search)<=1)
echo "<p style='color:#c0392b; font-size: 0.9em'>Search term too short</p>";
else{
echo "<p style='color:#c0392b; font-size: 0.9em'>You searched for <b style='color:#2c3e50'>$search</b></p>";
   
//$search_exploded = explode (" ", $search);
$search_exploded = preg_split('/[\s]+/', $search);
 
$x = "";
$construct = "";  
    
foreach($search_exploded as $search_each)
{
$x++;
if($x==1)
$construct .="title LIKE '%$search_each%'";
else
$construct .="AND title LIKE '%$search_each%'";
    
}
  
$constructs ="SELECT * FROM course WHERE $construct";
$run = mysqli_query($con,$constructs);
    
$foundnum = mysqli_num_rows($run);
    
if ($foundnum==0)
echo "<p style='color:#c0392b; font-size: 0.9em'>Sorry, there are no matching result for <b style='color:#2c3e50'>$search</b>.</p></br>";
else
{ 
  if($foundnum==1){
		echo "<p style='color:#24830e; font-size: 0.9em'>$foundnum result found !</p>";
  	}else{
		echo "<p style='color:#24830e; font-size: 0.9em'>$foundnum results found !</p>";
		}
  
$per_page = 50;
$start = isset($_GET['start']) ? $_GET['start']: '';
$max_pages = ceil($foundnum / $per_page);
if(!$start)
$start=0; 
$getproduct = mysqli_query($con,"SELECT * FROM course WHERE $construct LIMIT $start, $per_page");
  
?>


<ul style=" list-style: square; padding: 10px">
<?php while($runrows = mysqli_fetch_assoc($getproduct)) : ?>
						<?php
							
				$id = $runrows['id'];
                $title = $runrows['title'];
                $category = $runrows['category'];
                $course_mode = $runrows['mode'];
                $cost = $runrows['cost'];
                

                if($cost == 0){
                	$cost = 'Free';
                }else{
                	$cost = '$'.number_format($cost);
                }




  
echo '
		<li><a href="course.php?id='.$id.'"><em>'.$title.'</em></a> <b style="color:#b81e1e;">'. $cost.'</b></li>';


 

							
						?>

<?php endwhile; ?>
</ul>

<?php
 

//echo "</center>";
} 
} 
?>
							

							

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