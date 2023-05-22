<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc2.php');  ?>   

   
   <section class="profile-account-setting">
			<div class="container">
				<div class="account-tabs-setting">
					<div class="row">
						<div class="col-lg-3">
							<div class="acc-leftbar">
								<div class="nav nav-tabs" id="nav-tab" role="tablist">
								    <a class="nav-item nav-link active" id="nav-acc-tab" data-toggle="tab" href="#nav-acc" role="tab" aria-controls="nav-acc" aria-selected="true"><i class="la la-cogs"></i>Account Setting</a>
								    <a class="nav-item nav-link" id="nav-password-tab" data-toggle="tab" href="#nav-password" role="tab" aria-controls="nav-password" aria-selected="false"><i class="fa fa-lock"></i>Change Password</a>

								    <a class="nav-item nav-link" id="nav-notification-tab" data-toggle="tab" href="#nav-notification" role="tab" aria-controls="nav-notification" aria-selected="false"><i class="fa fa-flash"></i>Your Social Handles</a>
								   

								   
								    
								   
								  </div>
							</div><!--acc-leftbar end-->
						</div>
						<div class="col-lg-9">
							<div class="tab-content" id="nav-tabContent">
								<div class="tab-pane fade show active" id="nav-acc" role="tabpanel" aria-labelledby="nav-acc-tab">
									<div class="acc-setting">
										<h3>Profile Update</h3>
										<form>
											<div class="notbar">

							<?php
								 $query_profile = mysqli_query($con,"SELECT * FROM users WHERE username='$username' ");
								    $result = mysqli_fetch_assoc($query_profile);
								    $lname =$result['lname'];
								    $phone = $result['phone'];
								    $subject =$result['subject'];
								    $fname = $result['fname'];
								    $class =$result['class'];
								    $school = $result['school'];
								    $quali =$result['quali'];

								   

							?>

								<script type="text/javascript">
									 $(document).on('click', '.profile_update', function() {

							             $('#loading1').html('<img src="img/loaderIcon.gif" style="margin-left:-10px;" height="20" width="20" /></p>');

							            var phone = document.getElementById('phone').value;
							            var lname = document.getElementById('lname').value;
							            var fname = document.getElementById('fname').value;
							        
							            var class_taken = document.getElementById('class').value;
							            var subject = document.getElementById('subject').value;
							            var school = document.getElementById('school').value;
							            var quali = document.getElementById('quali').value;
							            
							           

							               $.ajax({
							                            url:"ajax/profile_update.php",
							                            method:"POST",
							                            data:{phone:phone,lname:lname,fname:fname,subject:subject,class_taken:class_taken,school:school,quali:quali},
							                            
							                            success:function(data){
							                               //the return value from json is giving to the below id(s)

							                               $('#result1').html(data);
							                               
							                              }
							                          });

							                 
							              });

								</script>	
												
												

										<form action="" method="post">
								              
												<div class="form-group">
								                <input type="text" class="form-control" id="fname" name="text" value="<?php echo $fname; ?>"  placeholder="First Name">
								              </div>
								              <div class="form-group">
								                <input type="text" class="form-control" id="lname" name="text" value="<?php echo $lname; ?>"  placeholder="Last Name">
								              </div>
								              <div class="form-group">
								                <input type="text" class="form-control" id="phone" name="text" value="<?php echo $phone; ?>"  placeholder="Mobile No">
								              </div>

								              <div class="form-group">
								                <input type="text" class="form-control" id="school" name="text" value="<?php echo $school; ?>"  placeholder="Name of School">
								              </div>
								             

								               <div class="form-group">
								                            
								                               <select id="subject" class="form-control">
								                               <option value="<?php echo $subject; ?>"> Subject of Specialization</option>
								                                <option value="Mathematics">Mathematics</option>
								                                <option value="Languages">Languages</option>
								                                <option value="STEM (Sciences)">STEM (Sciences)</option>
								                                <option value="Arts">Arts</option>
								                                <option value="Business">Business</option>
								                                <option value="Economics">Economics</option>
								                                <option value="Social Studies">Social Studies</option>
								                                <option value="Technology">Technology</option>
								                            
								                                 
								                               </select>
								                </div>
								                <div class="form-group">
								                            
								                               <select id="class" class="form-control">
								                               <option value="<?php echo $class; ?>" >Class Taught</option>
								                                <option value="Early Childhood">Early Childhood
</option>
								                                <option value="K-12">K-12</option>
								                                <option value="Higher Education">Higher Education</option>
								                            
								                                 
								                               </select>
								                </div>
								                <div class="form-group">
								                            
								                               <select id="quali" class="form-control">
								                               <option value="<?php echo $quali; ?>" >Qualifications</option>
								                                <option value="NCE">NCE</option>
								                                <option value="B.Sc">B.Sc</option>
								                                <option value="B.Ed">B.Ed</option>
								                                <option value="B.Sc(Ed)">B.ScB.Sc(Ed)</option>
								                                <option value="M.Ed">M.Ed</option>
								                                <option value="PGDE">PGDE</option>
								                                
								                                <option value="PhD">PhD</option>
								                            
								                                 
								                               </select>
								                </div>


								                 <div class="form-group">
								                <button type="button"  class="btn btn-primary py-3 px-5 profile_update" id="result1"> <span id="loading1"></span> Update Profile</button>
								              </div>
            </form>
                    					</form>


											</div><!--notbar end-->
											
											<div class="save-stngs">
												<ul>
													<!-- <li><button type="submit" class="profile_update" >Update Profile</button></li> -->
													
												</ul>
											</div><!--save-stngs end-->
										</form>
									</div><!--acc-setting end-->
								</div>






									  	<div class="tab-pane fade" id="nav-notification" role="tabpanel" aria-labelledby="nav-notification-tab">
							  		<div class="acc-setting">
							  			<h3>Update Social Handles</h3>
							  			<div class="notifications-list">
							  				


							  				<form>
											<div class="notbar">

							<?php
								 $query_social= mysqli_query($con,"SELECT * FROM users WHERE username='$username' ");
								    $res = mysqli_fetch_assoc($query_social);
								    $website =$res['website'];
								    $facebook = $res['facebook'];
								    $twitter =$res['twitter'];
								    $instagram = $res['instagram'];
								    $linkedin =$res['linkedin'];
								   

								   

							?>

								<script type="text/javascript">
									 $(document).on('click', '.social_update', function() {

							             $('#loading3').html('<img src="img/loaderIcon.gif" style="margin-left:-10px;" height="20" width="20" /></p>');

							            var website = document.getElementById('website').value;
							            var facebook = document.getElementById('facebook').value;
							            var twitter = document.getElementById('twitter').value;
							            var instagram = document.getElementById('instagram').value;
							            var linkedin = document.getElementById('linkedin').value;
							           
							           

							               $.ajax({
							                            url:"ajax/social_update.php",
							                            method:"POST",
							                            data:{website:website,facebook:facebook,twitter:twitter,instagram:instagram,linkedin:linkedin},
							                            
							                            success:function(data){
							                               //the return value from json is giving to the below id(s)

							                               $('#result3').html(data);
							                               
							                              }
							                          });

							                 
							              });

								</script>	
												
												

										<form action="" method="post">
								              
												<div class="form-group">
														<label style="margin-bottom: 5px;"> Website domain<em>(e.g www.example.com)</em></label>
								                <input type="text" class="form-control" id="website" name="text" value="<?php echo $website; ?>"  placeholder="Your website">
								              </div>
								              <div class="form-group">
								              	<label style="margin-bottom: 5px;">Facebook username <em>(e.g use only the examplekay from www.facebook.com/examplekay)</em></label>
								                <input type="text" class="form-control" id="facebook" name="text" value="<?php echo $facebook; ?>"  placeholder="Facebook Username">
								              </div>
								              <div class="form-group">
								              	<label style="margin-bottom: 5px;"> Twitter handle <em>(without the '@' symbol e.g twitter handle: examplekay)</em></label>
								                <input type="text" class="form-control" id="twitter" name="text" value="<?php echo $twitter; ?>"  placeholder="Twitter Handle">
								              </div>

								              <div class="form-group">
								              	<label style="margin-bottom: 5px;"> Instagram Handle <em>(without the '@' symbol e.g instagram handle: examplekay)</em></label>
								                <input type="text" class="form-control" id="instagram" name="text" value="<?php echo $instagram; ?>"  placeholder="Instagram Handle">
								              </div>
								             <div class="form-group">
								             	<label style="margin-bottom: 5px;"> Linkedin Handle <em>(without the linkedin.com/in/ symbol e.g linkedin handle: example-kay)</em></label>
								                <input type="text" class="form-control" id="linkedin" name="text" value="<?php echo $linkedin; ?>"  placeholder="Linkedin Handle">
								              </div>



								                 <div class="form-group">
								                <button type="button"  class="btn btn-primary py-3 px-5 social_update" id="result3"> <span id="loading3"></span> Update Profile</button>
								              </div>
            </form>
                    					

											</div><!--notbar end-->
											</form>







							  			</div><!--notifications-list end-->
							  		</div><!--acc-setting end-->
							  	</div>
							  	










							  	<div class="tab-pane fade" id="nav-status" role="tabpanel" aria-labelledby="nav-status-tab">
							  		<div class="acc-setting">
							  			<h3>Profile Status</h3>
							  			<div class="profile-bx-details">
							  				<div class="row">
							  					<div class="col-lg-3 col-md-6 col-sm-12">
							  						<div class="profile-bx-info">
							  							<div class="pro-bx">
							  								<img src="images/pro-icon1.png" alt="">
							  								<div class="bx-info">
							  									<h3>$5,145</h3>
							  									<h5>Total Income</h5>
							  								</div><!--bx-info end-->
							  							</div><!--pro-bx end-->
							  							<p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
							  						</div><!--profile-bx-info end-->
							  					</div>
							  					<div class="col-lg-3 col-md-6 col-sm-12">
							  						<div class="profile-bx-info">
							  							<div class="pro-bx">
							  								<img src="images/pro-icon2.png" alt="">
							  								<div class="bx-info">
							  									<h3>$4,745</h3>
							  									<h5>Widthraw</h5>
							  								</div><!--bx-info end-->
							  							</div><!--pro-bx end-->
							  							<p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
							  						</div><!--profile-bx-info end-->
							  					</div>
							  					<div class="col-lg-3 col-md-6 col-sm-12">
							  						<div class="profile-bx-info">
							  							<div class="pro-bx">
							  								<img src="images/pro-icon3.png" alt="">
							  								<div class="bx-info">
							  									<h3>$1,145</h3>
							  									<h5>Sent</h5>
							  								</div><!--bx-info end-->
							  							</div><!--pro-bx end-->
							  							<p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
							  						</div><!--profile-bx-info end-->
							  					</div>
							  					<div class="col-lg-3 col-md-6 col-sm-12">
							  						<div class="profile-bx-info">
							  							<div class="pro-bx">
							  								<img src="images/pro-icon4.png" alt="">
							  								<div class="bx-info">
							  									<h3>130</h3>
							  									<h5>Total Projects</h5>
							  								</div><!--bx-info end-->
							  							</div><!--pro-bx end-->
							  							<p>Lorem ipsum dolor sit amet, consectetur adipiscing.</p>
							  						</div><!--profile-bx-info end-->
							  					</div>
							  				</div>
							  			</div><!--profile-bx-details end-->
							  			<div class="pro-work-status">
							  				<!-- <h4>Work Status  -  Last Months Working Status</h4> -->
							  			</div><!--pro-work-status end-->
							  		</div><!--acc-setting end-->
							  	</div>



							  							 <script type="text/javascript">
                                              
                                                          function viewPassword()
                                                              {
                                                                var passwordInput = document.getElementById('newpassword');
                                                                var passStatus = document.getElementById('pass-status');
                                                               
                                                                if (passwordInput.type == 'password'){
                                                                  passwordInput.type='text';
                                                                  passStatus.className='fa fa-eye-slash';
                                                                  
                                                                }
                                                                else{
                                                                  passwordInput.type='password';
                                                                  passStatus.className='fa fa-eye';
                                                                }
                                                              }


                                                             function viewPassword2()
                                                              {
                                                                var passwordInput = document.getElementById('cnewpassword');
                                                                var passStatus = document.getElementById('pass-status2');
                                                               
                                                                if (passwordInput.type == 'password'){
                                                                  passwordInput.type='text';
                                                                  passStatus.className='fa fa-eye-slash';
                                                                  
                                                                }
                                                                else{
                                                                  passwordInput.type='password';
                                                                  passStatus.className='fa fa-eye';
                                                                }
                                                              }


                                                              function viewPassword3()
                                                              {
                                                                var passwordInput = document.getElementById('oldpassword');
                                                                var passStatus = document.getElementById('pass-status2');
                                                               
                                                                if (passwordInput.type == 'password'){
                                                                  passwordInput.type='text';
                                                                  passStatus.className='fa fa-eye-slash';
                                                                  
                                                                }
                                                                else{
                                                                  passwordInput.type='password';
                                                                  passStatus.className='fa fa-eye';
                                                                }
                                                              }




                                        //to change password...............................................
                                         $(document).on('click', '.password_update', function() {

							             $('#loading2').html('<img src="img/loaderIcon.gif" style="margin-left:-10px;" height="20" width="20" /></p>');

							            var oldpassword = document.getElementById('oldpassword').value;
							            var newpassword = document.getElementById('newpassword').value;
							            var cnewpassword = document.getElementById('cnewpassword').value;
							        
							            					           

							               $.ajax({
							                            url:"ajax/password_update.php",
							                            method:"POST",
							                            data:{oldpassword:oldpassword,newpassword:newpassword,cnewpassword:cnewpassword},
							                            
							                            success:function(data){
							                               //the return value from json is giving to the below id(s)

							                               $('#result2').html(data);

							                               $('#form_wall2')[0].reset();
							                               
							                              }
							                          });

							                 
							              });



                                         //on focus............

                                         $(document).on('focus', '.return', function(){
											    $('#result2').html('<span id="loading2"></span> Change Password');
											 });
                                                        </script>


							  	<div class="tab-pane fade" id="nav-password" role="tabpanel" aria-labelledby="nav-password-tab">
							  		<div class="acc-setting">
										<h3>Account Setting</h3>
										<form id="form_wall2">
											
												<div class="notbar">
											
												<div class="form-group">
													<input type="password" class="form-control return"  id="oldpassword" placeholder="Old Password" ><span class="fa fa-eye field-icon toggle-password" id="pass-status2" aria-hidden="true" onclick="viewPassword3()" 
          style="float: right; margin-left: -25px; margin-top: -30px; margin-right: 10px; position: relative; z-index: 1; color: #174b85"></span
          >
												</div>
											
										<div class="form-group">
													<input type="password" class="form-control return" id="newpassword" placeholder="New password" ><span class="fa fa-eye field-icon toggle-password" id="pass-status2" aria-hidden="true" onclick="viewPassword()" 
          style="float: right; margin-left: -25px; margin-top: -30px; margin-right: 10px; position: relative; z-index: 1; color: #174b85"></span
          >
												</div>


											<div class="form-group">
													<input type="password" class="form-control return"   id="cnewpassword" placeholder="Confirm New password" ><span class="fa fa-eye field-icon toggle-password" id="pass-status2" aria-hidden="true" onclick="viewPassword2()" 
          style="float: right; margin-left: -25px; margin-top: -30px; margin-right: 10px; position: relative; z-index: 1; color: #174b85"></span
          >
											</div>

											 <div class="form-group">
								                <button type="button"  class="btn btn-primary py-3 px-5 password_update" id="result2"> <span id="loading2"></span> Change Password</button>
								              </div>
												<p ></p>
										</form>
									</div><!--acc-setting end-->
							  	</div>
							  
							  



							  	
							  
							  	
							  	
							</div>
						</div>
					</div>
				</div><!--account-tabs-setting end-->
			</div>
		</section>


   <?php include ('./inc/footer.inc2.php');  ?> 