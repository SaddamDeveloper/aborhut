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

    $order_sql = "SELECT orders.*, customer.cus_name, customer.cus_phone, property.prop_name FROM orders 
    INNER JOIN customer ON customer.id = orders.user_id 
    INNER JOIN property ON property.id = orders.product_id
    WHERE orders.id = '$id' LIMIT 1";
    
    $sql=$dbconn->prepare($order_sql);
    $sql->execute();
    $wlvd=$sql->fetch(PDO::FETCH_OBJ);
    $user_id = $wlvd->user_id;
    $property_id = $wlvd->product_id;
    $checkout_id = $wlvd->checkout_id;
    $cus_name = $wlvd->cus_name;
    $prop_name = $wlvd->prop_name;
    $cus_phone= $wlvd->cus_phone;
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

        $sms = "Dear $cus_name, 
            Your appointment with Aborhut.com for the property $prop_name is scheduled on  $app_date.
            Team,
            Aborhut.com";   
      
          $username="Fiscaleindia";
          $api_password="9aea62lulgu3by1ph";
          $sender="FISCLE";
          $domain="http://sms.webinfotech.co";
          $priority="11";// 11-Enterprise, 12- Scrub
          $method="GET";
      
          $mobile=$cus_phone;
          $message=$sms;
      
          $username=urlencode($username);
          $api_password=urlencode($api_password);
          $sender=urlencode($sender);
          $message=urlencode($message);
      
          $sms = urlencode($sms);
      
          $parameters="username=$username&api_password=$api_password&sender=$sender&to=$mobile&message=$message&priority=$priority";
          $url="$domain/pushsms.php?".$parameters;
          $ch = curl_init($url);
      
          if($method=="POST")
          {
              curl_setopt($ch, CURLOPT_POST,1);
              curl_setopt($ch, CURLOPT_POSTFIELDS,$parameters);
          }
          else
          {
              $get_url=$url."?".$parameters;
      
              curl_setopt($ch, CURLOPT_POST,0);
              curl_setopt($ch, CURLOPT_URL, $get_url);
          }
          curl_setopt($ch, CURLOPT_FOLLOWLOCATION,1); 
          curl_setopt($ch, CURLOPT_HEADER,0);  // DO NOT RETURN HTTP HEADERS 
          curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);  // RETURN THE CONTENTS OF THE CALL
          $return_val = curl_exec($ch);

            if($sql_update){
                 header('location:all_appointment.php');
             }
        }
    }
}
?>