<?php 
    require_once("check.php"); 
    include_once('include/header.php');
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);  
    $cart_data_count = 0;
    $product_ids = null;
    $grand_total = 0;
    if($_SESSION['cart']){
        $productID = $_SESSION['cart'];
        foreach($_SESSION['cart'] as $key=>$value){
            $check_cart_table = "SELECT * FROM carts WHERE property_id = $productId AND customer_id = $_SESSION[id]";
            $cart_check=$dbconn->prepare($check_cart_table);
            $cart_check->execute();
            $cart_check_data=$cart_check->fetchAll(PDO::FETCH_OBJ);
            if($cart_check->rowCount() < 1){
                $select_bookings = "INSERT INTO `carts`(`property_id`, `customer_id`) VALUES ('$value','$_SESSION[id]')";
                $sql=$dbconn->prepare($select_bookings);
                $sql->execute();
            }
        }
    }
    // Fetch cart Product
    $cart_sql  = "select * from `carts` WHERE customer_id ='$_SESSION[id]'";
    $cart_prep=$dbconn->prepare($cart_sql);
    $cart_prep->execute();
    $cart_data=$cart_prep->fetchAll(PDO::FETCH_OBJ);
    $cart_data_count = $cart_prep->rowCount();
   
    if($cart_data_count > 0){
        $separator = true;
         // Fetch Admin Charge
         $commission_fetch = "SELECT * FROM commission";
         $sql = $dbconn->prepare($commission_fetch);
         $sql->execute();
         $commission = $sql->fetchColumn(1);

        foreach ($cart_data as $row) {
            $product_sql  = "SELECT * FROM `property` WHERE `id` ='$row->property_id'";           
            $product_prep=$dbconn->prepare($product_sql);
            $product_prep->execute();
            $product_data=$product_prep->fetch(PDO::FETCH_OBJ);

            // Admin Commission
            $admin_commission = ($product_data->prop_price * $commission)/100;
            $grand_total  += $admin_commission;
            if ($separator) {
                $product_ids .="$product_data->id";
            }else{
                $product_ids .=","."$product_data->id";
            } 
            $separator = false;
        }
    }
    //User Data Fetch
    $select_client= "SELECT * FROM `customer` WHERE id = '".$_SESSION['id']."' LIMIT 1";
    $sql=$dbconn->prepare($select_client);
    $sql->execute();
    $wlvd=$sql->fetch(PDO::FETCH_OBJ);

    //Wallet data fetch
    $select_wallet= "SELECT * FROM `wallet` WHERE user_id = '".$_SESSION['id']."' LIMIT 1";
    $sql25=$dbconn->prepare($select_wallet);
    $sql25->execute();
    $wlvd25=$sql25->fetch(PDO::FETCH_OBJ);

    $nameErr = $emailErr = $mobileErr = $visitErr = $addressErr = $cityErr = $stateErr = "";
    function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
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
                    <form method="POST" action="place_order.php">
                        <div class="main-title-2">
                            <h1><span>Billing</span> Details</h1>
                        </div>
                        <input type="hidden" name="product_id" value="<?php echo $pid; ?>">
                        <input type="hidden" name="visit" value="<?php echo $admin_commission; ?>">
                        <div class="search-contents-sidebar mb-30">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="hidden" class="form-control" name="user_id" value="<?php echo $wlvd->id ?>">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="input-text" name="name" value="<?php echo $wlvd->cus_name ?>" placeholder="Name" required>
                                    <small class="form-text text-danger"><?php echo $nameErr; ?></small> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="input-text" name="email" value="<?php echo $wlvd->cus_email ?>" placeholder="Email" required>
                                    <small class="form-text text-danger"><?php echo $emailErr; ?></small> 
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone (optional)</label>
                                    <input type="text" class="input-text" name="phone" value="<?php echo $wlvd->cus_phone ?>"  placeholder="Phone" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Visit Date</label>
                                    <input type="date" class="input-text" name="V_date" id="v_date" placeholder="Visit Date" required>
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
                        <?php if( $grand_total > 0){    ?>
                        <div class="main-title-2" style="margin-bottom: 20px;">
                            <h1><span>Your</span> order</h1>
                        </div>
                        <table id="checkout-table" class="table table-bordered" style="background: #fff; font-size: 16px;">
                            <tbody>
                                <tr>
                                    <th>Cart Subtotal</th>
                                    <td>₹ <?php echo $grand_total; ?></td>
                                </tr>
                                
                                <?php if($wlvd25->amount > 0){   ?>
                                <tr>
                                    <th>Wallet Pay</th>
                                    <td>₹ <?php if($wlvd25->amount > $grand_total){
                                        echo number_format($grand_total, 2);
                                        $grand_total=0;
                                    }else{
                                        echo number_format($wlvd25->amount, 2);
                                        $grand_total-=$wlvd25->amount;
                                    } ?></td>
                                </tr>
                                <?php } ?>
                                <tr>
                                    <th>No of Orders</th>
                                    <td>
                                    <?php 
                                    if($_SESSION['cart']){
                                        echo count($_SESSION['cart']);
                                    }else{
                                        $id = $_SESSION['id'];
                                        $select_carts = "SELECT * FROM `carts` where customer_id=$id";
                                        $sql2=$dbconn->prepare($select_carts);
                                        $sql2->execute();
                                        $wlvd2=$sql2->fetchAll(PDO::FETCH_OBJ);
                                        $cart_data_count = $sql2->rowCount();
                                        echo $cart_data_count;
                                    } 
                                ?>
                               </td>
                                </tr>
                                <tr>
                                    <th>Online Pay</th>
                                    <td><b>₹ 
                                    <?php
                                        print $grand_total;
                                    ?></b></td>
                                </tr>
                            </tbody>
                        </table> 
                        
                        <input class="btn btn-primary pull-right" name="pay" value="Pay Now" type="submit">         
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
                <a href="list_your_property.php" class="btn button-md button-theme">Submit Now</a>
            </div>
        </div>
    </div>
</div>
<!-- Intro end -->
<?php include('include/footer.php'); ?>