<?php
session_start();
  
  include('customer-panel/configure.php');
  DB::connect();
  if(isset($_SESSION['id']) && !empty($_SESSION['id'])){
    $id = $_GET['pid'];
    $productId = base64_decode($id);
    
    $deleteCart  = "DELETE FROM `carts` WHERE property_id ='$productId'";
    $cart_prep=$dbconn->prepare($deleteCart);
    $cart_prep->execute();
    unset($_SESSION['cart'][$productId]);
    header("location:cart.php");
  }else{
    $id = $_GET['pid'];
    $productId = base64_decode($id);
    unset($_SESSION['cart'][$productId]);
    header("location:cart.php");
    
}

