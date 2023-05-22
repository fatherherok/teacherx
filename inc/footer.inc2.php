




















<footer class="ftco-footer ftco-bg-dark ftco-section img" style="background-image: url(img/bg_5.jpg);">
      <div class="overlay"></div>
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">TeacherX</h2>
              <p>TeacherX is a professional networking community for teachers with the X-factors all over the world.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="https://twitter.com/teacherxf"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="https://facebook.com/teacherXF"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Information</h2>
              <ul class="list-unstyled">
                <li><a href="index.php" class="py-2 d-block">Home</a></li>
                <li><a href="about.php" class="py-2 d-block">About</a></li>
                <li><a href="contact.php" class="py-2 d-block">Contact Us</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Site Links</h2>
              <ul class="list-unstyled">
                <li><a href="blog.php" class="py-2 d-block">Blog</a></li>
                 <?php  if(!isset($username)) :  ?>
                <li><a href="login.php" class="py-2 d-block">Community</a></li>
                 <?php else : ?>
                  <li><a href="community.php" class="py-2 d-block">Community</a></li>
                  <?php endif; ?>
                 <li><a href="courses.php" class="py-2 d-block">Courses</a></li>
                <li><a href="resources.php" class="py-2 d-block">Resources</a></li>

              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Have a Questions?</h2>
              <div class="block-23 mb-3">
                <ul>
                  <li><span class="icon icon-map-marker"></span><span class="text">Tedprime head office, BGC compound, Abeokuta</span></li>
                  <li><a href="#"><span class="icon icon-phone"></span><span class="text">+2347080595110</span></a></li>
                  <li><a href="#"><span class="icon icon-envelope"></span><span class="text">info@teacherx.org</span></a></li>
                  <li><img src="img/logo2.png" height="50" width="150" class="img-fluid rounded"></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12 text-center">

            <a href="privacy.php">Privacy Policy </a> | <a href="terms-and-conditions.php">Terms and condtions</a><br>

            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> TeacherX | Designed  by <a href="https://outtaboxtech.com.ng" target="_blank">Outtabox-Tech</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>
          </div>
        </div>
      </div>
    </footer>
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>

  <!-- Modal -->
    <div class="modal fade" id="modalAppointment" tabindex="-1" role="dialog" aria-labelledby="modalAppointmentLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalAppointmentLabel">Appointment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="#">
              <div class="form-group">
                <label for="appointment_name" class="text-black">Full Name</label>
                <input type="text" class="form-control" id="appointment_name">
              </div>
              <div class="form-group">
                <label for="appointment_email" class="text-black">Email</label>
                <input type="text" class="form-control" id="appointment_email">
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_date" class="text-black">Date</label>
                    <input type="text" class="form-control" id="appointment_date">
                  </div>    
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="appointment_time" class="text-black">Time</label>
                    <input type="text" class="form-control" id="appointment_time">
                  </div>
                </div>
              </div>
              

              <div class="form-group">
                <label for="appointment_message" class="text-black">Message</label>
                <textarea name="" id="appointment_message" class="form-control" cols="30" rows="10"></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" class="btn btn-primary">
              </div>
            </form>
          </div>
          
        </div>
      </div>
    </div>


  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>



  <!-- <script type="text/javascript" src="js/jquery.min.js"></script>-->
<script type="text/javascript" src="js/popper.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery.mCustomScrollbar.js"></script>
<script type="text/javascript" src="js/scrollbar.js"></script>


   <script type="text/javascript" src="lib/slick/slick.min.js"></script>
  <script type="text/javascript" src="js/script.js"></script>
  

 <!---chatbox starts here -->
  <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
  <script src="lib/jquery.ui.touch-punch.min.js"></script>
  <script src="js/emojionearea.min.js"></script>
   
  <!---chatbox ends here -->
    
  </body>
</html>



    <!-- modal windows for edit post........................-->
      
      
  <div id="modalpost_edit" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                        <em class="modal-title">You are about to edit your post</em>
                    </div>
                    <div class="modal-body" >
          <form role="form" id="edit_post" method="post">
                        <div class="form-group">
                      <textarea name="post_body" id="post_body" class="form-control" 
                        placeholder="edit your post here" rows="4"></textarea>
                        </div>
                      <input type="hidden" id="editpost_id" name="editpost_id" />
                    <div class="form-group" >
                   <input type="submit" name="ed_post" id="ed_post" class="btn btn-primary" style="float: right; margin-right: 10px; margin-bottom: 10px">
                 </div>
          </form>

                    </div>
                   
                </div>
            </div>
        </div>  
      <?php
    
      if(isset($_POST['editpost_id'])){
          
  $url = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i'; 
  $post_body = mysqli_real_escape_string($con,htmlentities(trim($_POST['post_body'])));
  $post_body = preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>', $post_body);  
          
  $query = mysqli_query($con,"UPDATE posts SET post_body='$post_body' WHERE post_id = '".$_POST['editpost_id']."' ");
       header('Location: '.$_SERVER['HTTP_REFERER']);   
    }
    ?>


<!-- modal windows to delete posts-->
  <div id="modalpost_delete" class="modal fade" tabindex="-1">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close glyphicon glyphicon-remove" data-dismiss="modal"></button>
                        <em class="modal-title">Are you sure you want to delete this post?</em>
                    </div>
                    <div class="modal-body" >
          <form role="form" id="delete_post" method="post">
                    <input type="hidden" id="post_id" name="post_id" />
                      <div class="form-group" >
          <input type="submit" name="del_post" id="del_post"  class="btn btn-primary" style="float: right; margin-right: 10px; margin-bottom: 10px">
        </div>
          </form>
                    </div>
                    
                </div>
            </div>
        </div>
  <?php 
   if(isset($_POST['post_id'])){
    //to delete picture from folder starts here
$postimage_query = mysqli_query($con,"SELECT postpix FROM posts WHERE post_id='".$_POST['post_id']."' ") or die(mysqli_error());
  //echo $postimage_query;
  
  $postimage_result = mysqli_fetch_assoc($postimage_query);
  var_dump($postimage_result);
  
  $post_pix = $postimage_result['postpix'];
  echo $pix = end(explode('uploads_post/thumbs/', $post_pix));
  
  
   unlink('./uploads_post/album/'.$pix);
  unlink('./uploads_post/thumbs/'.$pix);
    //ends here 
     
  mysqli_query($con,"DELETE FROM posts WHERE post_id = '".$_POST['post_id']."' ") or die(mysqli_error());
   header('Location: '.$_SERVER['HTTP_REFERER']); 
   }
  ?> 