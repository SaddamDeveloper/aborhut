<?php include_once('include/header.php'); ?>
<?php


$id = $_SESSION['id'];
$myid= $_REQUEST['id'];
  /*
   *  @author   Saddam Hussain
   *  @about    PayUMoney Payment Gateway integration in PHP
   */
if(isset($_SESSION['id'])){
  $status      = $_POST["status"];
  $firstname   = $_POST["firstname"];
  $amount      = $_POST["amount"];
  $txnid       = $_POST["txnid"];
  $posted_hash = $_POST["hash"];
  $key         = $_POST["key"];
  $productinfo = $_POST["productinfo"];
  $email       = $_POST["email"];
  $salt        = "LKT8zBvmaD"; // Your salt

  If(isset($_POST["additionalCharges"])) {

    $additionalCharges = $_POST["additionalCharges"];
    $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;      
  } else {	  
    $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
  }

  $hash = hash("sha512", $retHashSeq);

  if ($hash != $posted_hash) {
    echo "Invalid Transaction. Please try again";
  }  

 
$start = $_REQUEST['start'];
if(isset($_POST['submit12345'])){
	$chk_status    =  $_POST['chk_status'];
  $amount = $_POST['amount'];

	$insert_bookings = "UPDATE `checkout` SET
	chk_status   = '".addslashes($chk_status)."'
  WHERE id = '".$myid."'";             

  $sql_insert = $dbconn->prepare($insert_bookings);
  $sql_insert->execute();

  $update_wallet = "UPDATE `wallet` SET
	amount   = '".addslashes($amount)."'
  WHERE id = '".$myid."'"; 

  $sql = $dbconn->prepare($update_wallet);
  $sql->execute();

  header("Location: customer-panel/order.php");

}


if($id !=''){
 $select_bookings= "SELECT * FROM `checkout` WHERE id = '".$_REQUEST['id']."'";
 $sql=$dbconn->prepare($select_bookings);
 $sql->execute();
 $wlvd=$sql->fetchAll(PDO::FETCH_OBJ);
foreach($wlvd as $rows);}
 
$chk_bill_name = $rows->chk_bill_name;
$chk_bill_phone = $rows->chk_bill_phone;
$chk_prop_visit_date = $rows->chk_prop_visit_date;
 

$mss = "Dear $chk_bill_name, 
The status of your request for property visit on $chk_prop_visit_date with Aborhut.com is $status .
You shall recieve a feedback call from us shortly!

Team,
Aborhut.com";  
$encodedMessage = urlencode($mss); 

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://bulksms.bulksmsvalue.com/rest/services/sendSMS/sendGroupSms?AUTH_KEY=746c67381b212b474442e9293e2ffb4a&message=$encodedMessage&senderId=DEMOOS&routeId=3&mobileNos=91$chk_bill_phone&smsContentType=english",
  
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "GET",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
));

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} 
else {
  echo $response;
}
}
?>

	<section id="content">
		<div class="content-blog">
				<br><br><br>	<div class="page_header text-center">
						<h2>Shop - Checkout</h2>
						<p></p>
					</div>

					<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
							                <div style="text-align: center;">
                                <h3>Your Payment Status is <span style="color: #FF0000;"><?php echo $status; ?></span></h3>
                                <h3>You can check your payment status in the payment history</h3>
                                <p>You will be redirected automatically to the home page after 3 seconds. Do not close this window</p>
                              </div>
							<?php if($message!="") { ?>
              
              <?php
                  switch($vendor_status) {
                    case "success":
                      echo $db->success_message_info($message);
                      break;
                    case "failed":
                      echo $db->error_message_info($message);
                      break;
                    default:
                      echo "Nothing Done";
                      break;
                  }
                ?>
                <?php } ?>
                                
                                
                      <form id="loginform" class="m-t-30" method="post" action="" enctype="multipart/form-data">  
                          
                        <input name="chk_status" type="hidden" class="form-control" id="chk_status" required="" value="<?php echo $status; ?>" >
                        </div>
                        
                        </div>	
                          
                        <button type="submit" class="btn button-md button-theme"  id = "loginsubmit" name="submit12345" value="Submit" display = "none">Submit</button>
                      </form>
                  </div>
                </div>
                   
                   
				 <!-- row -->
                <!-- .row -->
                
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
    <script src="assets/libs/ckeditor/ckeditor.js"></script>
    <script src="assets/libs/ckeditor/samples/js/sample.js"></script>
			
            	</div>
	</section>
	
 
<?php include('include/footer.php'); ?>

 		
<script>
    window.onload = setTimeout(function(){
        var form = document.getElementById('loginsubmit').click();
    }
    ,0000);
</script>  
           