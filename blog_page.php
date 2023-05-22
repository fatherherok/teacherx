<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc.php');  ?>   



    <h2 class="mb-3 bread text-center">Blog Articles</h2>

    <?php
 $blog_id = $_GET['blog_id'];
//this will make the og-graph work dynamically..............................................

$get_images = mysqli_query($con,"SELECT * FROM blog WHERE blog_id = '$blog_id' AND approve='yes' "); 
        
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
$gender = $result['gender']; 

if($gender == 'male'){
  $gender = 'He';
}else{
   $gender = 'She';
}

  if($pixd==''){
    $profilepixd = "img/b3.PNG";
    }
    else{
    $profilepixd = "uploads/thumbs/$pixd";
      }

	

       $time = time();
  $comment_query =  mysqli_query($con,"SELECT * FROM blog_comments WHERE blog_id = '$blog_id' ORDER BY id DESC");
  
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
                <h3><a href="<?php echo $added_by; ?>"><?php echo ucfirst($added_by); ?></a></h3>
                <p> <?php echo ucfirst($added_by); ?> (<?php echo ucfirst($fname); ?> <?php echo ucfirst($lname); ?>) is a <?php echo $subject_teach; ?> teacher. <?php echo $gender; ?> teaches mostly<?php echo $class_teach; ?></p> students. <?php echo $gender; ?> is from <?php echo $country; ?>.
              </div>
            </div>


            <div class="pt-5 mt-5">
              <h3 class="mb-5"><?php echo $comment_num; ?> Comments</h3>
              <ul class="comment-list">
          

          <?php while ($commentRow = mysqli_fetch_assoc($comment_query)) : ?>
<?php $commentBody = $commentRow ['comment'];
  $commentName = $commentRow ['name'];
  $commentDate = $commentRow ['date'];
  
  
  $diff = $time - $commentDate; // seconds
        $suffix = '';
        switch(1)
          {
            case($diff < 60):
            $count = $diff;
            if($count===0)
              $count = 'a moment';
            else if($count==1)
              $suffix = 'second';
            else
              $suffix  = 'seconds';
            break;  
            
            case($diff > 60 && $diff < 3600):
            $count = floor($diff/60) ;
             if($count==1)
              $suffix = 'minute';
            else
              $suffix  = 'minutes';
            break;  
            
            case($diff > 3600 && $diff < 86400):
            $count = floor($diff/3600) ;
             if($count==1)
              $suffix = 'hour';
            else
              $suffix  = 'hours';
            break;
            
            case($diff > 86400 && $diff < 2629743):
            $count = floor($diff/86400) ;

             if($count==1)
              $suffix = 'day';
            else
              $suffix  = 'days';
            break;
            
            case($diff > 2629743 && $diff < 31556926):
            $count = floor($diff/2629743) ;
             if($count==1)
              $suffix = 'month';
            else
              $suffix  = 'months';
            break;
            
            case($diff > 31556926):
            $count = floor($diff/31556926) ;
             if($count==1)
              $suffix = 'year';
            else
              $suffix  = 'years';
            break;
          }
  
  

   $query_prof = mysqli_query($con,"SELECT * FROM users WHERE username='$commentName' ");
    $res = mysqli_fetch_assoc($query_prof);
    $pixdc = $res['pix']; 


  if($pixdc==''){
    $profilepixdc = "img/b3.PNG";
    }
    else{
    $profilepixdc = "uploads/thumbs/$pixdc";
      }

  
  ?>

                <li class="comment">
                  <div class="vcard bio">
                    <img src="<?php echo $profilepixdc; ?>" alt="Image placeholder">
                  </div>
                  <div class="comment-body">
                    <h3><?php echo ucfirst($commentName); ?></h3>
                    <div class="meta"><?php echo $count.' '.$suffix; ?>  ago</div>
                    <p><?php echo $commentBody; ?></p>
                    
                  </div>
                </li>

                <?php endwhile; ?>     


              </ul>
              <!-- END comment-list -->

              <?php
              		if(isset($_POST['submit'])){
	$message = mysqli_real_escape_string($con,htmlentities(trim($_POST['message'])));

	 if($message){
	 mysqli_query($con,"INSERT INTO blog_comments VALUES('', '$message', '$username', '', '$blog_id', '$time') ");	
	// $successmsg = 'Your comment is successfully submitted';
	 header("Location: blog_page.php?blog_id=$blog_id");
	}else{

$errormsg = 'Please enter a message';

    }

}



              ?>
              
              <div class="comment-form-wrap pt-5">
                <h3 class="mb-5">Leave a comment</h3>
                <form action="blog_page.php?blog_id=<?php echo $blog_id; ?>" class="p-5 bg-light" method="post">

                	 										<?php if (isset($errormsg)) : ?>
                                                              <div class="error1"><?php echo $errormsg; ?></div>  
                                                         <?php endif; ?>
                                                         <?php if (isset($successmsg)) : ?>
                                                               <div class="success1"><?php echo $successmsg; ?></div> 
                                                        <?php endif; ?>
                 

                  <div class="form-group">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
                  </div>
                  <div class="form-group">
                    <input type="submit" value="Post Comment" class="btn py-3 px-4 btn-primary" name="submit"> 
                  </div>

                </form>
              </div>
            </div>

          </div> <!-- .col-md-8 -->
          <div class="col-md-4 sidebar ftco-animate">
            
            <div class="sidebar-box ftco-animate">
              <div class="categories">
                <h3>Categories</h3>
                <li><a href="blog-tag.php?tag=Teaching Methods">Teaching Methods</a></li>
                <li><a href="blog-tag.php?tag=Innovation">Innovation</a></li>
                <li><a href="blog-tag.php?tag=STEM">STEM</a></li>
                <li><a href="blog-tag.php?tag=Mathematics">Mathematics</a></li>
                <li><a href="blog-tag.php?tag=Languages">Languages</a></li>
                <li><a href="blog-tag.php?tag=Arts">Arts</a></li>
                <li><a href="blog-tag.php?tag=Teaching Resources">Teaching Resources</a></li>
                <li><a href="blog-tag.php?tag=Technology">Technology</a></li>
                <li><a href="blog-tag.php?tag=Students">Students</a></li>
                <li><a href="blog-tag.php?tag=Parents">Parents</a></li>
                <li><a href="blog-tag.php?tag=Policy">Policy</a></li>
                <li><a href="blog-tag.php?tag=Assessment">Assessment</a></li>
                <li><a href="blog-tag.php?tag=Training">Training</a></li>
                <li><a href="blog-tag.php?tag=Writing">Writing</a></li>
              </div>
            </div>


             <?php $queryp = mysqli_query($con,"SELECT * FROM blog WHERE approve='yes' ORDER BY blog_id DESC LIMIT 10") or die(mysqli_error());  ?>
            <div class="sidebar-box ftco-animate">
              <h3>Recent Blog</h3>

               <?php while($rowp = mysqli_fetch_assoc($queryp)) : ?>
                <?php
                  


                   $idp = $rowp['blog_id'];
                $titlep = $rowp['blog_title'];
                $bodyp = htmlspecialchars_decode($rowp['blog_body']);
                $added_byp = $rowp['added_by'];
                $date_addedp = $rowp['date'];
                 $post_pixp = $rowp['blogpix'];
               

             



                if($post_pixp == ''){
                    $post_pixp = 'img/blog.jpg';
                    }else{
                    $post_pixp = 'uploads_blog/thumbs/'.$post_pixp;
                        }

                        //to count the number of comment per post
    $comment_countp =  mysqli_query($con,"SELECT * FROM blog_comments WHERE blog_id = '$idp' ");
    $comment_nump = mysqli_num_rows($comment_countp);      
                ?>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="<?php echo $date_addedp; ?>"></a>
                <div class="text">
                  <h3 class="heading"><a href="blog_page.php?blog_id=<?php echo $idp; ?>"><?php echo strtolower(substr($titlep,0,100)); ?></a></h3>
                  <div class="meta">
                    <div><a href="blog_page.php?blog_id=<?php echo $idp; ?>"><span class="icon-calendar"></span> <?php echo $date_addedp; ?></a></div>
                    <div><a href="blog_page.php?blog_id=<?php echo $idp; ?>"><span class="icon-person"></span> <?php echo ucfirst($added_byp); ?></a></div>
                    <div><a href="blog_page.php?blog_id=<?php echo $idp; ?>"><span class="icon-chat"></span> <?php echo $comment_nump; ?></a></div>
                  </div>
                </div>
              </div>
              	<?php endwhile; ?>
             
            </div>

            
            
          </div>

        </div>
      </div>
    </section> <!-- .section -->


   <?php include ('./inc/footer.inc.php');  ?> 