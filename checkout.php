<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    require_once("check.php"); 
    include_once('include/header.php');
    
    $cart_data_count = 0;
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        $cart_sql  = "select * from `carts` WHERE customer_id ='$_SESSION[id]'";
        $cart_prep=$dbconn->prepare($cart_sql);
        $cart_prep->execute();
        $cart_data=$cart_prep->fetchAll(PDO::FETCH_OBJ);
        $cart_data_count = $cart_prep->rowCount();

        if($cart_data_count > 0){
            foreach ($cart_data as $row) {
                
            }
        }

    $nameErr = $emailErr = $mobileErr = $visitErr = $addressErr = $cityErr = $stateErr = "";
    if(isset($_POST['pay'])){
        // Fetch cart Product
        empty($_POST['name']) ? $nameErr = "Name is required!" : $name = test_input($_POST['name']);
        empty($_POST['email']) ? $emailErr = "email is required!" : $email = test_input($_POST['email']);
        empty($_POST['date']) ? $dateErr = "Visit date is required!" : $date = test_input($_POST['date']);

        $mobile = test_input($_POST['phone']);
        $address = test_input($_POST['address']);
        $city = test_input($_POST['city']);
        $state = test_input($_POST['state']);

        $product_id = explode(',',$_POST['product_id']);
        $amount = explode(',',$_POST['visit']);
        $chk_total = $_POST['chk_total'];
        $user_id = $_POST['user_id'];
        $wallet_bal = $_POST['wallet_bal'];
        if($name && $email && $date != ""){
            $insert_cart = "INSERT `checkout` SET
            chk_username = '".$chk_username."',
            chk_password = '".$chk_password."',
            chk_bill_name = '".$name."',
            chk_bill_phone = '".$mobile."',
            chk_bill_email = '".$email."',
            chk_bill_street_addr = '".$address."',
            chk_bill_city = '".$city."',
            chk_bill_state = '".$state."',
            chk_trans_timestamp = NOW(),
            product_id = '".$product_id[0]."',
            chk_prop_visit_date = '".$date."',
            chk_total = '".$chk_total."',
            chk_status = 'PENDING'";
            $sql_update=$dbconn->prepare($insert_cart);
            $sql_update->execute();
            $checkoutId = $dbconn->lastInsertId();
            
            if($checkoutId){
                for($i=0;$i<count($product_id);$i++)
                {
                    $date = date('Y-m-d H:i:s');
                    $q = "insert into `orders`
                        (checkout_id,user_id,product_id,payment_status,amount,payment_time,status)
                        values('$checkoutId', '$user_id', '$product_id[$i]', 'PENDING', '$amount[$i]', '$date', '4')
                    ";
                    $dbconn->query($q);
                }
                unset($_SESSION['cart']);

                header("location:payment.php?id=$checkoutId&&wallet_bal=$wallet_bal&&chk_total=$chk_total");
            }
        }
    }

$select_client= "SELECT * FROM `customer` WHERE id = '".$_SESSION['id']."' LIMIT 1";
$sql=$dbconn->prepare($select_client);
$sql->execute();
$wlvd=$sql->fetch(PDO::FETCH_OBJ);

$select_wallet= "SELECT * FROM `wallet` WHERE user_id = '".$_SESSION['id']."' LIMIT 1";
$sql25=$dbconn->prepare($select_wallet);
$sql25->execute();
$wlvd25=$sql25->fetch(PDO::FETCH_OBJ);



function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
}
?>

<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="overlay">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Checkout</h1>
                <ul class="breadcrumbs">
                    <li><a href="./">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Sub Banner end -->
<!-- Submit Property start -->
<div class="content-area-7 submit-property">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="submit-address">
                    <form method="POST">
                        <div class="main-title-2">
                            <h1><span>Billing</span> Details</h1>
                        </div>
                        <input type="hidden" name="product_id" value="<?php echo $pid; ?>">
                        <input type="hidden" name="visit" value="<?php echo $visitCharge; ?>">
                        <div class="search-contents-sidebar mb-30">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" class="form-control" name="user_id" value="<?php echo $wlvd->id ?>">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="input-text" name="name" value="<?php echo $wlvd->cus_name ?>" placeholder="Name">
                                    <small class="form-text text-danger"><?php echo $nameErr; ?></small> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="input-text" name="email" value="<?php echo $wlvd->cus_email ?>" placeholder="Email">
                                    <small class="form-text text-danger"><?php echo $emailErr; ?></small> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone (optional)</label>
                                    <input type="text" class="input-text" name="phone" value="<?php echo $wlvd->cus_phone ?>"  placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Visit Date</label>
                                    <input type="date" class="input-text" name="date" placeholder="Visit Date">
                                    <small class="form-text text-danger"><?php echo $visitErr; ?></small> 
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address (Optional)</label>
                                    <textarea class="input-text" name="address" placeholder="Your Address"><?php echo $wlvd->cus_address ?></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City (Optional)</label>
                                    <input type="text" class="input-text" name="city" value="<?php echo $wlvd->cus_city ?>"  placeholder="Your City">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State (Optional)</label>
                                    <input type="text" class="input-text" name="state" value="<?php echo $wlvd->cus_state ?>"  placeholder="Your State">
                                </div>
                            </div>
                        </div>
                        </div>
                        <?php if(isset($_SESSION['tot'])){
                            $total= $_SESSION['tot']; 
                            ?>
                        <div class="main-title-2" style="margin-bottom: 20px;">
                            <h1><span>Your</span> order</h1>
                        </div>
                        <table id="checkout-table" class="table table-bordered" style="background: #fff; font-size: 16px;">
                            <tbody>
                                <tr>
                                    <th>Cart Subtotal</th>
                                    <td>₹ <?php echo $total; ?></td>
                                </tr>
                                <tr>
                                    <th>Wallet Balance</th>
                                    <td>₹ <?php if($wlvd25->amount > $total){
                                        echo '<s>'.number_format($wlvd25->amount, 2).'</s>&nbsp;&nbsp;&nbsp;&nbsp;₹';
                                        echo number_format($wlvd25->amount - $total, 2);
                                    }else{
                                        echo number_format($wlvd25->amount, 2);
                                    } ?></td>
                                </tr>
                                <tr>
                                    <th>Shipping and Handling</th>
                                    <td>Free Shipping</td>
                                </tr>
                                <tr>
                                    <th>Order Total</th>
                                    <td><b>₹ 
                                    <?php
                                        if($wlvd25->amount > $total){
                                            echo $total = '0.00'; 
                                            $_SESSION['wallet_due'] = $total;
                                        }else if($wlvd25->amount < $total){
                                            echo ($total = $total - $wlvd25->amount);
                                            $_SESSION['wallet_due'] = $total;
                                        }
                                    ?></b></td>
                                    <input  type="hidden" name="chk_total" required='required' value="<?php echo $total; ?>" class="form-control">
                                    <input  type="text" name="wallet_bal" required='required' value="<?php echo $wlvd25->amount; ?>" class="form-control">
                                </tr>
                            </tbody>
                        </table> 

                        <button class="btn btn-primary pull-right" name="pay" type="submit">Pay Now</button>              
                        <?php 
                        }else{
                            echo "";
                        }
                        ?>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
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
                <a href="submit-property.html" class="btn button-md button-theme">Submit Now</a>
            </div>
        </div>
    </div>
</div>
<!-- Intro end -->
<?php include('include/footer.php'); ?>