<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Reject Withdrawal List</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>SDashboard"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Reject Withdrawal List</li>
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
					<h5 class="mb-0 text-info">Reject Withdrawal List</h5>
				</div>
				<div class="table-responsive">
					<table id="example2" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>S.No</th>
								<th>User Info</th>
								<th>Amount Detail</th>
								<th>Comment</th>
							</tr>
						</thead>
						<tbody>
						    <?php $i='1'; foreach($WithdrawStatus as $Paymenthistorysingle){ 
						 
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
								    
								    <strong>Amount: </strong><?php  echo $Paymenthistorysingle->amount;  ?> <br>
								    <strong>Date Request: </strong><?php echo $Paymenthistorysingle->created_date_data;  ?>
								    
			   
								    
								</td>

								<td>

									<strong>Comment: </strong><?php  echo $Paymenthistorysingle->amount_comment;  ?> <br>
								    <strong>Date Accept: </strong><?php echo $Paymenthistorysingle->date_of_acion;  ?>
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
