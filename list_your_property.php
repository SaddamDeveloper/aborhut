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
$success = false;
$fullNameErr = $emailErr = $mobileErr = $passErr = $confirmErr = "";
if(isset($_POST['signUp'])){
    empty($_POST['name']) ? $fullNameErr = "Name is required!" : $name = test_input($_POST['name']);
    empty($_POST['number']) ? $mobileErr = "Mobile is required!" : $mobile = test_input($_POST['number']);
    empty($_POST['password']) ? $passErr = "Password is required!" : $password = test_input($_POST['password']);
    empty($_POST['confirmpassword']) ? $confirmErr = "Confirm Password is required!" : $confirmpassword = test_input($_POST['confirmpassword']);
    $email = test_input($_POST['email']);
    if($name && $mobile != ""){

        $mobile_check = "SELECT COUNT(*) FROM landlord WHERE landlord_phone = '$mobile'";
        $sql=$dbconn->prepare($mobile_check);
        $sql->execute();
        if($sql->fetchColumn() > 0){
           $mobileErr = "Mobile Number is already exists!";
        }else if($password != $confirmpassword){
            $confirmErr = "Confirm password doesn't match";
        }
        else if(strlen($password) < 6){
            $passErr = "Password Length should be 6";
        }
        else{
            $insert_landlord = "INSERT `landlord` SET
            landlord_name = '".$name."',
            landlord_email = '".$email."',
            landlord_phone = '".$mobile."',
            landlord_password = '".$password."'";
            $sql_update1=$dbconn->prepare($insert_landlord);
            $sql_update1->execute();
            
            if($sql_update1){
                $success = true;
                // $update_user = "INSERT `customer` SET
                // cus_name = '".$name."',
                // cus_email = '".$email."',
                // cus_phone = '".$mobile."',
                // cus_password = '".$password."'";
        
                // $sql_update=$dbconn->prepare($update_user);
                // $sql_update->execute();
                // if($sql_update1 && $sql_update){
                //     $mobile_number = $mobile;
                //     $customer = $name;
                // }
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
  function confirmthepasswords($password,$confirmpassword)
  {
    $passwordOK = "";
  
    if($password == $confirmpassword)
      {
      $passwordOK = $password;
      }
  
    return $passwordOK;
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
                                if ($success == true) {
                                    echo "<p>Dear $customer, <br> <br>
                                    Your registration with Aborhut.com is successful. <br><br>
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
                                <span class="form-text text-danger"><?php echo $passErr; ?></span> 
                                <input type="password" name="password" class="input-text text-danger" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <span class="form-text text-danger"><?php echo $confirmErr; ?></span> 
                                <input type="password" name="confirmpassword" class="input-text text-danger" placeholder="Confirm Password">
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