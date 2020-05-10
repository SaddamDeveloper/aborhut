<?php
ob_start();
include('configure.php');
DB::connect();
require_once("check.php");
date_default_timezone_set('Asia/Kolkata');
$created_at = date('Y-m-d H:i:s');
if(isset($_GET['r'])){
    $fetch_order = "SELECT * FROM `orders` WHERE id = '$_GET[r]'";
    $order_prep = $dbconn->prepare($fetch_order);
    $order_prep->execute();
    $order = $order_prep->fetch(PDO::FETCH_OBJ);
    $wallet_pay = $order->wallet_pay;
    //Wallet data fetch
    $select_wallet= "SELECT * FROM `wallet` WHERE user_id = '$order->user_id' LIMIT 1";
    $sql25=$dbconn->prepare($select_wallet);
    $sql25->execute();
    $wlvd25=$sql25->fetch(PDO::FETCH_OBJ);
    //REFUND TO WALLET AND WALLET HISTORY 
    $refund_amount = ($order->wallet_pay + $order->online_pay);
    if($refund_amount > 0){
        $update_wallet = "UPDATE `wallet` SET
        `amount` = (`amount`+$refund_amount) WHERE user_id = '$order->user_id'";
        $sql_update=$dbconn->prepare($update_wallet);
        $sql_update->execute();
        
        $total_amount = $wlvd25->amount+ $refund_amount;
        $wallet_history= "INSERT INTO `wallet_history`(`user_id`, `wallet_id`, `type`, `amount`, `total_amount`, `message`, `created_at`, `updated_at`) VALUES ('$order->user_id','$wlvd25->id','1','$refund_amount','$total_amount','Amount Refunded','$created_at','$created_at')";
        $wallet_prep=$dbconn->prepare($wallet_history);
        $wallet_prep->execute();
    }
    $update_status = "UPDATE `orders` SET
        `status` = '3' WHERE id = '$_GET[r]'";
        $status=$dbconn->prepare($update_status);
        $status->execute();
    header('location:order.php');
}
?>