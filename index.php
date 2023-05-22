<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc.php');  ?>   


    

    
    <div class="hero-wrap" style="background-image: url('img/bg_1.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <h1 class="mb-4">TeacherX</h1>
            <p>We are connecting
teachers globally. We are a springboard
for you to creatively make long-lasting connections!</p>



              <?php  if(!isset($username)) :  ?>
               <p><a href="register.php" class="btn btn-primary" style="background-color: #b81e1e; border: 1px solid #b81e1e">Sign Up To Connect</a></p>
                 <?php else : ?>
                  <p><a href="community.php" class="btn btn-primary" style="background-color: #b81e1e; border: 1px solid #b81e1e">Continue</a></p>
                  <?php endif; ?>


          </div>
        </div>
      </div>
    </div>

    <section class="ftco-services">
      <div class="container">
        <div class="row no-gutters">
          <div class="col-md-4 ftco-animate py-5 nav-link-wrap">
            <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
              <a class="nav-link px-4 active" id="v-pills-master-tab" data-toggle="pill" href="#v-pills-master" role="tab" aria-controls="v-pills-master" aria-selected="true"><span class="mr-3 fa fa-desktop"></span> Professional Courses</a>

              <a class="nav-link px-4" id="v-pills-buffet-tab" data-toggle="pill" href="#v-pills-buffet" role="tab" aria-controls="v-pills-buffet" aria-selected="false"><span class="mr-3 fa fa-flask"></span> Digital Resources</a>

              <a class="nav-link px-4" id="v-pills-fitness-tab" data-toggle="pill" href="#v-pills-fitness" role="tab" aria-controls="v-pills-fitness" aria-selected="false"><span class="mr-3 fa fa-users"></span> Community</a>

              <a class="nav-link px-4" id="v-pills-reception-tab" data-toggle="pill" href="#v-pills-reception" role="tab" aria-controls="v-pills-reception" aria-selected="false"><span class="mr-3 fa fa-edit"></span> Opportunities</a>

              <a class="nav-link px-4" id="v-pills-sea-tab" data-toggle="pill" href="#v-pills-sea" role="tab" aria-controls="v-pills-sea" aria-selected="false"><span class="mr-3 fa fa-male"></span> Meet other Teachers</a>

              <a class="nav-link px-4" id="v-pills-spa-tab" data-toggle="pill" href="#v-pills-spa" role="tab" aria-controls="v-pills-spa" aria-selected="false"><span class="mr-3 fa fa-dashboard"></span> Meet Parents and Students</a>
            </div>
          </div>
          <div class="col-md-8 ftco-animate p-4 p-md-5 d-flex align-items-center">
            
            <div class="tab-content pl-md-5" id="v-pills-tabContent">

              <div class="tab-pane fade show active py-5" id="v-pills-master" role="tabpanel" aria-labelledby="v-pills-master-tab">
                <span><img src="img/icon_2.png"></span>
                <h2 class="mb-4">Professional Courses</h2>
                <p>Expand your career trajectory with self-paced courses and certifications that propel you as a world class educator in any learning environment.</p>
                <p><a href="courses.php" class="btn btn-primary">Learn More</a></p>
              </div>

              <div class="tab-pane fade py-5" id="v-pills-buffet" role="tabpanel" aria-labelledby="v-pills-buffet-tab">
               <span><img src="img/icon_3.png"></span>
                <h2 class="mb-4">Digital Learning  Courses</h2>
                <p>Digital market shop for learning resources at low cost and and free-to-use for teachers and schools.</p>
                
                <p><a href="resources.php" class="btn btn-primary">Learn More</a></p>
              </div>

              <div class="tab-pane fade py-5" id="v-pills-fitness" role="tabpanel" aria-labelledby="v-pills-fitness-tab">
                <span><img src="img/icon_4.png"></span>
                <h2 class="mb-4">Community</h2>
                <p>Meet other educators that are championing  amazing practices in classroom for collaboration, school of thoughts and best practices within and beyond the classroom.</p>
                
                <p><a href="community.php" class="btn btn-primary">Learn More</a></p>
              </div>

              <div class="tab-pane fade py-5" id="v-pills-reception" role="tabpanel" aria-labelledby="v-pills-reception-tab">
               <span><img src="img/icon_2.png"></span>
                <h2 class="mb-4">Opportunities</h2>
                <p>Allows pre-service and in-service educators and schools to harness wide range of local and international opportunities, new work environment, employment and development opportunities</p>
               
                <p><a href="opportunity.php" class="btn btn-primary">Learn More</a></p>
              </div>

              <div class="tab-pane fade py-5" id="v-pills-sea" role="tabpanel" aria-labelledby="v-pills-sea-tab">
                <span><img src="img/icon_3.png"></span>
                <h2 class="mb-4">Meet other Teachers</h2>
                <p>Meet teachers across different fields, race and countries</p>
                
                <p><a href="community.php" class="btn btn-primary">Learn More</a></p>
              </div>

              <div class="tab-pane fade py-5" id="v-pills-spa" role="tabpanel" aria-labelledby="v-pills-spa-tab">
                <span><img src="img/icon_4.png"></span>
                <h2 class="mb-4">Meet Parents and Students</h2>
                <p>Also great platform for students and parents who need access to great online tutors</p>
               
                <p><a href="community.php" class="btn btn-primary">Learn More</a></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section-2 img" style="background-image: url(img/bg_3.jpg);">
      <div class="container">
        <div class="row d-md-flex justify-content-end">
          <div class="col-md-6">
            <div class="row">
              <div class="col-md-12">
                <a href="#" class="services-wrap ftco-animate">
                  <div class="icon d-flex justify-content-center align-items-center">
                    <span class="ion-ios-arrow-back"></span>
                    <span class="ion-ios-arrow-forward"></span>
                  </div>
                  <h2>Fun-based Learning:</h2>
                  <p><q>If the they cannot learn the way you teach; teach the way they learn.</q></p>
                </a>
                <a href="#" class="services-wrap ftco-animate">
                  <div class="icon d-flex justify-content-center align-items-center">
                    <span class="ion-ios-arrow-back"></span>
                    <span class="ion-ios-arrow-forward"></span>
                  </div>
                  <h2>Need-Based Learning:</h2>
                  <p><q>Education is not preparation for life; education is life itself.</q></p>
                </a>
                <a href="#" class="services-wrap ftco-animate">
                  <div class="icon d-flex justify-content-center align-items-center">
                    <span class="ion-ios-arrow-back"></span>
                    <span class="ion-ios-arrow-forward"></span>
                  </div>
                  <h2>Essence-Based Learning</h2>
                  <p><q>Essence of education lies in drawing out the very best that is in you.</q></p>
                </a>
                <a href="#" class="services-wrap ftco-animate">
                  <div class="icon d-flex justify-content-center align-items-center">
                    <span class="ion-ios-arrow-back"></span>
                    <span class="ion-ios-arrow-forward"></span>
                  </div>
                 <h2>Technology-based Learning:</h2>
                  <p><q>If we teach today as we taught yesterday, we rob our children of tomorrow.</q></p>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>


 <section class="ftco-section">
      <div class="container">
        <div class="section-2-blocks-wrapper row no-gutters">

          <div class="text col-lg-6 ftco-animate">
            <div class="text-inner align-self-start">
              
              <h3>Nigerian Online Global Linguistics Class/School</h3>
              <p>By Nigerian Language Specialists and for young Nigerians Abroad
<ul>
<li>Top Nigerian experts with international experiences as Subject Specialists</li>
<li>Tech Savvy and Rich Pedagogy</li>
<li>Main Instructor and Assistant Instructor at every lesson</li>
<li>21st Century-Centric pedagogy</li>
<li>Digitally and Enhanced Contents</li>
</ul>

</p>

 <p><a href="apply.php" class="btn btn-primary">Register Here</a></p>
            </div>
          </div>

             <div class="text col-lg-6 ftco-animate">
            <img src="img/syn.jpg" alt="" width="100%">
           </div>

        </div>
      </div>
    </section>

    <section class="ftco-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Latest Courses</h2>
          </div>
        </div>
        <div class="row">
         	
       						

							 <?php

$gett = mysqli_query($con,"SELECT * FROM course ORDER BY id DESC LIMIT 4 ") or die (mysqli_error()); 



// $get_query = mysqli_query($con,"SELECT * FROM blog ORDER BY blog_id DESC");  ?>			
			<?php while($row=mysqli_fetch_array($gett)) : ?>

								 <?php 
                
                $id = $row['id'];
                $title = $row['title'];
                $category = $row['category'];
                $description = $row['description'];
                $course_mode = $row['mode'];
                $cost = $row['cost'];
                $date = $row['date'];
                 $view = $row['view'];
                $sale = $row['sale'];
                 $post_pix = $row['pix'];
                $pin = $row['pin'];

                if($cost == 0){
                	$cost = 'Free';
                }else{
                	$cost = '$'.number_format($cost);
                }



                $description = htmlspecialchars_decode($description);

                $description = html_entity_decode($description);

          
  
                
                if($post_pix == ''){
                    $post_pix = 'img/blog.jpg';
                    }else{
                    $post_pix = 'uploads_blog/thumbs/'.$post_pix;
                        }
        
                ?>

                <!-- Course -->
							<div class="col-lg-6 course_col">
								<div class="course">
									<div class="course_image"><a href="course.php?id=<?php echo $id; ?>"><img src="<?php echo $post_pix; ?>" alt="" width="100%"></a></div>
									<div class="course_body">
										<h3 class="course_title"><a href="course.php?id=<?php echo $id; ?>"><?php echo $title; ?></a></h3>
										<div class="course_teacher">Course Code: <b><?php echo $pin; ?></b></div>
										<div class="course_teacher">Category: <b><?php echo $category; ?></b></div>
										<div class="course_text">
											<p><?php echo substr($description,0,100); ?>... <a href="course.php?id=<?php echo $id; ?>" class="" style="">Check Out</a></p>

										</div>
									</div>
									<div class="course_footer">
										<div class="course_footer_content d-flex flex-row align-items-center justify-content-start">
											<div class="course_info">
												<i class="fa fa-graduation-cap" aria-hidden="true"></i>
												<span>Mode: <?php echo $course_mode; ?></span>
											</div>
											<div class="course_info">
												<i class="fa fa-shopping-cart" aria-hidden="true"></i>
												<span><?php echo $sale; ?> Sales</span>
											</div>
											<div class="course_price ml-auto"><?php echo $cost; ?></div>
										</div>
									</div>
								</div>
							</div>

							  <?php endwhile;   ?>

    
    
        </div>
        <div class="row">
          <div class="col-md-9 ftco-animate">
            <h4><a href="courses.php">See More >>></a></h4>
            
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(img/bg_4.jpg);">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
            <h2 class="mb-4">Some  facts</h2>
            <span class="subheading">Far far away, behind the word mountains, far from the countries</span>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="row">
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="60">0</strong><b style="font-size: 30px; color: white">+</b>
                    <span>Professional Courses</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="200">0</strong><b style="font-size: 30px; color: white">+</b>
                    <span>Digital Courses</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="100">0</strong><b style="font-size: 30px; color: white">+</b>
                    <span>Blog Contents</span>
                  </div>
                </div>
              </div>
              <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
                <div class="block-18 text-center">
                  <div class="text">
                    <strong class="number" data-number="200">0</strong><b style="font-size: 30px; color: white">+</b>
                    <span>Resourseful Materials</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section testimony-section">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Testimonials</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 ftco-animate">
            <div class="carousel-testimony owl-carousel">
              <div class="item">
                <div class="testimony-wrap text-center">
                  <div class="user-img mb-5" style="background-image: url(img/t1.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-5">TeacherX has been a source of inspiration for me as an individual and as an educator. In this community, I have discovered my innate talents as an educator, established professional relationships and received mentorship that has rebranded my identity as a teacher</p>
                    <p class="name">ISEYEMI Bisayo N</p>
                    <span class="position">Lagos State, Nigeria</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center">
                  <div class="user-img mb-5" style="background-image: url(img/t2.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-5">TeacherX is a melting point of best practices. I have had opportunity to build useful and productive network with highly professional educators and individual all around the country.</p>
                    <p class="name">Awoyemi Samuel</p>
                    <span class="position">Lagos, Nigeria</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center">
                  <div class="user-img mb-5" style="background-image: url(img/t3.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-5">Though a new member on the platform, TeacherX has created an opportunity to meet dynamic teachers with innovative ideas that work! Not only that; this platform concretizes the fact that there is an emergence of a new crop of teachers who are redefining the whole business of teaching and education for a revived dignity of the profession.</p>
                    <p class="name">Oluwabunmi Anani</p>
                    <span class="position">Adamawa State, Nigeria</span>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="testimony-wrap text-center">
                  <div class="user-img mb-5" style="background-image: url(img/t4.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-5">While I was thinking of changing my career as a result of the effects of COVID-19 on educational sector particularly private school teachers, TeacherX opened opportunities to learn, unlearn, relearn and rebrand. I became one of the DSN SUPER AUDIO TEACHER through some skills learnt here. </p>
                    <p class="name">Oluwakemi Adesanwo</p>
                    <span class="position">Ogun State, Nigeria</span>
                  </div>
                </div>
              </div>
               <div class="item">
                <div class="testimony-wrap text-center">
                  <div class="user-img mb-5" style="background-image: url(img/t5.jpg)">
                    <span class="quote d-flex align-items-center justify-content-center">
                      <i class="icon-quote-left"></i>
                    </span>
                  </div>
                  <div class="text">
                    <p class="mb-5">TeacherX platform avails me the opportunity to keep leveraging on technology to deliver contents not only to my immediate students but also to global learners across the globe. Several recognitions and professional certificates I have earned have direct links with this great TeacherX platform</p>
                    <p class="name">Adesanya Ademola Joseph</p>
                    <span class="position">Ijebu-Ode, Ogun State, Nigeria</span>
                  </div>
                </div>
              </div>


            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="ftco-section bg-light">
      <div class="container">
        <div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section ftco-animate text-center">
            <h2 class="mb-4">Recent from blog</h2>
          </div>
        </div>
        <div class="row d-flex">

        	  <?php
     
        
$get_Blog = mysqli_query($con,"SELECT * FROM blog WHERE approve='yes'
ORDER BY blog_id DESC LIMIT 4  ") or die (mysqli_error()); 


    


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
                  <div><a href="blog_page.php?blog_id=<?php echo $id; ?>">August 12, 2018</a></div>
                  <div><a href="blog_page.php?blog_id=<?php echo $id; ?>">Admin</a></div>
                  <div><a href="blog_page.php?blog_id=<?php echo $id; ?>" class="meta-chat"><span class="icon-chat"></span> 3</a></div>
                </div>
                <h3 class="heading mt-3"><a href="blog_page.php?blog_id=<?php echo $id; ?>"><?php echo substr($title,0,100); ?></a></h3>
                <p><?php echo substr($body,0,130); ?>... <a href="blog_page.php?blog_id=<?php echo $id; ?>">View More</a></p>
              </div>
            </div>
          </div>
         <?php endif;   ?>             

  <?php endwhile;   ?>
        


        </div>
      </div>
    </section>
    
    <section class="ftco-section-parallax">
      <div class="parallax-img d-flex align-items-center">
        <div class="container">
          <div class="row d-flex justify-content-center">
            <div class="col-md-7 text-center heading-section heading-section-white ftco-animate">
              <h2>Subcribe to our Newsletter</h2>
              <p>Subscribe to our newsletter.
Get the latest information, updates and more.</p>
              <div class="row d-flex justify-content-center mt-5">
                <div class="col-md-8">
                  <form action="contact_process.php"  method="post" class="subscribe-form">
                    <div class="form-group d-flex">
                      <input type="text" class="form-control" placeholder="Enter email address" name="email">
                      <input type="submit" value="Subscribe" name="submit_sub" class="submit px-3">
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    
  
    
   


   <?php include ('./inc/footer.inc.php');  ?> 