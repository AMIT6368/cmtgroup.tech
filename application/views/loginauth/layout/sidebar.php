<header class="header">
<div class="side-btn" onclick="togle()"><i class="fa-solid fa-angles-right"></i></div>
 <div class="clint_details">
    <span class="clint">Client Name</span>
    <span class="Clint_name"><?php echo $userdata->first_name; ?> <?php echo $userdata->last_name; ?></span>
</div>
<div class="clint_img"><a href="<?php echo base_url();  ?>UMyProfile"><img src="<?php echo base_url();  ?><?php echo $userdata->profile_pic; ?>" alt=""></a></div>
<div class="side_bar" id="side_bar">
<div class="close" onclick="togle()"><i class="fa-solid fa-xmark"></i></div>
<div class="sidebar_logo">
    <img src="<?php echo base_url();  ?>assets/frontend/img/logo.png" alt="">
     </div>
    <a style="color: white;text-decoration: none;" href="<?php echo base_url(); ?>UDashboard" class="hometab"><div class="Side_icon"><i class="fa-solid fa-house-chimney"></i></div><span class="text">Home</span></a>
    <div class="bar"></div>
    <a style="color: white;text-decoration: none;" href="<?php echo base_url(); ?>UWallet" class="hometab"><div class="Side_icon"><i class="fa-solid fa-wallet"></i></div><span class="text">Wallets</span></a>
    <div class="bar"></div>
    <a style="color: white;text-decoration: none;" href="<?php echo base_url(); ?>UProfitLoss" class="hometab"><div class="Side_icon"><i class="fa-solid fa-clock-rotate-left"></i></div><span class="text">History</span></a>
    <div class="bar"></div>
    <a style="color: white;text-decoration: none;" href="<?php echo base_url(); ?>UCustomerServices" class="hometab"><div class="Side_icon"><i class="fa-solid fa-phone-volume"></i></div><span class="text_big">Customer Service</span></a>
    <div class="bar"></div>
    <a style="color: white;text-decoration: none;" href="<?php echo base_url(); ?>UMyProfile" class="hometab"><div class="Side_icon"><i class="fa-sharp fa-solid fa-gear"></i></div><span class="text">setting</span></a>
    <div class="bar"></div>
    <a style="color: white;text-decoration: none;" href="#" class="hometab LogoutJS"><div class="Side_icon"><i class="fa-solid fa-right-from-bracket"></i></div><span class="text">Log-out</span></a>
    <div class="bar"></div>
    </div>
</header>