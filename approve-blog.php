<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc.php'); 
if(!isset($_SESSION["admin_teacherx"] )){

  header('Location: index.php');
  exit();
}

 ?>   



    <h2 class="mb-3 bread text-center">Approve Blog</h2>
 
 <section class="ftco-section">
    	<div class="container">
    		<div class="row d-flex">
                
    			
    		
    	<?php
//for pagination of the  list on the homepage
$getBlog = mysqli_query($con,"SELECT blog_id FROM blog WHERE approve='no' ") or die (mysqli_error());

$total = mysqli_num_rows($getBlog);

$limit =(isset($_GET['limit'])) ? (int)$_GET['limit'] : 8;
$page =(isset($_GET['page'])) ? (int)$_GET['page'] : 1;
(int)$link = 2;
$row_start = (($page - 1) * $limit);
(int)$limit = 8;
//$page = 1;

$last = ceil($total / $limit);

$start = (($page - $link) > 0) ? $page - $link : 1;
$end = (($page + $link) < $last) ? $page + $link : $last;       
        
$get_Blog = mysqli_query($con,"SELECT * FROM blog WHERE approve='no'
ORDER BY blog_id DESC LIMIT $row_start, $limit  ") or die (mysqli_error()); 


    


// $get_query = mysqli_query($con,"SELECT * FROM blog ORDER BY blog_id DESC");  ?>

            
              <?php while($row=mysqli_fetch_array($get_Blog)) : ?>
                <?php 
                
                $id = $row['blog_id'];
                $title = $row['blog_title'];
                $body = htmlspecialchars_decode($row['blog_body']);
                $added_by = $row['added_by'];
                $date_added = $row['date'];
                 $post_pix = $row['blogpix'];
                $ext = $row['ext'];

                $body = html_entity_decode($body);

          
  
                
                if($post_pix == ''){
                    $post_pix = 'img/blog.jpg';
                    }else{
                    $post_pix = 'uploads_blog/thumbs/'.$post_pix;
                        }

          
                ?>


                    <div class="col-lg-4  ftco-animate">
                    <div class=" d-md-flex" style=" bordeR: 1px solid #d0e5fb; margin-bottom: 20px;">
                        
                        <div class="text p-4">
                            <h3><a href="approve-blog2.php?id=<?php echo $id; ?>"><?php echo strtolower(substr($title,0,100)); ?></a></h3>
                            
                            <p><?php echo substr($body,0,200); ?>...</p>
                            
                            <p><a href="approve-blog2.php?id=<?php echo $id; ?>" class="btn btn-primary" style="background-color: #b81e1e; border: 1px solid #b81e1e">Read more to approve/reject</a></p>
                        </div>
                    </div>
                </div>
                  <?php endwhile;   ?>



    		</div>





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
    </section>

   

   


   <?php include ('./inc/footer.inc.php');  ?> 