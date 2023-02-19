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
    <div class="loginpage">
    <div class="heding"><img src="<?php echo base_url();  ?>assets/frontend/loginauth/img/logo.png" alt=""></div>
    <div class="inputdata">
        <input type="number" class="formdata" name="user_number" id="user_number" placeholder="Mobile Number">
        <input type="password" class="formdata" name="user_password" id="user_password" placeholder="Password" ><br/>
        <button class="Lbtn" id="loginformsubmit">Login</button><br>
        <a href="<?php echo base_url(); ?>Signup">Registration</a>
    </div>
</div>
    <script src="<?php echo base_url();  ?>assets/frontend/loginauth/Script.js"></script>
    <script src="<?php echo base_url();  ?>assets/frontend/common.js"></script>
</body>
<script type="text/javascript">
 var base_url = '<?php echo base_url(); ?>';
 $(document).ready(function() {  
    $(".loaderactive").addClass("active");
        $.ajax({
         type: 'POST',
         url: base_url+'Getcookie',
         data: {logintype: 'COOKIE'},
         error: function() {
            setTimeout(function(){
              $(".loaderactive").css("display","none");
            }, 500);
         },
         cache: false,
         success: function(resultdata){
          var resultdatamess = JSON.parse(resultdata);
          if(resultdatamess.statusCode==200)
         { 
           window.setTimeout(function () {
           if(resultdatamess.Usertype=='Superadmin'){
            setTimeout(function(){
             success_notification('We are Redirect to DashBoard');
                setTimeout(function()
                {
                 $(".loaderactive").css("display","none");
                 $(".loaderactive").removeClass("active");
                 location.href = "SDashboard";
                }, 500);
            }, 1000);
        }else{
           setTimeout(function(){
              success_notification('We are Redirect to DashBoard');
              setTimeout(function(){
              $(".loaderactive").css("display","none");
              $(".loaderactive").removeClass("active");
                location.href = "UDashboard";
            }, 800);
            }, 1000);
          }
        }, 1500);
      }
      else
      {
        $(".loaderactive").css("display","none");
        $(".loaderactive").removeClass("active"); 
      }
      }
    });
  });
 
 
 
$('body').on('click','#loginformsubmit',function(){
var username= $('#user_number').val();
var Password= $('#user_password').val();
if((username) && (Password)) 
{
 $('.loaderactive').removeAttr('style');
 $.ajax({
     type: 'POST',
     url: base_url+'LoginProcess',
     data: {username: username,loginpassword:Password},
     error: function() {
        $(".loaderactive").css("display","none");
        $(".loaderactive").removeClass("active");
     },
     cache: false,
     success: function(resultdata){
      var resultdatamess = JSON.parse(resultdata);
      if(resultdatamess.statusCode==200)
      { 
        success_notification(resultdatamess.message);
        window.setTimeout(function () {
        if(resultdatamess.Usertype=='Superadmin'){
              setTimeout(function(){
              $(".loaderactive").css("display","none");
              $(".loaderactive").removeClass("active");
              location.href = "SDashboard";
            }, 1000);
        }else{
              setTimeout(function(){
              $(".loaderactive").css("display","none");
              $(".loaderactive").removeClass("active");
                location.href = "UDashboard";
            }, 1000);
        }
        }, 1500);
      }
      else
      {
         error_notification(resultdatamess.message);
         setTimeout(function(){
            $(".loaderactive").css("display","none");
            $(".loaderactive").removeClass("active");
         }, 700);
      }
    }
});
}else{
   if(!username)
   {
    error_notification('Please Enter Mobile Number');
   }
   if(!Password)
   {
    error_notification('Please Enter Password');
   } 
}
}); 
    </script>
</html>