<section class="wallet">
    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>-->
    <div class="add">
        <span class="add_icon"><i class="fa-solid fa-wallet"></i></span>
        <span class="fund_add">Fund add</span>
        <div class="fund_container">
            <span class="Fund_amount"><?php  echo $userdata->wallet_amount ?></span>
            <div class="borderline"></div>
        </div>
        <button class="fund_btn" onclick="MyStatusChangeBilling('<?php echo  $this->session->userdata('user_id');  ?>','<?php  echo $userdata->wallet_amount ?>')" >Add Funding</button>
    </div>
    <div class="add">
        <span class="add_icon"><i class="fa-solid fa-sack-dollar"></i></span>
        <span class="fund_add">Fund Withdraw</span>
        <div class="fund_container">
            <span class="Fund_amount"><?php  echo $userdata->wallet_amount ?></span>
            <div class="borderline"></div>
        </div>
        <button class="fund_btn"  onclick="MyStatusChangeWithdraw('<?php echo  $this->session->userdata('user_id');  ?>','<?php  echo $userdata->wallet_amount ?>')">Withdraw</button>
    </div>
    
    
  <!--Strt Modal -->      
        <div class="modal fade exampleDarkModal" id="exampleDarkModal" aria-hidden="true">
        	<div class="modal-dialog modal-lg modal-dialog-centered">
        		<div class="modal-content bg-dark">
        			<div class="modal-header">
        				<h5 class="modal-title text-white model_title" >Add Credit</h5>
        				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        			</div>
        			<form id="add_creditform" class="add_creditform" method="post" action="<?php echo base_url();  ?>Home/RegesterAndPay" enctype="multipart/form-data" >
        			<div class="modal-body text-white">
                       <input type="hidden" value="" id="user_id">
						<div class="row mb-3">
							<label for="lead_detail" class="col-sm-3 col-form-label">Enter Amount</label>
							<div class="col-sm-9">
								<input type="text" value="" class="form-control" name="amount" id="amount" placeholder="Enter Amount">
							</div>
						</div>
        			</div>
        			<div class="modal-footer">
        				<button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
        				<button type="button" class="btn btn-danger final_submit" id="final_submit" >Add Payment Now</button>
        			</div>
        			</form>
        		</div>
        	</div>
        </div>
        <!-- END Modal --> 
        
        
         <!--Strt Modal -->      
        <div class="modal fade exampleDarkModalwidthrawal" id="exampleDarkModalwidthrawal" aria-hidden="true">
        	<div class="modal-dialog modal-lg modal-dialog-centered">
        		<div class="modal-content bg-dark">
        			<div class="modal-header">
        				<h5 class="modal-title text-white model_title" >Fund Withdraw</h5>
        				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        			</div>
        			
        			<div class="modal-body text-white">
        			    <h5 class="modal-title text-white model_title" >Wallet Amount : <span id="total_wallet_amount"></span></h5>
                       <input type="hidden"  id="totalamount"  >
                       <input type="hidden"  id="user_id_withdrawal"  >
						<div class="row mb-3">
							<label for="lead_detail" class="col-sm-3 col-form-label">Enter Amount</label>
							<div class="col-sm-9">
								<input type="text" class="form-control" name="amount_withdraw" id="amount_withdraw" placeholder="Enter Amount">
							</div>
						</div>
        			</div>
        			<div class="modal-footer">
        				<button type="button" class="btn btn-info" data-bs-dismiss="modal">Cancel</button>
        				<button type="button" class="btn btn-danger final_amount_withdraw" id="final_amount_withdraw" >Withdraw Now</button>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- END Modal --> 
    
    
</section>

<style>

.copyright {
   color: white !important;
}
.wallet .add .fund_add {
    color: white !important;
}

.wallet .add .fund_container .Fund_amount {
    color: white !important;
}

.header .clint_details .Clint_name {
    color: white !important;
  
}

.header .clint_details .clint {
    color: white !important;
}

body{
       background: black !important;
}
    .sweet-alert button.cancel {
    background-color: #ff0000 !important;
}
</style>

<script>
var base_url = '<?php echo  base_url();  ?>';

function MyStatusChangeWithdraw(user_id,totalamount){
  swal({
    title: "Are you sure?",
    text: "You Want Withdraw Amountt",
    showCancelButton: true,
    confirmButtonColor: '#000',
    cancelButtonColor: '#ff0000',
    confirmButtonText: 'Yes, I am sure!',
    cancelButtonText: "No, cancel it!",
    closeOnConfirm: true,
    closeOnCancel: true
},
function () {
   $('#total_wallet_amount').html(totalamount);
   $('#totalamount').val(totalamount);
   $('#user_id_withdrawal').val(user_id);
   $('#exampleDarkModalwidthrawal').modal('show');
});  
    
}

  // Other_detail Billing_Amount  lg_idBilling user_idBilling Client_Name Client_Address
	$('body').on('click','#final_amount_withdraw',function(){
    var totalamount = $('#totalamount').val();
    var amount_withdraw = $('#amount_withdraw').val();
    var user_id = $('#user_id_withdrawal').val();
    if(parseInt(amount_withdraw) >= parseInt(totalamount)){
        error_notification('Withdraw  Amount Should Be Smaller than Total Amount');
        return;
    }
    if((user_id) && (amount_withdraw) ) 
    {
     $.ajax({
         type: 'POST',
         url: base_url+'UWithdrawlAmount',
         data: {user_id:user_id,amount_withdraw:amount_withdraw,totalamount:totalamount},
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
       if(!amount_withdraw)
       {
       	error_notification('Please Enter Withdraw Amount');
       }
       if(!user_id_amount_withdraw)
       {
       	error_notification('Somthing Missing');
       	location.reload(true);
       }
       
    }
});  

function MyStatusChangeBilling(user_id,totalamount)
{
swal({
    title: "Are you sure?",
    text: "You Want ToAdd Payment",
    showCancelButton: true,
    confirmButtonColor: '#000',
    cancelButtonColor: '#ff0000',
    confirmButtonText: 'Yes, I am sure!',
    cancelButtonText: "No, cancel it!",
    closeOnConfirm: true,
    closeOnCancel: true
},
function () {
    $('#user_id').val(user_id);
   $('#exampleDarkModal').modal('show');
});
 
}
    // Add Credit
	$('body').on('click','#final_submit',function(){
    var user_id = $('#user_id').val();
    var amount = $('#amount').val();

    if((user_id) && (amount) ) 
    {
       $("#add_creditform").submit() 

    }else{
       if(!amount)
       {
       	error_notification('Please Enter Withdraw Amount');
       }
       if(!user_id)
       {
       	error_notification('Somthing Missing');
       	location.reload(true);
       }
       
    }
});  
    

</script>