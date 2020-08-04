<?php include_once('include/header.php'); ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL); 
  $id = $_SESSION['id'];
  echo "Hello- " .$id;
  $checkout_id = $_REQUEST['id'];

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
  echo $status;die();
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

  if($id !='' && $status == 'success'){

	$select_bookings= "UPDATE `checkout` SET `chk_status`='SUCCESS' WHERE id = '".$_REQUEST['id']."'";
	$sql=$dbconn->prepare($select_bookings);
	$sql->execute();

	$select_bookings= "UPDATE `orders` SET `payment_status`='SUCCESS', WHERE checkout_id = '".$_REQUEST['id']."'";
	$sql=$dbconn->prepare($select_bookings);
	$sql->execute();

 $select_bookings= "SELECT * FROM `checkout` WHERE id = '".$_REQUEST['id']."'";
 $sql=$dbconn->prepare($select_bookings);
 $sql->execute();
 $wlvd=$sql->fetchAll(PDO::FETCH_OBJ);
  foreach($wlvd as $rows);

  $chk_bill_name = $rows->chk_bill_name;
  $chk_bill_phone = $rows->chk_bill_phone;
  $chk_prop_visit_date = $rows->chk_prop_visit_date;
  

 

  $sms = "Dear $chk_bill_name, 
  The status of your request for property visit on $chk_prop_visit_date with Aborhut.com is $status .
  You shall recieve a feedback call from us shortly!
  Team,
  Aborhut.com";   

    $username="Fiscaleindia";
    $api_password="9aea62lulgu3by1ph";
    $sender="FISCLE";
    $domain="http://sms.webinfotech.co";
    $priority="11";// 11-Enterprise, 12- Scrub
    $method="GET";

    $mobile=$rows->chk_bill_phone;
    $message=$sms;

    $username=urlencode($username);
    $api_password=urlencode($api_password);
    $sender=urlencode($sender);
    $message=urlencode($message);

    $sms = urlencode($sms);

    $parameters="username=$username&api_password=$api_password&sender=$sender&to=$mobile&message=$message&priority=$priority";
    $url="$domain/pushsms.php?".$parameters;
    $ch = curl_init($url);

    if($method=="POST")
    {
        curl_setopt($ch, CURLOPT_POST,1);
        curl_setopt($ch, CURLOPT_POSTFIELDS,$parameters);
    }
    else
    {
        $get_url=$url."?".$parameters;

        curl_setopt($ch, CURLOPT_POST,0);
        curl_setopt($ch, CURLOPT_URL, $get_url);
    }
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1); 
    curl_setopt($ch, CURLOPT_HEADER,0);  // DO NOT RETURN HTTP HEADERS 
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);  // RETURN THE CONTENTS OF THE CALL
    $return_val = curl_exec($ch);
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
                                <h3>Your Payment Status is <span style="color: green;"><?php echo $status; ?></span></h3>
                                <!-- <h3>You can check your payment status in the payment history</h3> -->
                                <!-- <p>You will be redirected automatically to the home page after 3 seconds. Do not close this window</p> -->
                              </div>
                         
                                
                      <center><a href="customer-panel/order.php" class="btn btn-info">Go to Order history</a></center>
                  </div>
                </div>      
            </div>
    <script src="assets/libs/ckeditor/ckeditor.js"></script>
    <script src="assets/libs/ckeditor/samples/js/sample.js"></script>
			
            	</div>
	</section>
	
 
<?php include('include/footer.php'); ?>

 		
<!-- <script>
    window.onload = setTimeout(function(){
        var form = document.getElementById('loginsubmit').click();
    }
    ,0000);
</script>   -->
           