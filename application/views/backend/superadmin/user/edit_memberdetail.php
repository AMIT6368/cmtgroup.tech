<div class="page-wrapper">
	<div class="page-content">
		<!--breadcrumb-->
		<div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
			<div class="breadcrumb-title pe-3">Update Employees(SBA)</div>
			<div class="ps-3">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb mb-0 p-0">
						<li class="breadcrumb-item"><a href="<?php echo base_url(); ?>SDashboard"><i class="bx bx-home-alt"></i></a>
						</li>
						<li class="breadcrumb-item active" aria-current="page">Update Employees(SBA)</li>
					</ol>
				</nav>
			</div>
		</div>
		<!--end breadcrumb-->
		<!--<h6 class="mb-0 text-uppercase">Group List</h6>-->
	<a href="#" onclick="window.history.back();"><button style="color:white;" class="btn btn-info"><i class="bx bx-arrow-to-left me-1 "></i>Back</button></a>
	
	
	
      <div class="row">
		<div class="col-xl-9 mx-auto">
			<div class="card border-top border-0 border-4 border-info">
				<div class="card-body">
					<div class="border p-4 rounded">
						<div class="card-title d-flex align-items-center">
							<div><i class="bx bxs-user me-1 font-22 text-info"></i>
							</div>
							<h5 class="mb-0 text-info">Update Employees(SBA)</h5>
						</div>
						<hr>
						
							<input type="hidden" id="user_id" name="user_id" value="<?php echo $member_detail->user_id; ?>">
							
						<div class="row mb-3">
							<label for="full_name" class="col-sm-3 col-form-label">Enter Full Name</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="full_name" id="full_name" value="<?php echo $member_detail->full_name; ?>" placeholder="Enter Full Name">
							</div>
						</div>
						<div class="row mb-3">
							<label for="UserName" class="col-sm-3 col-form-label">Enter UserName</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="UserName"  value="<?php echo $member_detail->usernname; ?>" id="UserName" placeholder="Enter UserName">
							</div>
						</div>
						<div class="row mb-3">
							<label for="mobile_number" class="col-sm-3 col-form-label">Enter Mobile Number</label>
							<div class="col-sm-9">
								<input type="number" class="form-control" name="mobile_number" value="<?php echo $member_detail->mobile; ?>" id="mobile_number" placeholder="Enter Mobile Number">
							</div>
						</div>

						<div class="row mb-3">
							<label for="Password" class="col-sm-3 col-form-label">Enter Password</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" value="<?php echo $member_detail->password; ?>" name="Password" id="Password" placeholder="Enter Password">
							</div>
						</div>
						<div class="row mb-3">
							<label for="member_status" class="col-sm-3 col-form-label">Member Status</label>
							<div class="col-sm-9">
							    <select class="form-control" name='member_status' id="member_status" placeholder="Member Staus">
							        <option <?php if($member_detail->status=='Active'){echo 'selected';} ?>  value="Active">Active</option>
							        <option <?php if($member_detail->status=='Deactive'){echo 'selected';} ?>  value="Deactive">Deactive</option>
							    </select>
							</div>
						</div>
						
						<div class="row">
							<label class="col-sm-3 col-form-label"></label>
							<div class="col-sm-9">
								<button type="button" id="update_member" style="color:white; " class="btn btn-info px-5 add_group" >Update Employee(SBA)</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
	
	
	</div>
</div>

<script>
        var base_url = '<?php echo  base_url();  ?>';
		$('body').on('click','#update_member',function(){
        var user_id = $('#user_id').val();
        var member_status = $('#member_status :selected').val();
        var full_name= $('#full_name').val();
        var mobile_number= $('#mobile_number').val();
        var UserName= $('#UserName').val();
        var Password= $('#Password').val();

        if((user_id) && (full_name) && (UserName) && (mobile_number) && (member_status) && (Password)) 
        {
         $.ajax({
             type: 'POST',
             url: base_url+'Superadmin/SeniorMemberUpdateProcess',
             data: {Password:Password,user_id:user_id,full_name:full_name,member_status:member_status,mobile_number:mobile_number,UserName:UserName},
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
           if(!full_name)
           {
           	error_notification('Please Enter Full Name');
           }
           if(!member_status)
           {
           	error_notification('Please Enter Member Status');
           } 
           if(!mobile_number)
           {
           	error_notification('Please Enter Mobile Number');
           } 
           if(!Password)
           {
           	error_notification('Please Enter Password');
           }
           if(!UserName)
           {
           	error_notification('Please Enter UserName');
           }
} 
        
 }); 
	    
</script>
