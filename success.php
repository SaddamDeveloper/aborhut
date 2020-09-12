<?php
session_start();
include('include/header.php'); 
include('src/instamojo.php');
if(isset($_SESSION['id'])){
  try{
  $api = new Instamojo\Instamojo("test_381a100475a919749fd03c0e7c6", "test_b1fd253c6f2fe501d75c6cb9a1d","https://test.instamojo.com/api/1.1/");
  $payment_request_id = $_REQUEST['payment_request_id'];
  $response = $api->paymentRequestStatus($payment_request_id);
  $data = $response['purpose'];    
  $id = substr($data, strpos($data, "#") + 1);    
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
                                <h3>Your Payment Status is 
                                  <?php if($response['payments'][0]['status'] == 'Credit'){ 
                                    ?>
                                    <span style="color: green;">
                                            Successful
                                      </span>
                                    <?php
                                      $select_bookings= "UPDATE `checkout` SET `chk_status`='SUCCESS' WHERE id = '".$id."'";
                                      $sql=$dbconn->prepare($select_bookings);
                                      $sql->execute();
                                      $update_payment= "UPDATE `orders` SET `payment_status`='SUCCESS' WHERE checkout_id = '".$id."'";
                                      $sql2=$dbconn->prepare($update_payment);
                                      $sql2->execute();
                                  
                                      $update_checkout= "SELECT * FROM `checkout` WHERE id = '".$id."'";
                                      $sql3=$dbconn->prepare($update_checkout);
                                      $sql3->execute();
                                      $wlvd=$sql3->fetchAll(PDO::FETCH_OBJ);
                                        foreach($wlvd as $rows);
                                  
                                        $chk_bill_name = $rows->chk_bill_name;
                                        $chk_bill_phone = $rows->chk_bill_phone;
                                        $chk_prop_visit_date = $rows->chk_prop_visit_date;
                                    
                                        $sms = "Dear $chk_bill_name, 
                                        The status of your request for property visit on $chk_prop_visit_date with Aborhut.com is successful .
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
                                  }else{
                                    ?>
                              <span style="color: red;">
                                    Failed
                              </span>
                              <?php
                                  } ?>
                              </h3>
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
<?php
  if( !isset($response['payments'][0]['status']) ) {
    die('payment failed');
 } else if($response['payments'][0]['status'] != 'Credit') {
      die('payment failed');
 } 
}catch (\Exception $e) {
  die('payment failed');
}
}else{
  echo "Something Went Wrong!";
}
include('include/footer.php');