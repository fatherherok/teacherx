<?php include ('./../inc/connect.inc.php'); ?>
<?php include ('./../inc/checklogin.inc.php'); 
include("./../func/post_thumb.func.php"); ?>

<?php
$username = ''; 
	$user_id = '';

if(!isset($_SESSION["user"]) && isset($_COOKIE['user_log_in'])){
	//this is for normal user
	$_SESSION["user"] = $_COOKIE['user_log_in'];
	$username = $_SESSION["user"];
  $get_id = mysqli_query($con,"SELECT user_id FROM users WHERE username='$username' ");
  $rows = mysqli_fetch_assoc($get_id);
  $userid = $rows["user_id"]; 
		}
else{
	//this is for normal user
	$username = @$_SESSION["user"]; 
  $get_id = mysqli_query($con,"SELECT user_id FROM users WHERE username='$username' ");
  $rows = mysqli_fetch_assoc($get_id);
  $userid = $rows["user_id"];
	}

?>

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
if($_FILES["uploadFile"]["name"] != '')
{


 
 $image_name = $_FILES['uploadFile']['name'];
	$image_size = $_FILES['uploadFile']['size'];
	$image_temp = $_FILES['uploadFile']['tmp_name'];

	$allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
// $image_ext = @strtolower(end(explode('.', $image_name))); //strtolower becasue file ext names can be capitalized
	// explode function will separate the values from the dot, and the end function will select the last value e.g photo . jpeg
 $image_ext = substr($_FILES['uploadFile']['name'], strrpos($_FILES['uploadFile']['name'], '.') + 1);
	
	$max_size = '9097152';
	
	 $image_file = $image_name;
	 if(!isset($user_id)){
		echo 'Sorry, you have to be logged in as a user before posting';
		}
		else{	
			 if($image_size > $max_size || $image_size == 0){
			echo 'file must not exceed 2MB';
			}
 
 else{
	 move_uploaded_file($image_temp, '../uploads_post/album/'.$image_file);
	
	//move_uploaded_file($uploadedFile, $destinationFilename);
correctImageOrientation('../uploads_post/album/'.$image_file);	


$profilepix = "../uploads_post/thumbs/$image_file";
  create_thumb('../uploads_post/album/', $image_file, $profilepix);
  unlink('../uploads_post/album/'.$image_file);


	$postpix = "$image_file";

	 
 //echo '<img src="uploads_post/album/'.$postpix.'" height="50" width="50" class="img-thumbnail img-responsive" style="float: left" /><button type="button" data-path="'.$postpix.'" id="remove_button" class="btn btn-danger btn-xs" style="float: left">x</button>';

 //echo '<img src="uploads_post/thumbs/'.$postpix.'" class="img-thumbnail img-fluid" width="100" height="100" style="float: left" /><button type="button" data-path="'.$postpix.'" id="remove_button" class="btn btn-danger btn-xs" style="float: left">x</button>';
echo '<img src="uploads_post/thumbs/'.$postpix.'" class="img-fluid" width="200" height="200" style="float: left; margin-right:40px;" />';
 }
}
}
?>
