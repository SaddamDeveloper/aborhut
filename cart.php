<?php
    include('customer-panel/configure.php');
    DB::connect();
?>
<?php include('include/header.php'); ?>
<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="overlay">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Cart</h1>
                <ul class="breadcrumbs">
                    <li><a href="./">Home</a></li>
                    <li class="active">Cart</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Cart start -->
<div id="cartpage">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <?php
                $cart_data_count = 0;
                if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
                    $cart_sql  = "select * from `carts` WHERE customer_id ='$_SESSION[id]'";
                    $cart_prep=$dbconn->prepare($cart_sql);
                    $cart_prep->execute();
                    $cart_data=$cart_prep->fetchAll(PDO::FETCH_OBJ);
                    $cart_data_count = $cart_prep->rowCount();
                    if($cart_data_count > 0){
                        ?>
                    <table class="table">
                        <thead>
                            <tr>
                            <th>Remove</th>
                            <th>Image</th>
                            <th>Property Name</th>
                            <th>Charge</th>
                            <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        // Fetch Admin Charge
                            $commission_fetch = "SELECT * FROM commission";
                            $sql = $dbconn->prepare($commission_fetch);
                            $sql->execute();
                            $commission = $sql->fetchColumn(1);

                            $subtotal =0;

                            foreach($cart_data as $data)
                            {
                                $select_bookings= "SELECT * FROM `property` WHERE id = $data->property_id LIMIT 1";
                                $sql=$dbconn->prepare($select_bookings);
                                $sql->execute();
                                $wlvd=$sql->fetch(PDO::FETCH_OBJ);
                                $pidArr[] = $id;

                                // Admin Commission
                                $admin_commission = ($wlvd->prop_price * $commission)/100;
                            ?>
                            <tr>
                                <td><a href="deleteCart.php?pid=<?php echo base64_encode($data->property_id)?>"><i class="fa fa-trash"></i></a></td>
                                <td><img src="images/property/<?php echo $wlvd->prop_image1; ?>" width="70" alt=""></td>
                                <td><a href="properties-details.php?p=<?php echo $id ?>"><h4><?php echo $wlvd->prop_name ?></h4></a></td>
                                <td>₹<?php echo number_format($visitArr[] = $admin_commission, 2); ?></td>
                                <td>₹<?php echo number_format($admin_commission , 2); $subtotal += ($admin_commission); ?></td>
                            </tr>
                            <?php 
                            }
                            ?>
                        </tbody>
                        </table>
                    <?php
                    }

                }else{
                    if(!empty($_SESSION['cart'])){
                        $cart_data_count = 1;
                        ?>
                        <table class="table">
                        <thead>
                            <tr>
                            <th>Remove</th>
                            <th>Image</th>
                            <th>Property Name</th>
                            <th>Charge</th>
                            <th>Total Price</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $subtotal =0;

                            foreach($_SESSION['cart'] as $id)
                            {
                                $select_bookings= "SELECT * FROM `property` WHERE id =$id LIMIT 1";
                                $sql=$dbconn->prepare($select_bookings);
                                $sql->execute();
                                $wlvd=$sql->fetch(PDO::FETCH_OBJ);
                                $pidArr[] = $id;
                            ?>
                            <tr>
                                <td><a href="deleteCart.php?pid=<?php echo base64_encode($id)?>"><i class="fa fa-trash"></i></a></td>
                                <td><img src="images/property/<?php echo $wlvd->prop_image1; ?>" width="70" alt=""></td>
                                <td><a href="properties-details.php?p=<?php echo $id ?>"><h4><?php echo $wlvd->prop_name ?></h4></a></td>
                                <td>₹<?php echo number_format($wlvd->prop_visit_price, 2); ?></td>
                                <td>₹<?php echo number_format($wlvd->prop_visit_price, 2); $subtotal += ($wlvd->prop_visit_price); ?></td>
                            </tr>
                            <?php 
                            }

                            ?>
                        </tbody>
                        </table>
                            
                        <?php
                    }else{
                        ?>
                        <h2>No Item In Carts</h2>
                        <?php
                            }
                }
                ?>
                <a href="./" class="btn btn-primary">Book More</a>
                <!-- <a href="./" class="btn btn-primary pull-right">Update Shopping Cart</a> -->
            </div>
        </div>
        <div class="row" style="margin-top: 20px;">
            <div class="col-md-8"></div>
            <div class="col-md-4">
                <h4>Subtotal ₹ <?php echo number_format($subtotal, 2) ?></h4>
                <h4 class="border-bottom">Grand Total ₹ <?php echo number_format($subtotal, 2) ?></h4>
                <?php if($cart_data_count > 0){
                    ?>
                    <a href="checkout.php" class="btn btn-primary pull-right">PROCEED TO CHECKOUT</a>
                <?php
                }?>
            </div>
        </div>
    </div>
</div>
<!-- Cart end -->
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