<?php
    $paytmParams = array();
    $paytmParams["ORDER_ID"] 	= $paytm['ORDER_ID'];
    $paytmParams["CUST_ID"] 	= $paytm['CUST_ID'];
    $paytmParams["MOBILE_NO"] 	= $paytm['MOBILE_NO'];
    $paytmParams["EMAIL"] 		= $paytm['EMAIL'];
    $paytmParams["TXN_AMOUNT"] 	= $paytm['Amount'];
    $paytmParams["MID"] 		= $paytm['MID'];
    $paytmParams["CHANNEL_ID"] 	= $paytm['CHANNEL_ID'];
    $paytmParams["WEBSITE"] 	= $paytm['WEBSITE'];
    $paytmParams["INDUSTRY_TYPE_ID"] = $paytm['INDUSTRY_TYPE_ID'];
    $paytmParams["CALLBACK_URL"] = $paytm['CALLBACK_URL'];
    $paytmChecksum = getChecksumFromArray($paytmParams, $paytm['marchent_key']);
?>
<form method='post' action='<?= $paytm['redirect_url'] ?>' id='f1'>
    <?php
        foreach($paytmParams as $name => $value) {
            echo '<input type="hidden" name="' . $name .'" value="' . $value . '">';
        }
    ?>
    <input type="hidden" name="CHECKSUMHASH" value="<?php echo $paytmChecksum ?>">
</form>
<script type="text/javascript">
    window.onload = function(){
      var mform = document.getElementById('f1');
      mform.submit();
    }
</script>