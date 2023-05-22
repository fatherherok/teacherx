<?php

$page_title = 'Teacherx';

?>

<?php include ('./inc/header.inc.php'); 

if(!isset($_SESSION["admin_teacherx"] )){

  header('Location: index.php');
  exit();
}
 ?>   
     
    <h2 class="mb-3 bread text-center">Admin Upload Course</h2>

   <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        

<script>
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
    url:"ajax/uploadcourse.php",
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
                     url:"ajax/deleteblog_path.php",  
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

</script>
<?php

function pin_generator(){
    global $con;
    $generated_pin = rand(1000000,9999999);
    if($generated_pin == 0){
      pin_generator();
    }
    else{
      return $generated_pin;
    } 
    
  }
  $code = pin_generator();




//$time = time();
date_default_timezone_set('Africa/Lagos');
 $current_time = date('Y-m-d h:i:s');
//this is going to make the profile form works
if(isset($_POST['submit'])){
     $category = mysqli_real_escape_string($con,$_POST['category']);
      $title = mysqli_real_escape_string($con,$_POST['title']);
      $description = mysqli_real_escape_string($con,$_POST['description']);
       $amount = mysqli_real_escape_string($con,$_POST['amount']);
       
          
    
            
    $image_name = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_temp = $_FILES['image']['tmp_name'];

    $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
    $image_ext = @strtolower(end(explode('.', $image_name))); //strtolower becasue file ext names can be capitalized
    // explode function will separate the values from the dot, and the end function will select the last value e.g photo . jpeg
    $max_size = 9000000;
    
       
        
     if($image_size === 0){


      if(empty($title)){
        $errorpost = 'Please enter the course title';   
        }
     else if(empty($description)){   
        $errorpost = 'Please enter the course description';   
        }
      else if($category == ''){
          $errorpost = 'Please select the course category';
        }
        else if(!isset($_POST['course_mode'])){
          $errorpost = 'Please indicate the course mode';
        }
         else if(!isset($_POST['cost_mode'])){
          $errorpost = 'Please indicate the cost mode';

          }
          else if($_POST['cost_mode'] == 'pay' AND ($_POST['amount'] == 0) ){
          $errorpost = 'Please enter the price for the course';

          }
         
        else{

        $course_mode = $_POST['course_mode'];
        $cost_mode = $_POST['cost_mode'];
          
$query_form = mysqli_query($con,"INSERT INTO course VALUES('','$code', '$category', '$title', '$description', '$course_mode', '$amount', '$current_time' ,'' ,'' ,'', '', '', '', '', '') ") or die(mysqli_error());             
   header("Location: upload-course2.php?pin=$code");
  //  $success = 'Course successfully uploaded';
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
else if(isset($_POST['submit'])){
     $category = mysqli_real_escape_string($con,$_POST['category']);
      $title = mysqli_real_escape_string($con,$_POST['title']);
      $description = mysqli_real_escape_string($con,$_POST['description']);
        $amount = mysqli_real_escape_string($con,$_POST['amount']);
       
                
        
      $image_file = $image_name;

     $postpix = "$image_file";
    
   
       if(empty($title)){
        $errorpost = 'Please enter the course title';   
        }
     else if(empty($description)){   
        $errorpost = 'Please enter the course description';   
        }
      else if($category == ''){
          $errorpost = 'Please select the course category';
        }
        else if(!isset($_POST['course_mode'])){
          $errorpost = 'Please indicate the course mode';
        }
         else if(!isset($_POST['cost_mode'])){
          $errorpost = 'Please indicate the cost mode';

          }
             else if($_POST['cost_mode'] == 'pay' AND ($_POST['amount'] == 0) ){
          $errorpost = 'Please enter the price for the course';

          }
        else{
    
    $course_mode = $_POST['course_mode'];
        $cost_mode = $_POST['cost_mode'];

   $query_form = mysqli_query($con,"INSERT INTO course VALUES('','$code', '$category', '$title', '$description', '$course_mode', '$amount', '$current_time' ,'' ,'' ,'$postpix', '', '', '', '', '') ") or die(mysqli_error());             
 header("Location: upload-course2.php?code=$code");
//$success = 'Course successfully uploaded';
        }
        }
      }

//to process the form ends here
}//if not a user
?>

        <div class="row block-9">
          <div class="col-md-3 pr-md-5">

          </div>
        	 	
          <div class="col-md-6 pr-md-5">
            <form action="" role="form" method="post" enctype="multipart/form-data">


<?php if (isset($success)) : ?>
    <div class="success1"><?php echo $success; ?></div> 
 <?php endif; ?>
<?php if (isset($errorpost)) : ?>
 <div class="error1" ><?php echo $errorpost; ?></div>
 <?php endif; ?>


              <div class="form-group">
                <input type="text" class="form-control" placeholder="Course title"  name="title" >
              </div>
              <div class="form-group">
                <textarea  id="" cols="30" rows="7" class="form-control" placeholder="Course description"  name="description" ></textarea>
              </div>
             
                <script type="text/javascript">
                   //to show payment mode..........

                 $(document).on('click', '#pay', function() {
                               //  document.getElementByClassName('payment').style.display="block";

                                 $(".payment").css({'display':'block'});
                       });
                  $(document).on('click', '#free', function() {
                                // document.getElementByClassName('payment').style.display="none";

                              $(".payment").css({'display':'none'});
                       });

                </script>
              <div class="form-group">
                <select name="category" class="form-control">
        
                             
                                  <option value="">Select Category</option>
                                  <option value="Teaching Productivity Tools">Teaching Productivity Tools</option>
                                  <option value="Content Creation">Content Creation</option>
                                  <option value="Sustainable Development Goals">Sustainable Development Goals</option>
                                  <option value="How to Teach Online">How to Teach Online</option>
                                  <option value="Inclusive Teaching">Inclusive Teaching</option>
                                  <option value="Language Teaching">Language Teaching</option>
                                   <option value="STEM Teaching">STEM Teaching</option>
                                    <option value="Lesson Presentation & Delivery">Lesson Presentation & Delivery</option>
                                     <option value="Business and Management">Business & Management</option>
                                      <option value="Creative Arts and Media">Creative Arts & Media</option>
                                       <option value="IT and Computer Science">IT & Computer Science</option>
                                       <option value="Psychology and Mental Health">Psychology & Mental Health</option>
                </select>
              </div>

               <div class="form-group">
                 <p style="color: #b81e1e"><b> Course Mode</b></p>
                          <label><input type="radio"  name="course_mode" value="Self Paced"> Self Paced</label>
                           <label style="margin-left: 30px;"><input type="radio"  name="course_mode" value="Instructor Led"> Instructor Led</label>
              </div>


              <div class="form-group">
                 <p style="color: #b81e1e"><b>Cost Mode</b></p>
                        

                           <label><input type="radio" id="free" name="cost_mode" value="free"> Free</label>
                           <label style="margin-left: 30px;"><input type="radio" id="pay" name="cost_mode" value="pay"> Cash</label>
              </div>

              <div style="display: none" id="payment" class="payment">
              <div class="form-group">
                <input type="number" class="form-control" placeholder="Cost price"  name="amount" >
              </div>
              </div>
             
             



          
                                <div class="form-group">  
                                 <input type="file" name="image" id="image" class="input-button" style="display: none;"> 
                      <label for="image" class="input-label" style="color: #b81e1e"><i class="la la-camera" style="font-size: 30px; margin-bottom: -9px; overflow: auto; margin-right: 10px; margin-left: -5px; "> </i> <b>Attach Course Cover Picture</b></label>   <span id="uploaded_image"></span> 
                                </div>    


              <div class="form-group">
                <input type="submit" value="SUBMIT" name="submit" id="p-form" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

        
        </div>
      </div>
    </section>


   <?php include ('./inc/footer.inc.php');  ?> 