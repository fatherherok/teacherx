<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc2.php');

$user = $_GET['user']; 

 ?>   




<section class="companies-info">
      <div class="container">
        <div class="company-title">
          <h3>People following <?php echo ucfirst($user); ?></h3>
        </div><!--company-title end-->
        <div class="companies-list">
          <div class="row" id="load_data">





            
      

        
  







          </div>

        </div><!--companies-list end-->
        

         <span id="load_data_message"></span>






      </div>
</section><!--companies-info end-->
 

    
<script>



var limit = 20; //The number of records to display per request
 var start = 0; //The starting pointer of the data
 var action = 'inactive'; //Check if current action is going on or not. If not then inactive otherwise active
 var user = '<?php echo $user; ?>';
 function load_post_data(limit, start)
 {
  $.ajax({
   url:"ajax/more_followers.php",
   method:"POST",
   data:{limit:limit, start:start, user:user},
   cache:false,
   success:function(data)
   {
    $('#load_data').append(data);
    if(data == 0)
    {
     $('#load_data_message').html("");
     action = 'active';
    }
    else
    {
     $('#load_data_message').html('<div class="process-comm"><div class="spinner"><div class="bounce1"></div><div class="bounce2"></div><div class="bounce3"></div></div></div>');
     action = 'inactive';
    }
    
   }
  });
 }


if(action == 'inactive')
 {
  action = 'active';
  load_post_data(limit, start);
 }


$(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#load_data").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_post_data(limit, start);
   }, 1000);
  }
 });

</script>




   <?php include ('./inc/footer.inc2.php');  ?> 