<?php 
include_once('customer-panel/configure.php');
DB::connect();

date_default_timezone_set('Asia/Kolkata');

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

  if(isset($_POST['pay'])){
    $created_at = date('Y-m-d H:i:s');
      //cart data
  
      $cart_data_count = 0;
      $product_ids = null;
      $grand_total = 0;
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
      
        $name = test_input($_POST['name']);
        $email = test_input($_POST['email']);
        $mobile = test_input($_POST['phone']);
        $address = test_input($_POST['address']);
        $city = test_input($_POST['city']);
        $state = test_input($_POST['state']);
        $V_date = test_input($_POST['V_date']);
      
        $product_id =  $product_ids;
        $chk_total = $grand_total;
        $user_id = $wlvd->id;
      
        $payment_status = "PENDING";
        $online_pay = $grand_total;
        $wallet_pay = 0;
        $total_amount = $grand_total;
  
    if ($wlvd25->amount > 0) {
        if ($wlvd25->amount >= $grand_total) {
            $payment_status = "SUCCESS";
            $wallet_pay = $grand_total;
            $online_pay = 0;
            $select_wallet= "UPDATE `wallet` SET `amount` = (`amount`-$grand_total) WHERE user_id = '$_SESSION[id]'";
            $sql25=$dbconn->prepare($select_wallet);
            $sql25->execute();
  
            $total_wallet_balance = $wlvd25->amount - $grand_total; 
  
          $wallet_history= "INSERT INTO `wallet_history`(`user_id`, `wallet_id`, `type`, `amount`, `total_amount`, `message`, `created_at`, `updated_at`) VALUES ('$_SESSION[id]','$wlvd25->id','2','$grand_total','$total_wallet_balance','Amount Debited for online purchase','$created_at','$created_at')";
          $wallet_prep=$dbconn->prepare($wallet_history);
          $wallet_prep->execute();
  
        } else {
          $payment_status = "PENDING";
          $wallet_pay = $wlvd25->amount;
          $online_pay = $grand_total-$wlvd25->amount;
  
          $select_wallet= "UPDATE `wallet` SET `amount` = '0' WHERE user_id = '$_SESSION[id]'";
          $sql25=$dbconn->prepare($select_wallet);
          $sql25->execute();
  
          $wallet_history = "INSERT INTO `wallet_history`(`user_id`, `wallet_id`, `type`, `amount`, `total_amount`, `message`, `created_at`, `updated_at`) VALUES ('$_SESSION[id]','$wlvd25->id','2','$wlvd25->amount','0','Amount Debited for online purchase','$created_at','$created_at')";
          $wallet_prep=$dbconn->prepare($wallet_history);
          $wallet_prep->execute();
          
        }
        
    }
  
    if($name && $email && $V_date != ""){
        $insert_cart = "INSERT `checkout` SET
        chk_bill_name = '".$name."',
        chk_bill_phone = '".$mobile."',
        chk_bill_email = '".$email."',
        chk_bill_street_addr = '".$address."',
        chk_bill_city = '".$city."',
        chk_bill_state = '".$state."',
        chk_trans_timestamp = '$created_at',
        product_id = '$product_id',
        chk_prop_visit_date = '".$V_date."',
        chk_total = '".$chk_total."',
        chk_status = '".$payment_status."'";

        $sql_update=$dbconn->prepare($insert_cart);
        $sql_update->execute();
        $checkoutId = $dbconn->lastInsertId();
        
        if($checkoutId){
            if($cart_data_count > 0){
                $separator = true;
                 // Fetch Admin Charge
                $commission_fetch = "SELECT * FROM commission";
                $sql = $dbconn->prepare($commission_fetch);
                $sql->execute();
                $commission = $sql->fetchColumn(1);

                $wallet_total_amount = $wlvd25->amount;
                foreach ($cart_data as $row) {
                    $product_sql  = "SELECT * FROM `property` WHERE `id` ='$row->property_id'";           
                    $product_prep=$dbconn->prepare($product_sql);
                    $product_prep->execute();
                    $product_data=$product_prep->fetch(PDO::FETCH_OBJ);
                    // Admin Commission
                    $admin_commission = ($product_data->prop_price * $commission)/100;
                    $order_amount = $admin_commission;
                    $order_status = "PENDING";
                    $status = "4";
                    $order_wallet_pay = 0;
                    $order_online_pay = $order_amount;
  
                    if ($wallet_total_amount > 0) {
                      if ($wallet_total_amount >= $order_amount ) {
                        $order_status = "SUCCESS";
                        $order_wallet_pay = $order_amount ;
                        $order_online_pay = 0 ;
                        $wallet_total_amount = $wallet_total_amount-$order_amount;
                      } else {
                        $order_status = "PENDING";
                        $order_wallet_pay = $wallet_total_amount;
                        $order_online_pay = $order_amount - $wallet_total_amount;
                        $wallet_total_amount = 0;
                      }
                    }   
                    //payment status 1=reject,2=accept, 3=refund,4 = pending
                    $q = "insert into `orders`
                    (checkout_id,user_id,product_id,payment_status,amount,wallet_pay,online_pay,payment_time,status)
                    values('$checkoutId', '$user_id', '$product_data->id', '$order_status', '$order_amount','$order_wallet_pay','$order_online_pay', '$created_at', '$status')";
                    $dbconn->query($q);
                }
            }
  
            if ($payment_status == 'PENDING' && $online_pay > 0) {
                header("location:http://localhost/aborhut/payment.php?id=$checkoutId");
            }else{
              //cut wallet balance
              header("location:http://localhost/aborhut/wallet_pay_success.php?id=$checkoutId");
            }
        }            
    }
  }
?>