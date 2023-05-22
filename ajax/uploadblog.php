<?php session_start();
include ('./../inc/connect.inc.php');
include ('./../func/blogthumb.func.php'); ?>
<?php		
function correctImageOrientation($filename) {
  if (function_exists('exif_read_data')) {
    $exif = @exif_read_data($filename);
    if($exif && isset($exif['Orientation'])) {
      $orientation = $exif['Orientation'];
      if($orientation != 1){
        $img = imagecreatefromjpeg($filename);
        $deg = 0;
        switch ($orientation) {
          case 3:
            $deg = 180;
            break;
          case 6:
            $deg = 270;
            break;
          case 8:
            $deg = 90;
            break;
        }
        if ($deg) {
          $img = imagerotate($img, $deg, 0);       
        }
        // then rewrite the rotated image back to the disk as $filename
        imagejpeg($img, $filename, 95);
      } // if there is some rotation necessary
    } // if have the exif orientation info
  } // if function exists     
}
?>       
<?php
//upload.php
if($_FILES["image"]["name"] != '')
{

 
 $image_name = $_FILES['image']['name'];
	$image_size = $_FILES['image']['size'];
	$image_temp = $_FILES['image']['tmp_name'];

	$allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
 $image_ext = @strtolower(end(explode('.', $image_name))); //strtolower becasue file ext names can be capitalized
	// explode function will separate the values from the dot, and the end function will select the last value e.g photo . jpeg
 //$image_ext = substr($_FILES['image']['name'], strrpos($_FILES['image']['name'], '.') + 1);
	
	$max_size = '9000000';
	
	 $image_file = $image_name;
	
 if(in_array($image_ext , $allowed_ext) === false){
			 echo 'file type not allowed'; 
			}
					
		else if($image_size > $max_size || $image_size == 0){
			echo 'file size must not exceed 9MB';
			}
 
 else{
	 move_uploaded_file($image_temp, '../uploads_blog/album/'.$image_file);
	
	//move_uploaded_file($uploadedFile, $destinationFilename);
correctImageOrientation('../uploads_blog/album/'.$image_file);
create_blogthumbs('../uploads_blog/album/', $image_file, '../uploads_blog/thumbs/'.$image_file);
	$postpix = "$image_file";	 
	 


  echo '<img src="uploads_blog/album/'.$postpix.'" height="50" width="50" class="img-responsive" style="float: left" />
 <a href="javascript:;" class="" style="float: left"><i class="la la-times-circle-o" data-path="'.$postpix.'" id="remove_button" style="color: #b81e1e; font-size:20px;"></i></a>';

}

}
?>
