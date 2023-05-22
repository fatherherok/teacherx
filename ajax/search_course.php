<?php include ('./../inc/connect.inc.php');
 ?>


<?php
if(isset($_POST['searches']) == true && empty($_POST['searches']) == false){
	
	//$button = $_GET ['submit'];
$search = $_POST ['searches']; 
  
if(strlen($search)<=1)
echo "<p style='color:#c0392b;'>Search term too short</p>";
else{
echo "<p style='color:#2c3e50;'>You searched for <b>$search</b></p>";


    
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
echo "<p style='color:#c0392b'>Sorry, there are no matching result for <b style='color:#2c3e50'>$search</b>.</p></br>";
else
{ 
  if($foundnum==1){
		echo "<p style='color:#24830e'>$foundnum result found !</p>";
  	}else{
		echo "<p style='color:#24830e'>$foundnum results found !</p>";
		}
		
		
$per_page = 1;
$start = isset($_GET['start']) ? $_GET['start']: '';
$max_pages = ceil($foundnum / $per_page);
if(!$start)
$start=0; 
$getquery = mysqli_query($con,"SELECT * FROM course WHERE $construct");
  
while($runrows = mysqli_fetch_assoc($getquery))
{



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
		    
}
}
}
}
?>