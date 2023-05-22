<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc.php');  ?>   
      <div class="hero-wrap2" style="background-image: url('img/bg_6.jpg'); background-attachment:fixed;">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center" data-scrollax-parent="true">
          <div class="col-md-8 ftco-animate text-center">
            <p class="breadcrumbs"><span class="mr-2"><a href="index.php">Home</a></span> <span>Upload blog content here</span></p>
            <h1 class="mb-3 bread">Upload Resources</h1>
          </div>
        </div>
      </div>
    </div>

   <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        

  <?php
  $pin = (int)$_GET['pin'];

if(isset($_FILES['file'])){
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
mysqli_query($con,"UPDATE resources SET material='$material',  material_ext='$file_ext' WHERE pin = '$pin' ") or die(mysqli_error());
 $success = "The file ". strtoupper(basename( $_FILES['file']['name'])). " is successfully uploaded";

 }

 else {

 $errorpost = "Problem uploading file";

 }

}

else {

 $errorpost = "You may only upload PDFs/Docx/PPT/Image<br>";

}

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


                      <div class="form-group" style="margin-top: 20px;">
                            <input name="file" type="file">
                      </div>          

                                          

              <div class="form-group">
                <input type="submit" value="UPLOAD MATERIAL" name="submit" id="p-form" class="btn btn-primary py-3 px-5">
              </div>
            </form>
          
          </div>

        
        </div>
      </div>
    </section>


   <?php include ('./inc/footer.inc.php');  ?> 