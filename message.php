<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc.php');

 ?>   




<section class="companies-info">
      <div class="container">
        <div class="company-title">
          <h3><?php echo ucfirst($username); ?> Messages</h3>
        </div><!--company-title end-->
       
          <div class="row">
            <div class="col-md-12">
           
                   <table class="table  mb-0">
<?php     
$query2 = mysqli_query($con,"SELECT DISTINCT from_user_id, to_user_id FROM chat_message WHERE to_user_id = '$user_id' ORDER BY `time` ASC ");   ?>

<?php if(mysqli_num_rows($query2)> 0) : ?>
 
<?php while($row2 = mysqli_fetch_assoc($query2)) : ?>


<?php
$user_from = $row2['from_user_id'];


$time = time(); 
//$query= mysqli_query($con,"SELECT * FROM follow WHERE being_followed = '$username' ");  


$query = 

mysqli_query($con,"SELECT *
  FROM `chat_message`
  LEFT JOIN `users`
  ON `chat_message`.`from_user_id` = `users`.`user_id`
  WHERE `chat_message`.`from_user_id` = '$user_from'    ORDER BY `chat_message`.`time`  DESC LIMIT 1"); 

?>


      

     

            <?php while($row = mysqli_fetch_assoc($query)) : ?>
    
    <?php

$rowmessage = $row["chat_message"];

$from = $row["username"];
$userid2 = $row["from_user_id"];
$user2 = $from;




/// to get info of the users (profile pix)...............................
        $get_user_info = mysqli_query($con,"SELECT * FROM users WHERE username='$from'  ");
      $rown = mysqli_fetch_assoc($get_user_info);
      $profile_pix = $rown['pix'];
      
        if($profile_pix == ''){
      if($status == 'owner'){
    $profilepix = "img/banner.png";
      }else{
        $profilepix = "img/album.png";
        }
      }
    else{
      $profilepix = 'uploads/thumbs/'.$profile_pix;
      } 
      // to get info of the users (profile pix) ends here.......................

 
  //.............time..................

      $time_posted = $row['time'];

$diff = $time - $time_posted; // seconds
        $suffix = '';
        $count = '';
        switch(1)
          {
            case($diff < 60):
            $count = '';
            if($count===0)
              $count = 'a moment';
            else if($count==1)
              $suffix = 'a moment';
            else
              $suffix  = 'a moment';
            break; 
            
            case($diff > 60 && $diff < 3600):
            $count = floor($diff/60) ;
             if($count==1)
              $suffix = 'minute';
            else
              $suffix  = 'minutes';
            break;  
            
            case($diff > 3600 && $diff < 86400):
            $count = floor($diff/3600) ;
             if($count==1)
              $suffix = 'hour';
            else
              $suffix  = 'hours';
            break;
            
            case($diff > 86400 && $diff < 2629743):
            $count = floor($diff/86400) ;

             if($count==1)
              $suffix = 'day';
            else
              $suffix  = 'days';
            break;
            
            case($diff > 2629743 && $diff < 31556926):
            $count = floor($diff/2629743) ;
             if($count==1)
              $suffix = 'month';
            else
              $suffix  = 'months';
            break;
            
            case($diff > 31556926):
            $count = floor($diff/31556926) ;
             if($count==1)
              $suffix = 'year';
            else
              $suffix  = 'years';
            break;
          }


   //.....................time ends............   
?>
<script type="text/javascript">
 setInterval(function(){
  fetch_user_chat_history<?php echo $userid2; ?>(<?php echo $userid2; ?>)
 fetch_unreadchat<?php echo $userid2; ?>();
 fetch_online<?php echo $userid2; ?>();
 fetch_istype<?php echo $userid2; ?>()
  update_chat_history_data<?php echo $userid2; ?>();
  fetch_new_message<?php echo $userid2; ?>();
  
 }, 1000);

//to fetch online..........................
   function fetch_online<?php echo $userid2; ?>()
 {

var userid2 = <?php echo $userid2 ?>;
var user2 = '<?php echo $user2 ?>';

  $.ajax({
   url:"ajax/fetch_online.php",
   method:"POST",
   data:{userid2:userid2,user2:user2},
   success:function(data){
    $('#fetch_online<?php echo $userid2; ?>').html(data);
   }
  })
 }

//to fetch unreadchat..........................
   function fetch_unreadchat<?php echo $userid2; ?>()
 {

var userid2 = <?php echo $userid2 ?>;
var user2 = '<?php echo $user2 ?>';

  $.ajax({
   url:"ajax/fetch_unreadchat.php",
   method:"POST",
   data:{userid2:userid2,user2:user2},
   success:function(data){
    $('#fetch_unreadchat<?php echo $userid2; ?>').html(data);
 
   }
  })
 }

 //to fetch is_type..........................
   function fetch_istype<?php echo $userid2; ?>()
 {

var userid2 = <?php echo $userid2 ?>;
var user2 = '<?php echo $user2 ?>';

  $.ajax({
   url:"ajax/fetch_istype.php",
   method:"POST",
   data:{userid2:userid2,user2:user2},
   success:function(data){
    $('.fetch_istype<?php echo $userid2; ?>').html(data);
   }
  })
 }


function make_chat_dialog_box<?php echo $userid2; ?>(to_user_id, to_user_name)
 {
  var modal_content = '<div style="background-color: #e9eef4;" id="user_dialog_'+to_user_id+'" class="user_dialog<?php echo $userid2; ?>" title="Chat with '+to_user_name+'" tabindex="-1">';
  modal_content += '<div style="height:400px; border:1px solid #ccc; overflow-y: scroll; margin-bottom:24px; padding:16px;" class="chat_history<?php echo $userid2; ?> scroller<?php echo $userid2; ?>" data-touserid="'+to_user_id+'" id="chat_history_'+to_user_id+'">';
  modal_content += fetch_user_chat_history<?php echo $userid2; ?>(to_user_id);
  modal_content += '</div>';
  modal_content += '<div class="form-group"><span class="fetch_istype<?php echo $userid2; ?>"></span>';
  modal_content += '<div class="chat_message_area"><div contenteditable name="chat_message_'+to_user_id+'" id="chat_message_'+to_user_id+'" class="form-control chat_message<?php echo $userid2; ?>"></div>';

  modal_content +='<div class="image_upload" style="margin-top: 20px;"">';
    modal_content +='<form id="uploadImage<?php echo $userid2; ?>" method="post" action=""> <span id="showImage<?php echo $userid2; ?>" style="float: left; font-size: px;"></span>';
     modal_content += '<label for="uploadFile<?php echo $userid2; ?>" ><span class="fa fa-picture-o" style="color: grey; font-size: 25px;"></span></label>';
    modal_content += '<input type="file" name="uploadFile<?php echo $userid2; ?>" id="uploadFile<?php echo $userid2; ?>" accept=".jpg, .png" />';
    modal_content +=' <label for="<?php echo $userid2; ?>" id="plane<?php echo $userid2; ?>"><span class="fa fa-paper-plane" style="color: grey; font-size: 25px; margin-left:10px; margin-right:5px;"></span></label>'; 
   
   modal_content += '</form>';
   modal_content +='</div></div>';

  modal_content += '</div><div class="form-group" align="right">';
  modal_content+= '<button style="display: none;" type="button" name="send_chat<?php echo $userid2; ?>" id="'+to_user_id+'" class="btn btn-theme send_chat<?php echo $userid2; ?>">Send</button></div></div>';
  $('#user_model_details2').html(modal_content);
 }




 $(document).on('click', '.start_chat<?php echo $userid2; ?>', function(){
  var to_user_id = $(this).data('touserid');
  var to_user_name = $(this).data('tousername');
  make_chat_dialog_box<?php echo $userid2; ?>(to_user_id, to_user_name);
  $("#user_dialog_"+to_user_id).dialog({
   autoOpen:false,
   width:350
  });
  $('#user_dialog_'+to_user_id).dialog('open');

  $('#chat_message_'+to_user_id).emojioneArea({
   pickerPosition:"top",
   toneStyle: "bullet"
  });

 });

 $(document).on('click', '.send_chat<?php echo $userid2; ?>', function(){
  document.getElementById('plane<?php echo $userid2; ?>').style.visibility="hidden"; 
  $('.scroller<?php echo $userid2; ?>').attr("class", "chat_history<?php echo $userid2; ?> scroller<?php echo $userid2; ?>");

  //var image_name = document.getElementById("uploadFile<?php echo $userid2; ?>").files[0].name;

var checK_image = document.getElementById("uploadFile<?php echo $userid2; ?>").files;
var image_name = checK_image.length ? checK_image[0].name: "";

  var to_user_id = $(this).attr('id');
  var chat_message = $('#chat_message_'+to_user_id).html();

 if(!!image_name || !!chat_message)
  {
  $.ajax({
   url:"ajax/insert_chat.php",
   method:"POST",
   data:{to_user_id:to_user_id, chat_message:chat_message,image_name:image_name},
   success:function(data)
   {
    $('#chat_message_'+to_user_id).val('');
    var element = $('#chat_message_'+to_user_id).emojioneArea();
    element[0].emojioneArea.setText('');

     $('#chat_message_<?php echo $userid2; ?>').html('');

    $('#showImage<?php echo $userid2; ?>').html('');
    $('#chat_history_'+to_user_id).html(data);


     $('.chat_history<?php echo $userid2; ?>').stop ().animate ({scrollTop: $('.scroller<?php echo $userid2; ?>')[0].scrollHeight});
     $('.chat_history<?php echo $userid2; ?>').attr("class", "scroller<?php echo $userid2; ?>");


     $('#uploadImage<?php echo $userid2; ?>')[0].reset();

   }
  })
}

 });


//to update chat.......................................
$(document).on('click', '.update_chat<?php echo $userid2; ?>', function(){
  $('.scroller<?php echo $userid2; ?>').attr("class", "chat_history<?php echo $userid2; ?> scroller<?php echo $userid2; ?>");
var userid2 = <?php echo $userid2 ?>;
                 $.ajax({  
                     url:"ajax/update_chat.php",  
                     type:"POST",  
                     data:{userid2:userid2},  
                     success:function(data){ 
                    $('.chat_history<?php echo $userid2; ?>').stop ().animate ({scrollTop: $('.scroller<?php echo $userid2; ?>')[0].scrollHeight});
                    $('.chat_history<?php echo $userid2; ?>').attr("class", "scroller<?php echo $userid2; ?>");
   
                     }  
                });
 });  



 function fetch_new_message<?php echo $userid2; ?>()
 {
 
var userid2 = <?php echo $userid2 ?>;
                 $.ajax({  
                     url:"ajax/new_message.php",  
                     type:"POST",  
                     data:{userid2:userid2},  
                     success:function(data){  
                          $('.new_message<?php echo $userid2; ?>').html(data);
                     }  
                });


 }
//..............................................................

 function fetch_user_chat_history<?php echo $userid2; ?>(to_user_id)
 {
  $.ajax({
   url:"ajax/fetch_user_chat_history.php",
   method:"POST",
   data:{to_user_id:to_user_id},
   success:function(data){
    $('#chat_history_'+to_user_id).html(data);

     $('.chat_history<?php echo $userid2; ?>').stop ().animate ({scrollTop: $('.scroller<?php echo $userid2; ?>')[0].scrollHeight});
     $('.chat_history<?php echo $userid2; ?>').attr("class", "scroller<?php echo $userid2; ?>");

   }
  })
 }

 function update_chat_history_data<?php echo $userid2; ?>()
 {
  $('.chat_history<?php echo $userid2; ?>').each(function(){
   var to_user_id = $(this).data('touserid');
   fetch_user_chat_history<?php echo $userid2; ?>(to_user_id);
  });
 }

 $(document).on('click', '.ui-button-icon', function(){
  $('.user_dialog<?php echo $userid2; ?>').dialog('destroy').remove();
 });


 $(document).on('focus', '.chat_message<?php echo $userid2; ?>', function(){
    document.getElementById('plane<?php echo $userid2; ?>').style.visibility="visible"; 
  var is_type = 'yes';
  var userid2 = <?php echo $userid2 ?>;
  $.ajax({
   url:"ajax/update_is_type_status.php",
   method:"POST",
   data:{is_type:is_type,userid2:userid2},
   success:function()
   {

   }
  })
 });

 $(document).on('blur', '.chat_message<?php echo $userid2; ?>', function(){

  var is_type = 'no';
  var userid2 = <?php echo $userid2 ?>;
  $.ajax({
   url:"ajax/update_is_type_status.php",
   method:"POST",
   data:{is_type:is_type,userid2:userid2},
   success:function()
   {
    
   }
  })
 });




//to upload image..........................



$(document).ready(function(){


$(document).on('change', '#uploadFile<?php echo $userid2; ?>', function(){
  var name = document.getElementById("uploadFile<?php echo $userid2; ?>").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("uploadFile<?php echo $userid2; ?>").files[0]);
  var f = document.getElementById("uploadFile<?php echo $userid2; ?>").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 9000000)
  {
   alert("Image File Size must not exceed 9MB");
  }
  else
  {
   form_data.append("uploadFile", document.getElementById('uploadFile<?php echo $userid2; ?>').files[0]);
   $.ajax({
    url:"ajax/upload2.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#showImage<?php echo $userid2; ?>').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
     $('#showImage<?php echo $userid2; ?>').html(data); 
   }
   });
  }
 });
 
 /*
 $(document).on('click', '#remove_button', function(){  
           if(confirm("Are you sure you want to remove this image?"))  
           {  
                var path = $('#remove_button').data("path");  
                $.ajax({  
                     url:"ajax/delete_path.php",  
                     type:"POST",  
                     data:{path:path},  
                     success:function(data){  
                          if(data != '')  
                          {  
                               $('#showImage<?php echo $userid2; ?>').html('');  
                          }  
                     }  
                });  
           }  
           else  
           {  
                return false;  
           }  
      });  

*/
 //..........................
   });


</script>




           
              <tr>
              <td><img src="<?php echo $profilepix; ?>" alt="" height="30" width="30" class="img-fluid rounded-circle"> <?php echo ucfirst($from); ?></td>
              <td> <span><?php echo strtolower(substr($rowmessage,0,25)); ?>... <br> <span><?php echo $count.' '.$suffix ?> ago</span></span></td>
              <td>
                <a href="javascript:;" class="badge badge-danger start_chat<?php echo $userid2; ?> update_chat<?php echo $userid2; ?>" data-touserid="<?php echo $userid2; ?>" data-tousername="<?php echo $from; ?>" style="margin-left: 10px; float: right;">Start Chat</a> <br> 
                   <span id="fetch_unreadchat<?php echo $userid2; ?>"></span>
              <span id="fetch_online<?php echo $userid2; ?>" style="margin-top: 20px; float: right; clear: both;"></span>
              
              <input type="hidden" id="'.$from.'" value="'.$from.'">
              </td>
                </tr>
            

    <?php endwhile; ?>     



    <?php endwhile; ?>






<?php else : ?>
  <?php echo '<h5>You do not have any message at the moment </h5>'; ?>
   
<?php endif; ?>   
       


            
      

        
  







        

        
            </table>

      


                <div id="user_details"></div>
                 <div id="user_model_details2"></div>
              </div>
        </div>
      </div>
</section><!--companies-info end-->
 


<?php include ('./inc/footer.inc.php');  ?> 