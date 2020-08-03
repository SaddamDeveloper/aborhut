<?php
// Login
include_once('customer-panel/configure.php');
DB::connect();
$mobile_number = null; /// this use for show registration message
$customer = null;
if(isset($_POST['Login'])){
    
    $landlord_phone = $_POST['landlord_phone'];
    $landlord_password = $_POST['landlord_password'];
    
    $select  = "select * from `landlord` WHERE landlord_phone = '".$landlord_phone."' and landlord_password = '".$landlord_password."'";
    $sql=$dbconn->prepare($select);
    $sql->execute();
    $wlvd=$sql->fetchAll(PDO::FETCH_OBJ);
    if($sql->rowCount() > 0){
    foreach($wlvd as $row5)
    {
        $_SESSION['id'] = $row5->id;  
        $_SESSION['landlord_name'] = $row5->landlord_name; 
        header("location:landlord-panel/welcome.php");
    }
    
   } else {
     $error = "<span class='text-danger'>Invalid Phone Number or Password</span>";  
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

//Sign Up
$fullNameErr = $emailErr = $mobileErr = "";
if(isset($_POST['signUp'])){
    empty($_POST['name']) ? $fullNameErr = "Name is required!" : $name = test_input($_POST['name']);
    empty($_POST['email']) ? $emailErr = "Email is required!" : $email = test_input($_POST['email']);
    empty($_POST['number']) ? $mobileErr = "Mobile is required!" : $mobile = test_input($_POST['number']);
    $rand1= mt_rand(100000,999999);
    if($name && $email && $mobile != ""){

        $mobile_check = "SELECT COUNT(*) FROM landlord WHERE landlord_phone = '$mobile'";
        $sql=$dbconn->prepare($mobile_check);
        $sql->execute();

        $email_check = "SELECT COUNT(*) FROM landlord WHERE landlord_email = '$email'";
        $sql1=$dbconn->prepare($email_check);
        $sql1->execute();
        if($sql->fetchColumn() > 0){
           $mobileErr = "Mobile Number is already exists!";
        }else if($sql1->fetchColumn() > 0){
            $emailErr = "Email is already exists!";
        }else{
            $insert_landlord = "INSERT `landlord` SET
            landlord_name = '".$name."',
            landlord_email = '".$email."',
            landlord_phone = '".$mobile."',
            landlord_password = '".$rand1."'";
            $sql_update1=$dbconn->prepare($insert_landlord);
            $sql_update1->execute();
            
            if($sql_update1){
                $update_user = "INSERT `customer` SET
                cus_name = '".$name."',
                cus_email = '".$email."',
                cus_phone = '".$mobile."',
                cus_password = '".$rand1."'";
        
                $sql_update=$dbconn->prepare($update_user);
                $sql_update->execute();
                if($sql_update1 && $sql_update){
                    $mobile_number = $mobile;
                    $customer = $name;
                }

            //Send Password to mobile
            $sms = "Dear $name, 
            Thankyou for registering at Aborhut!
            Your login id is $mobile and password is $rand1.

            Team,
            Aborhut.com";  

            $username="Fiscaleindia";
            $api_password="9aea62lulgu3by1ph";
            $sender="FISCLE";
            $domain="http://sms.webinfotech.co";
            $priority="11";// 11-Enterprise, 12- Scrub
            $method="GET";

            $mobile=$mobile;
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
            return $return_val;
            }
        }
        
    }
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>
<?php include_once('include/header.php');  ?>
<!-- Content area start -->
<div class="content-area login">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <!-- Form content box start -->
                <div class="form-content-box">
                    <!-- details -->
                    <div class="details">
                        <!-- Main title -->
                        <div class="main-title">
                            <h1><span>Login</span></h1>
                        </div>
                        <?php
                            if(!empty($error)){
                                echo $error;
                            }
                        ?>
                        <!-- Form start -->
                        <form method="POST">
                            <div class="form-group">
                                <input type="text" name="landlord_phone" class="input-text" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <input type="password" name="landlord_password" class="input-text" placeholder="Password">
                            </div>
                            <div class="checkbox" style="padding-top: 22px;">
                                <div class="ez-checkbox pull-left">
                                    <label>
                                        <input type="checkbox" class="ez-hide">
                                        Remember me
                                    </label>
                                </div>
                                <a href="list_forgot_password.php" class="link-not-important pull-right">Forgot Password</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="Login" class="button-md button-theme btn-block">login</button>
                            </div>
                        </form>
                        <!-- Form end -->
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-5">
                <!-- Form content box start -->
                <div class="form-content-box">
                    <!-- details -->
                    <div class="details">
                        <!-- Main title -->
                        <div class="main-title">
                            <h1><span>Signup</span></h1>
                            <?php
                                if (!empty($mobile_number)) {
                                    echo "<p>Dear $customer, <br> <br>
                                    Your registration with Aborhut.com is successful. <br><br>
                                    We have forwarded a 6 digit password, to your registered mobile number $mobile_number<br><br>
                                    Kindly check your mobile and login with that password. <br><br> 
                                    <p>";
                                }
                            ?>
                        </div>
                        <!-- Form start-->
                        <form method="POST">
                            <div class="form-group">
                                <span class="form-text text-danger"><?php echo $fullNameErr; ?></span> 
                                <input type="text" name="name" class="input-text text-danger" placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <span class="form-text text-danger"><?php echo $emailErr; ?></span> 
                                <input type="email" name="email" class="input-text text-danger" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <span class="form-text text-danger"><?php echo $mobileErr; ?></span> 
                                <input type="text" name="number" class="input-text text-danger" placeholder="Mobile">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="signUp" class="button-md button-theme btn-block">Signup</button>
                            </div>
                        </form>
                        <!-- Form end-->
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
<!-- Content area end -->
<?php include('include/footer.php'); ?>