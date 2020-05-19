<?php
include_once('customer-panel/configure.php');
DB::connect();
    if(isset($_POST['Login'])){
        $mobile = $_POST['mobile'];
        $password = $_POST['password'];

        $select  = "select * from `customer` WHERE cus_phone = '".$mobile."' and cus_password = '".$password."'";
        $sql=$dbconn->prepare($select);
        $sql->execute();
        $wlvd=$sql->fetchAll(PDO::FETCH_OBJ);
        if(!empty($mobile) || !empty($password)){
            if($sql->rowCount() > 0){
            foreach($wlvd as $row5)
            {
                $_SESSION['id'] = $row5->id;  
                $_SESSION['cus_name'] = $row5->cus_name; 
                $product = $_GET['product'];
                header("location:checkout.php?product=$product");
            }
            
           } else {
             $error = "<span class='text-danger'>Invalid Phone Number or Password</span>";  
           }
        }else{
            $error = "<span class='text-danger'>Phone Number or Password is required!</span>";
        }
    }

?>
<?php

//     if (isset($_GET['action'])) {
//         $action=$_GET['action'];
//         switch($action) {
//         case "lo":              
//             $msg="You are now logged out.";
//             break;
//         }
        
// }
?>
<?php include_once('include/header.php'); ?>

<!-- Content area start -->
<div class="content-area login">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start -->
                <div class="form-content-box login-page">
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
                                <input type="text" name="mobile" class="input-text" placeholder="Phone Number">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="input-text" placeholder="Password">
                            </div>
                            <div class="checkbox">
                                <div class="ez-checkbox pull-left">
                                    <label>
                                        <input type="checkbox" class="ez-hide">
                                        Remember me
                                    </label>
                                </div>
                                <a href="forgot-password.html" class="link-not-important pull-right">Forgot Password</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" name="Login" class="button-md button-theme btn-block">login</button>
                            </div>
                        </form>
                        <!-- Form end -->
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                        <span>
                            New to Aborhut? <a href="signup.php">Sign up now</a>
                        </span>
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
<!-- Content area end -->
<?php include('include/footer.php'); ?>