<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc.php');  ?>   

      <h2 class="mb-3 bread text-center">Blog Articles</h2>

     <?php
//for pagination of the  list on the homepage
$getBlog = mysqli_query($con,"SELECT blog_id FROM blog WHERE approve='yes' ") or die (mysqli_error());

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
        
$get_Blog = mysqli_query($con,"SELECT * FROM blog WHERE approve='yes'
ORDER BY blog_id DESC LIMIT $row_start, $limit  ") or die (mysqli_error()); 


    


// $get_query = mysqli_query($con,"SELECT * FROM blog ORDER BY blog_id DESC");  ?>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Recent from blog</h2>
          </div>
        </div>
        <div class="row d-flex">



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

    //to count the number of comment per post
    $comment_count =  mysqli_query($con,"SELECT * FROM blog_comments WHERE blog_id = '$id' ");
    $comment_num = mysqli_num_rows($comment_count);             
                ?>

                 <?php if($id %2 != 0) :   ?>

          <div class="col-md-6 ftco-animate">
            <div class="blog-entry align-self-stretch d-flex">
              <a href="blog_page.php?blog_id=<?php echo $id; ?>" class="block-20 order-md-last" style=""> <img src="<?php echo $post_pix; ?>" alt="" >
              </a>
              <div class="text p-4 d-block">
              	<div class="meta mb-3">
                  <div><a href="blog_page.php?blog_id=<?php echo $id; ?>"><?php echo $date_added; ?></a></div>
                  <div><a href="blog_page.php?blog_id=<?php echo $id; ?>"><?php echo $added_by; ?></a></div>
                  <div><a href="blog_page.php?blog_id=<?php echo $id; ?>" class="meta-chat"><span class="icon-chat"></span> <?php echo $comment_num; ?></a></div>
                </div>
                <h3 class="heading mt-3"><a href="blog_page.php?blog_id=<?php echo $id; ?>"><?php echo substr($title,0,100); ?></a></h3>
                <p><?php echo substr($body,0,130); ?>... <a href="blog_page.php?blog_id=<?php echo $id; ?>">View More</a></p>

                <?php if(isset($_SESSION["admin_teacherx"])) : ?>
                                      <a href="blog_editdelete.php?blog_id=<?php echo $id; ?>" style="color:#c0392b;">Edit</a> | <a href="blog_editdelete.php?blog_id=<?php echo $id; ?>" style="color:#c0392b;">Delete</a>
                              
         <?php endif; ?>

              </div>
            </div>
          </div>
     		 <?php else :   ?>
          <div class="col-md-6 ftco-animate">
            <div class="blog-entry align-self-stretch d-flex">
              <a href="blog_page.php?blog_id=<?php echo $id; ?>" class="block-20" style=""><img src="<?php echo $post_pix; ?>" alt="">
              </a>
              <div class="text p-4 d-block">
              	<div class="meta mb-3">
                  <div><a href="blog_page.php?blog_id=<?php echo $id; ?>"><?php echo $date_added; ?></a></div>
                  <div><a href="blog_page.php?blog_id=<?php echo $id; ?>"><?php echo $added_by; ?></a></div>
                  <div><a href="blog_page.php?blog_id=<?php echo $id; ?>" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-3"><a href="blog_page.php?blog_id=<?php echo $id; ?>"><?php echo substr($title,0,100); ?></a></h3>
                <p><?php echo substr($body,0,130); ?>... <a href="blog_page.php?blog_id=<?php echo $id; ?>">View More</a></p>

                 <?php if(isset($_SESSION["admin_teacherx"])) : ?>
                                      <a href="blog_editdelete.php?blog_id=<?php echo $id; ?>" style="color:#c0392b;">Edit</a> | <a href="blog_editdelete.php?blog_id=<?php echo $id; ?>" style="color:#c0392b;">Delete</a>
                              
         <?php endif; ?>
              </div>
            </div>
          </div>
         <?php endif;   ?>             

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