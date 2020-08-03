<?php include('include/header.php'); ?>
<?php
error_reporting(0);
error_reporting(E_ERROR | E_WARNING | E_PARSE);
error_reporting(E_ALL);
ini_set("error_reporting", E_ALL);
error_reporting(E_ALL & ~E_NOTICE);
    if(isset($_POST['submit'])){
        if(empty($_POST['phone'])){
            $message = '<div class="alert alert-danger">Mobile No is required!</div>';
        }else {
            $data = array(
                ':phone' => trim($_POST['phone'])
            );

            $query = "SELECT * FROM customer WHERE cus_phone= :phone";
            $statement = $dbconn->prepare($query);
            $statement->execute($data);
            if($statement->rowCount() > 0){
                $result = $statement->fetchAll();
               print_r($result);exit();
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
                        
                       <h3>Your password is</h3> 
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