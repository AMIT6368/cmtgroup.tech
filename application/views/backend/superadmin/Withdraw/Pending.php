<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Pending Withdrawal List</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>SDashboard"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Pending Withdrawal List</li>
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
					<h5 class="mb-0 text-info">Pending Withdrawal List</h5>
				</div>
				<div class="table-responsive">
					<table id="example2" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>S.No</th>
								<th>User Info</th>
								<th>Amount Detail</th>
								<th>Action</th>
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
								  <button onclick="changestatusofwithreawal('<?php echo $Paymenthistorysingle->wallet_id ;  ?>','<?php  echo $Paymenthistorysingle->amount;  ?>','<?php echo $Paymenthistorysingle->first_name; ?> <?php echo $Paymenthistorysingle->last_name; ?>','<?php echo $Paymenthistorysingle->user_id; ?>');" class="btn btn-sm btn-outline-success">Change Status</button>
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


<!--Strt Modal -->      
        <div class="modal fade exampleDarkModal" id="exampleDarkModal" aria-hidden="true">
        	<div class="modal-dialog modal-lg modal-dialog-centered">
        		<div class="modal-content bg-dark">
        			<div class="modal-header">
        				<h5 class="modal-title text-white model_title" >Withdrawl Request</h5>
        				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        			</div>
        			
        			<div class="modal-body text-white">
                          <p style="font-size: 15px;"><strong>User Full Name: </strong><span class="fullnamedata" style="color:red;"></span></p>
                          <p style="font-size: 15px;"><strong>Withdrawl Amount:Rs </strong> <span class="billing_amount_data" style="color:red;"></span></p>
                        </ul>
                        
                       <hr> <br> 
                       <input type="hidden" value="" id="wallet_id">
                       <input type="hidden" value="" id="user_id">
                       <input type="hidden" value="" id="amountdata">

						<div class="row mb-3">
							<label for="lead_detail" class="col-sm-3 col-form-label">Enter Comment</label>
							<div class="col-sm-9">
								<input type="text" value="" class="form-control" name="amount_comment" id="amount_comment" placeholder="Enter Comment">
							</div>
						</div>
							<div class="row mb-3">
							<label for="lead_detail" class="col-sm-3 col-form-label">Enter Status</label>
							<div class="col-sm-9">
							<select class="form-control" name="amount_type_status" id="amount_type_status">
							    <option value="Approve">Approve</option>
							    <option value="Reject">Reject</option>
							    <option value="Pending">Pending</option>
							</select>
							</div>
						</div>
        			</div>
        			<div class="modal-footer">
        				<button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
        				<button type="button" class="btn btn-danger final_submit" id="final_submit" >Submit Withdrawl</button>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- END Modal -->


<script type="text/javascript">
	var base_url = '<?php  echo base_url();  ?>';
	function changestatusofwithreawal(wallet_id,amount,full_name,user_id)
	{
     $('.fullnamedata').html(full_name);
     $('.billing_amount_data').html(amount);
     $('.exampleDarkModal').modal('show');
     $('#user_id').val(user_id);
     $('#amountdata').val(amount);
     $('#wallet_id').val(wallet_id);
	}

	$('body').on('click','#final_submit',function(){
        var wallet_id = $('#wallet_id').val();
        var user_id = $('#user_id').val();
        var admin_comment = $('#amount_comment').val();
        var amountdata = $('#amountdata').val();
        var amount_type_status = $('#amount_type_status :selected').val();
        if((wallet_id) && (user_id) && (admin_comment) && (amount_type_status) && (amountdata)) 
        {
         $.ajax({
             type: 'POST',
             url: base_url+'Superadmin/UserChangeWithdrawlAmount',
             data: {wallet_id:wallet_id,admin_comment:admin_comment,user_id:user_id,amount_type_status:amount_type_status,amountdata:amountdata},
             error: function() {
             },
             cache: false,
             success: function(resultdata){
              var resultdatamess = JSON.parse(resultdata);
              if(resultdatamess.statusCode==200)
              { 
              	success_notification(resultdatamess.message);
              	  location.reload(true);
              }
              else if(resultdatamess.statusCode==201)
              {
               error_notification(resultdatamess.message);    
              }
            }
        });
        }else{
           if(!amount_type_status)
           {
           	error_notification('Please Select Withdrawl Status');
           }
           if(!admin_comment)
           {
           	error_notification('Please Enter Comment');
           }
           if(!wallet_id)
           {
           	error_notification('Somthing Missing');
           	location.reload(true);
           }
           if(!user_id)
           {
           	error_notification('Somthing Missing');
           	location.reload(true);
           }
           
           
        }
 });   
</script>