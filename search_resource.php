<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc.php');  ?>   

    <h2 class="mb-3 bread text-center">Check out Resources</h2>


<script type="text/javascript">
	//search button 1
  //this is for the search button autosuggest drop down
  $(document).ready(function(){
    $('#auto').keyup(function(){
          
      var searches = $(this).val();
      $.post('ajax/search_resource.php', {searches:searches}, function(data){
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
						<form action="search_resource.php" method="get" id="courses_search_form" class="courses_search_form d-flex flex-row align-items-center justify-content-start">
							<input type="search" class="courses_search_input" id="auto" name="search" placeholder="Search Resources" required="required" >
							
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
  
$constructs ="SELECT * FROM resources WHERE $construct";
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
$getproduct = mysqli_query($con,"SELECT * FROM resources WHERE $construct LIMIT $start, $per_page");
  
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
		<li><a href="resource.php?id='.$id.'"><em>'.$title.'</em></a> <b style="color:#b81e1e;">'. $cost.'</b></li>';


 

							
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
									<li><a href="resource-category.php?category=English/Languages">English/Languages</a></li>
									<li><a href="resource-category.php?category=Maths">Maths</a></li>
									<li><a href="resource-category.php?category=Sciences">Sciences</a></li>
									<li><a href="resource-category.php?category=Technology">Technology</a></li>
									<li><a href="resource-category.php?category=Arts">Arts</a></li>
									<li><a href="resource-category.php?category=Business">Business</a></li>
									<li><a href="resource-category.php?category=History">History</a></li>
									<li><a href="resource-category.php?category=Religious">Religious</a></li>
									<li><a href="resource-category.php?category=Technology">Technology</a></li>
								</ul>
							</div>
						</div>

						 <?php
$get_r = mysqli_query($con,"SELECT * FROM resources 
ORDER BY sale DESC LIMIT 10  ") or die (mysqli_error()); 
    


// $get_query = mysqli_query($con,"SELECT * FROM blog ORDER BY blog_id DESC");  ?>
						<!-- Latest Course -->
						<div class="sidebar_section">
							<div class="sidebar_section_title">Popular Resources</div>
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