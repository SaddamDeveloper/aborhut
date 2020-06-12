<?php session_start();
  
    include('customer-panel/configure.php');
    DB::connect();
    
    /* Add Product to carts */
    if (isset($_SESSION['id']) && !empty($_SESSION['id'])) {
        if(isset($_GET['pid']) && !empty($_GET['pid'])){
            $id = $_GET['pid'];
            $productId = base64_decode($id);
            $select_bookings= "INSERT INTO `carts`(`property_id`, `customer_id`) VALUES ('$productId','$_SESSION[id]')";
            $sql=$dbconn->prepare($select_bookings);
            $sql->execute();
            header("location:cart.php");
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