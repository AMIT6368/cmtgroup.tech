
<footer>
  <p class="copyright">© <?php  echo Date('Y'); ?> Algo Trader | All right reserved</p>
</footer>
<style type="text/css">
  .copyright {
    /*margin-top: 30px;*/
    margin-bottom: 0;
    font-size: 13px;
    opacity: 0.6;
    text-align: center;
}
</style>

<script type="text/javascript">
var base_url = '<?php echo base_url(); ?>';
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


$('body').on('click','.tradeing_status',function(){
   swal({
    title: "Are you sure?",
    text: "This will Allowed For Trading.",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, I Allow",
    closeOnConfirm: false
   }, function() {
      $.ajax({
             type: 'POST',
             url: base_url+'UTradeingStatusChange',
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
              timer: 1500,
              }, function(){
                  window.location.reload();
              });

              
            }
        }); 

});

});
</script>
  <script src="<?php echo base_url();  ?>assets/frontend/Script.js"></script>
 <script src="<?php echo base_url();  ?>assets/frontend/common.js"></script>
</body>