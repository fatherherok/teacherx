<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc.php');  ?>   
      

   <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        <div class="row d-flex mb-5 contact-info">
          <div class="col-md-12 mb-4">
            <h2 class="h4">Contact Information</h2>
          </div>
          <div class="w-100"></div>
          <div class="col-md-3">
            <p><span>Address:</span> Tedprime head office, BGC compound, Abeokuta</p>
          </div>
          <div class="col-md-3">
            <p><span>Phone:</span> <a href="tel://+2347080595110">+2347080595110</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Email:</span> <a href="mailto:support@teacher.org">support@teacher.org</a></p>
          </div>
          <div class="col-md-3">
            <p><span>Website</span> <a href="https://teacher.org">www.teacher.org</a></p>
          </div>
        </div>


        <div class="row block-9">
          <div class="col-md-3 pr-md-5">

          </div>
        	 	
          <div class="col-md-6 pr-md-5">
            <form action="contact_process.php"  method="post">
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Name"  name="name" >
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Your Email"  name="email" >
              </div>
              <div class="form-group">
                <input type="text" class="form-control" placeholder="Subject"  name="subject" >
              </div>
              <div class="form-group">
                <textarea  id="" cols="30" rows="7" class="form-control" placeholder="Message"  name="message" ></textarea>
              </div>
              <div class="form-group">
                <input type="submit" value="Send Message" name="submit" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

        
        </div>
      </div>
    </section>


   <?php include ('./inc/footer.inc.php');  ?> 