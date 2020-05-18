<?php 
ob_start();
include('configure.php');
DB::connect();
require_once("check.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if(isset($_POST['app_submit'])){

    $id = $_POST['order_id'];    
    $app_date = $_POST['app_date'];

    $order_sql = "SELECT * FROM orders WHERE id = '$id' LIMIT 1";
    $sql=$dbconn->prepare($order_sql);
    $sql->execute();
    $wlvd=$sql->fetch(PDO::FETCH_OBJ);
    $user_id = $wlvd->user_id;
    $property_id = $wlvd->product_id;
    $checkout_id = $wlvd->checkout_id;
    if($sql){
        $update_order = "UPDATE `orders` SET
        status = '2' WHERE id = '$id'";
        $sql_update=$dbconn->prepare($update_order);
        $orderId = $dbconn->lastInsertId();
        $sql_update->execute();

        if($sql_update){
            $insert_app = "INSERT `appointment` SET
            app_cus_id = '$user_id',
            app_property_id = '$property_id',
            order_id = '$id',
            app_checkout_id = '$checkout_id',
            app_date = '$app_date'";
            
            $sql_update=$dbconn->prepare($insert_app);
            $sql_update->execute();
            if($sql_update){
                 header('location:all_appointment.php');
             }
        }
    }

}
?>