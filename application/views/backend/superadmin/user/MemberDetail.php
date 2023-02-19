<div class="page-wrapper">
<div class="page-content">
	<!--breadcrumb-->
	<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
		<div class="breadcrumb-title pe-3">User Profile</div>
		<div class="ps-3">
			<nav aria-label="breadcrumb">
				<ol class="breadcrumb mb-0 p-0">
					<li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
					</li>
					<li class="breadcrumb-item active" aria-current="page"><?php  echo $selected_user_detail->first_name; ?> <?php  echo $selected_user_detail->last_name; ?></li>
				</ol>
			</nav>
		</div>
	</div>
	<!--end breadcrumb-->
	<div class="col-lg-12">
      <?php  if(isset($error)){ echo $error; }
            echo $this->session->flashdata('success_req');
        ?>
   </div>
<div class="container">
<div class="main-body">

	<h5>Trading Status :  <span class="btn btn-<?php if($selected_user_detail->tradeing_status=='Approved'){ echo 'success'; } if($selected_user_detail->tradeing_status=='Pending'){ echo 'danger'; } ?>"><?php echo $selected_user_detail->tradeing_status; ?></span> </h5>

<div class="row">
<div class="col-sm-6">
<div class="card">

	<div class="card-body">

		<h5 class="d-flex align-items-center mb-2">Set Margin And Spend</h5>

		 <h5 class="d-flex align-items-center mb-3">Wallet Amount:(<span id="totalamount_final">Rs <?php echo $selected_user_detail->wallet_amount; ?></span>) </h5>

		<div class="row mb-3">

			<div class="col-sm-3">

				<h6 class="mb-0">Spend Amount</h6>

			</div>

			<div class="col-sm-9 text-secondary">

				<input type="text" class="form-control" name="spend_amount" id="spend_amount"  />

			</div>

		</div>
		
		<input type="hidden" class="form-control" name="totalamount_original" id="totalamount_original"  value="<?php echo $selected_user_detail->wallet_amount; ?>" />
		<input type="hidden" class="form-control" name="totalamount_margin" id="totalamount_margin"  value="0" />
		<input type="hidden" class="form-control" name="user_id" id="user_id"  value="<?php echo $selected_user_detail->user_id; ?>" />
		
		<div class="row mb-3">

			<div class="col-sm-3">

				<h6 class="mb-0">Spend Status</h6>

			</div>

			<div class="col-sm-9 text-secondary">
			    <select class="form-control" name="spend_status" id="spend_status" >
			        <option value="Loss">Loss</option>
			        <option  value="Profit">Profit</option>
			    </select>

			

			</div>

		</div>

		<div class="row mb-3">

			<div class="col-sm-3">

				<h6 class="mb-0">Spend Date</h6>

			</div>

			<div class="col-sm-9 text-secondary">

				<input type="date" class="form-control" name="spend_date" id="spend_date" />

			</div>

		</div>
		
			<div class="row mb-3">

			<div class="col-sm-3">

				<h6 class="mb-0">Spend Comment</h6>

			</div>

			<div class="col-sm-9 text-secondary">

				<input type="text" class="form-control" name="spend_comment" id="spend_comment" />

			</div>

		</div>



		


		<div class="row">

			<div class="col-sm-3"></div>

			<div class="col-sm-9 text-secondary">

				<input type="button" class="btn btn-primary px-4" value="Update Spend" onClick="UpdateMarginSpend()" />

			</div>

		</div>

	</div>

</div>
</div>

<div class="col-sm-6">
<div class="card">

	<div class="card-body">

		<h5 class="d-flex align-items-center mb-3">Current Wallet Amount: (<span id="totalamount_final_add">Rs <?php echo $selected_user_detail->wallet_amount; ?></span>) </h5>

		<div class="row mb-3">

			<div class="col-sm-3">

				<h6 class="mb-0">Add Amount</h6>

			</div>

			<div class="col-sm-9 text-secondary">

				<input type="text" class="form-control" name="add_amount" id="add_amount"  />

			</div>

		</div>
		
		<input type="hidden" class="form-control" name="user_idadd_amount" id="user_idadd_amount"  value="<?php echo $selected_user_detail->user_id; ?>" />
		

		<div class="row">

			<div class="col-sm-3"></div>

			<div class="col-sm-9 text-secondary">

				<input type="button" class="btn btn-primary px-4" value="Add Wallet Amount" onClick="UpdateAddAmount()" />

			</div>

		</div>

	</div>

</div>
</div>

</div>

		
		
<div class="row">
<div class="col-sm-6">
		 <div class="card">
			<div class="card-body">
			  <h5 class="d-flex align-items-center mb-3">Update User Graph</h5>
			  <form action="<?php echo base_url(); ?>SUserDetail/<?php echo $selected_user_detail->user_id ?>" method="POST" enctype="multipart/form-data">
			    <div class="row mb-3">
			        <input type="hidden"  name="user_graph_name" value="user_graph">
				   <div class="col-sm-3">
					 <h6 class="mb-0">Select Image File</h6>
				   </div>
				<div class="col-sm-9 text-secondary">
					<input type="file" onchange="usergraphfile_image(event)" name="user_graph" id="user_graph"  required class="form-control"  placeholder="Select Image File" />
					<small style="color:red;">Image Size height: 250px; width: 250px; or 500x500 Only</small><br>
					<img id="usergraphfile_image_result" src="<?php echo base_url();  ?><?php echo $selected_user_detail->user_graph; ?>" alt="Admin" class=" bg-primary" width="250" height="250">
				</div>
			</div>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 text-secondary">
					<button  type="submit" class="btn btn-primary px-4" >Upload Now</button>
				</div>
			</div>
			</form>
		   </div>
		 </div>
	  </div> 
		
<div class="col-sm-6">
		<div class="card">
			<div class="card-body">
	       	   <h5 class="d-flex align-items-center mb-3">Update User History Graph</h5>
	       	   <form action="<?php echo base_url(); ?>SUserDetail/<?php echo $selected_user_detail->user_id ?>" method="POST" enctype="multipart/form-data">
		         <div class="row mb-3">
		             <input type="hidden"  name="user_graph_name" value="user_graph_history">
		   	        <div class="col-sm-3">
			         	<h6 class="mb-0">Select Image File</h6>
		         	</div>
		     	 <div class="col-sm-9 text-secondary">
				     <input type="file" onchange="usergraphfilegraph_image(event)" name="user_graph_history" id="user_graph_history"  required class="form-control"  placeholder="Select Image File" />
				     <small style="color:red;">Image Size height: 250px; width: 250px; or 500x500 Only</small><br>
				     <img id="usergraphfilegraph_result" src="<?php echo base_url();  ?><?php echo $selected_user_detail->user_graph_history; ?>" alt="Admin" class=" bg-primary" width="250" height="250">
			    </div>
			</div>
			<div class="row">
				<div class="col-sm-3"></div>
				<div class="col-sm-9 text-secondary">
					<button type="submit" class="btn btn-primary px-4" >Upload Now</button>
				</div>
			</div>
			</form>
	   	  </div>
	   </div>
	</div>
	
	
  </div>
<div class="row">
<div class="col-lg-4">
	<div class="card">
		<div class="card-body">
			<div class="d-flex flex-column align-items-center text-center">
				<img src="<?php  echo base_url(); ?><?php  echo $selected_user_detail->profile_pic; ?>" alt="Admin" class="rounded-circle p-1 bg-primary" width="110">
				<div class="mt-3">
					<h4><?php  echo $selected_user_detail->first_name; ?> <?php  echo $selected_user_detail->last_name; ?></h4>
					<button class="btn btn-sm btn-outline-success "><?php  echo $selected_user_detail->user_status; ?></button>
				</div>
			</div>
			<hr class="my-4">
			<ul class="list-group list-group-flush">
			    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
					<h6 class="mb-0">First Name:</h6>
					<span class="text-white"><?php  echo $selected_user_detail->first_name; ?></span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
					<h6 class="mb-0">Last Name:</h6>
					<span class="text-white"><?php  echo $selected_user_detail->last_name; ?></span>
				</li>
			
				<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
					<h6 class="mb-0">Email:</h6>
					<span class="text-white"><?php  echo $selected_user_detail->email; ?></span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
					<h6 class="mb-0">Mobile Number:</h6>
					<span class="text-white"><?php  echo $selected_user_detail->mobile; ?></span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
					<h6 class="mb-0">Date Of Birth:</h6>
					<span class="text-white"><?php  echo $selected_user_detail->date_of_birth; ?></span>
				</li>
				
			</ul>
		</div>
	</div>
</div>
<div class="col-lg-4">
	<div class="card">
		<div class="card-body">
			<ul class="list-group list-group-flush">
			    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
					<h6 class="mb-0">Current Balance:</h6>
					<span class="text-white"><button class="btn btn-sm btn-outline-success">Rs <?php  echo $selected_user_detail->wallet_amount ? $selected_user_detail->wallet_amount : 0; ?></button></span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
					<h6 class="mb-0">Total Credit Payment:</h6>
				<span class="text-white"><button class="btn btn-sm btn-outline-success">Rs <?php  echo $Credit->amount ? $Credit->amount : 0; ?></button></span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
					<h6 class="mb-0">Total Debit Payment:</h6>
				<span class="text-white"><button class="btn btn-sm btn-outline-danger">Rs <?php  echo $Debit->amount ? $Debit->amount :0; ?></button></span>
				</li>
			
				<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
					<h6 class="mb-0">Total Withdraw:</h6>
					<span class="text-white"><button class="btn btn-sm btn-outline-warning">Rs <?php  echo $Withdraw->amount ? $Withdraw->amount: 0; ?></button></span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
					<h6 class="mb-0">Total Loss Amount:</h6>
					<span class="text-white"><button class="btn btn-sm btn-outline-danger">Rs <?php  echo $Loss->pl_amount ? $Loss->pl_amount:0; ?></button></span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
					<h6 class="mb-0">Total Win Amount:</h6>
					<span class="text-white"><button class="btn btn-sm btn-outline-success">Rs <?php  echo $Profit->pl_amount ? $Profit->pl_amount:0; ?></button></span>
				</li>
				
			</ul>
		</div>
	</div>
</div>
<div class="col-lg-4">
	<div class="card">
		<div class="card-body">
			<ul class="list-group list-group-flush">
			    
				<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
					<h6 class="mb-0">Bank Holder Name:</h6>
					<span class="text-white"><?php  echo $selected_user_detail->bank_hold_name; ?></span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
					<h6 class="mb-0">Bank Name:</h6>
					<span class="text-white"><?php  echo $selected_user_detail->bank_name; ?></span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
					<h6 class="mb-0">Bank Account:</h6>
					<span class="text-white"><?php  echo $selected_user_detail->bank_account; ?></span>
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
					<h6 class="mb-0">IFSC Code:</h6>
					<span class="text-white"><?php  echo $selected_user_detail->ifsc_code; ?></span>
				</li>
				
				<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
					<h6 class="mb-0">AddharCard Number:</h6>
					<span class="text-white"><?php  echo $selected_user_detail->addhar_card; ?></span><br>
			
				</li>
				<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
					<h6 class="mb-0">PanCard Number:</h6>
					<span class="text-white"><?php  echo $selected_user_detail->pan_number; ?></span><br>
					
					
				</li>
				
				<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
					<h6 class="mb-0">All Doc Image:</h6>
					<button  data-bs-toggle="modal" data-bs-target="#exampleDarkModalddd" class="btn btn-sm btn-outline-success">View Image</button>
					
				</li>
				
				
			
				
			</ul>
		</div>
	</div>
</div>
<div class="col-lg-12">
	<div class="card">
		<div class="card-body">
		    <div class="card-title d-flex align-items-center">
	<div><i class="bx bxs-user me-1 font-22 text-info"></i>
	</div>
	<h5 class="mb-0 text-info">Loss Profit History |  Current Wallet Amount: (<span id="totalamount_final"><?php echo $selected_user_detail->wallet_amount; ?></span>)</h5>
</div>
<div class="table-responsive">
	<table id="example2" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>S.No</th>
				<th>Amount</th>
				<th>Status</th>
				<th>Date</th>
				<th>Comment</th>
				<th>Action</th>
			</tr>
		</thead>
		<tbody>
		    <?php $i='1'; foreach($profitlosshistory as $phhistorySingle){ 
		       $pl_type = $phhistorySingle->pl_type
		 
		    ?>
			<tr>
				<td><?php echo $i++ ; ?></td>
				<td style="color:<?php if($pl_type=='Profit'){echo 'green';}if($pl_type=='Loss'){echo 'red';}if($pl_type=='Pending'){echo 'orange';}  ?>;"><strogn ><?php if($pl_type=='Profit'){echo '+';}if($pl_type=='Loss'){echo '-';}if($pl_type=='Pending'){echo '-';}  ?></strogn>
				   <?php echo $phhistorySingle->pl_amount;  ?>
				</td>
				<td>
				   
				    <span style="color:<?php if($pl_type=='Profit'){echo 'green';}if($pl_type=='Loss'){echo 'red';}if($pl_type=='Pending'){echo 'orange';}   ?>;"><?php echo $phhistorySingle->pl_type;  ?> </span> 

				</td>
				<td><?php echo $phhistorySingle->pl_date;  ?></td>
				<td><?php echo $phhistorySingle->pl_comment;  ?></td>
				<td>
				    <?php if($pl_type == 'Pending'){  ?>
				    <button  class="btn btn-sm btn-outline-danger" onClick="UpdateSattelamount('<?php echo $phhistorySingle->pl_id; ?>','<?php echo $phhistorySingle->pl_amount_status; ?>','<?php echo $phhistorySingle->user_id; ?>','<?php echo $phhistorySingle->pl_amount; ?>')">Sattel Amount</button>
				    
				    <?php }else{ ?>
				    <button  class="btn btn-sm btn-outline-success">Done</button>
				    
				    <?php } ?>
				    
				</td>


			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
			
		</div>
	</div>
	<div class="row">
		<div class="col-sm-12">
			<div class="card">
				<div class="card-body">
				    
				    <div class="card-title d-flex align-items-center">
	<div><i class="bx bxs-user me-1 font-22 text-info"></i>
	</div>
	<h5 class="mb-0 text-info">Wallet History | Current Wallet Amount: (<span id="totalamount_final"><?php echo $selected_user_detail->wallet_amount; ?></span>)</h5>
</div>
<div class="table-responsive">
	<table id="example1" class="table table-striped table-bordered">
		<thead>
			<tr>
				<th>S.No</th>
				<th>Amount</th>
				<th>Status</th>
				<th>Date</th>
				<th>Comment</th>
			</tr>
		</thead>
		<tbody>
		    <?php $i='1'; foreach($wallet_history as $wallet_historySingle){ 
		       $amount_type = $wallet_historySingle->amount_type
		 
		    ?>
			<tr>
				<td><?php echo $i++ ; ?></td>
				<td style="color:<?php if($amount_type=='Credit'){echo 'green';}if($amount_type=='Debit'){echo 'red';} if($amount_type=='Withdraw'){echo 'red';}  ?>;"><strogn ><?php if($amount_type=='Profit'){echo '+';}if($amount_type=='Loss'){echo '-';}  ?></strogn>
				   <?php echo $wallet_historySingle->amount;  ?>
				</td>
				<td>
				   
				    <span style="color:<?php if($amount_type=='Credit'){echo 'green';}if($amount_type=='Debit'){echo 'red';} if($amount_type=='Withdraw'){echo 'red';} ?>;"><?php echo $wallet_historySingle->amount_type;  ?> </span> 

				</td>
				<td><?php echo $wallet_historySingle->created_date_data;  ?></td>
				<td><?php echo $wallet_historySingle->amount_comment;  ?></td>


			</tr>
			<?php } ?>
		</tbody>
	</table>
</div>
					
				</div>
			</div>
		</div>
	</div>
	<br>
	
</div>
</div>
</div>
</div>
</div>
</div>



<div class="modal fade show" id="exampleDarkModalddd" tabindex="-1" aria-modal="true" role="dialog" style="display: none; padding-left: 17px;">
<div class="modal-dialog modal-lg modal-dialog-centered">
<div class="modal-content bg-dark">
<div class="modal-header">
<h5 class="modal-title text-white">All Document List</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body text-white">
<p>Addhar Card Front : <?php echo $selected_user_detail->addhar_card; ?></p>
<img id="usergraphfile_image_result" src="<?php echo base_url();  ?><?php echo $selected_user_detail->aadhar_card_front; ?>" alt="Admin" class=" bg-primary" width="250" height="250">
<p>Addhar Card Back : <?php echo $selected_user_detail->addhar_card; ?></p>
<img id="usergraphfile_image_result" src="<?php echo base_url();  ?><?php echo $selected_user_detail->aadhar_card_back; ?>" alt="Admin" class=" bg-primary" width="250" height="250">

<p>PanCard : <?php echo $selected_user_detail->pan_number; ?></p>
<img id="usergraphfile_image_result" src="<?php echo base_url();  ?><?php echo $selected_user_detail->pan_card_image; ?>" alt="Admin" class=" bg-primary" width="250" height="250">

</div>
<div class="modal-footer">
<button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
</div>
</div>
</div>
</div>


<script>
function usergraphfilegraph_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('usergraphfilegraph_result');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}

function usergraphfile_image(event) 
{
 var reader = new FileReader();
 reader.onload = function()
 {
  var output = document.getElementById('usergraphfile_image_result');
  output.src = reader.result;
 }
 reader.readAsDataURL(event.target.files[0]);
}
   

var base_url = '<?php echo  base_url();  ?>';
    function UpdateMarginSpend()
    {
      var spend_amount= $('#spend_amount').val();
      var spend_status= $('#spend_status').val();
      var spend_date= $('#spend_date').val();
      var spend_comment= $('#spend_comment').val();
      var original_amout= $('#totalamount_original').val();
      var user_id= $('#user_id').val();

if((spend_amount) && (spend_status) && (spend_date) && (spend_comment) && (user_id))  
{ 
        
  Swal.fire({
  title: 'Are you sure?',
  text: "You Want to Update Margin ",
  icon: 'warning',
  confirmButtonColor: '#3085d6',
  confirmButtonText: 'Yes, Update it!',
  cancelButtonColor: '#d33',
   showCancelButton: true
}).then((result) => {
  if (result.isConfirmed) {
      
            $.ajax({
             type: 'POST',
             url: base_url+'Superadmin/UserChangeStatusofMargin',
             data: {user_id:user_id,spend_amount:spend_amount,spend_status:spend_status,spend_date:spend_date,spend_comment:spend_comment,original_amout:original_amout},
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
     }
   })
   

}else{
          
 if(!spend_amount)
   {
    error_notification('Please Enter spend Amount');
   }
   if(!spend_status)
   {
    error_notification('Please Select Status');
   }
   if(!spend_date)
   {
    error_notification('Please Enter Date');
   }
   if(!spend_comment)
   {
    error_notification('Please Enter Comment');
   }
   if(!user_id)
   {
    error_notification('Please User Id Is missing please refresh you page');
   }
          
          
}     
     
        
}

function UpdateSattelamount(pl_id,pl_amount_status,user_id,pl_amount)
{
    
    
     $.ajax({
             type: 'POST',
             url: base_url+'Superadmin/UpdateSattelamount',
             data: {pl_id:pl_id,pl_amount_status:pl_amount_status,user_id:user_id,pl_amount:pl_amount},
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
    

}



function UpdateAddAmount() 
{
var add_amount= $('#add_amount').val();
var user_idadd_amount= $('#user_idadd_amount').val();

if((add_amount) && (user_idadd_amount))  
{ 
        
  Swal.fire({
  title: 'Are you sure?',
  text: "You Want to Add Wallet Amount "+add_amount,
  icon: 'warning',
  confirmButtonColor: '#3085d6',
  confirmButtonText: 'Yes, Add it!',
  cancelButtonColor: '#d33',
   showCancelButton: true
}).then((result) => {
  if (result.isConfirmed) {
      
            $.ajax({
             type: 'POST',
             url: base_url+'Superadmin/UserChangeWalletAmount',
             data: {user_id:user_idadd_amount,add_amount:add_amount},
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
     }
   })
   

}else{
          
 if(!add_amount)
   {
    error_notification('Please Enter Amount');
   }
   if(!user_idadd_amount)
   {
    error_notification('Somthing Went Wrong');
   }

          
         
}   


}






















</script>