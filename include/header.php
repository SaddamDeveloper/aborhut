<?php //require_once "connection/connection.php"; ?>
<?php 
include_once('customer-panel/configure.php');
DB::connect();
    // require_once("./customer-panel/check.php");
?>
<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Aborhut</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">

    <!-- External CSS libraries -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/animate.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-submenu.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-select.min.css">
    <link rel="stylesheet" href="css/leaflet.css" type="text/css">
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="fonts/flaticon/font/flaticon.css">
    <link rel="stylesheet" type="text/css" href="fonts/linearicons/style.css">
    <link rel="stylesheet" type="text/css"  href="css/jquery.mCustomScrollbar.css">
    <link rel="stylesheet" type="text/css"  href="css/dropzone.css">
    <link rel="stylesheet" type="text/css"  href="css/magnific-popup.css">

    <!-- Custom stylesheet -->
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="css/skins/default.css">
    <!-- custom css -->
    <link rel="stylesheet" type="text/css" href="css/custom.css">

    <!-- Favicon icon -->
    <link rel="shortcut icon" href="img/logos/logo.png" type="image/x-icon" >

    <!-- Google fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link rel="stylesheet" type="text/css" href="css/ie10-viewport-bug-workaround.css">

    <script src="js/ie-emulation-modes-warning.js"></script>
</head>
<body>

<!-- Top header start -->
<header class="top-header hidden-xs" id="top">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="list-inline">
                    <a href="tel:1-8X0-666-8X88"><i class="fa fa-phone"></i>1-8X0-666-8X88</a>
                    <a href="tel:info@themevessel.com"><i class="fa fa-envelope"></i>info@themevessel.com</a>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <ul class="top-social-media pull-right">
                    <li>
                        <a href="#" class="sign-in"><i class="fa fa-facebook"></i></a>
                    </li>
                    <li>
                        <a href="#" class="sign-in"><i class="fa fa-twitter"></i></a>
                    </li>
                    <li>
                        <a href="#" class="sign-in"><i class="fa fa-instagram"></i></a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>
<!-- Top header end -->
<?php  
    $id = $_SESSION['id'];
    if($id !=''){
        $select_bookings25= "SELECT * FROM `customer` WHERE id = '".$_SESSION['id']."'";
        $sql=$dbconn->prepare($select_bookings25);
        $sql->execute();
        $wlvd25=$sql->fetchAll(PDO::FETCH_OBJ);
    foreach($wlvd25 as $rows25);
    }
?>
<!-- Main header start -->
<header class="main-header">
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navigation" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="./" class="logo">
                    <img src="img/logos/logo.png" alt="logo">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="navbar-collapse collapse" role="navigation" aria-expanded="true" id="app-navigation">
                <ul class="nav navbar-nav">
                    <li class="dropdown active">
                        <a href="./">
                            Home<span></span>
                        </a>
                    </li>
                    <li>
                        <a href="about.php">
                            About<span></span>
                        </a>
                    </li>
                    <li>
                        <a href="services.php">
                            Service<span></span>
                        </a>
                    </li>
                    <li>
                        <a href="why_us.php">
                            Why Us<span></span>
                        </a>
                    </li>
                    <li>
                    <?php
                    if(!$_SESSION['id']){
                    ?>
                        <a href="list_your_property.php">
                            List Your Property<span></span>
                        </a>
                    <?php
                    }
                    ?>
                    </li>
                    <li>
                        <a href="contact.php">
                            Contact Us<span></span>
                        </a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right rightside-navbar">
                    <li class="phone-mb-15">
                        <a class="button my-account">
                            <i class="fa fa-user"></i> My Account <i class="fa fa-angle-down"></i>
                        </a>
                    </li>
                    <div class="dropDownBox buyerDBLink hidden">
                        <div class="carrot"></div>
                        <?php 
                            if(isset($_SESSION['id'])) { 
                        ?>
                        <ul class="border-bottom">
                            <li><a href="customer-panel/welcome.php">My Dashboard</a>
                            </li>
                        </ul>

                            <a href="logout.php" class="btn btn-danger">Logout</a>
                        <?php
                            }else{
                        ?>
                        <a href="login.php" class="btn btn-danger">Login</a>
                        <div class="text-center sign-up-cart">
                            New to Aborhut ? <a href="signup.php">Sign Up</a>
                        </div>
                        <?php } ?>
                    </div>
                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- Main header end -->