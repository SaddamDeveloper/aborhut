<?php
session_start();
  
  include('customer-panel/configure.php');
  DB::connect();
if(isset($_GET['pid']) && !empty($_GET['pid'])){
    $id = $_GET['pid'];
    $productId = base64_decode($id);
    unset($_SESSION['cart'][$productId]);
    header("location:cart.php?pid=$id");
}

