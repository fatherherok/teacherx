<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc.php');  ?>   



<h2 class="mb-3 bread text-center">Approve or Reject Posts</h2>



    <?php
 $blog_id = $_GET['id'];
//this will make the og-graph work dynamically..............................................

$get_images = mysqli_query($con,"SELECT * FROM blog WHERE blog_id = '$blog_id' AND approve='no' "); 
        
$rowG = mysqli_fetch_assoc($get_images);
                $ext = $rowG['ext'];
                $post = htmlspecialchars_decode($rowG['blog_body']);
                $post_pix = $rowG['blogpix'];
                $title = $rowG['blog_title'];
                $date_added = $rowG['date'];
                $added_by = $rowG['added_by'];
                $tags = $rowG['tags'];
                
                $blog_title = mysqli_real_escape_string($con,$title);

                $post = html_entity_decode($post);
                
                $page_title = $blog_title;

                   $post = nl2br($post);   

    if($post_pix != ''){
        $page_image = 'uploads_blog/album/'.$post_pix;
        }
        else{
            $page_image = 'img/blog.jpg'; 
            }

            if($post_pix == ''){
                    $post_pix = 'img/blog.jpg';
                    }else{
                    $post_pix = 'uploads_blog/album/'.$post_pix;
                        }
    
        $page_desc = strip_tags(substr($post,0,255));
        
        
        
        function strip_tags_content($page_desc, $tags = '', $invert = FALSE) { 

  preg_match_all('/<(.+?)[\s]*\/?[\s]*>/si', trim($tags), $tags); 
  $tags = array_unique($tags[1]); 
    
  if(is_array($tags) AND count($tags) > 0) { 
    if($invert == FALSE) { 
      return preg_replace('@<(?!(?:'. implode('|', $tags) .')\b)(\w+)\b.*?>.*?</\1>@si', '', $page_desc); 
    } 
    else { 
      return preg_replace('@<('. implode('|', $tags) .')\b.*?>.*?</\1>@si', '', $page_desc); 
    } 
  } 
  elseif($invert == FALSE) { 
    return preg_replace('@<(\w+)\b.*?>.*?</\1>@si', '', $page_desc); 
  } 
  return $page_desc; 
} 
        
        
        
        
        $page_ogtitle = substr($title,0,255);;
        $page_url =  'https://www.teacherx.org/blog_page.php?blog_id='.$blog_id;
    
    //the first if ends here................... 
    
    if($post_pix == ''){
                    $blog_pix = 'img/blog.jpg';
                    }else{
                    $blog_pix = 'uploads_blog/thumbs/'.$post_pix;
                        }
    
//...............................................................................
//to count the number of comment per post
    $comment_count =  mysqli_query($con,"SELECT * FROM blog_comments WHERE blog_id = '$blog_id' ");
    $comment_num = mysqli_num_rows($comment_count);
?>    


	 <section class="ftco-section ftco-degree-bg">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ftco-animate">



            <?php
               if(isset($_POST['approve'])){

                mysqli_query($con, "UPDATE blog SET approve='yes' WHERE blog_id = '$blog_id' ") or die(mysqli_error());
                  $successmsg = 'Blog post was approved';

                }

                 if(isset($_POST['reject'])){

                mysqli_query($con, "UPDATE blog SET approve='reject' WHERE blog_id = '$blog_id' ") or die(mysqli_error());
                  $successmsg = 'Blog post was rejected';

                }

            ?>

                                                      <?php if (isset($errormsg)) : ?>
                                                              <div class="error1"><?php echo $errormsg; ?></div>  
                                                         <?php endif; ?>
                                                         <?php if (isset($successmsg)) : ?>
                                                               <div class="success1"><?php echo $successmsg; ?></div> 
                                                        <?php endif; ?>








            
            <h2 class="mb-3"><?php echo ucwords($title) ?></h2>
            <p>
              <img src="<?php echo $post_pix; ?>" alt="" class="img-fluid">
            </p>
            <p><?php echo $post; ?></p>
            
           
            <?php
          
	 $tags_explode = explode(",",$tags);

	  $tags_count = count($tags_explode);

		 $query_profile = mysqli_query($con,"SELECT * FROM users WHERE username='$added_by' ");
    $result = mysqli_fetch_assoc($query_profile);
    $pixd = $result['pix']; 
$subject_teach = $result['subject']; 
$class_teach = $result['class']; 
$country = $result['country']; 
$fname = $result['fname']; 
$lname = $result['lname']; 

  if($pixd==''){
    $profilepixd = "img/b3.PNG";
    }
    else{
    $profilepixd = "uploads/thumbs/$pixd";
      }

	
            ?>
            
            <div class="tag-widget post-tag-container mb-5 mt-5">
              <div class="tagcloud">

              <?php for($x = 0; $x < $tags_count; $x++) : ?>
                <a href="blog-tag.php?tag=<?php echo $tags_explode[$x]; ?>" class="tag-cloud-link"><?php echo $tags_explode[$x]; ?></a>
              <?php endfor; ?>
                
              </div>
            </div>
            
            <div class="about-author d-flex p-5 bg-light">
              <div class="bio align-self-md-center mr-5">
                <img src="<?php echo $profilepixd; ?>" alt="Image placeholder" class="img-fluid mb-4 rounded-circle">
              </div>
              <div class="desc align-self-md-center">
                <h3><?php echo ucfirst($added_by); ?></h3>
                <p> <?php echo ucfirst($added_by); ?> (<?php echo ucfirst($fname); ?> <?php echo ucfirst($lname); ?>) is a <?php echo $subject_teach; ?> teacher. She teaches mostly<?php echo $class_teach; ?></p> students. She is from <?php echo $country; ?>.
              </div>

               
               
            </div>


            

            <form method="post" action="">

             <div style="margin-top: 20px; padding: 10px;"><button type="submit" name="approve" class="btn btn-success">Approve post</button> <button type="submit" name="reject" class="btn btn-danger" style="margin-left: 20px;">Reject post</button></div>
              </form>


          </div> <!-- .col-md-8 -->
          <div class="col-md-4 sidebar ftco-animate">
>

            
            
          </div>

        </div>
      </div>
    </section> <!-- .section -->


   <?php include ('./inc/footer.inc.php');  ?> 