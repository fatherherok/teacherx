<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc.php');  ?>   


       <h2 class="mb-3 bread text-center">Oppotunities</h2>


    <?php
 $id = $_GET['id'];
//this will make the og-graph work dynamically..............................................

$get_images = mysqli_query($con,"SELECT * FROM opportunity WHERE id = '$id' "); 
        
$rowG = mysqli_fetch_assoc($get_images);
                $ext = $rowG['ext'];
                $post = htmlspecialchars_decode($rowG['body']);
                $post_pix = $rowG['blogpix'];
                $title = $rowG['title'];
                $date_added = $rowG['date'];
                $added_by = $rowG['added_by'];
                
                
                $title = mysqli_real_escape_string($con,$title);

                $post = html_entity_decode($post);
                
                $page_title = $title;

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
        $page_url =  'https://www.teacherx.org/opportunity2.php?id='.$id;
    
    //the first if ends here................... 
    
    if($post_pix == ''){
                    $blog_pix = 'img/blog.jpg';
                    }else{
                    $blog_pix = 'uploads_blog/thumbs/'.$post_pix;
                        }
    

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
            
            
            
            <div class="about-author d-flex p-5 bg-light">
              <div class="bio align-self-md-center mr-5">
                <img src="<?php echo $profilepixd; ?>" alt="Image placeholder" class="img-fluid mb-4 rounded-circle">
              </div>
              <div class="desc align-self-md-center">
                <h3><?php echo ucfirst($added_by); ?></h3>
              
              </div>
            </div>


           

          </div> <!-- .col-md-8 -->
          <div class="col-md-4 sidebar ftco-animate">
            
            

             <?php $queryp = mysqli_query($con,"SELECT * FROM opportunity  ORDER BY id DESC LIMIT 10") or die(mysqli_error());  ?>
            <div class="sidebar-box ftco-animate">
              <h3>Recent Opportunities and Vacancies</h3>

               <?php while($rowp = mysqli_fetch_assoc($queryp)) : ?>
                <?php
                  


                   $idp = $rowp['id'];
                $titlep = $rowp['title'];
                $bodyp = htmlspecialchars_decode($rowp['body']);
                $added_byp = $rowp['added_by'];
                $date_addedp = $rowp['date'];
                 $post_pixp = $rowp['blogpix'];
               

             



                if($post_pixp == ''){
                    $post_pixp = 'img/blog.jpg';
                    }else{
                    $post_pixp = 'uploads_blog/thumbs/'.$post_pixp;
                        }

                        //to count the number of comment per post
    
                ?>
              <div class="block-21 mb-4 d-flex">
                <a class="blog-img mr-4" style="<?php echo $date_addedp; ?>"></a>
                <div class="text">
                  <h3 class="heading"><a href="#"><?php echo strtolower(substr($titlep,0,100)); ?></a></h3>
                  <div class="meta">
                    <div><a href="#"><span class="icon-calendar"></span> <?php echo $date_addedp; ?></a></div>
                    <div><a href="#"><span class="icon-person"></span> <?php echo ucfirst($added_byp); ?></a></div>
                  
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