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
    <div class="loaderactive" >
        <span class="loader"></span>
    </div>
    <div class="heding" >
        <img style="width: 184px !important;height: 116px !important; margin-top:-10px !important; margin-left: 65px !important;" src="<?php echo base_url();  ?>assets/frontend/img/logo.png" alt="">
    </div>
    <div class="inputdata" style="height: 96vh !important;margin-left: 11px !important;" >
        <input type="text" class="first_name" name="first_name" id="first_name" placeholder="First Name">
        <input type="text" class="last_name"name="last_name" id="last_name" placeholder="Last Name">
        <input type="email"  class="email"name="email" id="email" placeholder="Email">
        <input type="number" class="mobile_number" name="mobile_number" id="mobile_number" placeholder="Mobile Number">
        <input type="date" class="dob" name="dob" style="color:#a5a5a5 !important; text-align: center !important;" id="dob" placeholder="Date of Birth">
        <input type="text" class="pan_number" name="pan_number" id="pan_number" placeholder="Pan Number">
        <input type="text" class="adhar_card" name="adhar_card" id="adhar_card" placeholder="Adhar Card">
        <input type="password" class="password" name="password" id="password" placeholder="Password" ><br/>
        <button class="Lbtn" id="signupformsubmit">Signup</button><br>
        <a href="<?php echo base_url(); ?>Login">Login</a>
    </div>
    <script src="<?php echo base_url();  ?>assets/frontend/Script.js"></script>
    <script src="<?php echo base_url();  ?>assets/frontend/common.js"></script>
</body>
<script type="text/javascript">
 var base_url = '<?php echo base_url(); ?>';
 setTimeout(function(){
  $(".loaderactive").css("display","none");
}, 1000);
$('body').on('click','#signupformsubmit',function(){
var first_name= $('.first_name').val();
var last_name= $('.last_name').val();
var email= $('.email').val();
var mobile_number= $('.mobile_number').val();
var dob= $('.dob').val();
var pan_number= $('.pan_number').val();
var adhar_card= $('.adhar_card').val();
var password= $('.password').val();

if((first_name) && (last_name) && (email) && (mobile_number) && (dob) && (pan_number) && (adhar_card) && (password)) 
{
 $('.loaderactive').removeAttr('style');
  // $(".loaderactive").addClass("active");
  $.ajax({
         type: 'POST',
         url: base_url+'SignUpProcess',
         data: {first_name:first_name,last_name:last_name,dob:dob,password:password,email:email,mobile_number:mobile_number,pan_number:pan_number,adhar_card:adhar_card},
         error: function() {
            error_notification('Somthing Went Wrong');
            setTimeout(function(){
              $(".loaderactive").css("display","none");
              $(".loaderactive").removeClass("active");
            }, 1000);
         },
         cache: false,
         success: function(resultdata){
          var resultdatamess = JSON.parse(resultdata);
          if(resultdatamess.statusCode==200)
          {  
            setTimeout(function(){
              success_notification(resultdatamess.message);
              setTimeout(function(){
              $(".loaderactive").css("display","none");
              $(".loaderactive").removeClass("active");
              location.href = "Login";
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
   if(!first_name)
   {
    error_notification('Please Enter First Name');
   }
   if(!last_name)
   {
    error_notification('Please Enter Last Name');
   } 
    if(!email)
   {
    error_notification('Please Enter Email ID');
   } 
    if(!mobile_number)
   {
    error_notification('Please Enter Mobile Number');
   } 
    if(!dob)
   {
    error_notification('Please Enter Date Of Birth');
   } 
    if(!pan_number)
   {
    error_notification('Please Enter Pan Number');
   } 
    if(!adhar_card)
   {
    error_notification('Please Enter Adhar Card');
   } 
    if(!password)
   {
    error_notification('Please Enter Password');
   } 
    if(!last_name)
   {
    error_notification('Please Enter Last Name');
   } 
    if(!last_name)
   {
    error_notification('Please Enter Last Name');
   } 
    if(!last_name)
   {
    error_notification('Please Enter Last Name');
   } 

}
}); 
    </script>
</html>