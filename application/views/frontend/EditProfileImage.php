<div class="heding" >
       <h3 style="text-align: center;">Update Profile Image</h3>
    </div>
    <div class="inputdata" style="height: 70vh !important;margin-left: 12px !important; border-radius: 45px !important; clip-path: none !important; padding: 0 !important;" >
        <img id="profile_pic_image_result" src="<?php echo base_url();  ?><?php echo $userdata->profile_pic; ?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="250" height="250">
        
        <br>
        
       <!--<form method="post" id="upload_form" align="center" enctype="multipart/form-data">  -->
       <!-- <small style="color: #ffffff3d;">Select Profile Image</small>-->
       <!-- <input type="file" style="color:#a5a5a5 !important;" onchange="profile_pic_image(event)" class="first_name profile_pic" name="profile_pic" id="profile_pic" placeholder=">Select Profile Image">-->
        
        
       <!--   <input  type="hidden" name="dummydata" id="dummydata" value="dummydata">-->
        

       <!-- <br>-->
       <!-- <button class="Lbtn" id="updateProfile">Update Profile Image</button>-->
       <!-- </form>-->
       
       <form method="post" id="upload_form" align="center" enctype="multipart/form-data">  
           <small style="color: #ffffff3d;">Select Profile Image</small>
                <input type="file"  onchange="profile_pic_image(event)" name="image_file" id="image_file" />  
                <br />  
                <br />  
                <input type="submit" name="upload" id="upload" value="Upload" class="btn btn-info" />  
           </form>
        <br>
        <a href="<?php echo base_url(); ?>UMyProfile">Back</a>
        
        
    </div>
    
    
    <script> 
    
    
function profile_pic_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('profile_pic_image_result');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}

 $(document).ready(function(){  
      $('#upload_form').on('submit', function(e){  
           e.preventDefault();  
           if($('#image_file').val() == '')  
           {  
                error_notification('Please Select Image');
           }  
           else  
           {  
                $.ajax({  
                     url:"<?php echo base_url(); ?>Home/uploadImageFun",   
                     method:"POST",  
                     data:new FormData(this),  
                     contentType: false,  
                     cache: false,  
                     processData:false,  
                     success:function(data)  
                     {  
                         var resultdatamess = JSON.parse(data); 
                         
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
           }  
      });  
 });  
 </script>  
    

    