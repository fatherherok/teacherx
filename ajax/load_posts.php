<?php session_start();
include ('./../inc/connect.inc.php'); ?>
<?php
$username = ''; 
  $user_id = '';

if(!isset($_SESSION["user"]) && isset($_COOKIE['user_log_in'])){
  //this is for normal user
  $_SESSION["user"] = $_COOKIE['user_log_in'];
  $username = $_SESSION["user"];
  $get_id = mysqli_query($con,"SELECT user_id FROM users WHERE username='$username' ");
  $rows = mysqli_fetch_assoc($get_id);
  $userid = $rows["user_id"]; 
    }
else{
  //this is for normal user
  $username = @$_SESSION["user"]; 
  $get_id = mysqli_query($con,"SELECT user_id FROM users WHERE username='$username' ");
  $rows = mysqli_fetch_assoc($get_id);
  $userid = $rows["user_id"];
  }


  $time = time();

?>

<?php if(isset($_POST["limit"], $_POST["start"])) : ?>
 
<?php
			
			$get_query = mysqli_query($con,"SELECT * FROM posts 
			LEFT JOIN users
			ON posts.added_by = users.username
			 WHERE posts.user_posted_to = '' OR posts.added_by = posts.user_posted_to			
			ORDER BY posts.date_added DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]." "); ?>
            
            
            
			<?php while($row=mysqli_fetch_array($get_query)) : ?>
				<?php 
				$likes = $row['post_likes'];
				$id = $row['post_id'];


				$body_soc = html_entity_decode($row["post_body"]);


				$added_by_soc = $row['added_by'];
				$user_posted_to_soc = $row['user_posted_to'];
				$date_added_soc = $row['date_added'];
				$likes = $row['post_likes'];
				$post_pix = $row['postpix'];
			 	$subject = $row['subject'];
				$country = $row['country'];
				$class = $row['class'];
				$views = $row['views'];


				$profilepix = $row['pix'];
		   
  				 $body_soc = nl2br($body_soc);   


  //youtube starts here..................
$width = '100%';
$height = '450px';
function getYoutubeEmbedUrl($string)
{
     $shortUrlRegex = '/youtu.be\/([a-zA-Z0-9_-]+)\??/i';
     $longUrlRegex = '/youtube.com\/((?:embed)|(?:watch))((?:\?v\=)|(?:\/))([a-zA-Z0-9_-]+)/i';

    if (preg_match($longUrlRegex, $string, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }

    if (preg_match($shortUrlRegex, $string, $matches)) {
        $youtube_id = $matches[count($matches) - 1];
    }
    return 'https://www.youtube.com/embed/' . $youtube_id ;
}

 $youtube_string = getYoutubeEmbedUrl($body_soc);

//youtube ends here..................
				 
				 
				 // to get info of the users (profile pix)
 
		
		if($profilepix == ""){
			
		$profilepix = "img/b3.PNG";
			
			}
		else{
			$profilepix = 'uploads/thumbs/'.$profilepix;
			}
	//to dispaly profile pix of poster
				 
  
				
				$diff = $time - $date_added_soc; // seconds
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
				?>
  <?php 
			
	//getting comments starts here 
	 $get_comment_query = mysqli_query($con,"SELECT * FROM post_comments WHERE post_id='$id' ORDER BY id DESC ");
	 $numb_comment = mysqli_num_rows($get_comment_query);
	while($comment_row = mysqli_fetch_assoc($get_comment_query)){
	$comment_body = html_entity_decode($comment_row["comment_body"]);
	$posted_by = $comment_row['posted_by'];
	$posted_to = $comment_row['posted_to'];
	}

  ?>


<script type="text/javascript">
	
 //to check the game of the user block...........
    $(document).on('click', '.like<?php echo $id ?>', function() {

                           
                                var id = <?php echo $id ?>;
                                var action = 'like';
                                
                                $.ajax({
                                            url:"ajax/like_unlike.php",
                                            method:"POST",
                                            data:{id:id,action:action},
                                            dataType:"json",
                                            success:function(data){
                                            
                                              
                                              $('.num_like<?php echo $id; ?>').html(data.like);  
                                             $(".like<?php echo $id ?>").attr("class", "unlike<?php echo $id ?>");
                                               $(".thumblike").css({'color':'#b81e1e'});

                                               
                                              }
                                          });

                                });


    //to check the game of the user block...........
    $(document).on('click', '.unlike<?php echo $id ?>', function() {

                           
                                var id = <?php echo $id ?>;
                                var action = 'unlike';
                              

                                $.ajax({
                                            url:"ajax/like_unlike.php",
                                            method:"POST",
                                            data:{id:id,action:action},
                                            dataType:"json",
                                            success:function(data){

                                              $('.num_like<?php echo $id; ?>').html(data.like);  
                                             $(".unlike<?php echo $id ?>").attr("class", "like<?php echo $id ?>");
                                               $(".thumblike").css({'color':''});
                                              
                                                
                                           
                                               
                                              }
                                          });

                                });


</script>


										<div class="post-bar">
											<div class="post_topbar">
												<div class="usy-dt">
													<a href="<?php echo $added_by_soc; ?>"><img src="<?php echo $profilepix; ?>" alt="" class="img-fluid" height="50" width="50"></a>
													<div class="usy-name">
														<h3><a href="<?php echo $added_by_soc; ?>"><?php echo ucfirst($added_by_soc); ?></a></h3>
														<span><img src="images/clock.png" alt=""><?php echo  $count.' '.$suffix.' ago'; ?></span>
													</div>
												</div>
												<?php if($added_by_soc == $username) : ?>
												<div class="ed-opts">
													<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
													<ul class="ed-options">
														<li><a href="javascript:;" id="<?php echo $id ?>" title="" class="edit_post">Edit Post</a></li>
														<li><a href="javascript:;" id="<?php echo $id ?>" title="" class="delete_post">Delete Post</a></li>
														
													</ul>
												</div>
												<?php endif; ?>
											</div>
											<div class="epi-sec">
												<ul class="descp">
													<li><img src="images/icon8.png" alt=""><span><?php echo $subject; ?></span></li>
													<li><img src="images/icon9.png" alt=""><span><?php echo $country; ?></span></li>
												</ul>
												<ul class="bk-links">
													<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
													<li><a href="<?php echo $added_by_soc; ?>" title=""><i class="la la-envelope"></i></a></li>
												</ul>
												
											</div>
											<div class="job_descp" style="">
												<h3><?php echo $class; ?></h3>
												
												<p><?php echo substr($body_soc,0,255); ?>

														<?php if (strlen($body_soc) > 255): ?>
														...<a href="post.php?post_id=<?php echo $id; ?>" title="">view more</a>
														<?php endif; ?>


														<?php if($youtube_string != '') : ?>
<iframe id="ytplayer" type="text/html" width="<?php echo $width ?>" height="<?php echo $height ?>"
src="<?php echo $youtube_string ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
frameborder="0" allowfullscreen></iframe>

														<?php endif; ?>



												</p>
												
												<?php if($post_pix != '') : ?>
												<p><a href="uploads_post/album/<?php echo $post_pix; ?>" ><img src="uploads_post/album/<?php echo $post_pix; ?>" class="img-fluid" height="300"  alt="Added by <?php echo $added_by_soc; ?>" title="uploaded on <?php echo date('l, jS F h:iA' .$added_by_soc); ?>" style="width:100%"></a></p>
											<?php endif; ?>

										
												<ul class="skill-tags">
														
												</ul>
											
											</div>
											<div class="job-status-bar">
												<ul class="like-com">
													<li>
														



									<?php
											$query_like = mysqli_query($con,"SELECT * FROM likes WHERE post_id = '$id' AND like_by = '$username'");
											$rowlike = mysqli_fetch_assoc($query_like);
											$countlike = mysqli_num_rows($query_like);

									?>

									<?php if($countlike > 0) : ?>
										<a href="javascript:;" class="unlike<?php echo $id; ?>"><i class="fa fa-thumbs-up thumblike"  style="color:#b81e1e"></i> Like</a>
									<?php else : ?>
										<a href="javascript:;" class="like<?php echo $id; ?>"><i class="fa fa-thumbs-up thumblike" style=""></i> Like</a>
									<?php endif; ?>			
														<span style="margin: auto;" class="num_like<?php echo $id; ?>"><?php echo $likes; ?></span>
													</li> 
													<li><a href="post.php?post_id=<?php echo $id; ?>" class="com"><i class="fas fa-comment-alt"></i> Comment <?php echo $numb_comment; ?></a></li>
												</ul>
												<a href="post.php?post_id=<?php echo $id; ?>"><i class="fas fa-eye"></i>Views <?php echo $views; ?></a>
											</div>
										</div><!--post-bar end-->
   
    	<?php endwhile; ?> 
       
      <?php endif; ?>