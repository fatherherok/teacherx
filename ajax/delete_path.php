<?php session_start();
 include ('./../inc/connect.inc.php');
 ?>
<?php  
 //delete.php  
 if(!empty($_POST["path"]))  
 {  
 	$postpix = $_POST["path"];
      if(unlink('../uploads_post/album/'.$postpix))  
      {  
           echo 'Image Deleted';  
      }  
 }  
 ?>  