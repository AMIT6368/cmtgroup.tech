<section class="Profile">
    <div class="profile_title">
        <div class="Profile_imgs"><img src="<?php echo base_url();  ?>assets/backend/assets/check_green.gif" alt=""></div>
        
        <div class="profile_name">Success</div>
        
    </div>
    <a href="<?php echo base_url(); ?>UWallet"><button class="editProfile">Back to Wallet</button></a>
    
<div class="Profile_table">
    <table class="table">
<tr>
    <td>ORDERID</td>
    <td>: <?php echo $orderdata->pt_order_id; ?></td>
</tr>
<tr>
    <td>Amount</td>
    <td>: <?php echo $orderdata->pt_amount; ?></td>
</tr>
<tr>
    <td>Payment Status</td>
    <td>: <?php echo $orderdata->pt_status; ?></td>
</tr>
<tr>
    <td>TXNID</td>
    <td style="font-size: 10px !important;">: <?php echo $orderdata->pt_transition_id; ?></td>
</tr>
<tr>
    <td>BANKTXNID</td>
    <td>: <?php echo $orderdata->pt_banktrns_id; ?></td>
</tr>
<tr>
    <td>Date</td>
    <td>: <?php echo $orderdata->pt_date; ?></td>
</tr>

    </table>

</div>
</section>

<style>
.editProfile {
    padding: 10px 25px 10px 25px;
    margin-top: 10px;
    background: linear-gradient(90deg, #ff5016 8%, #ffcd34 41%, #ff1717 79%);
    color: white;
    border-radius: 10px;
    border: none;
}
</style>