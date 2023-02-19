  <section class="Profit_Loss">  
    <div class="profit_graph">
        <img src="<?php echo base_url();  ?><?php echo  $userdata->user_graph_history; ?>" alt="">
    </div>
    <?php  if($profitLoss){
    foreach($profitLoss as $profitLosssingle){
        $pl_type = $profitLosssingle->pl_type;
    ?>
    
    <div class="profit">
        <span class="<?php if($pl_type=='Loss'){ echo 'Loss_amount';}else if($pl_type=='Profit'){echo 'profit_amount'; }else if($pl_type=='Pending'){echo 'pending_amount'; }?> "><?php if($pl_type=='Loss'){ echo '-';}else if($pl_type=='Profit'){echo '+'; }else if($pl_type=='Pending'){echo '-'; }?><?php echo $profitLosssingle->pl_amount; ?></span>
        <span class="profit_text"><?php echo $profitLosssingle->pl_type; ?> - <?php echo date("d/M/Y", strtotime($profitLosssingle->pl_date)); ?> </span>
    </div>
    
    <?php } }else{  ?>
     <div class="profit">
        <span class="profit_amount">+0</span>
        <span class="profit_text">No History Found</span>
    </div>
    <?php } ?>
    
    
    <style>
        .Profit_Loss .profit .pending_amount {
    color: orange;
    margin-right: 10px;
    font-weight: bold;
}
    </style>
  
</section>
