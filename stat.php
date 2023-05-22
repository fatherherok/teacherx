<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc.php'); 

if(!isset($_SESSION["admin_teacherx"] )){

  header('Location: index.php');
  exit();
}

 ?>   
   

    <h2 class="mb-3 bread text-center">Users' statistics</h2>


   <section class="ftco-section contact-section ftco-degree-bg">
      <div class="container">
        


  <?php

$get1 = mysqli_query($con,"SELECT * FROM users") or die (mysqli_error()); 
$count = mysqli_num_rows($get1);
  ?>  

        <div class="row block-9">
          <div class="col-md-2 pr-md-5">

          </div>
        	 	
          <div class="col-md-8 pr-md-5">
            <p style="text-align: center; font-size: 25px;"><?php echo $count; ?> registered users</p>

             <table class="table" style="font-size: 15px;">

                            <?php
                            $nicename = '';
                                $queryCountry =  mysqli_query($con, "SELECT * FROM country ORDER BY id ASC");
                               ?>
                                <?php while($rowCountry = mysqli_fetch_assoc($queryCountry)) : ?>
                                 <?php
                                 $nicename = mysqli_real_escape_string($con, $rowCountry['nicename']);

                                $get2 = mysqli_query($con,"SELECT * FROM users WHERE country ='$nicename' ") or die (mysqli_error()); 
                                $count2 = mysqli_num_rows($get2);
                               
                               ?> 


        <tr>
        <td><?php echo $nicename; ?></td>
        <td><?php echo $count2 ?></td>
      </tr>


        <?php  endwhile;           ?> 



              </table>



          </div>

        
        </div>
      </div>
    </section>


   <?php include ('./inc/footer.inc.php');  ?> 