<div class="heding" >
       <h3 style="text-align: center;">Update Profile</h3>
    </div>
    <div class="inputdata" style="height: 92vh !important;margin-left: 12px !important; border-radius: 45px !important; clip-path: none !important; padding: 0 !important;" >
        
        <input type="text" class="first_name" name="first_name" id="first_name" placeholder="Fist Name" value="<?php echo $userdata->first_name; ?>">
        <small style="color: #ffffff3d;">First Name</small>
        
         
        <input type="text" class="last_name"name="last_name" id="last_name" placeholder="Last Name" value="<?php echo $userdata->last_name; ?>">
        <small style="color: #ffffff3d;">Last Name</small>
        
         
        <input type="text"  class="email" name="email" id="email" placeholder="Email" value="<?php echo $userdata->email; ?>">
        <small style="color: #ffffff3d;">Email</small>
        
         
        <input type="number" class="mobile_number" name="mobile_number" id="mobile_number" placeholder="Mobile Number" value="<?php echo $userdata->mobile; ?>">
        <small style="color: #ffffff3d;">Mobile Number</small>
         
        <input type="date" class="dob" name="dob" style="color:#a5a5a5 !important; text-align: center !important;" id="dob" placeholder="Date of Birth" value="<?php echo $userdata->date_of_birth; ?>"><small style="color: #ffffff3d;">Date Of Birth</small>
        
        
        <br>
        <button class="Lbtn" id="updateProfile">Update Profile</button><br>
        <a href="<?php echo base_url(); ?>UMyProfile">Back</a>
    </div>
    
    <script type="text/javascript">
 var base_url = '<?php echo  base_url(); ?>';

 
 
$('body').on('click','#updateProfile',function(){
var first_name= $('#first_name').val();
var last_name= $('#last_name').val();
var email= $('#email').val();
var mobile_number= $('#mobile_number').val();
var dob= $('#dob').val();
if((first_name) && (last_name) && (email) && (mobile_number) && (dob))  
{
 $('.loaderactive').removeAttr('style');
 $.ajax({
     type: 'POST',
     url: base_url+'UUpdateProfileProcess',
     data: {first_name: first_name,last_name:last_name,email:email,mobile_number:mobile_number,dob:dob},
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

        }, 1000);
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
   if(!mobile_number)
   {
    error_notification('Please Enter Mobile Number');
   }
   if(!dob)
   {
    error_notification('Please Enter Date Of Birth');
   }
   if(!email)
   {
    error_notification('Please Enter Email Id');
   }
   if(!last_name)
   {
    error_notification('Please Enter Last Name');
   }
   if(!first_name)
   {
    error_notification('Please Enter First Name');
   }
}
}); 
    </script>
    
    
    