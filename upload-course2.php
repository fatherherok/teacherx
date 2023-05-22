<?php

$page_title = 'Teacherx';

?>

<?php include ('./inc/header.inc.php'); 

if(!isset($_SESSION["admin_teacherx"] )){

  header('Location: index.php');
  exit();

}

  $pin = $_GET['code'];
 ?>   
   
      <h2 class="mb-3 bread text-center">Admin Upload Course</h2>

   <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
  <?php
  if(isset($_POST['submit'])){
   $link1 = $_POST['link1'];
    $link1 = preg_replace("#.*youtube\.com/watch\?v=#", "", $link1);
  $new_link1 = 'https://www.youtube.com/embed/'.$link1;

  $link2 = $_POST['link2'];
    $link2 = preg_replace("#.*youtube\.com/watch\?v=#", "", $link2);
  $new_link2 = 'https://www.youtube.com/embed/'.$link2;

  $link3 = $_POST['link3'];
    $link3 = preg_replace("#.*youtube\.com/watch\?v=#", "", $link3);
  $new_link3 = 'https://www.youtube.com/embed/'.$link3;





  


//...........................................................
if($_FILES['file']['size']){

   $image_size = $_FILES['file']['size'];
 $material = $_FILES['file']['name'];
  
  $targetfolder = "uploads_mat/";

 $targetfolder = $targetfolder . basename( $_FILES['file']['name']) ;
$material = $_FILES['file']['name'];
 $ok=1;

 
  $file_ext = @strtolower(end(explode('.', $material))); //strtolower becasue file ext names can be capitalized

$file_type=$_FILES['file']['type'];

if ($file_type=="application/pdf" 
  || $file_type=="application/msword" 
  || $file_type=="application/vnd.openxmlformats-officedocument.wordprocessingml.document" 
  || $file_type=="application/vnd.openxmlformats-officedocument.presentationml.presentation"
  || $file_type == "image/gif"
  || $file_type == "image/jpeg"
  || $file_type == "image/jpg"
  | $file_type == "image/png"

) {

 if(move_uploaded_file($_FILES['file']['tmp_name'], $targetfolder))
 {




mysqli_query($con,"UPDATE course SET material='$material', material_ext='$file_ext', link1='$new_link1', link2='$new_link2', link3='$new_link3' WHERE pin = '$pin'  ") or die(mysqli_error());
 $success = 'Course Successfuly Uploaded.';



 }

 else {

 $errormsg = "Problem uploading file";

 }

}

else {

 $errormsg = "You may only upload PDFs/Docx/PPT/Image<br>";

}

}else{
  // $errormsg = '<p style="color:white;">Plz upload a file</p>'; 

mysqli_query($con,"UPDATE course SET link1='$new_link1', link2='$new_link2', link3='$new_link3' WHERE pin = '$pin' ") or die(mysqli_error());
 $success = 'Course Successfuly Uploaded.';

}

//.................................
    



    
     

  
  }

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
                                <label>
                                    <span style="color: #b81e1e"><small>Upload PDF / PPT / Docx / Image</small></span>
                                     <div class="">
                                    <input name="file" type="file">
                                  </div>
                                </label>
                    </div>


             <div class="form-group">  
                <label for="video1">Youtube video link 1</label>
                <input type="text" id="video1" class="form-control" name="link1" placeholder="Enter link 1">
             </div>          
           
              <div class="form-group">  
                <label for="video2">Youtube video link 2</label>
                <input type="text" id="video2" class="form-control" name="link2" placeholder="Enter link 2">
             </div>  

              <div class="form-group">  
                <label for="video3">Youtube video link 3</label>
                <input type="text" id="video3" class="form-control" name="link3" placeholder="Enter link 3">
             </div>   


            
                 
              <div class="form-group">
                <input type="submit" value="POST COURSE" name="submit" id="p-form" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

        
        </div>
      </div>
    </section>


   <?php include ('./inc/footer.inc.php');  ?> 