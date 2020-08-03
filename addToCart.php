<?php session_start();
  
    include('customer-panel/configure.php');
    ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
    /* Add Product to carts */
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        if(isset($_GET['pid']) && !empty($_GET['pid'])){
            $id = $_GET['pid'];
            $productId = base64_decode($id);
            $check_cart_table = "SELECT * FROM carts WHERE property_id = $productId AND customer_id = $_SESSION[id]";
            $cart_check=$dbconn->prepare($check_cart_table);
            $cart_check->execute();
            $cart_check_data=$cart_check->fetchAll(PDO::FETCH_OBJ);
            if($cart_check->rowCount() < 1){
                $select_bookings= "INSERT INTO `carts`(`property_id`, `customer_id`) VALUES ('$productId','$_SESSION[id]')";
                $sql=$dbconn->prepare($select_bookings);
                $sql->execute();
                header("location:cart.php");
            }else{
                header('location:cart.php');
            }
        }else{
            header('location:index.php');
        }
    } else {
        if(isset($_GET['pid']) && !empty($_GET['pid'])){
            $id = $_GET['pid'];
            $productId = base64_decode($id);
            if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){
                $cart = $_SESSION['cart'];
                $cart[$productId] = $productId;
            }else{
                $cart[$productId] = $productId;
            }
            
            // if($_SESSION['cart'][$productId]){
            //     unset($_SESSION['cart'][$productId]);
            //     // $cart[$productId] = $productId;
            // }
            
            $_SESSION['cart'] = $cart;
            // $_SESSION['cart'][] = $data;
            header("location:cart.php");
        }else{
            header('location:index.php');
        }
    }
    
   
?>