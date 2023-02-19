<div class="page-wrapper">
 <div class="page-content ">
   <div class="row row-cols-1 row-cols-md-2 row-cols-xl-4">
    <div class="col">
    	<div class="card radius-10 bs-dark "> 
    	<!--bs-dark bg-gradient -->
    		<div class="card-body">
    			<div class="d-flex align-items-center">
    				<div>
    					<p class="mb-0 text-white">Total User</p>
    					<h4 class="my-1 text-white" id="total_manager">0</h4>
    						<!--<p class="mb-0 font-13 text-white"><i class="bx bxs-down-arrow align-middle"></i></p>-->
    				</div>
    				<div class="text-white ms-auto font-35"><i class=" lni lni-network"></i>
    				    <!--<i class="bx bx-cart-alt"></i>-->
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="col">
    	<div class="card radius-10 bs-dark">
    		<div class="card-body">
    			<div class="d-flex align-items-center">
    				<div>
    					<p class="mb-0 text-white">Total Active User</p>
    					<h4 class="my-1 text-white" id="total_ba">0</h4>
    						<!--<p class="mb-0 font-13 text-white"><i class="bx bxs-down-arrow align-middle"></i></p>-->
    				</div>
    				<div class="text-white ms-auto font-35"><i class="bx bxs-group"></i>
    				    <!--<i class="bx bx-dollar"></i>-->
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="col">
    	<div class="card radius-10 bs-dark">
    		<div class="card-body">
    			<div class="d-flex align-items-center">
    				<div>
    					<p class="mb-0 text-white">Total Deactive User</p>
    					<h4 class="text-white my-1"id="total_sba">0</h4>
    						<!--<p class="mb-0 font-13 text-white"><i class="bx bxs-down-arrow align-middle"></i></p>-->
    				</div>
    				<div class="text-white ms-auto font-35"><i class="bx bxs-group"></i>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="col">
    	<div class="card radius-10 bs-dark">
    		<div class="card-body">
    			<div class="d-flex align-items-center">
    				<div>
    					<p class="mb-0 text-white">Active Admin</p>
    					<h4 class="my-1 text-white" id="total_activeemployee">0</h4>
    					<!--<p class="mb-0 font-13 text-white"><i class="bx bxs-up-arrow align-middle"></i><?php // echo Date('d-m-Y');  ?></p>-->
    				</div>
    				<div class="text-white ms-auto font-35"><i class="lni lni-network"></i>
    				    <!--<i class="bx bx-comment-detail"></i>-->
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
   

    <div class="col">
    	<div class="card radius-10 bs-dark">
    		<div class="card-body">
    			<div class="d-flex align-items-center">
    				<div>
    					<p class="mb-0 text-white">Total Payment</p>
    					<h4 class="my-1 text-white" id="total_billing">Rs 0</h4>
    						<p class="mb-0 font-13 text-white"></i><?php echo Date('D-d-M-Y');  ?> Till Now</p>
    				</div>
    				<div class="text-white ms-auto font-35"><i class="lni lni-rupee"></i>
    				    <!--<i class="bx bx-cart-alt"></i>-->
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="col">
    	<div class="card radius-10 bs-dark">
    		<div class="card-body">
    			<div class="d-flex align-items-center">
    				<div>
    					<p class="mb-0 text-white">Today Payment </p>
    					<h4 class="my-1 text-white" id="today_billing">Rs 0</h4>
    						<p class="mb-0 font-13 text-white"><?php echo Date('d-m-Y');  ?></p>
    				</div>
    				<div class="text-white ms-auto font-35"><i class="lni lni-rupee"></i>
    				    <!--<i class="bx bx-dollar"></i>-->
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="col">
    	<div class="card radius-10 bs-dark">
    		<div class="card-body">
    			<div class="d-flex align-items-center">
    				<div>
    					<p class="mb-0 text-white">Payment of Week</p>
    					<h4 class="text-white my-1" id="sale_of_week">Rs 0</h4> 
    				
    						<p class="mb-0 font-13 text-white">
    							<?php
    							$string_date = Date('Y-m-d');
    							$day_of_week = date('N', strtotime($string_date));
                                $week_first_day = date('d-M-Y', strtotime($string_date . " - " . ($day_of_week - 2) . " days"));
                                $week_last_day = date('d-M-Y', strtotime($string_date . " + " . (7 - $day_of_week) . " days")); 
                                ?>
    						<?php echo $week_first_day ?> to <?php echo $week_last_day ?>
    						</p>
    				</div>
    				<div class="text-white ms-auto font-35"><i class="lni lni-rupee"></i>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
    <div class="col">
    	<div class="card radius-10 bs-dark">
    		<div class="card-body">
    			<div class="d-flex align-items-center">
    				<div>
    					<p class="mb-0 text-white">Payment Of Month</p>
    					<h4 class="my-1 text-white" id="sale_of_month">Rs 0</h4>
    					<p class="mb-0 font-13 text-white"><?php echo Date('M-Y');  ?></p>
    				</div>
    				<div class="text-white ms-auto font-35"><i class="lni lni-rupee"></i>
    				    <!--<i class="bx bx-comment-detail"></i>-->
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
 </div>
 
 <!--<div class="row row-cols-1 row-cols-lg-2">-->
	<!--<div class="col d-flex">-->
	<!--	<div class="card radius-10 w-100">-->
	<!--		<div class="card-header bg-transparent">-->
	<!--			<div class="d-flex align-items-center">-->
	<!--				<div>-->
	<!--					<h6 class="mb-0">Tranding Employee Of Week</h6>-->
	<!--				</div>-->
	<!--			</div>-->
	<!--		</div>-->

	<!--		<ul class="list-group list-group-flush trendinguser" id="trendinguser">-->

	<!--		</ul>-->
	<!--	</div>-->
	<!--  </div>-->
	<!-- <div class="col d-flex">-->
	<!--	<div class="card radius-10 w-100">-->
	<!--		<div class="card-header bg-transparent">-->
	<!--			<div class="d-flex align-items-center">-->
	<!--				<div>-->
	<!--					<h6 class="mb-0">Tranding Employee Overall</h6>-->
	<!--				</div>-->

	<!--			</div>-->
	<!--		</div>-->
			
	<!--		<ul class="list-group list-group-flush" id="trendingtotalemployee">-->
				
	<!--		</ul>-->
	<!--	</div>-->
	<!--  </div>-->
	 <!-- <div class="col d-flex">-->
		<!--<div class="card radius-10 w-100">-->
		<!--	<div class="card-header bg-transparent">-->
		<!--		<div class="d-flex align-items-center">-->
		<!--			<div>-->
		<!--				<h6 class="mb-0">Trending Products</h6>-->
		<!--			</div>-->
					
		<!--		</div>-->
		<!--	</div>-->
		<!--	<div class="card-body">-->
		<!--		<div class="chart-container-1"><div class="chartjs-size-monitor" style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>-->
		<!--			<div id="chartContainer" width="302" height="260" style="display: block; width: 302px; height: 260px;" class="chartjs-render-monitor"></div>-->
		<!--			<canvas id="chart18" ></canvas>-->
		<!--		  </div>-->
		<!--	</div>-->
		<!--	<ul class="list-group list-group-flush">-->
		<!--		<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Jeans <span class="badge bg-gradient-quepal rounded-pill">25</span>-->
		<!--		</li>-->
		<!--		<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">T-Shirts <span class="badge bg-gradient-ibiza rounded-pill">10</span>-->
		<!--		</li>-->
		<!--		<li class="list-group-item d-flex bg-transparent justify-content-between align-items-center">Shoes-->
		<!--			<span class="badge bg-gradient-deepblue rounded-pill">65</span>-->
		<!--		</li>-->
		<!--	</ul>-->
		<!--</div>-->
	 <!-- </div>-->
 <!--</div>-->
 
 
 
 
 
 
 
 
 
 
 
 
 
</div>

<script>
  var base_url = '<?php  echo base_url(); ?>';
 $(document).ready(function() { 
 $.ajax({
     type: 'POST',
     url: base_url+'Superadmin/DashBoardData',
     data: {user_type:'superadmin'},
     error: function() {
     },
     cache: false,
     success: function(resultdata){
      var resultdatamess = JSON.parse(resultdata);
      if(resultdatamess.statusCode==200)
      { 
        $("#total_sba").html(resultdatamess.data.total_sba);
        $("#total_manager").html(resultdatamess.data.total_manager);
        $("#total_ba").html(resultdatamess.data.total_ba);
        $("#total_activeemployee").html(resultdatamess.data.total_activeemployee);
        $("#today_upload_data_pending").html(resultdatamess.data.today_upload_data_pending);
        $("#today_upload_data_complete").html(resultdatamess.data.today_upload_data_complete);
        $("#today_upload_data_assign").html(resultdatamess.data.today_upload_data_assign);
        $("#today_upload_data").html(resultdatamess.data.today_upload_data);
        $("#today_billing").html('Rs '+resultdatamess.data.today_billing);
        $("#sale_of_week").html('Rs '+resultdatamess.data.sale_of_week);
        $("#total_billing").html('Rs '+resultdatamess.data.total_billing);
        $("#sale_of_month").html('Rs '+resultdatamess.data.sale_of_month);
        $("#trendinguser").html(resultdatamess.data.sale_employeeweek);
        $("#trendingtotalemployee").html(resultdatamess.data.trandingemployee);
        
        
        
  
      }
      else
      {
    
    
    
      }
    }
});
 

 });  
 
</script>







