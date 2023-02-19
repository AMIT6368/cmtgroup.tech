<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?php echo base_url();  ?>assets/frontend/img/logo.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php  echo  $title; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/frontend/style.css">
    <!--notification js -->
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/frontend/notifications/css/lobibox.min.css" />
    <script src="<?php echo base_url();  ?>assets/frontend/notifications/js/lobibox.min.js"></script>
    <script src="<?php echo base_url();  ?>assets/frontend/notifications/js/notifications.min.js"></script>
    <script src="<?php echo base_url();  ?>assets/frontend/notifications/js/notification-custom-script.js"></script>
</head>
<body>
  <header class="header">
<div class="side-btn" onclick="togle()"><i class="fa-solid fa-angles-right"></i></div>
 <div class="clint_details">
    <span class="clint">Client Name</span>
    <span class="Clint_name"><?php echo $userdata->first_name; ?> <?php echo $userdata->last_name; ?></span>
</div>
<div class="clint_img"><img src="<?php echo base_url();  ?><?php echo $userdata->profile_pic; ?>" alt=""></div>
<div class="side_bar" id="side_bar" style="z-index: 100;">
<div class="close" onclick="togle()"><i class="fa-solid fa-xmark"></i></div>
<div class="sidebar_logo">
    <img src="<?php echo base_url();  ?>assets/frontend/img/logo.png" alt="">
     </div>
    <div class="hometab"><div class="Side_icon"><i class="fa-solid fa-house-chimney"></i></div><span class="text">Home</span></div>
    <div class="bar"></div>
    <div class="hometab"><div class="Side_icon"><i class="fa-solid fa-wallet"></i></div><span class="text">Wallets</span></div>
    <div class="bar"></div>
    <div class="hometab"><div class="Side_icon"><i class="fa-solid fa-clock-rotate-left"></i></div><span class="text">History</span></div>
    <div class="bar"></div>
    <div class="hometab"><div class="Side_icon"><i class="fa-solid fa-phone-volume"></i></div><span class="text_big">Customer Service</span></div>
    <div class="bar"></div>
    <div class="hometab"><div class="Side_icon"><i class="fa-sharp fa-solid fa-gear"></i></div><span class="text">setting</span></div>
    <div class="bar"></div>
    <a style="color: white;text-decoration: none;" href="#" class="hometab LogoutJS"><div class="Side_icon"><i class="fa-solid fa-right-from-bracket"></i></div><span class="text">Log-out</span></a>
    <div class="bar"></div>
    </div>
</header>
    <div class="loaderactive" >
        <span class="loader"></span>
    </div>
    <div class="heding" >
        <img style="width: 184px !important;height: 116px !important; margin-top:-10px !important; margin-left: 65px !important;" src="<?php echo base_url();  ?>assets/frontend/img/logo.png" alt="">
    </div>
     <form id="upload_form" method="post" enctype="multipart/form-data"> 
     <div class="inputdata" style="height: 101vh !important; margin-left: 11px !important;">
       <input type="hidden" name="user_id" id="user_id" value="<?php echo $userdata->user_id; ?>">
       
        <input type="text" class="bank_name" name="bank_name" id="bank_name" placeholder="Bank Name">
        <small style="color: #ffffff3d;">Bank Name</small>
        
        <input type="text" class="bank_account_number"name="bank_account_number" id="bank_account_number" placeholder="Bank Account Number">
        <small style="color: #ffffff3d;">Bank Account Number</small>
        
        <input type="text"  class="ifsc_code"name="ifsc_code" id="ifsc_code" placeholder="IFSC Code">
        <small style="color: #ffffff3d;">IFSC Code</small>
        
        <input type="text" class="acount_holder_name" name="acount_holder_name" id="acount_holder_name" placeholder="Account Holder Name">
        <small style="color: #ffffff3d;">Account Holder Name</small>
        
        <input type="file" style="color:#a5a5a5 !important;" class="aadhar_card_front" name="aadhar_card_front" id="aadhar_card_front" placeholder="Front Aadhar Card">
          <small style="color: #ffffff3d;">Front Aadhar Card</small>
          
        <input type="file" style="color:#a5a5a5 !important;" title="&nbsp;" class="aadhar_card_back" name="aadhar_card_back" id="aadhar_card_back" placeholder="Back Aadhar Card">
        <small style="color: #ffffff3d;">Back Aadhar Card</small>
        
        <input type="file" style="color:#a5a5a5 !important;" class="pan_card_image" name="pan_card_image" id="pan_card_image" placeholder="Pan Card">
        <small style="color: #ffffff3d;">Pan Card</small>
        
        <input type="file" style="color:#a5a5a5 !important;" class="profile_pic" name="profile_pic" id="profile_pic" placeholder="profile pic">
        <small style="color: #ffffff3d;">Upload Your Image</small>
        
        <br/>
        <input  class="Lbtn" type="submit" name="upload" id="upload" value="Verify Now" class="btn btn-info" />
        <!--<button class="Lbtn" id="verifydocument">Verify Now</button>-->
        <br>
    </div>
     </form> 
  <script src="<?php echo base_url();  ?>assets/frontend/Script.js"></script>
 <script src="<?php echo base_url();  ?>assets/frontend/common.js"></script>
</body>
<script type="text/javascript">
 var base_url = '<?php echo base_url(); ?>';
 setTimeout(function(){
  $(".loaderactive").css("display","none");
}, 1000);

$('#upload_form').on('submit', function(e){ 
e.preventDefault(); 
var bank_name= $('.bank_name').val();
var bank_account_number= $('.bank_account_number').val();
var ifsc_code= $('.ifsc_code').val();
var acount_holder_name= $('.acount_holder_name').val();

var aadhar_card_front = $('.aadhar_card_front').val(); 
var aadhar_card_back = $('.aadhar_card_back').val(); 
var pan_card_image = $('.pan_card_image').val(); 
var profile_pic = $('.profile_pic').val(); 
var user_id = $('#user_id').val(); 

if((aadhar_card_front) && (aadhar_card_back) && (pan_card_image) && (bank_name) && (bank_account_number) && (ifsc_code) && (acount_holder_name) && (profile_pic)) 
{
$('.loaderactive').removeAttr('style');  
    var form_data = new FormData();                  
    // form_data.append('aadhar_card_front', aadhar_card_front);
    // form_data.append('aadhar_card_back', aadhar_card_back);
    // form_data.append('pan_card_image', pan_card_image);
    // form_data.append('bank_name', bank_name);
    // form_data.append('bank_account_number', bank_account_number);
    // form_data.append('ifsc_code', ifsc_code);
    // form_data.append('acount_holder_name', acount_holder_name);
    // form_data.append('user_id', user_id);
  $.ajax({
        type: 'POST',
        url: base_url+'UVerifyDocumentProcess',  
        cache: false,
        contentType: false,
        processData: false,
        data: new FormData(this), 
        error: function() {
            setTimeout(function(){
              $(".loaderactive").css("display","none");
              $(".loaderactive").removeClass("active");
            }, 1000);
         },                         
        success: function(resultdata){
         var resultdatamess = JSON.parse(resultdata);
          if(resultdatamess.statusCode==200)
          {  
            setTimeout(function(){
              success_notification(resultdatamess.message);
              setTimeout(function(){
              $(".loaderactive").css("display","none");
              $(".loaderactive").removeClass("active");
              location.href = "UDashboard";
            }, 500);
            }, 1000);
          }else{
             setTimeout(function(){
              $(".loaderactive").css("display","none");
              $(".loaderactive").removeClass("active");
              error_notification(resultdatamess.message);
             }, 1000);
          }
        }
     });
}else{

   if(!bank_name)
   {
    error_notification('Please Enter Bank Name');
   }
  if(!bank_account_number)
   {
    error_notification('Please Enter Account Number');
   }
  if(!ifsc_code)
   {
    error_notification('Please Enter IFSC Code');
   }
   if(!acount_holder_name)
   {
    error_notification('Please Enter Account Holder Name');
   }  
  if(!aadhar_card_front)
   {
    error_notification('Please Upload Aaadhar Card Front Side Image');
   }
  if(!aadhar_card_back)
   {
    error_notification('Please Upload Aaadhar Card Back Side Image');
   }
   if(!pan_card_image)
   {
    error_notification('Please Upload Pan Card Image');
   }
   if(!profile_pic)
   {
    error_notification('Please Upload Your Image');
   }

}
}); 




    </script>
    
<script type="text/javascript">

  setTimeout(function()
  {
    $(".loaderactive").css("display","none");
  }, 1000);

  $('body').on('click','.LogoutJS',function(){
   swal({
    title: "Are you sure?",
    text: "This will logout from your account.",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, I Want to logout",
    closeOnConfirm: false
   }, function() {
      $.ajax({
             type: 'POST',
             url: base_url+'LogoutJS',
             data: {action: 'logout'},
             cache: false,
             success: function(resultdata){
              var resultdatamess = JSON.parse(resultdata);
                  swal({
              title: resultdatamess.message,
              showCancelButton: false,
              confirmButtonColor: 'LightSeaGreen',
              confirmButtonText: 'Ok',
              type: "success",
              timer: 2000,
              }, function(){
                  window.location.href = base_url;
              });

              
            }
        }); 

});

});
</script>
</html>