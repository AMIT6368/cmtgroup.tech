<div class="loginpage" style="margin-top: 79px;">
    <div class="inputdata">
        <input type="password" class="formdata" name="current_password" id="current_password" placeholder="Current Password">
        <input type="password" class="formdata" name="new_password" id="new_password" placeholder="New Password" ><br/>
        <button class="Lbtn" id="changepasswordfinal">Change Password</button><br>
        <a href="<?php echo base_url(); ?>UMyProfile">Back</a>
    </div>
</div>
<script type="text/javascript">
 var base_url = '<?php echo base_url(); ?>';

 
$('body').on('click','#changepasswordfinal',function(){
var current_password= $('#current_password').val();
var new_password= $('#new_password').val();
if((current_password) && (new_password)) 
{
 $('.loaderactive').removeAttr('style');
 $.ajax({
     type: 'POST',
     url: base_url+'UUpdatePassword',
     data: {current_password:current_password,new_password:new_password},
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
              setTimeout(function(){
              $(".loaderactive").css("display","none");
              $(".loaderactive").removeClass("active");
              location.href = "UMyProfile";
            }, 1000);
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
   if(!current_password)
   {
    error_notification('Please Enter Current Password');
   }
   if(!new_password)
   {
    error_notification('Please Enter New Password');
   } 
}
}); 
    </script>