<?php include('include/header.php'); ?>
<?php
      if(isset($_POST['send'])){
        if(empty($_POST['phone'])){
            $message = '<div class="alert alert-danger">Mobile No is required!</div>';
        }else {
            $data = array(
                ':phone' => trim($_POST['phone'])
            );

            $query = "SELECT * FROM landlord WHERE landlord_phone= :phone";
            $statement = $dbconn->prepare($query);
            $statement->execute($data);
            if($statement->rowCount() > 0){
                $result = $statement->fetch(PDO::FETCH_OBJ);
                $sms = "Dear $result->cus_name, Your password is $result->landlord_password 

                Team,
                Aborhut.com";   
              
                  $username="Fiscaleindia";
                  $api_password="9aea62lulgu3by1ph";
                  $sender="FISCLE";
                  $domain="http://sms.webinfotech.co";
                  $priority="11";// 11-Enterprise, 12- Scrub
                  $method="GET";
              
                  $mobile=$result->landlord_phone;
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
                  $message = '<div class="alert alert-success">Password has been sent!</div>';
            }else {
                $message = '<div class="alert alert-danger">Mobile No is not found!</div>';
            }
        }
      }
?>
<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="overlay">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Thank You</h1>
                <ul class="breadcrumbs">
                    <li><a href="./">Home</a></li>
                    <li class="active">Thank You</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Thank you start -->
<!-- Content area start -->
<div class="content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start -->
                <div class="form-content-box" style="margin: 30px auto;">
                    <!-- details -->
                    <div class="details">
                        <!-- Main title -->
                        <div class="main-title">
                            <h1><span>Forgot</span> Password</h1>
                        </div>
                        <?php
                            if(isset($message)){
                                echo $message;
                            }
                        ?>
                        <!-- Form start -->
                        <form action="#" method="POST">
                            <div class="form-group">
                                <input type="text" name="phone" class="input-text" placeholder="Mobile No">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="send" class="button-md button-theme btn-block">Send</button>
                            </div>
                        </form>
                        <!-- Form end -->
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                        <span>
                           I want to <a href="login.php">return to login</a>
                        </span>
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
<!-- Content area end -->
<!-- Thank you end -->

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
                <a href="submit-property.html" class="btn button-md button-theme">Submit Now</a>
            </div>
        </div>
    </div>
</div>
<!-- Intro end -->
<?php include('include/footer.php'); ?>