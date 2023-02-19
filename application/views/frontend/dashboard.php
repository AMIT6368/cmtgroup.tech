<section class="home">
        <span class="welcome">Welcome To Algo Trader</span>
        <div class="Balance">
            <span class="currert">Current Balance</span>
            <?php
               $wallet_amount =  $userdata->wallet_amount ? $userdata->wallet_amount: 0 ;
               $Spent = $totalSpendtoday->amount ? $totalSpendtoday->amount:0;
               $Margin = $wallet_amount -  $Spent;
            
            ?>
            <span class="currert_amount">Rs <?php echo $wallet_amount;  ?></span>
            <div class="Count_balance">
                <div class="left_home">
                    <span class="spentamount"><?php echo $Spent; ?></span>
                    <span class="spent">Spent</span>
                </div>
               <div class="mid"></div>
               <div class="right_home">
                <span class="profite_amount"><?php  echo $Margin; ?></span>
                    <span class="spent">Margin</span>
               </div>

            </div>

             <div class="Count_balance">
                <div class="left_home">
                    <span class="spent" style="font-size: 12px !important;margin-top: 4px !important;">Allow Trading</span>
                </div>
               <div class="mid"></div>
               <div class="right_home">
                    <span class="spent tradeing_status <?php if($userdata->tradeing_status=='Pending'){ echo 'editProfilered';}else{ echo 'editProfilesuccess';} ?> " style="font-size: 12px !important;"><?php echo $userdata->tradeing_status ? $userdata->tradeing_status :'Approved'; ?></span>
               </div>

            </div>
        </div>
        <div class="trading_graph">
         <img src="<?php echo base_url();  ?><?php echo  $userdata->user_graph; ?>" alt="">
        </div>
    </section>

    <style type="text/css">
        .editProfilesuccess{
    padding: 2px 8px 7px 22px;
    background: linear-gradient(90deg, #16ff28 13%, #076217 54%, #0bad09 84%);
    color: white;
    border-radius: 10px;
    border: none;
    margin-top: 1px;
        }

    .editProfilered{
    padding: 2px 8px 7px 22px;
    background: linear-gradient(90deg, #e70909 13%, #6c0303 54%, #ad0909 84%);
    color: white;
    border-radius: 10px;
    border: none;
    margin-top: 1px;
        }
    </style>