<!-- Header Start -->
    <div class="jumbotron jumbotron-fluid page-header1 position-relative overlay-bottom" style="margin-bottom: 90px;">
        <div class="container text-center py-5">
            <h1 class="text-white display-1">Contact Us</h1>
            <div class="d-inline-flex text-white mb-5">
                <p class="m-0 text-uppercase">
                    <a class="text-white" href="<?php echo base_url(); ?>Home">Home</a>
                </p>
                <i class="fa fa-angle-double-right pt-1 px-3"></i>
                <p class="m-0 text-uppercase">
                    <a href="<?php echo base_url(); ?>ContactUs" class="text-white">Contact Us</a>
                </p>
            </div>
        </div>
    </div>

    <!-- Header End -->
    <!-- Contact Start -->

    <div class="container-fluid py-5">

        <div class="container py-5">

            <div class="row align-items-center">

                <div class="col-lg-5 mb-5 mb-lg-0">

                    <div class="bg-light d-flex flex-column justify-content-center px-5" style="height: 450px;">

                        <div class="d-flex align-items-center mb-5">

                            <div class="btn-icon bg-primary mr-4">

                                
                                    <lord-icon
                                        src="https://cdn.lordicon.com/dfxesbyu.json"
                                        trigger="loop"
                                        delay="2000"
                                        style="width:250px;height:250px">
                                    </lord-icon>

                            </div>

                            <div class="mt-n1">
                                <h4>Our Location</h4>
                                <p class="m-0">Indore, M.P.-452010</p>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mb-5">
                            <div class="btn-icon bg-secondary mr-4">
                                    <lord-icon
                                        src="https://cdn.lordicon.com/abxptjcw.json"
                                        trigger="loop"
                                        delay="2000"
                                        style="width:250px;height:250px">
                                    </lord-icon>
                            </div>
                            <div class="mt-n1">

                                <h4>Call Us</h4>

                                <a href="tel:+917366012157"><p class="m-0">+917366012157</p></a>

                            </div>

                        </div>

                        <div class="d-flex align-items-center">
                            <div class="btn-icon bg-warning mr-4">
                                    <lord-icon
                                        src="https://cdn.lordicon.com/egpbfgcp.json"
                                        trigger="loop"
                                        delay="2000"
                                        style="width:250px;height:250px">
                                    </lord-icon>
                            </div>
                            <div class="mt-n1">
                                <h4>Email Us</h4>
                                <a href="mailto:support@esewa.link"><p class="m-0">support@esewa.link</p></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7" >

                    <div class="section-title position-relative mb-4">

                        <h6 class="d-inline-block position-relative text-secondary text-uppercase pb-2">Need Help?</h6>

                        <h1 class="display-4">Send Us A Message</h1>

                    </div>

                    <div class="contact-form" >

                        <form id="contact_us_form" class="contact_us_form">

                            <div class="row">

                                <div class="col-6 form-group">

                                    <input type="text" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Your Name" id="your_name" required="required">

                                    <span id="your_name_error" style="color:red; display: none;"></span>

                                </div>

                                <div class="col-6 form-group">

                                    <input type="email" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Your Email" id="your_email" required="required">

                                    <span id="your_email_error" style="color:red; display: none;"></span>

                                </div>

                            </div>

                            <div class="form-group">

                                <input type="text" class="form-control border-top-0 border-right-0 border-left-0 p-0" placeholder="Subject" required="required" id="your_subject">

                                <span id="your_subject_error" style="color:red; display: none;"></span>

                            </div>

                            <div class="form-group">

                                <textarea class="form-control border-top-0 border-right-0 border-left-0 p-0" rows="5" placeholder="Message" required="required" id="your_message"></textarea>

                                <span id="your_message_error" style="color:red; display: none;"></span>

                            </div>

                            <div>

                                <button class="btn btn-primary py-3 px-5" id="final_submit" type="button">Send Message</button>



                            </div>

                        </form>

                    </div>

                </div>

            </div>

        </div>

    </div>

    <!-- Contact End -->

<script type="text/javascript">
$('body').on('keyup','#your_name',function(){
  var your_name= $('#your_name').val();
  if(your_name){
   $('#your_name_error').hide();
  }else{
  $('#your_name_error').show('slow');
  }
});

$('body').on('keyup','#your_email',function(){
  var your_email= $('#your_email').val();
  if(your_email){
   $('#your_email_error').hide();
  }else{
  $('#your_email_error').show('slow');
  }
});

$('body').on('keyup','#your_subject',function(){
  var your_subject= $('#your_subject').val();
  if(your_subject){
   $('#your_subject_error').hide();
  }else{
  $('#your_subject_error').show('slow');
  }
});

$('body').on('keyup','#your_message',function(){
  var your_message= $('#your_message').val();
  if(your_message){
   $('#your_message_error').hide();
  }else{
  $('#your_message_error').show('slow');
  }
}); 



$('body').on('click','#final_submit',function(){

var your_name= $('#your_name').val();
var your_email= $('#your_email').val();
var your_subject= $('#your_subject').val();
var your_message= $('#your_message').val();
if((your_message) && (your_subject) && (your_email) && (your_name)) 
{
$.ajax({
     type: 'POST',
     url: base_url+'ContactUsProcess',
     data: {your_name:your_name,your_email:your_email,your_subject:your_subject,your_message:your_message},
     error: function() {
     },
     cache: false,
     success: function(resultdata){
      var resultdatamess = JSON.parse(resultdata);
      if(resultdatamess.statusCode==200)
      { 

         $("#contact_us_form").trigger("reset");
        Swal.fire({
        title: resultdatamess.title,
        icon: 'success',
        html:resultdatamess.message,
        showCloseButton: false,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonText:'<i class="fa fa-thumbs-up"></i> Great!',
        confirmButtonAriaLabel: 'Thumbs up, great!', 
        });
        
      }else if(resultdatamess.statusCode==201)
      {
        Swal.fire({
        title: resultdatamess.title,
        icon: 'warning',
        html:resultdatamess.message,
        showCloseButton: false,
        showCancelButton: false,
        focusConfirm: false,
        confirmButtonText:'<i class="fa fa-thumbs-up"></i> Great!',
        confirmButtonAriaLabel: 'Thumbs up, Cool!', 
        });

      }
    }
});



    // $("#contact_us_form").trigger("reset");
    //   Swal.fire({
    //   title: '<strong>SUCCESS!!</strong>',
    //   icon: 'success',
    //   html:'Your email has been succcessfully sent.',
    //   showCloseButton: false,
    //   showCancelButton: false,
    //   focusConfirm: false,
    //   confirmButtonText:'<i class="fa fa-thumbs-up"></i> Great!',
    //   confirmButtonAriaLabel: 'Thumbs up, great!',
    // })

}else{

   if(!your_name)
   {
     $('#your_name_error').html('Please Enter Full Name');
     $('#your_name_error').show('slow');
   }
   if(!your_email)
   {
    $('#your_email_error').html('Please Enter Email');
    $('#your_email_error').show('slow');
   }

   if(!your_subject)
   {
    $('#your_subject_error').html('Please Enter Subject');
    $('#your_subject_error').show('slow');
   }

   if(!your_message)
   {
    $('#your_message_error').html('Please Enter Message');
    $('#your_message_error').show('slow');
   } 
}

});     

</script>