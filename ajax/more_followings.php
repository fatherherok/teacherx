<?php session_start();
include ('./../inc/connect.inc.php');
?>
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
$time = time();
//user is now the owner of the profile that was formrly usernameP
$user = mysqli_real_escape_string($con,$_POST['user']); 


//to query out users following

$query = mysqli_query($con,"SELECT being_followed FROM follow WHERE following='$user' AND being_followed != '$username'  ORDER BY id DESC LIMIT ".$_POST["start"].", ".$_POST["limit"]." "); ?>
<?php while($row_follow = mysqli_fetch_assoc($query)) : ?>
<?php $following = $row_follow['being_followed']; 
  
//to check whether users have uploaded their default pictures (for upload)
$checker = mysqli_query($con,"SELECT * FROM users WHERE username='$following' ");
	$rowsub = mysqli_fetch_assoc($checker);

							$teacher_username = $rowsub['username'];
										$teacher_class = $rowsub['class'];
										$teacher_pix = $rowsub['pix'];
										$teacher_id = $rowsub['user_id'];
										if($teacher_pix == ""){
			
												$teacher_pix = "img/b3.PNG";
													
													}
												else{
													$teacher_pix = 'uploads/thumbs/'.$teacher_pix;
													}
			
?>



						<div class="col-lg-3 col-md-4 col-sm-6">
							<div class="company_profile_info">
								<div class="company-up-info">
									<img src="<?php echo $teacher_pix; ?>" alt="" style="margin: auto;" >
									<h3><a href="<?php echo $teacher_username; ?>"><?php echo ucfirst($teacher_username); ?></a></h3>
									<h4><?php echo $teacher_class; ?></h4>

									<?php

											                 $follow = $username;  
											          $being_follow = $teacher_username;
											                     // this is to count the number of follwers 
											  $check_if_follow = mysqli_query($con,"SELECT * FROM follow WHERE following='$follow' AND being_followed='$teacher_username' ");    
											            $countrow = mysqli_num_rows($check_if_follow);

											                  ?>

											             <script type="text/javascript">
											        	$(document).on('click', '.follows<?php echo $teacher_id ?>', function() {

                           
                                var being_follow = '<?php echo $teacher_username ?>';
                                var action = 'follow';
                                
                                $.ajax({
                                            url:"ajax/follow_unfollow.php",
                                            method:"POST",
                                            data:{action:action,being_follow:being_follow},
                                            success:function(data){
                                            
                                              
                                              
                                             $("#follows<?php echo $teacher_id ?>").attr("class", "followw unfollow<?php echo $teacher_id ?>");
                                             
                                              // $(".thumbfollow").css({'color':'#b81e1e'});
                                               $("#follows<?php echo $teacher_id ?>").html("Unfollow");
                                               $("#follows<?php echo $teacher_id ?>").attr("id", "unfollow<?php echo $teacher_id ?>");
                                               
                                              }
                                          });

                                });


									    //to check the game of the user block...........
									    $(document).on('click', '.unfollow<?php echo $teacher_id ?>', function() {

                           
                                var being_follow = '<?php echo $teacher_username ?>';
                                var action = 'unfollow';
                              

                                $.ajax({
                                            url:"ajax/follow_unfollow.php",
                                            method:"POST",
                                           data:{action:action,being_follow:being_follow},
                                            success:function(data){

                                        
                                             $("#unfollow<?php echo $teacher_id ?>").attr("class", "followw follows<?php echo $teacher_id ?>");
                                             
                                              $("#unfollow<?php echo $teacher_id ?>").html("Follow");
                                               $("#unfollow<?php echo $teacher_id ?>").attr("id", "follows<?php echo $teacher_id ?>");
                                                
                                           
                                               
                                              }
                                          });

                                });
											        </script>
									<ul>

														<?php if($countrow > 0) : ?>
									                      <li><a href="javascript:;" title="" class="follow unfollow<?php echo $teacher_id ?>" id="unfollow<?php echo $teacher_id ?>">Unfollow</a></li>
									                    <?php else : ?>
									                    <li><a href="javascript:;" title="" class="follow follows<?php echo $teacher_id ?>" id="follows<?php echo $teacher_id ?>">Follow</a></li>
                  										<?php endif; ?>

										






										<li><a href="<?php echo $teacher_username; ?>" title="" class="message-us"><i class="fa fa-envelope"></i></a></li>
									</ul>
								</div>
								<a href="<?php echo $teacher_username; ?>" title="" class="view-more-pro">View Profile</a>
							</div><!--company_profile_info end-->
						</div>




<?php endwhile; ?>  
			
       
<?php endif; ?>