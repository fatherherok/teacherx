<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc.php');  ?>   
     <div class="text-center">
            <h1 class="mb-3 bread">Teachers</h1>    
    </div>


	<script type="text/javascript">
	//search button 1
	//this is for the search button autosuggest drop down
	$(document).ready(function(){
	$('#auto').keyup(function(){
	      
	  var searches = $(this).val();
	  $.post('ajax/search_teacher.php', {searches:searches}, function(data){
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
						<form action="search_teacher.php" method="get" id="courses_search_form" class="courses_search_form d-flex flex-row align-items-center justify-content-start">
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
$construct .="join_names LIKE '%$search_each%'";
else
$construct .="AND join_names LIKE '%$search_each%'";
    
}
  
$constructs ="SELECT * FROM users WHERE $construct";
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
$getproduct = mysqli_query($con,"SELECT * FROM users WHERE $construct LIMIT $start, $per_page");
  
?>


<ul style=" list-style: square; padding: 10px">
<?php while($runrows = mysqli_fetch_assoc($getproduct)) : ?>
						<?php
							
				$id = $runrows['user_id'];
                $fname = $runrows['fname'];
                $lname = $runrows['lname'];
                $user = $runrows['username'];
                	$teacherC_pix = $runrows['pix'];
                	if($teacherC_pix == ""){
			
												$teacherC_pix = "img/b3.PNG";
													
													}
												else{
													$teacherC_pix = 'uploads/thumbs/'.$teacherC_pix;
													}


  
echo '
		<li style="list-style:none"><a href="'.$user.'"><img src="'.$teacherC_pix.'" class="rounded-circle" height="40" width="40"> <em>'.ucfirst($user).'</em></a> <b style="color:#b81e1e;">'. $fname.' '.$lname.'</b></li>';


 

							
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
				
				</div>

			</div>
		</div>
	</div>
   


   <?php include ('./inc/footer.inc.php');  ?> 