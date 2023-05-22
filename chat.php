<?php

$page_title = 'SuperFantasy';
?>
<?php  include ('./inc/header.inc.php'); 


//to check if no username................
 if(!isset($username)){
header('Location:index.php');
exit();
}
//.....to update users view page
  if(isset($username)){
 mysqli_query($con,"UPDATE views SET view = view+1 WHERE type='chat' "); 
 }else{
  //mysqli_query($con,"UPDATE views SET view = view+1 WHERE type='non_users' "); 
 }

?>
  <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->

            <!--main content start-->

        <div class="col-lg-6 col-lg-offset-3"><h4 style="font-family:roboto; padding: 10px;text-align:center;color:white; margin-top: 50px;">CHAT PAGE</h4></div>
        <div class="row mt">
          <div class="col-lg-12" id="pagination_data">


       
<script type="text/javascript">
              //script to tripple captain, bench boost........................
                      function chat_clubs() {
                  

              var xmlhttp;
              if(window.XMLHttpRequest){
                xmlhttp = new XMLHttpRequest();
                } 
                else{
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                  }
              
              xmlhttp.onreadystatechange = function(){
                if(xmlhttp.readyState==4){

                  document.getElementById('chat_clubs').innerHTML = xmlhttp.responseText;


                     
                   $('#modalforchat_club').modal("show");

                  }
                  
                }

                //url="ajax/sort-players1.php?sort_id="+sort_id+"&sort="+sort;
                url="ajax/chat_clubs.php";
                xmlhttp.open("GET",url,true);
                xmlhttp.send();
              }
    </script>
            
            <a href="forum.php"  class="btn" style="padding: 5px;  color: #c1b906; border: 2px solid #c1b906; border-radius:5px;">Forum</a>
            <a href="javascript:;" class="btn"  style="padding: 5px;  color: #c1b906; border: 2px solid #c1b906; border-radius:5px;" onclick="chat_clubs()">Club Group Chat</a>
            <div class="container">
               
            
                       <div>
                          <input type="hidden" id="is_active_group_chat_window" value="no" />
                          
                       </div>
               <div class="table-responsive">
                <div id="user_details"></div>
                 <div id="user_model_details"></div>
               </div>
            </div>


<?php
$time = time(); 
//$query= mysqli_query($con,"SELECT * FROM follow WHERE being_followed = '$username' ");  


$query = mysqli_query($con,"SELECT * FROM follow LEFT JOIN users ON `follow`.`following_id` = `users`.`user_id` WHERE `follow`.`being_followed` = '$username' "); 

?>
              <table class="table table-advance" style="font-size: 15px;">
                      <thead style=" color: white;">
                  <tr>
                    
                    <th> Username</th>
                    <th> Status</th>
                    
                    <th> Action</th>
                   
                  </tr>
                </thead>
                <tbody>

<?php while($row = mysqli_fetch_assoc($query)) : ?>
    
    <?php
 $userid2 = $row['following_id'];
  $user2 = $row['following'];


  $pixto = $row["pix"];

    if($pixto==''){
    $profilepix_dbto = "img/b3.PNG";
    }
    else{
    $profilepix_dbto = "uploads/thumbs/$pixto";
      }

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
  $('#user_model_details').html(modal_content);
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
                  <td><a href="<?php echo $user2; ?>"><img src="<?php echo $profilepix_dbto; ?>" height="40" class="img-circle" width="40" style="float:left;"> 
                    <span style="float:left; font-family: Tahoma, Geneva, sans-serif; margin: 10px 0px 0px 10px;"> <?php echo ucfirst($user2); ?></span></a> <span class="fetch_istype<?php echo $userid2; ?>"></span></td>


 
                    <td><span id="fetch_online<?php echo $userid2; ?>"></span> <span id="fetch_unreadchat<?php echo $userid2; ?>"></span></td>
                   
                     <td><button type="button" class="btn btn-theme btn-xs start_chat<?php echo $userid2; ?> update_chat<?php echo $userid2; ?>" data-touserid="<?php echo $userid2; ?>" data-tousername="<?php echo $user2; ?>">Start Chat</button></td>
                      <input type="hidden" id="'.$from.'" value="'.$from.'">
                </tr>

<?php endwhile; ?>

                  </tbody>


                </table>

          </div>
        </div>
   


 <script>  

$(document).on('click', '.remove_chat', function(){
  var chat_message_id = $(this).attr('id');
  if(confirm("Are you sure you want to remove this chat?"))
  {
   $.ajax({
    url:"ajax/remove_chat.php",
    method:"POST",
    data:{chat_message_id:chat_message_id},
    success:function(data)
    {
     //update_chat_history_data();
    }
   })
  }
 });

 //.................................





</script>












    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <?php  include ('./inc/footer.inc.php'); ?>