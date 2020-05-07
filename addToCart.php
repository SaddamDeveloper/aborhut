<?php session_start();
  
    include('customer-panel/configure.php');
    DB::connect();
    
    /* Add Product to carts */
    if(isset($_GET['pid']) && !empty($_GET['pid'])){
            $id = $_GET['pid'];
            $productId = base64_decode($id);
            // print_r($_SESSION['cart'][$productId]);exit();
            // print_r($_SESSION['cart'][$productId]);exit();
          
            
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
            header("location:cart.php?pid=$id");
    }else{
        header('location:index.php');
    }
?>