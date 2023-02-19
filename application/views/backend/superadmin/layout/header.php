<!doctype html>
<html lang="en" class="dark-theme">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!--jquery-->
<script src="<?php  echo base_url(); ?>assets/backend/assets/js/jquery.min.js"></script>
<!--favicon-->
<link rel="icon" href="<?php  echo base_url(); ?>assets/backend/assets/JDS.png" type="image/png" />
<!--plugins-->
<link href="<?php  echo base_url(); ?>assets/backend/assets/plugins/input-tags/css/tagsinput.css" rel="stylesheet" />
<link href="<?php  echo base_url(); ?>assets/backend/assets/plugins/notifications/css/lobibox.min.css" rel="stylesheet"/>
<link href="<?php  echo base_url(); ?>assets/backend/assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
<link href="<?php  echo base_url(); ?>assets/backend/assets/plugins/simplebar/css/simplebar.css" rel="stylesheet" />
<link href="<?php  echo base_url(); ?>assets/backend/assets/plugins/perfect-scrollbar/css/perfect-scrollbar.css" rel="stylesheet" />
<link href="<?php  echo base_url(); ?>assets/backend/assets/plugins/metismenu/css/metisMenu.min.css" rel="stylesheet" />
<link href="<?php  echo base_url(); ?>assets/backend/assets/plugins/datatable/css/dataTables.bootstrap5.min.css" rel="stylesheet" />
<!-- loader-->
<link href="<?php  echo base_url(); ?>assets/backend/assets/css/pace.min.css" rel="stylesheet" />
<script src="<?php  echo base_url(); ?>assets/backend/assets/js/pace.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- Bootstrap CSS -->
<link href="<?php  echo base_url(); ?>assets/backend/assets/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
<link href="<?php  echo base_url(); ?>assets/backend/assets/css/app.css" rel="stylesheet">
<link href="<?php  echo base_url(); ?>assets/backend/assets/css/icons.css" rel="stylesheet">
<!--notification js -->
<link rel="stylesheet" href="<?php echo  base_url(); ?>assets/backend/assets/plugins/notifications/css/lobibox.min.css" />
<!-- Theme Style CSS -->
<link rel="stylesheet" href="<?php  echo base_url(); ?>assets/backend/assets/css/dark-theme.css" />
<link rel="stylesheet" href="<?php  echo base_url(); ?>assets/backend/assets/css/semi-dark.css" />
<link rel="stylesheet" href="<?php  echo base_url(); ?>assets/backend/assets/css/header-colors.css" />
<script src="<?php echo  base_url(); ?>assets/backend/assets/plugins/notifications/js/lobibox.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/backend/assets/plugins/notifications/js/notifications.min.js"></script>
<script src="<?php echo  base_url(); ?>assets/backend/assets/plugins/notifications/js/notification-custom-script.js"></script>
<!--common js -->
<script src="<?php echo  base_url(); ?>assets/backend/assets/js/common.js"></script>
<title><?php  echo $title; ?></title>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</head>
<script>

function display_ct5() 
{
  var x = new Date()
  var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';
  var x1=x.getMonth() + 1+ "/" + x.getDate() + "/" + x.getFullYear(); 
      xtime =  x.getHours( )+ ":" +  x.getMinutes() + ":" +  x.getSeconds() + " " + ampm;
      xdatetime = x1 + " - " +  x.getHours( )+ ":" +  x.getMinutes() + ":" +  x.getSeconds() + ":" + ampm;
      document.getElementById('HeaderClockMobile').innerHTML = xtime;
      document.getElementById('HeaderClockMobile1').innerHTML = xtime;
    //   document.getElementById('HeaderClockDesktop').innerHTML = xtime;
      display_c5();
}
function display_c5()
{
  var refresh=1000; // Refresh rate in milli seconds
  mytime=setTimeout('display_ct5()',refresh)
}
  display_c5()
</script>
<style>
    body {
  background: linear-gradient(200deg, #e34716e6, #ab114cf2, #45d9078a, #23d5abd9);
  background-size: 200% 200%;
  animation: gradient 15s ease infinite;
  height: 100vh;
}

@keyframes gradient {
  0% {
    background-position: 0% 50%;
  }
   25% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
   75% {
    background-position: 0% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}
</style>