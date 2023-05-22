<?php
ob_start();
$page_title = 'Teacherx';


$invoice =  (int)$_GET['invoice'];
  $reference =  (int)$_GET['reference'];




 
if(!$invoice){
 // header('Location: index.php');
  } 
?>
<?php include ('./inc/header.inc.php');



  mysqli_query($con,"UPDATE ordered_resource SET paid = 'yes', reference='$reference' WHERE invoice = '$invoice' ") ;
 $success = 'You have successfully completed your payment. Please go to your dashboard to get the materials'; 
 


$gett = mysqli_query($con,"SELECT * FROM ordered_resource WHERE invoice = '$invoice' ") or die (mysqli_error()); 
            $row=mysqli_fetch_array($gett);          
                $course_id = $row['course_id'];
                $date = $row['time_date'];

 $get1 = mysqli_query($con,"SELECT * FROM resources WHERE id = '$course_id' ") or die (mysqli_error()); 
            $row1=mysqli_fetch_array($get1);
               
                
                $course_id = $row1['id'];
                $title = $row1['title'];
                $category = $row1['category'];

 
 ?>
 
 <section class="ftco-section">
      <div class="container">
        <div class="row d-flex">

                  <div class="col-lg-2">
                  </div>
                <div class="col-lg-8">
                    <h3>PAYMENT DETAILS</h3>
                     <p>Invoice no: <b><?php echo $invoice; ?></b></p>
                     <p>Transaction Reference no: <b><?php echo $reference; ?></b></p>
                      <p>Course Title: <b><?php echo $title; ?></b></p>
                     <p>Category: <b>$<?php echo $category; ?></b></p>
                     <p>Date: <b><?php echo $date; ?></b></p>
                      
 
   <?php if (isset($success)) : ?>
  <div class="success1" style=""><?php echo $success; ?></div>  
 <?php endif; ?>
<?php if (isset($errorpost)) : ?>
 <div class="error1"  style=""><?php echo $errorpost; ?></div>
 <?php endif; ?> 
 
                    


                   
                </div>
                
           

        </div>
      </div>
    </section>

   

   


   <?php include ('./inc/footer.inc.php');  ?> 