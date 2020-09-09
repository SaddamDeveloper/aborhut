<?php 
  include('include/header.php'); 
date_default_timezone_set('Asia/Kolkata');

$id = $_REQUEST['id'];

$cart_sql  = "select * from `orders` WHERE checkout_id ='$id'";
$cart_prep=$dbconn->prepare($cart_sql);
$cart_prep->execute();
$cart_data=$cart_prep->fetchAll(PDO::FETCH_OBJ);
$cart_data_count = $cart_prep->rowCount();
$amount = 0;
if ($cart_data_count > 0 ) {
  foreach ($cart_data as $row) {
    $amount+=$row->online_pay;
  }
} else {
  # code...
}

// $start = $_REQUEST['start'];
// $wallet_bal = $_REQUEST['wallet_bal'];
$chk_total = $amount;
// Merchant key here as provided by Payu
$MERCHANT_KEY = "lOrHCXkF";

// Merchant Salt as provided by Payu
$SALT = "LKT8zBvmaD";

// End point - change to ps://secure.payu.inhtt for LIVE mode
// $PAYU_BASE_URL = "https://secure.payu.in";
$PAYU_BASE_URL = "https://sandboxsecure.payu.in";		// For Sandbox Mode


$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
  }
}

$formError = 0;



if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha512', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}

$update_transaction= "UPDATE `checkout` SET `online_trans_id` = '$txnid' WHERE id = '".$_REQUEST['id']."'";
$res_transaction=$dbconn->prepare($update_transaction);
$res_transaction->execute();

$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['service_provider'])
  ) {
    
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
  $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';  
  foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;

    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
  }
} elseif(!empty($posted['hash'])) {
  $hash = $posted['hash'];
  $action = $PAYU_BASE_URL . '/_payment';
}

  $id = $_REQUEST['id'];
  if($id !=''){
 $select_client= "SELECT * FROM `checkout` WHERE id = '".$_REQUEST['id']."'";
 $sql=$dbconn->prepare($select_client);
 $sql->execute();
 $wlvd=$sql->fetchAll(PDO::FETCH_OBJ);
 foreach($wlvd as $rows);}
 
?> 

   <body onload="submitPayuForm()">                   
                         
 <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
<section id="content">
		<div class="content-blog">
				<br><br><br>	<div class="page_header text-center">
						<h2>Confirm Payment</h2>
						<p>On clicking on Paynow buitton you will be redirected to payment gateway</p>
						<p></p>
					</div>
              <div class="container"> 
							<?php if($formError) {?>
                <span style="color:red">Please fill all mandatory fields.</span>
                <br/>
                <br/>
              <?php } ?> 
								<form action="<?php echo $action; ?>" class="m-t-30" method="post" name="payuForm">
                               
									<input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
									<input type="hidden" name="hash" value="<?php echo $hash ?>"/>
									<input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
									<input type="hidden" name="service_provider" value="payu_paisa" size="64" />
									<input type="hidden" name="productinfo" value="Test Product" size="64" />
									<input type="hidden" name="firstname" value="<?php echo $rows->chk_bill_name; ?>" size="64" />
									<input type="hidden" name="phone" value="<?php echo $rows->chk_bill_phone; ?>" size="64" />
									<input type="hidden" name="email" value="<?php echo $rows->chk_bill_email; ?>" size="64" />
									<input type="hidden" name="curl" value="http://localhost/aborhut/welcome.php" size="64"/>
									<input type="hidden" name="surl" value="http://localhost/aborhut/status.php?id=<?php echo $id ?>" size="64" /> 
									<input type="hidden" name="furl" value="http://localhost/aborhut/status.php?id=<?php echo $id ?>" size="64" /></td>
									<div class="form-group">
                      <label for="exampleInputEmail1">Amount Payable</label>
										  <input name="amount" type="number" readonly class="form-control" id="amount" required="" value="<?php echo $amount; ?>" >
                      <small class="form-text text-muted"></small>	
            
          <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
					<?php if(!$hash) { ?>
            <td colspan="4"><input type="submit" value="Pay Now"  id = "loginsubmit"  class="btn btn-primary" /></td>
          <?php } ?>
        </form>
		</div>
		</div>
    <!-- Submit Property end -->
<div class="clearfix" style="padding-top: 60px;"></div>
<!-- Intro section -->
<div class="intro-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <img src="img/logos/logo-2.png" alt="logo-2">
            </div>
            <div class="col-md-7 col-sm-6 col-xs-12">
                <h3>Looking To Sell Or Rent Your Property?</h3>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-12">
                <a href="list_your_property.php" class="btn button-md button-theme">Submit Now</a>
            </div>
        </div>
    </div>
</div>
<!-- Intro end -->
<?php include('include/footer.php'); ?>
		
	
			 
           
		 