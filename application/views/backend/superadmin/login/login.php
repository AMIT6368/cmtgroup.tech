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
<body class="bg-lock-screen" style="background: linear-gradient(90deg,#e52e71,#ff8a00) !important;">
	<div style="display:none" id='loadingloginpage' class="wrapper slider-thumb">
		<div class="authentication-lock-screen d-flex align-items-center justify-content-center ">
			<div class="card shadow-none bg-transparent ">
				<div class="card-body p-md-5 text-center ">
					<h4 class="text-white" style="color:#000 !important;font-weight: 900;">Swastika (CRM)</h4>
					<h3 class="text-white" ><span id='ct511'><?php echo date('h:i:s A');  ?></span></h3>
					<h5 class="text-white"><?php echo date('D d M Y');  ?></h5>
					<div class="">
						<img src="<?php echo base_url(); ?>assets/JDS.png" class="mt-2" width="120" alt="" />
					</div>
					<form method="POST" id="myForm"action="#">
					<div class="mb-3 mt-3">
						<label for="username" class="form-label" style="color:#fff;">Enter Your Mobile Number</label>
						<input type="text" class="form-control" id="username" name="username" placeholder="User Name"  autocomplete="username"/>
					</div>
					<div class="mb-3 mt-3">
						<label for="Password" style="color:#fff;"class="form-label">Enter Your Password</label>
						<input type="password" id="Password" name="Password" class="form-control" placeholder="Enter Your Password" autocomplete="current-password"/>
					</div>
					<div class="d-grid">
						<button type="button" class="btn btn-outline-success px-5 loginformsubmit" id="loginformsubmit">Login</button>
					</div>
					</form>
				</div>
			</div>
		</div>
		<footer class="page-footer" style="left:0% !important">
			<p class="mb-0">© <?php echo Date('Y') ?> Swastika (CRM) | All right reserved | Powered By <a href="#">Swastika</a></p>
		</footer>
	</div>
	<div style="display:block" id='loadingpage'>
	    <div class="spinner-box">
	        <h3 style="margin-top: -210px;color: aqua;">Please wait...</h3><br><br>
        <div class="configure-border-1">  
          <div class="configure-core"></div>
        </div>  
        <div class="configure-border-2">
          <div class="configure-core"></div>
        </div> 
     </div>
    </div>
	<div class='loadingpageeeee' style="display:none" id='loadingpageeeee'>
	    <ul>
        <li>P</li>
         <li>L</li>
         <li>E</li>
        <li>A</li>
        <li>S</li>
        <li>E</li>
        <li> </li>
        <li> </li>
        <li> </li>
        <li> </li>
        <li>W</li>
        <li>A</li>
        <li>I</li>
        <li>T</li>
    </ul>
	</div>
	<script type="text/javascript">
		 var base_url = '<?php echo  base_url();  ?>';
		   $(document).ready(function() {  
                $.ajax({
                 type: 'POST',
                 url: base_url+'Superadmin/Getcookie',
                 data: {logintype: 'COOKIE'},
                 error: function() {
                     error_notification('Something Went Wrong. Please Try After Sometime.'); 
                     $('#loadingpage').hide(); 
                     $('#loadingloginpage').show();
                 },
                 cache: false,
                 success: function(resultdata){
                  var resultdatamess = JSON.parse(resultdata);
                  if(resultdatamess.statusCode==200)
                  {  
                  	window.setTimeout(function () {
                  	if(resultdatamess.Usertype=='Superadmin'){
                  	     location.href = "SDashboard";
                  	}else if(resultdatamess.Usertype=='Employee'){
                  	     location.href = "UDashboard";
                  	}else if(resultdatamess.Usertype=='Leader'){
                  	     location.href = "MDashboard";
                  	}else if(resultdatamess.Usertype=='SEmployee'){
                         location.href = "SBADashboard";
                  	}else{
                  	    $('#loadingpage').hide(); 
                        $('#loadingloginpage').show();
                  	 //  location.href = "Login";
                  	}
                    }, 1500);
                  }else{
                      $('#loadingpage').hide(); 
                      $('#loadingloginpage').show(); 
                      
                  }
                }
            });
           
          });
          
          
		$('body').on('click','#loginformsubmit',function(){
        var username= $('#username').val();
        var Password= $('#Password').val();
        if((username) && (Password)) 
        {
         $.ajax({
             type: 'POST',
             url: base_url+'LoginProcess',
             data: {username: username,loginpassword:Password},
             error: function() {
                error_notification('Something Went Wrong. Please Try After Sometime.'); 
             },
             cache: false,
             success: function(resultdata){
              var resultdatamess = JSON.parse(resultdata);
              if(resultdatamess.statusCode==200)
              { 
              	success_notification(resultdatamess.message);
              	window.setTimeout(function () {
              	if(resultdatamess.Usertype=='Superadmin'){
              	     location.href = "SDashboard";
              	}else if(resultdatamess.Usertype=='Employee'){
              	     location.href = "UDashboard";
              	}else if(resultdatamess.Usertype=='Leader'){
              	     location.href = "MDashboard";
              	}else if(resultdatamess.Usertype=='SEmployee'){
                     location.href = "SBADashboard";
              	}else{
              	   error_notification('Something Went Wrong. Please Try Again');   
              	}
                }, 1500);
              }
              else if(resultdatamess.statusCode==201)
              {
               error_notification(resultdatamess.message);    
              }
              else if(resultdatamess.statusCode==202)
              {
                warning_notification(resultdatamess.message);     
              }
              else if(resultdatamess.statusCode==203)
              {
                error_notification(resultdatamess.message);      
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
<style>
@keyframes spin {
  from {
    transform: rotate(0);
  }
  to{
    transform: rotate(359deg);
  }
}

@keyframes spin3D {
  from {
    transform: rotate3d(.5,.5,.5, 360deg);
  }
  to{
    transform: rotate3d(0deg);
  }
}

@keyframes configure-clockwise {
  0% {
    transform: rotate(0);
  }
  25% {
    transform: rotate(90deg);
  }
  50% {
    transform: rotate(180deg);
  }
  75% {
    transform: rotate(270deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes configure-xclockwise {
  0% {
    transform: rotate(45deg);
  }
  25% {
    transform: rotate(-45deg);
  }
  50% {
    transform: rotate(-135deg);
  }
  75% {
    transform: rotate(-225deg);
  }
  100% {
    transform: rotate(-315deg);
  }
}

@keyframes pulse {
  from {
    opacity: 1;
    transform: scale(1);
  }
  to {
    opacity: .25;
    transform: scale(.75);
  }
}

/* GRID STYLING */

* {
  box-sizing: border-box;
}

body {
  min-height: 100vh;
  background-color: #1d2630;
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  align-items: flex-start;
}

.spinner-box {
  width: 300px;
  height: 300px;
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: transparent;
}

/* SPINNING CIRCLE */

.leo-border-1 {
  position: absolute;
  width: 150px;
  height: 150px;
  padding: 3px;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
  background: rgb(63,249,220);
  background: linear-gradient(0deg, rgba(63,249,220,0.1) 33%, rgba(63,249,220,1) 100%);
  animation: spin3D 1.8s linear 0s infinite;
}

.leo-core-1 {
  width: 100%;
  height: 100%;
  background-color: #37474faa;
  border-radius: 50%;
}

.leo-border-2 {
  position: absolute;
  width: 150px;
  height: 150px;
  padding: 3px;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
  background: rgb(251, 91, 83);
  background: linear-gradient(0deg, rgba(251, 91, 83, 0.1) 33%, rgba(251, 91, 83, 1) 100%);
  animation: spin3D 2.2s linear 0s infinite;
}

.leo-core-2 {
  width: 100%;
  height: 100%;
  background-color: #1d2630aa;
  border-radius: 50%;
}

/* ALTERNATING ORBITS */

.circle-border {
  width: 150px;
  height: 150px;
  padding: 3px;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50%;
  background: rgb(63,249,220);
  background: linear-gradient(0deg, rgba(63,249,220,0.1) 33%, rgba(63,249,220,1) 100%);
  animation: spin .8s linear 0s infinite;
}

.circle-core {
  width: 100%;
  height: 100%;
  background-color: #1d2630;
  border-radius: 50%;
}

/* X-ROTATING BOXES */

.configure-border-1 {
  width: 115px;
  height: 115px;
  padding: 3px;
  position: absolute;
  display: flex;
  justify-content: center;
  align-items: center;
  background: #fb5b53;
  animation: configure-clockwise 3s ease-in-out 0s infinite alternate;
}

.configure-border-2 {
  width: 115px;
  height: 115px;
  padding: 3px;
  left: -115px;
  display: flex;
  justify-content: center;
  align-items: center;
  background: rgb(63,249,220);
  transform: rotate(45deg);
  animation: configure-xclockwise 3s ease-in-out 0s infinite alternate;
}

.configure-core {
  width: 100%;
  height: 100%;
  background-color: #1d2630;
}

/* PULSE BUBBLES */

.pulse-container {
  width: 120px;
  display: flex;
  justify-content: space-between;
  align-items: center;
}

.pulse-bubble {
  width: 20px;
  height: 20px;
  border-radius: 50%;
  background-color: #3ff9dc;
}

.pulse-bubble-1 {
    animation: pulse .4s ease 0s infinite alternate;
}
.pulse-bubble-2 {
    animation: pulse .4s ease .2s infinite alternate;
}
.pulse-bubble-3 {
    animation: pulse .4s ease .4s infinite alternate;
}

/* SOLAR SYSTEM */

.solar-system {
  width: 250px;
  height: 250px;
  display: flex;
  justify-content: center;
  align-items: center;
}

.orbit {
	position: relative;
	display: flex;
	justify-content: center;
	align-items: center;
	border: 1px solid #fafbfC;
	border-radius: 50%;
} 

.earth-orbit {
	width: 165px;
	height: 165px;
  -webkit-animation: spin 12s linear 0s infinite;
}

.venus-orbit {
	width: 120px;
	height: 120px;
  -webkit-animation: spin 7.4s linear 0s infinite;
}

.mercury-orbit {
	width: 90px;
	height: 90px;
  -webkit-animation: spin 3s linear 0s infinite;
}

.planet {
	position: absolute;
	top: -5px;
  width: 10px;
  height: 10px;
	border-radius: 50%;
  background-color: #3ff9dc;
}

.sun {
	width: 35px;
	height: 35px;
	border-radius: 50%;
	background-color: #ffab91;
}

.leo {
	position: absolute;
	display: flex;
	justify-content: center;
	align-items: center;
	border-radius: 50%;
}

.blue-orbit {
	width: 165px;
	height: 165px;
  border: 1px solid #91daffa5;
  -webkit-animation: spin3D 3s linear .2s infinite;
}

.green-orbit {
	width: 120px;
	height: 120px;
  border: 1px solid #91ffbfa5;
  -webkit-animation: spin3D 2s linear 0s infinite;
}

.red-orbit {
	width: 90px;
	height: 90px;
  border: 1px solid #ffca91a5;
  -webkit-animation: spin3D 1s linear 0s infinite;
}

.white-orbit {
	width: 60px;
	height: 60px;
  border: 2px solid #ffffff;
  -webkit-animation: spin3D 10s linear 0s infinite;
}

.w1 {
  transform: rotate3D(1, 1, 1, 90deg);
}

.w2 {
  transform: rotate3D(1, 2, .5, 90deg);
}

.w3 {
  transform: rotate3D(.5, 1, 2, 90deg);
}

.three-quarter-spinner {
  width: 50px;
  height: 50px;
  border: 3px solid #fb5b53;
  border-top: 3px solid transparent;
  border-radius: 50%;
  animation: spin .5s linear 0s infinite;
}  
    
</style>
<style>

.slider-thumb::before {
	position: absolute;
	content: "";
	left: 30%;
	top: 20%;
	width: 450px;
	height: 450px;
	background: #17141d;
	border-radius: 62% 47% 82% 35% / 45% 45% 80% 66%;
	will-change: border-radius, transform, opacity;
	animation: sliderShape 5s linear infinite;
	display: block;
	z-index: -1;
	-webkit-animation: sliderShape 5s linear infinite;
}
@keyframes sliderShape{
  0%,100%{
  border-radius: 42% 58% 70% 30% / 45% 45% 55% 55%;
    transform: translate3d(0,0,0) rotateZ(0.01deg);
  }
  34%{
      border-radius: 70% 30% 46% 54% / 30% 29% 71% 70%;
    transform:  translate3d(0,5px,0) rotateZ(0.01deg);
  }
  50%{
    transform: translate3d(0,0,0) rotateZ(0.01deg);
  }
  67%{
    border-radius: 100% 60% 60% 100% / 100% 100% 60% 60% ;
    transform: translate3d(0,-3px,0) rotateZ(0.01deg);
  }
}
        body {
 margin: 0;
 display: flex;
 align-items: center;
 justify-content: center;
 height: 100vh;
 font-family: arial;
  background-color:black;
  
}

ul {
  margin: 0;
  padding: 0;
  display: flex;
}

ul li {
  list-style-type: none;
  font-size: 80px;
  letter-spacing: 30px;
  animation: loading 4s linear infinite
}

@keyframes loading {
  0% {
    color: tomato;
    transform: translateX(-50px);
    letter-spacing: 20px;
    opacity: 0;
  }

  10% {
    opacity: 1;
  }

  50% {
    letter-spacing: -20px;
    opacity: 1;
  }

  100% {
    color: blue;
    transform: translateX(50px);
    letter-spacing: 20px;
    opacity: 0;
  }
}

ul li:nth-child(1) {
  animation-delay: 0s;
}

ul li:nth-child(2) {
  animation-delay: 0.2s;
}

ul li:nth-child(3) {
  animation-delay: 0.4s;
}

ul li:nth-child(4) {
  animation-delay: 0.6s;
}

ul li:nth-child(5) {
  animation-delay: 0.8s;
}

ul li:nth-child(6) {
  animation-delay: 1s;
}

ul li:nth-child(7) {
  animation-delay: 1.2s;
}
ul li:nth-child(8) {
  animation-delay: 1.3s;
}ul li:nth-child(9) {
  animation-delay: 1.5s;
}ul li:nth-child(10) {
  animation-delay: 1.6s;
}
    </style>
    
    <style>
        /*Neon*/
h4 {
  text-align: center;
  font-size: 3em;
  margin-bottom: 0;
  margin-top: 0;
  line-height: 1;
  text-decoration: none;
  color: #fff;
}

h4:nth-child(1) {
  font-family: Monoton;
  animation: neon1 1.5s ease-in-out infinite alternate;
}

h4:nth-child(2) {
  font-family: Iceland;
  animation: neon2 1.5s ease-in-out infinite alternate;
}

h4:nth-child(3) {
  font-family: Pacifico;
  animation: neon3 1.5s ease-in-out infinite alternate;
}

h4:nth-child(4) {
  font-family: "Press Start 2P";
  animation: neon4 1.5s ease-in-out infinite alternate;
}

h4:nth-child(5) {
  font-family: Audiowide;
  animation: neon5 1.5s ease-in-out infinite alternate;
}

h4:nth-child(6) {
  font-family: Vampiro One;
  animation: neon6 1.5s ease-in-out infinite alternate;
}

/*glow*/

@keyframes neon1 {
  from {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #ff1177,
      0 0 70px #ff1177, 0 0 80px #ff1177, 0 0 100px #ff1177, 0 0 150px #ff1177;
  }
  to {
    text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #fff, 0 0 20px #ff1177,
      0 0 35px #ff1177, 0 0 40px #ff1177, 0 0 50px #ff1177, 0 0 75px #ff1177;
  }
}

@keyframes neon2 {
  from {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #228dff,
      0 0 70px #228dff, 0 0 80px #228dff, 0 0 100px #228dff, 0 0 150px #228dff;
  }
  to {
    text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #fff, 0 0 20px #228dff,
      0 0 35px #228dff, 0 0 40px #228dff, 0 0 50px #228dff, 0 0 75px #228dff;
  }
}

@keyframes neon3 {
  from {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #ffdd1b,
      0 0 70px #ffdd1b, 0 0 80px #ffdd1b, 0 0 100px #ffdd1b, 0 0 150px #ffdd1b;
  }
  to {
    text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #fff, 0 0 20px #ffdd1b,
      0 0 35px #ffdd1b, 0 0 40px #ffdd1b, 0 0 50px #ffdd1b, 0 0 75px #ffdd1b;
  }
}

@keyframes neon4 {
  from {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #b6ff00,
      0 0 70px #b6ff00, 0 0 80px #b6ff00, 0 0 100px #b6ff00, 0 0 150px #b6ff00;
  }
  to {
    text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #fff, 0 0 20px #b6ff00,
      0 0 35px #b6ff00, 0 0 40px #b6ff00, 0 0 50px #b6ff00, 0 0 75px #b6ff00;
  }
}

@keyframes neon5 {
  from {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #ff9900,
      0 0 70px #ff9900, 0 0 80px #ff9900, 0 0 100px #ff9900, 0 0 150px #ff9900;
  }
  to {
    text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #fff, 0 0 20px #ff9900,
      0 0 35px #ff9900, 0 0 40px #ff9900, 0 0 50px #ff9900, 0 0 75px #ff9900;
  }
}

@keyframes neon6 {
  from {
    text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fff, 0 0 40px #ff00de,
      0 0 70px #ff00de, 0 0 80px #ff00de, 0 0 100px #ff00de, 0 0 150px #ff00de;
  }
  to {
    text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #fff, 0 0 20px #ff00de,
      0 0 35px #ff00de, 0 0 40px #ff00de, 0 0 50px #ff00de, 0 0 75px #ff00de;
  }
}
/*Make stuff responsive*/

@media (max-width: 650px) {
  p {
    font-size: 3.5em;
  }
}
    </style>
 </body>
</html>