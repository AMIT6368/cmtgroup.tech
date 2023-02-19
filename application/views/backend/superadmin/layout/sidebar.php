<!-- <body onload="info_noti()">   this is for notification on desktop-->

<body class="example-box">
<!--wrapper-->
<div class="wrapper ">
	<!--sidebar wrapper -->
	<div class="sidebar-wrapper" data-simplebar="true">
		<div class="sidebar-header">
			<div>
				<img src="<?php echo base_url();  ?>assets/backend/assets/JDS.png" class="logo-icon" alt="logo icon">
			</div>
			<div>
				<h4 class="logo-text">Algo Trade</h4>
			</div>
			<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
			</div>
		</div>
		<!--navigation-->
		<ul class="metismenu" id="menu">
			<li class="<?php  if($this->uri->segment(2)=='SDashboard'){echo 'mm-active';}?>" style="background: #000;box-shadow: inset 5px 5px 6px #2b133b,inset -5px -5px 6px #ab4beb;">
				<a href="<?php echo base_url(); ?>SDashboard" class="<?php  if($this->uri->segment(2)=='SDashboard'){echo 'mm-active';}?>">
				    <div class="parent-icon"><i class="bx bx-category"></i></div>
					<div class="menu-title">Dashboard</div>
				</a>
		   </li>
		   
		   <li style="background: #000;box-shadow: inset 5px 5px 15px #2b133b,inset -5px -5px 15px #ab4beb;">
    			<a href="javascript:;" class="has-arrow">
    				<div class="parent-icon"><i class="lni lni-consulting"></i>
    				</div>
    				<div class="menu-title">User List</div>
    			</a>
    			<ul> 
    				<li> <a href="<?php echo base_url(); ?>SActiveUser"><i class="bx bx-right-arrow-alt"></i>Active User</a>
    				</li>
    				<li> <a href="<?php echo base_url(); ?>SDeactiveUser"><i class="bx bx-right-arrow-alt"></i>Deactive User</a>
    				</li>

     			</ul>
    		</li>


			<li style="background: #000;box-shadow: inset 5px 5px 6px #2b133b,inset -5px -5px 6px #ab4beb;">
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="lni lni-angellist"></i>
					</div>
					<div class="menu-title">Setting</div>
				</a>
				<ul>
					<li> <a href="<?php echo base_url(); ?>SProfile"><i class="bx bx-right-arrow-alt"></i>Profile Setting</a>
					</li>
					<li> <a href="<?php echo base_url(); ?>SCustomSetting"><i class="bx bx-right-arrow-alt"></i>Website Setting</a>
					</li>
				</ul>
			</li>
			
			
				<li style="background: #000;box-shadow: inset 5px 5px 6px #2b133b,inset -5px -5px 6px #ab4beb;">
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="lni lni-paypal"></i>
					</div>
					<div class="menu-title">User Payment</div>
				</a>
				<ul>
					
					<li> <a href="<?php echo base_url(); ?>SSuccessPaymentDetail"><i class="bx bx-right-arrow-alt"></i>Success Payment</a>
					</li>
					<li> <a href="<?php echo base_url(); ?>SFailedPaymentDetail"><i class="bx bx-right-arrow-alt"></i>Failed Payment </a>
					</li>
				</ul>
			</li>

			<li style="background: #000;box-shadow: inset 5px 5px 6px #2b133b,inset -5px -5px 6px #ab4beb;">
				<a href="javascript:;" class="has-arrow">
					<div class="parent-icon"><i class="lni lni-paypal"></i>
					</div>
					<div class="menu-title">Withdraw Request</div>
				</a>
				<ul>
					
					<li> <a href="<?php echo base_url(); ?>SWithdrawDetailPending"><i class="bx bx-right-arrow-alt"></i>Withdraw Pending</a>
					</li>
					<li> <a href="<?php echo base_url(); ?>SWithdrawDetailApproval"><i class="bx bx-right-arrow-alt"></i>Withdraw Approval</a>
					</li>
					<li> <a href="<?php echo base_url(); ?>SWithdrawDetailReject"><i class="bx bx-right-arrow-alt"></i>Withdraw Reject</a>
					</li>
				</ul>
			</li>

		</ul>
		<!--end navigation-->
	</div>
	<!--end sidebar wrapper -->
	<!--start header -->

	<header>
		<div class="topbar d-flex align-items-center" >
			<nav class="navbar navbar-expand">

				<div class="mobile-toggle-menu"><i class='bx bx-menu'></i>
					<span style="color:white;margin-left: 24px;font-size: smaller;" id="HeaderClockMobile"></span>
				</div>
				
				<div class="search-bar flex-grow-1">
				  <div class="position-relative search-bar-box">
				    
				      <span style="color:white;margin-left: 24px;font-size: 32px;" >  <i class="bx bx-time-five"></i> <span id="HeaderClockMobile1"></span></span>
						<!--<input type="text" class="form-control search-control" placeholder="Type to search..."> <span class="position-absolute top-50 search-show translate-middle-y"><i class="bx bx-search"></i></span>-->
						<!--<span class="position-absolute top-50 search-close translate-middle-y"><i class="bx bx-x"></i></span>-->
					</div>
			     </div>
				
				<div class="top-menu ms-auto">
					<ul class="navbar-nav align-items-center">
						<!--<li class="nav-item mobile-search-icon">-->
						<!--    <a class="nav-link" href="#">	<i class="bx bx-search"></i>-->
						<!--	</a>-->
						<!--</li>-->
						<!--<li class="nav-item ">ascdasdas</li>-->
						<li class="nav-item dropdown dropdown-large" style="display: none;">
							<div class="dropdown-menu dropdown-menu-end">
								<div class="row row-cols-3 g-3 p-3">
								</div>
							</div> 
						</li>
						<li class="nav-item dropdown dropdown-large" style="display: none;">
							<a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">0</span>
								<i class='bx bx-bell'></i>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<div class="header-notifications-list">
								</div>
							</div>
						</li>
						<li class="nav-item dropdown dropdown-large" style="display: none;">
						    <a class="nav-link dropdown-toggle dropdown-toggle-nocaret position-relative" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"> <span class="alert-count">0</span>
								<i class='bx bx-comment'></i>
							</a>
							<div class="dropdown-menu dropdown-menu-end">
								<div class="header-message-list">
								</div>
							</div>
						</li>
					</ul>
				</div>
				<div class="user-box dropdown">
					<a class="d-flex align-items-center nav-link dropdown-toggle dropdown-toggle-nocaret" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
						<img src="<?php echo base_url();  ?>assets/backend/assets/JDS.png" class="user-img" alt="user avatar">
						<div class="user-info ps-3">
							<p class="user-name mb-0"><?php echo $this->session->userdata('full_name'); ?></p>
							<p class="designattion mb-0"><?php echo $this->session->userdata('user_type'); ?></p>
						</div>
					</a>
					<ul class="dropdown-menu dropdown-menu-end">
						<li>
							<a class="dropdown-item" href="<?php echo base_url(); ?>SProfile "><i class="bx bx-user"></i><span>Profile</span></a>
						</li>
						<li>
							<div class="dropdown-divider mb-0"></div>
						</li>
						<li>
							<a class="dropdown-item" href="<?php echo base_url(); ?>SLogout"><i class='bx bx-log-out-circle'></i><span>Logout</span></a>
						</li>
					</ul>
				</div>
			</nav>
		</div>
	</header>