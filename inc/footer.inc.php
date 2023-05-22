

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

<!-- modal windows for forgot passsword........................-->
      
        <div id="modalforgotpassword" class="modal fade" tabindex="-1" style="margin-top:200px;">
            <div class="modal-dialog">
                <div class="modal-content"  style="background:#174b85;">
                    
                    
                        <div class="modal-body">

                       
                        <form id="form_wall" role="form">
                                <h4 class="" style="color: white;">Forgot Password ? </h4>
                                <div class="form-group">
                                    <label for="exampleInputName" style="color: white">Enter your e-mail address below to reset your password</label>
                                   <input id="email" type="text" class="form-control" name="name" placeholder="Enter your email">
                                </div>


                                 <button class="btn btn-danger" id="forget-pass" type="button"> Request Password</button>
                                 <p style="color: white"><span id="display-pass"></span>
                            
                        </form>
                         

                         
                         
                       </div>

                    <div class="modal-footer">
                         <button class="btn btn-default closer3" data-dismiss="modal"><b class="fa fa-close"></b></button>
                    </div>

                   
                </div>
            </div>
        </div>  
