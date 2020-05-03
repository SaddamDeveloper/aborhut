<?php
include('customer-panel/configure.php');
DB::connect();
$fullNameErr = $emailErr = $mobileErr = $passwordErr = $msg = "";
if(isset($_POST['signup'])){
    empty($_POST['name']) ? $fullNameErr = "Name is required!" : $name = test_input($_POST['name']);
    empty($_POST['email']) ? $emailErr = "Email is required!" : $email = test_input($_POST['email']);
    empty($_POST['mobile']) ? $mobileErr = "Mobile is required!" : $mobile = test_input($_POST['mobile']);
    empty($_POST['password']) ? $passwordErr = "Password is required!" : $password = test_input($_POST['password']);
    $confirm_Password = $_POST['confirm_Password'];

    
    if($name && $email && $mobile && $password && $confirm_Password != ""){
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
        }else if($password != $confirm_Password ){
            $passwordErr = "Password doesn't matched!";
        }else{
            $insert_user = "INSERT `customer` SET
                cus_name = '".$name."',
                cus_email = '".$email."',
                cus_phone = '".$mobile."',
                cus_password = '".$password."'";
    
            $sql_update=$dbconn->prepare($insert_user);
            $sql_update->execute();
            if($sql_update){
                $msg = "Registered Successfully!";
            }else{
                $msg = "Somthing went wrong!";
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
<?php include('include/header.php'); ?>
<!-- Content area start -->
<div class="content-area signup">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start -->
                <div class="form-content-box">
                    <!-- details -->
                    <div class="details">
                        <!-- Main title -->
                        <div class="main-title">
                            <h1><span>Signup</span></h1>
                        </div>
                        <span class="text-success"><?php echo $msg; ?></span>
                        <!-- Form start-->
                        <form method="POST">
                            <div class="form-group">
                                <span class="form-text text-danger"><?php echo $fullNameErr; ?></span> 
                                <input type="text" name="name" class="input-text" placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <span class="form-text text-danger"><?php echo $emailErr; ?></span> 
                                <input type="email" name="email" class="input-text" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <span class="form-text text-danger"><?php echo $mobileErr; ?></span> 
                                <input type="text" name="mobile" class="input-text" placeholder="Mobile No">
                            </div>
                            <div class="form-group">
                                <span class="form-text text-danger"><?php echo $passwordErr; ?></span> 
                                <input type="password" name="password" class="input-text" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="password" name="confirm_Password" class="input-text" placeholder="Confirm Password">
                            </div>
                            <div class="form-group">
                                <button type="submit" name="signup" class="button-md button-theme btn-block">Signup</button>
                            </div>
                        </form>
                        <!-- Form end-->
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
<?php include('include/footer.php'); ?>