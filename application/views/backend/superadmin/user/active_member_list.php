<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Active User List</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>SDashboard"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Active User List</li>
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
					<h5 class="mb-0 text-info">Active User List</h5>
				</div>
				<div class="table-responsive">
					<table id="example2" class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>S.No</th>
								<th>Full Name</th>
								<th>Empolyee Detail</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						    <?php $i='1'; foreach($user_detail as $member_detailsingle){ 
						 
						    ?>
							<tr>
								<td><?php echo $i++ ; ?></td>
								<td>
								    <strong>Full Name: </strong><?php echo $member_detailsingle->first_name; ?> </strong><?php echo $member_detailsingle->last_name; ?> <br>
								    <strong>Email: </strong><?php echo $member_detailsingle->email;  ?> <br>
								    <strong>Mobile No.: </strong><?php echo $member_detailsingle->mobile;  ?>
								
								</td>
								<td>
								    
								    <strong>DOB: </strong><?php  echo $member_detailsingle->date_of_birth;  ?> <br>
								    <strong>Wallet: </strong><span style="color:green;">Rs <?php echo $member_detailsingle->wallet_amount;  ?> </span> 
								    
			   
								    
								</td>

								<td>
							    <div class="btn-group">
							       <a href="<?php echo base_url(); ?>SUserDetail/<?php echo $member_detailsingle->user_id;  ?>"><button type="button" class="btn btn-sm btn-success  px-3 radius-30"><i class="lni lni-eye mr-1"></i>All Details</button> </a>
								  <a> <button type="button" onClick="MyStatusChange(<?php echo $member_detailsingle->user_id  ;  ?>)" class="btn btn-sm btn-danger px-3 radius-30"><i class="lni lni-close mr-1"></i>Status</button></a>
								</div>
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

<script>
    var base_url = '<?php echo  base_url();  ?>';
    function MyStatusChange(member_id)
    {
        
  Swal.fire({
  title: 'Are you sure?',
  text: "You Want to Closed this Member ",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Yes, Closed it!'
}).then((result) => {
  if (result.isConfirmed) {
      
            $.ajax({
             type: 'POST',
             url: base_url+'SUserChangeStatus',
             data: {user_id: member_id,status:'Deactive'},
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

        
    }
    
</script>