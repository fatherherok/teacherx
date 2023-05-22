<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc.php'); 

// if(!isset($_SESSION["admin_teacherx"] )){

//   header('Location: index.php');
//   exit();
// }

 ?>   
      <div class="hero-wrap2" style="background-image: url('img/bg_6.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Upload Opportunity content here</span></p>
            <h1 class="mb-3 bread">Upload Opportunity Articles</h1>
          </div>
        </div>
      </div>
    </div>

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
    url:"ajax/uploadblog.php",
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
//$time = time();
date_default_timezone_set('Africa/Lagos');
 $current_time = date('Y-m-d h:i:s');
//this is going to make the profile form works
if(isset($_POST['submit'])){
     $title = mysqli_real_escape_string($con,$_POST['title']);


  

    
            
    $image_name = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_temp = $_FILES['image']['tmp_name'];

    $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
    $image_ext = @strtolower(end(explode('.', $image_name))); //strtolower becasue file ext names can be capitalized
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
            
    $added_by = 'Admin'; //posted by whoever is logged in to send the message
    
    
        
     if($image_size === 0){
      if(empty($post)){   
        $errorpost = 'You have not entered a post';   
        }
        else if(empty($title)){
        $errorpost = 'You have not entered a blog title';   
        }
         
        else{

        

            
$query_form = mysqli_query($con,"INSERT INTO opportunity VALUES('','$title', '$post', '$added_by', '$current_time', '', '') ") or die(mysqli_error());             
    //header('Location: '.$_SERVER['HTTP_REFERER']);
    $success = 'Opportunity successfully added';
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
    $title = mysqli_real_escape_string($con,$_POST['title']);
        
    $url = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i'; 
         $post = @mysqli_real_escape_string($con,htmlentities(trim($_POST['post'])));
        $post = preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>', $post);
        
        $added_by = 'Admin'; //posted by whoever is logged in to send the message
                
        
      $image_file = $image_name;

     $postpix = "$image_file";
    
    if(empty($post)){     
        $errorpost = 'You have not entered a post';   
        }
        else if(empty($title)){
        $errorpost = 'You have not entered a blog title';   
        }
       
        else{
    

      

$query_form = mysqli_query($con,"INSERT INTO opportunity VALUES('', '$title', '$post', '$added_by', '$current_time', '$postpix', '$image_ext') ") or die(mysqli_error());              
    //header('Location: '.$_SERVER['HTTP_REFERER']);
        $success = 'Opportunity successfully added';
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
                <input type="text" class="form-control" placeholder="Opportunity title"  name="title" >
              </div>
              <div class="form-group">
                <textarea  id="" cols="30" rows="7" class="form-control" placeholder="Main opportunity content"  name="post" id="editor1" ></textarea>
              </div>

              

               <script>
                                    CKEDITOR.replace( 'editor1', {
                            removePlugins: 'image',
                           
                        } );
                                </script>
                                <div class="form-group">  
                                 <input type="file" name="image" id="image" class="input-button" style="display: none;"> 
                      <label for="image" class="input-label" style="color: #b81e1e"><i class="la la-camera" style="font-size: 30px; margin-bottom: -9px; overflow: auto; margin-right: 10px; margin-left: -5px; "> </i> <b>Attach an image</b></label>   <span id="uploaded_image"></span> 
                                </div>    


              <div class="form-group">
                <input type="submit" value="POST OPPORTUNITY" name="submit" id="p-form" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

        
        </div>
      </div>
    </section>


   <?php include ('./inc/footer.inc.php');  ?> 