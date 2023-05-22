<?php

$page_title = 'Teacherx';
?>

<?php include ('./inc/header.inc2.php');  ?>   


<?php
//to update profile 
//get this to insert as value inside the input form
    $query_profile = mysqli_query($con,"SELECT * FROM users WHERE username='$userP' ");
    $result = mysqli_fetch_assoc($query_profile);
    $pixd = $result['pix']; 

    $subject_teach = $result['subject']; 
$class_teach = $result['class']; 
$country = $result['country'];
  $lname = $result['lname']; 
$fname = $result['fname']; 
$gender = $result['gender']; 
$school = $result['school']; 
$quali = $result['quali']; 


 


     $userid2 = $result['user_id'];  
     $user2 = $userP;



  if($pixd==''){
    $profilepixd = "img/b3.PNG";
    }
    else{
    $profilepixd = "uploads/thumbs/$pixd";
      }
  //to update profile pix
  //to process the form starts her
//to edit profile
    $query_profile = mysqli_query($con,"SELECT * FROM users WHERE username='$username' ");
    $result = mysqli_fetch_assoc($query_profile);
   
    $phone = $result['phone'];
   
?>
   
<script>
//.......................................
//this is for the show little image of the image post to be posted work

$(document).ready(function(){
 $(document).on('change', '#file', function(){
  var name = document.getElementById("file").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("file").files[0]);
  var f = document.getElementById("file").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 9000000)
  {
   alert("Image File Size must not exceed 9MB");
  }
  else
  {
   form_data.append("file", document.getElementById('file').files[0]);
   $.ajax({
    url:"ajax/uploadpix.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image2').html("<p><img src='img/loaderIcon.gif' /></p>");
    },   
    success:function(data)
    {
     $('#uploaded_image').html(data); 
     }
   });
  }
 });
 
 
 $(document).on('click', '#remove_button', function(){  
           if(confirm("Are you sure you want to remove this image?"))  
           {  
                var path = $('#remove_button').data("path");  
                $.ajax({  
                     url:"ajax/deleteblog_path.php",  
                     type:"POST",  
                     data:{path:path},  
                     success:function(data){  
                          if(data != '')  
                          {  
                               $('#uploaded_image').html('');  
                          }  
                     }  
                });  
           }  
           else  
           {  
                return false;  
           }  
      });  
 
 
});

</script>


<section class="cover-sec">
      <img src="images/resources/cover-img.jpg" alt="">
      <div class="add-pic-box">
        <div class="container">
          <div class="row no-gutters">
            <div class="col-lg-12 col-sm-12">         
              <input type="file">
             <!--  <label for="file">Change Image</label> -->        
            </div>
          </div>
        </div>
      </div>
    </section>

    <div id="uploaded_image2"></div>



 <div id="user_details"></div>
<div id="user_model_details"></div>
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

<main style="background-color: #f2f2f2">
      <div class="main-section">
        <div class="container">
          <div class="main-section-data">
            <div class="row">
              <div class="col-lg-3">
                <div class="main-left-sidebar">
                  <div class="user_profile">
                    <div class="user-pro-img" id="uploaded_image">
                      <img src="<?php echo  $profilepixd; ?>" alt="" height="150" width="150">
                      <div class="add-dp" id="OpenImgUpload">
                        <input type="file" id="file">
                        <label for="file"><i class="fas fa-camera"></i></label>                       
                      </div>
                    </div><!--user-pro-img end-->
                    <div class="user_pro_status">

                <?php

                 $follow = $username;  
          $being_follow = $userP;
                     // this is to count the number of follwers 
  $check_if_follow = mysqli_query($con,"SELECT * FROM follow WHERE following='$follow' AND being_followed='$being_follow' ");    
            $countrow = mysqli_num_rows($check_if_follow);

                  ?>

<script type="text/javascript">
  // script for following and unfollowing...................................              
  $(document).ready(function(){
    function fetch_follower()
    {
      var  view = '<?php echo $userP; ?>'

      $.ajax({
        url:"ajax/fetch_follower.php",
        method:"POST",
        data:{view:view},
        
        success:function(data){
              $('.fetch_follower2').html(data);
            }                 
        });
     }
    fetch_follower();
    
    setInterval(function(){
      fetch_follower();
    }, 1000);
  }); 


  $(document).ready(function(){
    function fetch_following()
    {
      var  view = '<?php echo $userP; ?>'

      $.ajax({
        url:"ajax/fetch_following.php",
        method:"POST",
        data:{view:view},
        
        success:function(data){
              $('.fetch_following2').html(data);
            }                 
        });
     }
    fetch_following();
    
    setInterval(function(){
      fetch_following();
    }, 1000);
  }); 

  
  //to check the game of the user block...........
    $(document).on('click', '.follows', function() {

                           
                                var being_follow = '<?php echo $being_follow ?>';
                                var action = 'follow';
                                
                                $.ajax({
                                            url:"ajax/follow_unfollow.php",
                                            method:"POST",
                                            data:{action:action,being_follow:being_follow},
                                            success:function(data){
                                            
                                              
                                              
                                             $("#follows").attr("class", "follow unfollow");
                                             
                                              // $(".thumbfollow").css({'color':'#b81e1e'});
                                               $("#follows").html("Unfollow");
                                               $("#follows").attr("id", "unfollow");
                                               
                                              }
                                          });

                                });


    //to check the game of the user block...........
    $(document).on('click', '.unfollow', function() {

                           
                                var being_follow = '<?php echo $being_follow ?>';
                                var action = 'unfollow';
                              

                                $.ajax({
                                            url:"ajax/follow_unfollow.php",
                                            method:"POST",
                                           data:{action:action,being_follow:being_follow},
                                            success:function(data){

                                        
                                             $("#unfollow").attr("class", "follow follows");
                                             
                                              $("#unfollow").html("Follow");
                                               $("#unfollow").attr("id", "follows");
                                                
                                           
                                               
                                              }
                                          });

                                });

</script>
                   <?php if($username != $userP) : ?>    
                <div class="company-up-info" style="margin-top: -30px;">
                  <ul>
                    <?php if($countrow > 0) : ?>
                      <li><a href="javascript:;" title="" class="follow unfollow" id="unfollow">Unfollow</a></li>
                    <?php else : ?>
                    <li><a href="javascript:;" title="" class="follow follows" id="follows">Follow</a></li>
                  <?php endif; ?> 

                    <li><a href="javascript:;" title="" class="message-us start_chat<?php echo $userid2; ?> update_chat<?php echo $userid2; ?>" data-touserid="<?php echo $userid2; ?>" data-tousername="<?php echo $user2; ?>"><i class="fa fa-envelope"></i></a></li>
                    <li><a href="#" title="" class="hire-us"><i class="fa fa-shopping-cart"></i></a></li>
                  </ul>
                </div>
                   <?php endif; ?> 

                      <ul class="flw-status">
                        <li>
                          <span><a href="following.php?user=<?php echo $userP; ?>">Following</a></span>
                          <b class="fetch_following2"></b>
                        </li>
                        <li>
                          <span><a href="follower.php?user=<?php echo $userP; ?>">Followers</a></span>
                          <b class="fetch_follower2"></b>
                        </li>
                      </ul>
                    </div><!--user_pro_status end-->

                    <?php
                 $query_social= mysqli_query($con,"SELECT * FROM users WHERE username='$userP' ");
                    $res = mysqli_fetch_assoc($query_social);
                    $website =$res['website'];
                    $facebook = $res['facebook'];
                    $twitter =$res['twitter'];
                    $instagram = $res['instagram'];
                    $linkedin =$res['linkedin'];
                   

                   

              ?>


                    <ul class="social_links">
                      <?php if($website) : ?>
                      <li><a href="http://<?php echo $website ?>" title=""><i class="la la-globe"></i> http://<?php echo $website ?></a></li>
                      <?php endif; ?>
                       <?php if($facebook) : ?>
                      <li><a href="https://www.facebook.com/<?php echo $facebook ?>" title=""><i class="fa fa-facebook-square"></i> https://www.facebook.com/<?php echo $facebook ?></a></li>
                      <?php endif; ?>
                       <?php if($twitter) : ?>
                      <li><a href="https://twitter.com/<?php echo '@'.$twitter; ?>" title=""><i class="fa fa-twitter"></i> https://twitter.com/<?php echo '@'.$twitter; ?></a></li>
                      <?php endif; ?>
                       <?php if($instagram) : ?>
                      <li><a href="https://www.instagram.com/<?php echo $instagram; ?>/" title=""><i class="fa fa-instagram"></i> https://www.instagram.com/<?php echo $instagram; ?>/</a></li>
                      <?php endif; ?>
                       <?php if($linkedin) : ?>
                      <li><a href="https://linkedin.com/in/<?php echo $linkedin; ?>" title=""><i class="fa fa-linkedin"></i> https://linkedin.com/in/<?php echo $linkedin; ?></a></li>
                      <?php endif; ?>
                      
                    
                    </ul>
                  </div><!--user_profile end-->
                  

                 <?php if($username == $userP) : ?> 
                  <div class="message-btn" style="">
                    <a href="account-settings.php" title=""><i class="fas fa-cog"></i> Setting</a>
                  </div>
                <?php endif; ?> 


                </div><!--main-left-sidebar end-->
              </div>
              <div class="col-lg-6">
                <div class="main-ws-sec">
                  <div class="user-tab-sec rewivew">
                    <h3><?php echo  $userP; ?></h3>
                    <div class="star-descp">
                      <span><?php echo  $fname. ' '.$lname; ?></span>
                      
                       <?php if($username == $userP) : ?> 
                      <a href="upload-blog.php" title="">Post Articles for Blog</a>

                       <a href="upload-resources.php" title="">Upload Resources</a>

                      <?php else : ?> 
                           <a href="#" title=""><?php echo  $subject_teach; ?></a>
                       <?php endif; ?>


                    </div><!--star-descp end-->
                                            <div class="tab-feed st2 settingjb">
                      <ul>
                        <li data-tab="feed-dd" class="active">
                          <a href="#" title="">
                            <img src="images/ic1.png" alt="">
                            <span>Feed</span>
                          </a>
                        </li>
                      <?php if($username == $userP) : ?>
                        <li data-tab="info-dd">
                          <a href="#" title="">
                            <img src="images/ic2.png" alt="">
                            <span>Blog Approval Status</span>
                          </a>
                        </li>

                        <li data-tab="my-bids">
                          <a href="#" title="">
                            <img src="images/ic5.png" alt="">
                            <span>Paid Courses</span>
                          </a>
                        </li>

                        <li data-tab="portfolio-dd">
                          <a href="#" title="">
                            <img src="images/ic3.png" alt="">
                            <span>Paid Resources</span>
                          </a>
                        </li>

                       <?php endif; ?>
                        <li data-tab="saved-jobs">
                          <a href="#" title="">
                            <img src="images/ic4.png" alt="">
                            <span>Resource Materials</span>
                          </a>
                        </li>
                       
                       

                        <li data-tab="payment-dd">
                          <a href="#" title="">
                            <img src="images/ic6.png" alt="">
                            <span>About</span>
                          </a>
                        </li>
                        
                        
                      </ul>
                    </div><!-- tab-feed end-->
                  </div><!--user-tab-sec end-->
                  <div class="product-feed-tab" id="saved-jobs">
                  
                                         <div class="tab-content" id="myTabContent">
                                         <div class="tab-pane fade show active" id="mange" role="tabpanel" aria-labelledby="mange-tab">





                                          <?php

                                            $get_r = mysqli_query($con,"SELECT * FROM resources WHERE user_id='$userid2' ORDER BY id DESC LIMIT 50  ") or die (mysqli_error()); 


                                          ?>

                                             <?php while($rowr=mysqli_fetch_array($get_r)) : ?>

                   <?php 
                
                $idr = $rowr['id'];
                $titler = $rowr['title'];
                $categoryr = $rowr['category'];
                $descriptionr = $rowr['description'];
                $course_moder = $rowr['mode'];
                $costr = $rowr['cost'];
                $dater = $rowr['date'];
                 $viewr = $rowr['view'];
                $saler = $rowr['sale'];
                 $post_pixr = $rowr['pix'];
                $pinr = $rowr['pin'];

                if($costr == 0){
                  $costr = 'Free';
                }else{
                  $costr = '$'.$costr;
                }



                $descriptionr = htmlspecialchars_decode($descriptionr);

                $descriptionr = html_entity_decode($descriptionr);

          
  
                
        
                ?>
                <!-- Latest Course -->

                                                <div class="posts-bar">
                                                    <div class="post-bar bgclr">
                                                        <div class="wordpressdevlp">
                                                            <h2><a href="course.php?id=<?php echo $idr; ?>"><?php echo substr($titler,0,100); ?></a></h2>
                                                           
                                                            <p><i class="la la-bookmark"></i> <?php echo substr($descriptionr,0,200); ?>...</p>
                                                        </div>
                                                        <br>
                                                        
                                                        <div class="row no-gutters">
                                                            <div class="col-md-6 col-sm-12">
                                                               
                                                                <div class="cadidatesbtn">
                                                                    <button type="button" class="btn btn-primary">
                                                                        <span class="badge badge-light"><?php echo $saler; ?></span> Sales
                                                                    </button>
                                                                      
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6 col-sm-12">
                                                                <ul class="bk-links bklink">
                                                                   <li><a class="btn btn-danger" href="resources.php?id=<?php echo $idr; ?>" style="color:white">Check Out</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                         <?php endwhile;   ?>       
                                            
                                            </div>
                                     
                               
                                    
                                         </div>
                  </div>




<?php
$time = time();
//this is going to make the profile form works
if(isset($_POST['post'])){
  
  
  $image_name = $_FILES['image']['name'];
  $image_size = $_FILES['image']['size'];
  $image_temp = $_FILES['image']['tmp_name'];

  $allowed_ext = array('jpg', 'jpeg', 'png', 'gif');
  $image_ext = @strtolower(end(explode('.', $image_name))); //strtolower becasue file ext names can be capitalized
  // explode function will separate the values from the dot, and the end function will select the last value e.g photo . jpeg
  $max_size = 9000000;
  
  /*  
  if($image_size >= $max_size || $image_size == 0){
      $errorpost = 'file size must not exceed 9MB';
      }         
    */
  $url = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i'; 
  $post = @mysqli_real_escape_string($con,htmlentities(trim($_POST['post'])));
  $post = preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>', $post);
      
  $added_by = $username; //posted by whoever is logged in to send the message
  
  
    
   if($image_size === 0){
    if(empty($post)){   
    $errorpost = 'You have not entered a post';   
    }
    else{
      
$query_form = mysqli_query($con,"INSERT INTO posts VALUES('', '$post', '$time', '$added_by', '$userP', '', '', '', '')")
    or die(mysqli_error());       
  header('Location: '.$_SERVER['HTTP_REFERER']);
    }
    }
    else{
      if(in_array($image_ext , $allowed_ext) === false){
       $errorpost = 'file type not allowed';
      }
      
    else if(($image_size >= $max_size) === true){
      $errorpost = 'file must not exceed 9MB';
      }
//................................
else if(isset($_POST['post'])){
    
  $url = '~(?:(https?)://([^\s<]+)|(www\.[^\s<]+?\.[^\s<]+))(?<![\.,:])~i'; 
    $post = @mysqli_real_escape_string($con,htmlentities(trim($_POST['post'])));
    $post = preg_replace($url, '<a href="$0" target="_blank" title="$0">$0</a>', $post);
    
    $added_by = $username; //posted by whoever is logged in to send the message
        
    
   $image_file = $image_name;

  $postpix = "$image_file";
$query_form = mysqli_query($con,"INSERT INTO posts VALUES('', '$post', '$time', '$added_by', '$userP', '', '$postpix', '$image_ext', '') ")
    or die(mysqli_error());       
  header('Location: '.$_SERVER['HTTP_REFERER']);
    }
    }
//to process the form ends here
}//if not a user
?>


  <script>
var limit = 7; //The number of records to display per request
 var start = 0; //The starting pointer of the data
 var action = 'inactive'; //Check if current action is going on or not. If not then inactive otherwise active
 var user = '<?php echo $userP; ?>';

 function load_post_data(limit, start)
 {
  $.ajax({
   url:"ajax/load_posts2.php",
   method:"POST",
   data:{limit:limit, start:start, user:user},
   cache:false,
   success:function(data)
   {
    $('#load_data').append(data);
    if(data == 0)
    {
     $('#load_data_message').html('');
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

//this will make the read more details work
$(document).ready(function(e) {
            $('.read_more').click(function() {
        var image_id = $(this).attr("id"); 
          $.ajax({
              url:"ajax/image.php",
              method:"post",
              data:{image_id:image_id},
              success: function(data){
                  $('#read_more').html(data);
                   $('#datamodal').modal("show");
                }
            });        
            });
        });


//.......................................
//this is input button for the post work
$(document).ready(function() {
          $(".input-button").on("change", function(e){  
        var files = $(this)[0].files;
        if(files.length == 1){
          var filename = e.target.value.split('\\').pop();
         // $(".fa_respond").text(filename);
          }
        
        });
        });
//.......................................
//this is for the show little image of the image post to be posted work

$(document).ready(function(){
 $(document).on('change', '#image', function(){
  var name = document.getElementById("image").files[0].name;
  var form_data = new FormData();
  var ext = name.split('.').pop().toLowerCase();
  if(jQuery.inArray(ext, ['gif','png','jpg','jpeg']) == -1) 
  {
   alert("Invalid Image File");
  }
  var oFReader = new FileReader();
  oFReader.readAsDataURL(document.getElementById("image").files[0]);
  var f = document.getElementById("image").files[0];
  var fsize = f.size||f.fileSize;
  if(fsize > 9000000)
  {
   alert("Image File Size must not exceed 9MB");
  }
  else
  {
   form_data.append("image", document.getElementById('image').files[0]);
   $.ajax({
    url:"ajax/upload.php",
    method:"POST",
    data: form_data,
    contentType: false,
    cache: false,
    processData: false,
    beforeSend:function(){
     $('#uploaded_image3').html("<label class='text-success'>Image Uploading...</label>");
    },   
    success:function(data)
    {
     $('#uploaded_image3').html(data); 
   }
   });
  }
 });
 
 
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
                               $('#uploaded_image3').html('');  
                          }  
                     }  
                });  
           }  
           else  
           {  
                return false;  
           }  
      });  
 
 
});


//.......................................
//this will make the read more or show more posts works
  

</script>  



                  <div class="product-feed-tab current" id="feed-dd">
                    <div class="posts-section">

                        <?php if (isset($errorpost)) : ?>
                   <div class="error1"><?php echo $errorpost; ?></div>
                   <?php endif; ?>


                      <div class="post-topbar">
                    <div class="user-picy" style="width: 10%">
                      <img src="<?php echo  $profilepixd; ?>" alt="" height="50" width="50" class="img-fluid rounded-circle">
                    </div>

                       <?php if($username == $userP) : ?> 
                    <form action="" role="form" method="post" enctype="multipart/form-data" style="margin-top: -10px">
                    <div class="post-st" style="width: 89%; margin-top: -10px;">
                                <textarea  name="post" id="post_box" class="form-control" placeholder="Enter your post here" style="width: 100%; border-radius: 10px;"></textarea>   
                    </div><!--post-st end-->
    
    <div style="float: right; margin-top: 10px; clear: both;">
    <input type="file" name="image" id="image" class="input-button" style="display: none;"> 

    <span id="uploaded_image3"></span>
            <label for="image" class=""><i class="la la-camera" style="font-size: 40px; margin-bottom: -15px; overflow: auto;"></i> </label>   

          <button type="submit" value=""  class="btn btn-primary" 
           name="submit" id="p-form" style=""><small><i class="fa fa-send"></i> POST</small>
          </button>
      </div>



                    </form>
                     <?php endif; ?> 
                  </div><!--post-topbar end-->








<div id="load_data"></div>
   <div id="load_data_message"></div>
                     
                  

                   
                    </div><!--posts-section end-->
                  </div><!--product-feed-tab end-->





                  <div class="product-feed-tab" id="info-dd">


                    <?php
                    $get_Blog = mysqli_query($con,"SELECT * FROM blog WHERE added_by='$userP'
ORDER BY blog_id DESC LIMIT 20 ") or die (mysqli_error()); 


    


// $get_query = mysqli_query($con,"SELECT * FROM blog ORDER BY blog_id DESC");  ?>

            
              <?php while($row=mysqli_fetch_array($get_Blog)) : ?>
                <?php 
                
                $id = $row['blog_id'];
                $title = $row['blog_title'];
                $body = htmlspecialchars_decode($row['blog_body']);
                $approve = $row['approve'];
                

                $body = html_entity_decode($body);

          
                ?>



                    <div class="user-profile-ov">
                      <h3><a href="#" title="" class="overview-open"><?php echo substr($title,0,100); ?></a> <a href="#" title="" class="overview-open"><i class="fa fa-pencil"></i></a></h3>
                       <p><?php echo substr($body,0,200); ?>...</p>
                      <p> 
                         <?php if($approve == 'yes') : ?>
                          <a class="btn btn-success" style="color: white;">Approved</a>
                           <?php elseif($approve == 'reject'): ?>
                            <a class="btn btn-danger"  style="color: white;">Rejected</a>
                             <?php else : ?>
                            <a class="btn btn-warning"  style="color: white;">Pending</a>
                           <?php endif; ?>
                      </p>
                    </div><!--user-profile-ov end-->
                   
                    
                    <?php endwhile;   ?>
                  
                  </div><!--product-feed-tab end-->
                  <div class="product-feed-tab" id="rewivewdata">
                                        <section ></section>



                    <div class="posts-section">
                      <div class="post-bar reviewtitle">
                        <h2>Reviews</h2>
                      </div><!--post-bar end-->
                      <div class="post-bar ">
                        <div class="post_topbar">
                          <div class="usy-dt">
                            <img src="images/resources/bg-img3.png" alt="">
                            <div class="usy-name">
                              <h3>Rock William</h3>
                              <div class="epi-sec epi2">
                          <ul class="descp review-lt">
                            <li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
                            <li><img src="images/icon9.png" alt=""><span>India</span></li>
                          </ul>
                        </div>
                            </div>
                          </div>
                        </div>
                        
                        <div class="job_descp mngdetl">
                          <div class="star-descp review">
                      <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star-half-o"></i></li>
                      </ul>
                      <a href="#" title="">5.0 of 5 Reviews</a>
                    </div>
                    <div class="reviewtext">
                      <p>Lorem ipsum dolor sit amet, adipiscing elit. Nulla luctus mi et porttitor ultrices</p>
                      <hr>
                    </div>

                    <div class="post_topbar post-reply">
                          <div class="usy-dt">
                            <img src="images/resources/bg-img4.png" alt="">
                            <div class="usy-name">
                              <h3>John Doe</h3>
                              <div class="epi-sec epi2">
                             <p><i class="la la-clock-o"></i>3 min ago</p>                             
                             <p class="tahnks">Thanks :)</p>
                        </div>
                          </div>
                        </div>
                        </div>
                        <div class="post_topbar rep-post rep-thanks">
                          <hr>
                          <div class="usy-dt">
                            <img src="images/resources/bg-img4.png" alt="">                           
                            <input class="reply" type="text" placeholder="Reply">
                            <a class="replybtn" href="#">Send</a>
                         
                          </div>
                        </div>
                        
                    </div>
                      </div><!--post-bar end-->
                      <div class="post-bar post-thanks">
                        <div class="post_topbar">
                          <div class="usy-dt">
                            <img src="images/resources/bg-img1.png" alt="">
                            <div class="usy-name">
                              <h3>Jassica William</h3>
                              <div class="epi-sec epi2">
                          <ul class="descp review-lt">
                            <li><img src="images/icon8.png" alt=""><span>Epic Coder</span></li>
                            <li><img src="images/icon9.png" alt=""><span>India</span></li>
                          </ul>
                        </div>
                            </div>
                          </div>
                          <div class="ed-opts">
                            <a href="#" title="" class="ed-opts-open"><i class="la la-ellipsis-v"></i></a>
                            <ul class="ed-options">
                              <li><a href="#" title="">Edit Post</a></li>
                              <li><a href="#" title="">Unsaved</a></li>
                              <li><a href="#" title="">Unbid</a></li>
                              <li><a href="#" title="">Close</a></li>
                              <li><a href="#" title="">Hide</a></li>
                            </ul>
                          </div>
                        </div>
                        
                        <div class="job_descp mngdetl">
                          <div class="star-descp review">
                      <ul>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star"></i></li>
                        <li><i class="fa fa-star-half-o"></i></li>
                      </ul>
                      <a href="#" title="">5.0 of 5 Reviews</a><br><br>
                      <p>Awesome Work, Thanks John!</p>
                      <hr>
                    </div>
                    <div class="post_topbar rep-post">
                          <div class="usy-dt">
                            <img src="images/resources/bg-img4.png" alt="">
                            
                              <input class="reply" type="text" placeholder="Reply">
                              <a class="replybtn" href="#">Send</a>
                         
                        </div>
                        </div>
                        </div>
                      </div><!--post-bar end-->
                    </div><!--posts-section end-->
                  </div><!--product-feed-tab end-->
                  <div class="product-feed-tab" id="my-bids">
                    <div class="posts-section">
                      <div class="post-bar">
                        <div class="post_topbar">
                             <?php
                              //for pagination of the  list on the homepage
                              $get = mysqli_query($con,"SELECT ordered_id FROM ordered_course  ") or die (mysqli_error());

                              $total_co = mysqli_num_rows($get);
                              ?>

                           <h3><a href="paid-courses.php">Check your paid courses here</a></h3>
                           <p>You have <?php echo $total_co; ?> paid course(s)</p>


                        </div>
                        
                 
                  
                      </div><!--post-bar end-->
     
        
              
                     
                    </div><!--posts-section end-->
                  </div><!--product-feed-tab end-->
                  <div class="product-feed-tab" id="portfolio-dd">
                     <div class="posts-section">
                          <div class="post-bar">
                        <div class="post_topbar">
                       <?php
                              //for pagination of the  list on the homepage
                              $get2 = mysqli_query($con,"SELECT ordered_id FROM ordered_resource  ") or die (mysqli_error());

                              $total_co2 = mysqli_num_rows($get2);
                              ?>

                           <h3><a href="paid-resources.php">Check your paid resources here</a></h3>
                           <p>You have <?php echo $total_co2; ?> paid resource(s)</p>
                         </div>
                       </div>

                    </div><!--portfolio-gallery-sec end-->
                  </div><!--product-feed-tab end-->


                  <div class="product-feed-tab" id="payment-dd">
                    <div class="billing-method">
                      <ul>

                        <li>
                          <h3><?php echo  $fname.' '.$lname; ?></h3>
                        </li>
                        <li>
                          <h3><?php echo  $gender; ?></h3>
                        </li>
                        <li>
                          <h3><?php echo  $subject_teach; ?></h3>
                        </li>
                        <li>
                          <h3><?php echo  $class_teach; ?></h3>
                        </li>
                        <li>
                          <h3><?php echo  $quali; ?></h3>
                        </li>
                        <li>
                          <h3><?php echo  $school; ?></h3>
                        </li>
                        <li>
                          <h3><?php echo  $country; ?></h3>
                        </li>
                        
                      </ul>
                      <div class="lt-sec">
                        <img src="images/lt-icon.png" alt="">
                        <h4>Check Course materials by <?php echo  ucfirst($userP); ?></h4>
                        <a href="#" title="">Click Here</a>
                      </div>
                    </div><!--billing-method end-->



                  </div><!--product-feed-tab end-->
                </div><!--main-ws-sec end-->
              </div>
              <div class="col-lg-3">
                <div class="right-sidebar">
                  <div class="widget widget-about">
                    <img src="img/logo.jpg" alt="Image" >
                    <h3>What's New?</h3>
                    <span>Get Latest Materials</span>
                    <div class="sign_link">
                      <h3><a href="#" title="">Get here</a></h3>
                      <a href="courses.php" title="">Learn More</a>
                    </div>
                  </div><!--widget-about end-->

                  <?php

                    $getopp = mysqli_query($con,"SELECT * FROM opportunity ORDER BY id DESC LIMIT 10  ") or die (mysqli_error()); 
                  ?>


                  <div class="widget widget-jobs">
                    <div class="sd-title">
                      <h3>Vacant Teaching Jobs/Opportunities</h3>
                      <i class="la la-ellipsis-v"></i>
                    </div>
                    <div class="jobs-list">


            <?php while($row=mysqli_fetch_array($getopp)) : ?>
                <?php 
                
                $id = $row['id'];
                $title = $row['title'];
                $body = htmlspecialchars_decode($row['body']);
                $date_added = $row['date'];

                ?>

                      <div class="job-info">
                        <div class="job-details">
                          <h3><?php echo substr($title,0,100); ?></h3>
                          <p><?php echo $date_added; ?></p>
                        </div>
                        <div class="hr-rate">
                          <span><a href="opportunity2.php?id=<?php echo $id; ?>">Check</a></span>
                        </div>
                      </div><!--job-info end-->
                      <?php endwhile;   ?>  
                      
                      
                    </div><!--jobs-list end-->
                  </div><!--widget-jobs end-->

                <?php

                $get_Blog = mysqli_query($con,"SELECT * FROM blog WHERE approve='yes' ORDER BY blog_id DESC LIMIT 10  ") or die (mysqli_error()); 
                ?>


                  <div class="widget widget-jobs">
                    <div class="sd-title">
                      <h3>Popular Posts</h3>
                      <i class="la la-ellipsis-v"></i>
                    </div>
                    <div class="jobs-list">

                    <?php while($row=mysqli_fetch_array($get_Blog)) : ?>
                <?php 
                
                $id = $row['blog_id'];
                $title = $row['blog_title'];
                
                $added_by = $row['added_by'];
                $date_added = $row['date'];          
                ?>


                      <div class="job-info">
                        <div class="job-details">
                          <h3><?php echo substr($title,0,100); ?></h3>
                          <p>BY: <?php echo ucfirst($added_by); ?>.</p>
                        </div>
                        <div class="hr-rate">
                          <span><a href="blog_page.php?blog_id=<?php echo $id; ?>">Read more</a></span>
                        </div>
                      </div><!--job-info end-->

                 <?php endwhile;   ?> 
                      
                    </div><!--jobs-list end-->
                  </div><!--widget-jobs end-->


                  <?php
                $gett = mysqli_query($con,"SELECT * FROM resources WHERE id = '$id' ") or die (mysqli_error()); 

                  ?>

                  <div class="widget suggestions full-width">
                    <div class="sd-title">
                      <h3>Latest Resources Materials</h3>
                      <i class="la la-ellipsis-v"></i>
                    </div><!--sd-title end-->
                    <div class="suggestions-list">

                      <?php while($row=mysqli_fetch_array($gett)) : ?>

                 <?php 
                
                $id = $row['id'];
                $title = $row['title'];
              
                $cost = $row['cost'];
                $date = $row['date'];
                
                 

                if($cost == 0){
                  $cost = 'Free';
                }else{
                  $cost = '$'.number_format($cost);
                }

               ?>




                      <div class="suggestion-usd">
                        <img src="images/resources/s1.png" alt="">
                        <div class="sgt-text">
                          <h4><?php echo $title; ?></h4>
                          <span>Cost: <?php echo $cost; ?></span>
                        </div>
                        <span><i class="fa fa-shopping-cart"></i></span>
                      </div>
                       <?php endwhile;   ?> 
                    
                      <div class="view-more">
                        <a href="resources.php" title="">View More</a>
                      </div>
                    </div><!--suggestions-list end-->
                  </div>
                </div><!--right-sidebar end-->
              </div>
            </div>
          </div><!-- main-section-data end-->
        </div> 
      </div>
    </main>


    <script type="text/javascript">
  //this will make the edit post button work
      $(document).ready(function() {
          $(document).on('click', '.edit_post', function() {
          var editpost_id = $(this).attr("id");
          $.ajax({
              url:"ajax/edit_post.php",
              method:"POST",
              data:{editpost_id:editpost_id},
              dataType:"json",
              success:function(data){
                  $('#post_body').val(data.post_body);
                  $('#editpost_id').val(data.post_id);
                  $('#ed_post').val("Edit Post");
                  $('#modalpost_edit').modal("show");
                }
            });
         });
        });



      //this will make the delete post work
  $(document).ready(function() {
          $(document).on('click', '.delete_post', function() {
            var post_id = $(this).attr("id");
          $.ajax({
              url:"ajax/delete_post.php",
              method:"POST",
              data:{post_id:post_id},
              dataType:"json",
              success:function(data){
                  $('#post_id').val(data.post_id);
                  $('#del_post').val("Delete Post");
                  $('#modalpost_delete').modal("show");
                }
            });
         });
        });
</script>

   <?php include ('./inc/footer.inc2.php');  ?> 