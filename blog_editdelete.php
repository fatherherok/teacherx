<?php
include ('./inc/connect.inc.php');

?>
<?php include ('./inc/header.inc.php'); ?>




 
 <h2 class="mb-3 bread text-center">Blog Edit</h2>

<section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h4 text-center"></h2>
          </div>

                                   
        </div>
        <div class="row ">
         

<?php
$time = time(); 
 
 $blog_id = $_GET['blog_id'];
 
 $get_images = mysqli_query($con,"SELECT * FROM blog WHERE blog_id = '$blog_id' "); 
		
$rowG = mysqli_fetch_assoc($get_images);
	 			$ext = $rowG['ext'];
				$post = htmlspecialchars_decode($rowG['blog_body']);
				$postpix = $rowG['blogpix'];
				$title = $rowG['blog_title'];
				$date_added = $rowG['date'];
				$added_by = $rowG['added_by'];
	
			
      $post = html_entity_decode($post);
	
if(isset($_POST['edit'])){
	 $title = mysqli_real_escape_string($con,$_POST['title']); 



   $url = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i'; 
 $post = mysqli_real_escape_string($con,htmlentities(trim(strip_tags($_POST['post']))));
  $post = preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>', $post);
	
	
	
			
$query_form = mysqli_query($con,"UPDATE blog SET blog_body = '$post', blog_title = '$title' WHERE blog_id = '$blog_id' ")
		or die(mysqli_error());				
	header('Location: blog_page.php?blog_id='.$blog_id);
	
	$success = 'Your blog post is successfully updated';    
}else if(isset($_POST['delete'])){
	
	unlink('uploads_blog/album/'.$postpix) && unlink('uploads_blog/thumbs/'.$postpix);
	
	mysqli_query($con,"DELETE FROM blog WHERE blog_id = '$blog_id' ");
	
	header('Location: blog.php');
	
	}
	

?>







   
        
           
           <div class="col-lg-12">
  
              	   <form role="form" method="post" action="">
            <div class="form-group">
              <input id="title" type="text" class="form-control" name="title" value="<?php echo $title; ?>">
          
            </div>

            <div class="form-group">
              <textarea rows="10" name="post" id="editor" class="form-control" placeholder="Enter your comment"><?php echo $post; ?></textarea>
          
            </div>

            <div class="form-group">
      <input type="submit" value="Delete" class="btn btn-primary pull-left" name="delete"> 
      <input type="submit" class="btn btn-primary pull-right" name="edit" value="Edit blog">
      	</div>

        </form>
          </div>
      


         
        </div>
      </div>
    </section>


<?php include ('./inc/footer.inc.php'); ?>