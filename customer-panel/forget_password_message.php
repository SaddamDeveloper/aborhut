 <?php 
ob_start();
include('configure.php');
DB::connect();
 

$id = $_REQUEST['id'];
  



if($id !=''){
 $select_bookings= "SELECT * FROM `passwordreset` WHERE id = '".$_REQUEST['id']."'";
 $sql=$dbconn->prepare($select_bookings);
 $sql->execute();
 $wlvd=$sql->fetchAll(PDO::FETCH_OBJ);
 foreach($wlvd as $rows);


    $select_client1= "SELECT * FROM `student` WHERE st_phone  = '".$rows->username."'";
    $sql1=$dbconn->prepare($select_client1);
    $sql1->execute();
    $wlvd1=$sql1->fetchAll(PDO::FETCH_OBJ);
    foreach($wlvd1 as $rows1);
}

 
$st_name = $rows1->st_name;
$st_phone = $rows1->st_phone;   
$st_password = $rows1->st_password;   

$mss = "Dear $st_name, 
Your Username is  $st_phone and password - $st_password.


Regards,
Goreswar College";  
$encodedMessage = urlencode($mss); 

$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => "http://login.indiawebdesigns.tk/submitsms.jsp?user=PabanPT&key=14e4082d07XX&mobile=91$st_phone&message=$encodedMessage&senderid=RPSCAB&accusage=1",
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
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<?php include('inc/header.php'); ?>

<body>
    <div class="main-wrapper">
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div class="preloader">
            <div class="lds-ripple">
                <div class="lds-pos"></div>
                <div class="lds-pos"></div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(assets/images/big/auth-bg.jpg) no-repeat center center;">
            <div class="auth-box">
                <div>
                    <div class="logo">
                        
                        <h5 class="font-medium m-b-20">Sign Up Status</h5>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            
                                
                              <?php
    
 
if ($st_phone == "") {
    echo "<p>Hi<br> <br>
    The phone number which you have entered doesn't exist in our database. <br><br>
    Kindly enter your registered mobile number.<p>";
} else {
    echo "<p>Dear $st_name, <br> <br>
    We have forwarded your password to your registered mobile number<br><br>
    <a href='login.php?'>Click Here To Login</a><br><br>
    Regards, Goreswar College
    <p>";
}



?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    
    
 

 <!--/Footer-->
    <?php include('inc/footer.php'); ?>     
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js "></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js "></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js "></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip "]').tooltip();
    $(".preloader ").fadeOut();
    </script>
</body>

</html>