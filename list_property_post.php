<?php include('include/header.php'); ?>
 
 
	<!------------------------------------------- Page Content Starts  ---------------------------------------------->
	<!--------------------------------------------------------------------------------------------------------------->
	<!--------------------------------------------------------------------------------------------------------------->
	<!--------------------------------------------------------------------------------------------------------------->
<?php
$id = $_REQUEST['id'];
$start = $_REQUEST['start'];

if($id !=''){
 $select_bookings= "SELECT * FROM `customer` WHERE id = '".$_REQUEST['id']."'";
 $sql=$dbconn->prepare($select_bookings);
 $sql->execute();
 $wlvd=$sql->fetchAll(PDO::FETCH_OBJ);
 foreach($wlvd as $rows);
}

$cus_name = $rows->cus_name;
$cus_phone = $rows->cus_phone;
$cus_password = $rows->cus_password;
 

$mss = "Dear $cus_name, 
Thankyou for registering at Aborhut!
Your login id is $cus_phone and password is $cus_password.

Team,
Aborhut.com";  
$encodedMessage = urlencode($mss); 

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://bulksms.bulksmsvalue.com/rest/services/sendSMS/sendGroupSms?AUTH_KEY=746c67381b212b474442e9293e2ffb4a&message=$encodedMessage&senderId=DEMOOS&routeId=3&mobileNos=91$cus_phone&smsContentType=english",
  
  
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
?>

				 
<!-- SHOP CONTENT -->
	<section id="content">
		<div class="content-blog">
				<br><br><br>	<div class="page_header text-center">
						<h2>Login / Register</h2>
						<p> <?php
    
 
if ($id == "0") {
    echo "<p>Hi<br> <br>
    Your registration with Aborhut.com is unsuccessful. <br><br>
    Kindly change your mobile number and try again!<p>";
} else {
    echo "<p>Dear $rows->cus_name, <br> <br>
    Your registration with Aborhut.com is successful. <br><br>
    We have forwarded a 6 digit password, to your registered mobile number $rows->cus_phone<br><br>
    Kindly check your mobile and login with that password. <br><br> 
    
    <p>";
}

?></p>
</div>
<form method="post">
<div class="container">
    
    <?php
 

if(isset($_POST['button'])){
	
	$cus_phone = $_POST['cus_phone'];
	$cus_password = $_POST['cus_password'];
	
	
    $select  = "select * from `customer` WHERE cus_phone = '".$cus_phone."' and cus_password = '".$cus_password."'";
    $sql=$dbconn->prepare($select);
    $sql->execute();
    $wlvd=$sql->fetchAll(PDO::FETCH_OBJ);
	if($sql->rowCount() > 0){
    foreach($wlvd as $row5)
    {
	 
		  $_SESSION['id'] = $row5->id;  
		  $_SESSION['cus_name'] = $row5->cus_name; 
		  
		 		
		  header("Location: checkout.php");
	 
		
	
	  
    }
	
   } else {
	 $error = "Invalid User Name or Password";  
   }
	}
		
		
		if (isset($_GET['action'])) {
		    $action=$_GET['action'];
			switch($action) {
			case "lo":				
				$msg="You are now logged out.";
				break;
			}
			
}
?>
			<!-- LOGIN SECTION START -->
            <div class="login-section pt-115 pb-70">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 col-xs-12">
                            <div class="registered-customers mb-50">
                                <h5 class="mb-50">LOGIN</h5>
                                <form name="loginform" id="loginform"  method="post">
                                    <div class="login-account p-30 box-shadow">
                                        <p>If you have an account with us, Please log in.</p>
                                         
                                        <input type="text" name="cus_phone" id="cus_phone"   required="" placeholder="Registered Mobile Number" aria-label="Registered Mobile Number" >
                                
                                        <input type="text" name="cus_password" id="cus_password"   required="" placeholder="Password" aria-label="Password" >
                                        <p><small><a href="#">Forgot our password?</a></small></p>
                                        
                                         <button type="submit" name="button" class="submit-btn-1" type="submit">Log In</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
<?php

if(isset($_POST['submit12345'])){
	
	$cus_name    =  $_POST['cus_name'];
	$cus_email = $_POST['cus_email'];
	$cus_phone = $_POST['cus_phone'];
    $cus_password = $_POST['cus_password'];
    $cus_city = $_POST['cus_city'];
    $cus_address = $_POST['cus_address'];
    $cus_state = $_POST['cus_state'];

    $rand= mt_rand(100000,999999);

    $rand1= mt_rand(100000,999999);

	$update_user1 = "INSERT `landlord` SET
 
    landlord_name = '".$cus_name."',
    landlord_email = '".$cus_email."',
    landlord_phone = '".$cus_phone."',
    landlord_password = '$rand1',
    landlord_city = '".$cus_city."',
    landlord_address = '".$cus_address."',
    landlord_state = '".$cus_state."'";
    $sql_update1=$dbconn->prepare($update_user1);
    $sql_update1->execute();
    
 
	$update_user = "INSERT `customer` SET
 
    cus_name = '".$cus_name."',
    cus_email = '".$cus_email."',
    cus_phone = '".$cus_phone."',
    cus_password = '$rand1',
    cus_city = '".$cus_city."',
    cus_address = '".$cus_address."',
    cus_state = '".$cus_state."'";
    $sql_update=$dbconn->prepare($update_user);
    $sql_update->execute();
    
    $myid = $dbconn->lastInsertId();
    header("Location: login_post.php?id=$myid");

}
	
?>
                        <!-- new-customers -->
                        <div class="col-md-6 col-xs-12">
                            <div class="new-customers mb-50">
                                <form id="formID"   method="post" action="" enctype="multipart/form-data"> 
                                    <h5 class="mb-50">REGISTER</h5>
                                    <div class="login-account p-30 box-shadow">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <input type="text" id="cus_name" required=""  name="cus_name" placeholder="Your Name">
                                            </div> 
                                            <div class="col-sm-6">
                                                <input type="text" id="cus_phone" name="cus_phone" required="" placeholder="Your 10 Digit Mobile Number">
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="email" id="cus_email" name="cus_email" required="" placeholder="Your Email ID">
                                            </div>
                                             
                                        </div>
                                        
                                        <div class="checkbox">
                                            <label class="mr-10"> 
                                                <small>
                                                    <input type="checkbox"  required="" name="signup">I Agree to the terms & Conditions!
                                                </small>
                                            </label>
                                            <label> 
                                                <small>
                                                    <input type="checkbox" name="signup">Receive special offers from our partners!
                                                </small>
                                            </label>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-6 col-xs-12">
                                                
                                                <button type="submit"  name="submit12345" value="Submit" class="submit-btn-1 mt-20">Submit</button>
                                            </div>
                                            <div class="col-sm-6 col-xs-12">
                                                <button class="submit-btn-1 mt-20 f-right" type="reset">Clear</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>	
		</div>
	</section>
	
 
<?php include('include/footer.php'); ?>
 
