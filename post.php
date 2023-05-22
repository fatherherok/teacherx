<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc2.php');
$get_id = $_GET['post_id'];
mysqli_query($con,"UPDATE posts SET views = views+1 WHERE post_id='$get_id' "); 
  ?>   

  <main>
			<div class="main-section">
				<div class="container">
					<div class="main-section-data">
						<div class="row">
							<div class="col-lg-3 col-md-4 pd-left-none no-pd d-none d-sm-block">
									<div class="main-left-sidebar no-margin">
									<div class="user-data full-width">
										<div class="user-profile">
											<div class="username-dt">
												<div class="usr-pic">
													<img src="<?php echo  $profilepixd; ?>" alt="">
												</div>
											</div><!--username-dt end-->
											<div class="user-specs">
												<h3><?php echo  $username; ?></h3>
												<span><?php echo  $subject_teach; ?></span>
											</div>
										</div><!--user-profile end-->
										<ul class="user-fw-status">
											<li>
												<h4><a href="following.php?user=<?php echo $username; ?>">Following</a></h4>
												<span class="fetch_following"></span>
											</li>
											<li>
												<h4><a href="follower.php?user=<?php echo $username; ?>">Followers</a></h4>
												<span class="fetch_follower">0</span>
											</li>
											
										</ul>
									</div><!--user-data end-->


									<?php
												$getclass = mysqli_query($con,"SELECT * FROM users WHERE class='$class_teach' AND username != '$username' ORDER BY rand() DESC LIMIT 6") or die (mysqli_error());
										?>

										



									<div class="suggestions full-width">
										<div class="sd-title">
											<h3><?php echo $class_teach; ?> Teachers </h3>
											<i class="la la-ellipsis-v"></i>
										</div><!--sd-title end-->
										<div class="suggestions-list">


											<?php while($rowclass = mysqli_fetch_assoc($getclass)) : ?>
										<?php 
										$teacherC_username = $rowclass['username'];
										$teacherC_class = $rowclass['class'];
										$teacherC_subject = $rowclass['subject'];
										$teacherC_pix = $rowclass['pix'];
										$teacherC_id = $rowclass['user_id'];
										if($teacherC_pix == ""){
			
												$teacherC_pix = "img/b3.PNG";
													
													}
												else{
													$teacherC_pix = 'uploads/thumbs/'.$teacherC_pix;
													}
										?>

										 <?php

											                 $follow = $username;  
											          $being_follow = $teacherC_username;
											                     // this is to count the number of follwers 
											  $check_if_follow = mysqli_query($con,"SELECT * FROM follow WHERE following='$follow' AND being_followed='$teacherC_username' ");    
											            $countrow = mysqli_num_rows($check_if_follow);

											                  ?>

											        <script type="text/javascript">
											        	$(document).on('click', '.follows1<?php echo $teacherC_id ?>', function() {

                           
                                var being_follow = '<?php echo $teacherC_username ?>';
                                var action = 'follow';
                                
                                $.ajax({
                                            url:"ajax/follow_unfollow.php",
                                            method:"POST",
                                            data:{action:action,being_follow:being_follow},
                                            success:function(data){
                                            
                                              
                                              
                                             $("#follows1<?php echo $teacherC_id ?>").attr("class", " unfollow1<?php echo $teacherC_id ?>");
                                             
                                              // $(".thumbfollow").css({'color':'#b81e1e'});
                                               $("#follows1<?php echo $teacherC_id ?>").html('<span><i class="la la-minus"></i></span>');
                                               $("#follows1<?php echo $teacherC_id ?>").attr("id", "unfollow1<?php echo $teacherC_id ?>");
                                               
                                              }
                                          });

                                });


									    //to check the game of the user block...........
									    $(document).on('click', '.unfollow1<?php echo $teacherC_id ?>', function() {

                           
                                var being_follow = '<?php echo $teacherC_username ?>';
                                var action = 'unfollow';
                              

                                $.ajax({
                                            url:"ajax/follow_unfollow.php",
                                            method:"POST",
                                           data:{action:action,being_follow:being_follow},
                                            success:function(data){

                                        
                                             $("#unfollow1<?php echo $teacherC_id ?>").attr("class", " follows1<?php echo $teacherC_id ?>");
                                             
                                              $("#unfollow1<?php echo $teacherC_id ?>").html('<span><i class="la la-plus"></i></span>');
                                               $("#unfollow1<?php echo $teacherC_id ?>").attr("id", "follows1<?php echo $teacherC_id ?>");
                                                
                                           
                                               
                                              }
                                          });

                                });
											        </script>


											<div class="suggestion-usd">
												<img src="<?php echo $teacherC_pix; ?>" alt="" height="40" width="40">
												<div class="sgt-text">
													<h4><?php echo ucfirst($teacherC_username); ?></h4>
													<span><?php echo $teacherC_subject; ?></span>
												</div>

												


												<?php if($countrow > 0) : ?>
									              <span class=" unfollow1<?php echo $teacherC_id ?>" id="unfollow1<?php echo $teacherC_id ?>"><i class="la la-minus"></i></span>
									                    <?php else : ?>
									             <span class=" follows1<?php echo $teacherC_id ?>" id="follows1<?php echo $teacherC_id ?>"><i class="la la-plus"></i></span>
                  								<?php endif; ?>



											</div>
											<?php endwhile; ?>
											
											
											<div class="view-more">
												<!-- <a href="<?php echo $username; ?>" title="">View More</a> -->
											</div>
										</div><!--suggestions-list end-->
									</div><!--suggestions end-->
									<div class="tags-sec full-width">
										<ul>
											<li><a href="#" title="">Help Center</a></li>
											<li><a href="#" title="">About</a></li>
											<li><a href="#" title="">Privacy Policy</a></li>
											<li><a href="#" title="">Community Guidelines</a></li>
											<li><a href="#" title="">Cookies Policy</a></li>
											<li><a href="#" title="">Copyright Policy</a></li>
										</ul>
										<div style="text-align: center;">
											
											<p><img src="img/logo.jpg" alt="Image" ></p>
										</div>
									</div><!--tags-sec end-->
								</div><!--main-left-sidebar end-->
							</div>



<?php

			$get_query = mysqli_query($con,"SELECT * FROM posts 
			LEFT JOIN users
			ON posts.added_by = users.username
			 WHERE post_id = '$get_id'  ");
            
            
            
			$row=mysqli_fetch_array($get_query);
				
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
				$email_poster = $row['email'];


				$profilepix = $row['pix'];
		   
  				 $body_soc = nl2br($body_soc);   

  				 $body_email = substr($body_soc,0,255);
				 
				 
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

			
	//getting comments starts here 
	 $get_comment_query = mysqli_query($con,"SELECT * FROM post_comments WHERE post_id='$id' ORDER BY id DESC ");
	 $numb_comment = mysqli_num_rows($get_comment_query);
	while($comment_row = mysqli_fetch_assoc($get_comment_query)){
	$comment_body = html_entity_decode($comment_row["comment_body"]);
	$posted_by = $comment_row['posted_by'];
	$posted_to = $comment_row['posted_to'];
	}

 







$time = time();
//this is going to make the profile form works

$comment_to = $added_by_soc;
if(isset($_POST['post'])){
	
	
	$image_name = $_FILES['image']['name'];
	$image_size = $_FILES['image']['size'];
	$image_temp = $_FILES['image']['tmp_name'];

	$allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
	$image_ext = strtolower(end(explode('.', $image_name))); //strtolower becasue file ext names can be capitalized
	// explode function will separate the values from the dot, and the end function will select the last value e.g photo . jpeg
	$max_size = 9000000;
	
	/*	
	if($image_size >= $max_size || $image_size == 0){
			$errorpost = 'file size must not exceed 9MB';
			}					
		*/
	$url = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i'; 
	$post = @mysqli_real_escape_string($con,htmlentities(trim($_POST['post'])));
	$post = preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>', $post);
			
 //posted by whoever is logged in to send the message
	
	
		
	 if($image_size === 0){
	  if(empty($post)){	  
		$errorpost = 'You have not entered a post';	  
		}
		else{
			
$query_form = mysqli_query($con,"INSERT INTO post_comments VALUES('', '$post', '$username', '$comment_to', 'unread', '$get_id', '$time', '')")
		or die(mysqli_error());				
	header('Location: '.$_SERVER['HTTP_REFERER']);
		}
	  }
	  else{
		  if(in_array($image_ext , $allowed_ext) === false){
			 $errorpost = 'file type not allowed';
			}
			
		else if(($image_size >= $max_size) === true){
			$errorpost = 'file must not exceed 9MB';
			}
//................................
else if(isset($_POST['post'])){
		
	$url = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i'; 
		$post = @mysqli_real_escape_string($con,htmlentities(trim($_POST['post'])));
		$post = preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>', $post);
		
		$added_by = $username; //posted by whoever is logged in to send the message
				
		
	 $image_file = $image_name;

	$postpix = "$image_file";
	$query_form = mysqli_query($con,"INSERT INTO post_comments VALUES('', '$post', '$username', '$comment_to', 'unread', '$get_id', '$time', '$postpix')")

		or die(mysqli_error());		



 //now send email to the user
  $user = ucfirst($added_by_soc);

 $comment_by = ucfirst($posted_by);

$url = '<a href="post.php?post_id=<?php echo $id; ?>" title=""> View Post</a>';

$body = '<div class="email-background" style="background: #eee;padding: 10px; ">
          
            <div class="email-container" style="max-width: 600px;background: white; color: black; font-family: Tahoma, Geneva, sans-serif;margin: 0 auto;overflow: hidden;border-radius: 5px; padding: 20px;">
              <div style="text-align: center;"><img src="https://www.teacherx.org/img/logo.jpg" style="max-width: 100%;"></div>';
       $body .= <<<EOD
<br>
Comment to you, <strong>$user</strong>,<br><br>

$comment_by just commented on your post <br><br>
$body_email <br><br>
"$comment_body"<br><br>

$url<br><br>

This message is being sent to $email_poster<br><br>

SUPPORT: <br>
For any support with respect to your relationship with us, you can always contact us on info@teacherx.org<br><br>

If you are not $user and you receive this message by mistake, kindly discard this message.<br><br>

TeacherX Project Team.

EOD;

    $body .= '</div>';   

   
    
  $subject = "$comment_by commented on your post";

//echo '->'.mail($email_owner, $subject, $body, $headers);

  

  $from = "TeacherX <info@teacherx.org>";
$to = $email_poster;



$headers = "FROM: $from\r\n";
    $headers .= "Content-type: text/html\r\n";
    
      mail($to, $subject, $body, $headers);


//email ends here...........................  












	header('Location: '.$_SERVER['HTTP_REFERER']);
		}
	  }
//to process the form ends here
}//if not a user
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







var limit = 7; //The number of records to display per request
 var start = 1; //The starting pointer of the data
 var action = 'inactive'; //Check if current action is going on or not. If not then inactive otherwise active
 function load_post_data(limit, start)
 {
  $.ajax({
   url:"ajax/load_comments.php",
   method:"POST",
   data:{limit:limit, start:start},
   cache:false,
   success:function(data)
   {
    $('#load_data').append(data);
    if(data == 0)
    {
     $('#load_data_message').html('<div class="process-comm"><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>');
     action = 'active';
    }
    else
    {
     $('#load_data_message').html('<div class="process-comm"><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>');
     action = 'inactive';
    }
    
   }
  });
 }


if(action == 'inactive')
 {
  action = 'active';
  load_post_data(limit, start);
 }


$(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_post_data(limit, start);
   }, 1000);
  }
 });

//this will make the read more details work
$(document).ready(function(e) {
            $('.read_more').click(function() {
				var image_id = $(this).attr("id"); 
					$.ajax({
							url:"ajax/image.php",
							method:"post",
							data:{image_id:image_id},
							success: function(data){
									$('#read_more').html(data);
									 $('#datamodal').modal("show");
								}
						});        
            });
        });






//.......................................
//this is input button for the post work
$(document).ready(function() {
          $(".input-button").on("change", function(e){  
			  var files = $(this)[0].files;
			  if(files.length == 1){
				  var filename = e.target.value.split('\\').pop();
				 // $(".fa_respond").text(filename);
				  }
			  
			  });
        });
//.......................................
//this is for the show little image of the image post to be posted work

$(document).ready(function(){
 $(document).on('change', '#image', function(){
  var name = document.getElementById("image").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("image").files[0]);
  var f = document.getElementById("image").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 9000000)
  {
   alert("Image File Size must not exceed 9MB");
  }
  else
  {
   form_data.append("image", document.getElementById('image').files[0]);
   $.ajax({
    url:"ajax/upload.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
     $('#uploaded_image').html(data); 
	 }
   });
  }
 });
 
 
 $(document).on('click', '#remove_button', function(){  
           if(confirm("Are you sure you want to remove this image?"))  
           {  
                var path = $('#remove_button').data("path");  
                $.ajax({  
                     url:"ajax/delete_path.php",  
                     type:"POST",  
                     data:{path:path},  
                     success:function(data){  
                          if(data != '')  
                          {  
                               $('#uploaded_image').html('');  
                          }  
                     }  
                });  
           }  
           else  
           {  
                return false;  
           }  
      });  
 
 
});


//.......................................
//this will make the read more or show more posts works




		

</script>






							<div class="col-lg-6 col-md-8 no-pd">


									<?php if (isset($errorpost)) : ?>
									 <div class="error1"><?php echo $errorpost; ?></div>
									 <?php endif; ?>

								<div class="main-ws-sec">
									
									<div class="posts-section">
										
										

										<div class="posty">
											<div class="post-bar no-margin">


												<div class="post_topbar">
													<div class="usy-dt">
														<a href="<?php echo $added_by_soc; ?>"><img src="<?php echo $profilepix; ?>" alt="" class="img-fluid" height="50" width="50"></a>
														<div class="usy-name">
															<h3><a href="<?php echo $added_by_soc; ?>"><?php echo ucfirst($added_by_soc); ?></a></h3>
															<span><img src="images/clock.png" alt=""><?php echo  $count.' '.$suffix.' ago'; ?></span>
														</div>
													</div>
													<div class="ed-opts">
														<a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
														<ul class="ed-options">
															<li><a href="#" title="">Edit Post</a></li>
															<li><a href="#" title="">Unsaved</a></li>
															<li><a href="#" title="">Unbid</a></li>
															<li><a href="#" title="">Close</a></li>
															<li><a href="#" title="">Hide</a></li>
														</ul>
													</div>
												</div>
												<div class="epi-sec">
													<ul class="descp">
														<li><img src="images/icon8.png" alt=""><span><?php echo $subject; ?></span></li>
														<li><img src="images/icon9.png" alt=""><span><?php echo $country; ?></span></li>
													</ul>
													<ul class="bk-links">
														<li><a href="#" title=""><i class="la la-bookmark"></i></a></li>
														<li><a href="#" title=""><i class="la la-envelope"></i></a></li>
													</ul>
												</div>
												<div class="job_descp">
													<h3><?php echo $class; ?></h3>
													
													<p><?php echo $body_soc; ?></p>
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
													
														<li><a href="#" class="com"><i class="fas fa-comment-alt"></i> Comment <?php echo $numb_comment; ?></a></li>
													</ul>
													<a href="#"><i class="fas fa-eye"></i>Views <?php echo $views; ?></a>
												</div>
											</div><!--post-bar end-->


											<div class="comment-section">
<?php
			
			$get_comment = mysqli_query($con,"SELECT * FROM post_comments 
			LEFT JOIN users
			ON post_comments.posted_by = users.username
			 WHERE post_comments.post_id = '$get_id' 		
			ORDER BY post_comments.time DESC  "); ?>
            
            
            
			<?php while($rowc=mysqli_fetch_array($get_comment)) : ?>
				<?php 
				
				$comm_id = $rowc['id'];


				$cbody_soc = html_entity_decode($rowc["comment_body"]);


				$cadded_by_soc = $rowc['posted_by'];
				$cuser_posted_to_soc = $rowc['posted_to'];
				$cdate_added_soc = $rowc['time'];
			
				$cpost_pix = $rowc['postpix'];
			 	

				$cprofilepix = $rowc['pix'];
		   
  				 $cbody_soc = nl2br($cbody_soc);   
				 
				 
				 // to get info of the users (profile pix)
 
		
		if($cprofilepix == ""){
			
		$cprofilepix = "img/b3.PNG";
			
			}
		else{
			$cprofilepix = 'uploads/thumbs/'.$cprofilepix;
			}
	//to dispaly profile pix of poster
				 
  
				
				$cdiff = $time - $cdate_added_soc; // seconds
				$csuffix = '';
				switch(1)
					{
						case($cdiff < 60):
						$ccount = $cdiff;
						if($ccount===0)
							$ccount = 'a moment';
						else if($ccount==1)
							$csuffix = 'second';
						else
							$csuffix  = 'seconds';
						break;	
						
						case($cdiff > 60 && $cdiff < 3600):
						$ccount = floor($cdiff/60) ;
						 if($ccount==1)
							$csuffix = 'minute';
						else
							$csuffix  = 'minutes';
						break;	
						
						case($cdiff > 3600 && $cdiff < 86400):
						$ccount = floor($cdiff/3600) ;
						 if($ccount==1)
							$csuffix = 'hour';
						else
							$csuffix  = 'hours';
						break;
						
						case($cdiff > 86400 && $cdiff < 2629743):
						$ccount = floor($cdiff/86400) ;

						 if($ccount==1)
							$csuffix = 'day';
						else
							$csuffix  = 'days';
						break;
						
						case($cdiff > 2629743 && $cdiff < 31556926):
						$ccount = floor($cdiff/2629743) ;
						 if($ccount==1)
							$csuffix = 'month';
						else
							$csuffix  = 'months';
						break;
						
						case($cdiff > 31556926):
						$ccount = floor($cdiff/31556926) ;
						 if($ccount==1)
							$csuffix = 'year';
						else
							$csuffix  = 'years';
						break;
					}
				?>
  






											
												
												<div class="comment-sec">
													<ul>
														<li>
															<div class="comment-list">
																
																<div class="comment">
																	<h3><?php echo ucfirst($cadded_by_soc); ?></h3> 
																	<span><img src="images/clock.png" alt=""> <small>commented</small> <?php echo  $ccount.' '.$csuffix.' ago'; ?></span>
																	<p><?php echo $cbody_soc; ?></p>
											<?php if($cpost_pix != '') : ?>
												<p><a href="uploads_post/album/<?php echo $cpost_pix; ?>" ><img src="uploads_post/album/<?php echo $cpost_pix; ?>" class="img-fluid" height="300"  alt="Added by <?php echo $cadded_by_soc; ?>" title="uploaded on <?php echo date('l, jS F h:iA' .$cadded_by_soc); ?>" style="width:100%"></a></p>
											<?php endif; ?>



																</div>
															</div><!--comment-list end-->
															
														</li>
														
													</ul>
												</div><!--comment-sec end-->


								<?php endwhile; ?> 









												<div class="post-comment">
													<div class="cm_img">
												<img src="<?php echo  $profilepixd; ?>" alt="" height="40" width="40" class="img-fluid rounded-circle" >
													</div>
													<div class="comment_box" >
														<form  role="form" method="post" enctype="multipart/form-data">
															<input type="text" placeholder="Post a comment"  name="post" id="post_box">
															<button type="submit">Send</button>
															<input type="file" name="image" id="image" class="input-button" style="display: none;"> 

															<span id="uploaded_image"></span>
															<label for="image" class=""><i class="la la-camera" style="font-size: 30px; margin-bottom: -15px; float: left; "></i> </label>   
														</form>
													</div>
												</div><!--post-comment end-->




											</div><!--comment-section end-->
											</div>

											


					
									</div><!--posts-section end-->
								</div><!--main-ws-sec end-->
							</div>
							<div class="col-lg-3 pd-right-none no-pd">
								<div class="right-sidebar">
									<div class="widget widget-about">
										<img src="img/logo.jpg" alt="Image" >
										<h3>What's New?</h3>
										<span>Get Latest Materials</span>
										<div class="sign_link">
											<h3><a href="#" title="">Get here</a></h3>
											<a href="courses.php" title="">Learn More</a>
										</div>
									</div><!--widget-about end-->

									<?php

										$getopp = mysqli_query($con,"SELECT * FROM opportunity ORDER BY id DESC LIMIT 10  ") or die (mysqli_error()); 
									?>


									<div class="widget widget-jobs">
										<div class="sd-title">
											<h3>Vacant Teaching jobs</h3>
											<i class="la la-ellipsis-v"></i>
										</div>
										<div class="jobs-list">


        	  <?php while($row=mysqli_fetch_array($getopp)) : ?>
                <?php 
                
                $id = $row['id'];
                $title = $row['title'];
                $body = htmlspecialchars_decode($row['body']);
                $date_added = $row['date'];

                ?>

											<div class="job-info">
												<div class="job-details">
													<h3><?php echo substr($title,0,100); ?></h3>
													<p><?php echo $date_added; ?></p>
												</div>
												<div class="hr-rate">
													<span><a href="opportunity2.php?id=<?php echo $id; ?>">Check</a></span>
												</div>
											</div><!--job-info end-->
										  <?php endwhile;   ?>	
											
											
										</div><!--jobs-list end-->
									</div><!--widget-jobs end-->

								<?php

								$get_Blog = mysqli_query($con,"SELECT * FROM blog WHERE approve='yes' ORDER BY blog_id DESC LIMIT 10  ") or die (mysqli_error()); 
								?>


									<div class="widget widget-jobs">
										<div class="sd-title">
											<h3>Popular Posts</h3>
											<i class="la la-ellipsis-v"></i>
										</div>
										<div class="jobs-list">

										<?php while($row=mysqli_fetch_array($get_Blog)) : ?>
                <?php 
                
                $id = $row['blog_id'];
                $title = $row['blog_title'];
                
                $added_by = $row['added_by'];
                $date_added = $row['date'];          
                ?>


											<div class="job-info">
												<div class="job-details">
													<h3><?php echo substr($title,0,100); ?></h3>
													<p><?php echo ucfirst($added_by); ?>.</p>
												</div>
												<div class="hr-rate">
													<span><a href="blog_page.php?blog_id=<?php echo $id; ?>">Read more</a></span>
												</div>
											</div><!--job-info end-->

								 <?php endwhile;   ?>	
											
										</div><!--jobs-list end-->
									</div><!--widget-jobs end-->


									<?php
								$gett = mysqli_query($con,"SELECT * FROM resources WHERE id = '$id' ") or die (mysqli_error()); 

									?>

									<div class="widget suggestions full-width">
										<div class="sd-title">
											<h3>Latest Resources Materials</h3>
											<i class="la la-ellipsis-v"></i>
										</div><!--sd-title end-->
										<div class="suggestions-list">

											<?php while($row=mysqli_fetch_array($gett)) : ?>

								 <?php 
                
                $id = $row['id'];
                $title = $row['title'];
              
                $cost = $row['cost'];
                $date = $row['date'];
                
                 

                if($cost == 0){
                	$cost = 'Free';
                }else{
                	$cost = '$'.number_format($cost);
                }

               ?>




											<div class="suggestion-usd">
												<img src="images/resources/s1.png" alt="">
												<div class="sgt-text">
													<h4><?php echo $title; ?></h4>
													<span>Cost: <?php echo $cost; ?></span>
												</div>
												<span><i class="fa fa-shopping-cart"></i></span>
											</div>
											 <?php endwhile;   ?>	
										
											<div class="view-more">
												<a href="resources.php" title="">View More</a>
											</div>
										</div><!--suggestions-list end-->
									</div>
								</div><!--right-sidebar end-->
							</div>
						</div>
					</div><!-- main-section-data end-->
				</div> 
			</div>
		</main>

 


   <?php include ('./inc/footer.inc2.php');  ?> 