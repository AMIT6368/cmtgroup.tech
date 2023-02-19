<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Success User Payment List</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>SDashboard"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Success User Payment List</li>
					</ol>
				</nav>
			</div>
		</div>
		<!--end breadcrumb-->
		<!--<h6 class="mb-0 text-uppercase">Group List</h6>-->
		<hr/>
		<div class="card border-top border-0 border-4 border-info">
			<div class="card-body">
			  <div class="border p-4 rounded">
				<div class="card-title d-flex align-items-center">
					<div><i class="bx bxs-user me-1 font-22 text-info"></i>
					</div>
					<h5 class="mb-0 text-info">Success User Payment List</h5>
				</div>
				<div class="table-responsive">
					<table id="example2" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>S.No</th>
								<th>User Info</th>
								<th>Amount Detail</th>
								<th>Transition Detail</th>
								<th>Date</th>
							</tr>
						</thead>
						<tbody>
						    <?php $i='1'; foreach($Paymenthistory as $Paymenthistorysingle){ 
						 
						    ?>
							<tr>
								<td><?php echo $i++ ; ?></td>
								<td>
								    <strong>Full Name: </strong><?php echo $Paymenthistorysingle->first_name; ?> </strong><?php echo $Paymenthistorysingle->last_name; ?> <br>
								    <a href="<?php echo base_url(); ?>SUserDetail/<?php echo $Paymenthistorysingle->user_id; ?>">
								         <button class="btn btn-sm btn-outline-success">View Detail</button>
								    </a>
								</td>
								<td>
								    
								    <strong>Amount: </strong><?php  echo $Paymenthistorysingle->pt_amount;  ?> <br>
								    <strong>Order Id: </strong><?php echo $Paymenthistorysingle->pt_order_id;  ?>
								    
			   
								    
								</td>
								<td>
								     <strong>Trans ID: </strong><?php  echo $Paymenthistorysingle->pt_transition_id;  ?> <br>
								    <strong>Response: </strong><span style="color:green;"><?php echo $Paymenthistorysingle->pt_response_msg;  ?> </span> 
								    
								</td>
								
								<td>
								   <?php echo $Paymenthistorysingle->pt_date;  ?>
								</td>

							
							</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
