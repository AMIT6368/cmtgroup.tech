<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="<?php echo  base_url(); ?>assets/images/icons/user.png" type="image/png" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
	<link href="<?php echo  base_url(); ?>assets/css/pace.min.css" rel="stylesheet" />
	<script src="<?php echo  base_url(); ?>assets/js/pace.min.js"></script>
	<link href="<?php echo  base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
	<link href="<?php echo  base_url(); ?>assets/css/app.css" rel="stylesheet">
	<link href="<?php echo  base_url(); ?>assets/css/icons.css" rel="stylesheet">

	<!--notification js -->
	<link rel="stylesheet" href="<?php echo  base_url(); ?>assets/plugins/notifications/css/lobibox.min.css" />
	<script src="<?php echo  base_url(); ?>assets/plugins/notifications/js/lobibox.min.js"></script>
	<script src="<?php echo  base_url(); ?>assets/plugins/notifications/js/notifications.min.js"></script>
	<script src="<?php echo  base_url(); ?>assets/plugins/notifications/js/notification-custom-script.js"></script>
	<!--common js -->
	<script src="<?php echo  base_url(); ?>assets/js/common.js"></script>
	<title><?php echo $title;  ?></title>
	<script>
function display_ct5() {
var x = new Date()
var ampm = x.getHours( ) >= 12 ? ' PM' : ' AM';

var x1=x.getMonth() + 1+ "/" + x.getDate() + "/" + x.getFullYear(); 
  xtime =  x.getHours( )+ ":" +  x.getMinutes() + ":" +  x.getSeconds() + " " + ampm;
 xdatetime = x1 + " - " +  x.getHours( )+ ":" +  x.getMinutes() + ":" +  x.getSeconds() + ":" + ampm;
// document.getElementById('ct55').innerHTML = xdatetime;
document.getElementById('ct511').innerHTML = xtime;
display_c5();
 }
 function display_c5(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct5()',refresh)
}
display_c5()
</script>
</head>
<body class="bg-lock-screen">
	<div class="wrapper">
		<div class="authentication-lock-screen d-flex align-items-center justify-content-center">
			<div class="card shadow-none bg-transparent">
				<div class="card-body p-md-5 text-center">
					<h2 class="text-white">Welcome to Subject Line</h2>
					<h3 class="text-white" ><span id='ct511'><?php echo date('h:i:s A');  ?></span></h3>
					<h5 class="text-white"><?php echo date('D d M Y');  ?></h5>
					<div class="">
						<img src="<?php echo base_url(); ?>assets/images/icons/user.png" class="mt-2" width="120" alt="" />
					</div>
					  <div class="p-4 border rounded">
					  	<div class="col-lg-12">
								<div class="card">
									<div class="card-body">
										<div class="row mb-3">
											<div class="col-sm-12">
												<h1 class="mb-0" style="color: red;">OPPS!!!</h1>
											</div>
											<div class="col-sm-12 text-secondary">
												<h3 style="color: blue;">Somthing Went Wrong. Please Try Again</h3>
											</div>
										</div>
										
									
										
									</div>
								</div>
							</div>
						
						<div class="col-12">
								<a href="<?php  echo  base_url(); ?>Login"><button type="button"class="btn btn-outline-danger px-5 loginformsubmit" id="loginformsubmit">Login Now</button> </a>
							</div>
					</div>
				</div>
			</div>
		</div>
		<footer class="page-footer" style="left:0% !important">
			<p class="mb-0">© <?php echo Date('Y') ?> SubjectLine.Click. All right reserved.</p>
		</footer>
	</div>
 </body>
</html>