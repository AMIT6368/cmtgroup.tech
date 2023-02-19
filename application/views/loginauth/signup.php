<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="<?php echo base_url();  ?>assets/frontend/loginauth/img/logo.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php  echo  $title; ?></title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="<?php echo base_url();  ?>assets/frontend/loginauth/style.css">
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
        <img style="width: 200px !important;height: 120px !important; margin-top:5px !important; margin-left: 65px !important;" src="<?php echo base_url();  ?>assets/frontend/loginauth/img/logo.png" alt="">
    </div>
    <div class="inputdata" style="height: 70vh !important;margin-left: 11px !important;" >
        <input type="text" class="full_name" name="full_name" id="full_name" placeholder="Full Name">
        <input type="email"  class="email"name="email" id="email" placeholder="Email">
        <input type="number" class="mobile_number" name="mobile_number" id="mobile_number" placeholder="Mobile Number">
        <input type="text" class="pin_code" name="pin_code" id="pin_code" placeholder="Pin Code">
        <input type="password" class="password" name="password" id="password" placeholder="Password" ><br/>
        <button class="Lbtn" id="signupformsubmit">Signup</button><br>
        <a href="<?php echo base_url(); ?>Login">Login</a>
    </div>
    <script src="<?php echo base_url();  ?>assets/frontend/loginauth/Script.js"></script>
    <script src="<?php echo base_url();  ?>assets/frontend/common.js"></script>
</body>
<script type="text/javascript">
 $(document).ready(function() { 
    setTimeout(function()
    {
     $(".loaderactive").css("display","none");
    }, 1000);

  });
 var base_url = '<?php echo base_url(); ?>';
$('body').on('click','#signupformsubmit',function(){
var full_name= $('.full_name').val();
var email= $('.email').val();
var mobile_number= $('.mobile_number').val();
var pin_code= $('.pin_code').val();
var password= $('.password').val();

if((full_name) && (email) && (mobile_number) && (pin_code) && (password)) 
{
 $('.loaderactive').removeAttr('style');
  // $(".loaderactive").addClass("active");
  $.ajax({
         type: 'POST',
         url: base_url+'SignUpProcess',
         data: {full_name:full_name,password:password,email:email,mobile_number:mobile_number,pin_code:pin_code},
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
   if(!full_name)
   {
    error_notification('Please Enter Full Name');
   } 
    if(!email)
   {
    error_notification('Please Enter Email ID');
   } 
    if(!mobile_number)
   {
    error_notification('Please Enter Mobile Number');
   } 
    if(!pin_code)
   {
    error_notification('Please Enter Pin Code');
   } 
    if(!password)
   {
    error_notification('Please Enter Password');
   } 

}
}); 
    </script>
</html>