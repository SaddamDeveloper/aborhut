<?php 
ob_start();
include('configure.php');
DB::connect();
require_once("check.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include('inc/header.php'); ?>


<body>
    <?php include('inc/preloader.php'); ?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php include('inc/top_menu.php'); ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include('inc/main_menu.php'); ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">My Account</h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    
                                   Welcome back Dear <?php echo $_SESSION['admin_name']; ?>!   <br><br>
								    
                                </div>
                              
                    			<div class="container">
                                        <div class="row">
                                             
                                             <div class="col-sm">
                                                  <a href="customer.php"><img
                                             style="border: 0px solid ; width: 125px; height: 125px;" alt=""
                                             src="images/collaboration.png"></a>
                                                  <span style="text-align: center;"><a
                                             style="font-weight: bold;" href="customer.php"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All
                                             Customers</a>
                                             </div>
                                        
                                        <div class="col-sm">
                                             <a href="landlord.php"><img
                                        style="border: 0px solid ; width: 125px; height: 125px;" alt=""
                                        src="images/key.png"></a>
                                             <span style="text-align: center;"><a
                                        style="font-weight: bold;" href="landlord.php"><br>&nbsp;&nbsp;&nbsp;&nbsp;All
                                        Landlords</a>
                                        </div>
                                        
                                        <div class="col-sm">
                                             <a href="customer.php"><img
                                        style="border: 0px solid ; width: 125px; height: 125px;" alt=""
                                        src="images/sublease.png"></a>
                                             <span style="text-align: center;"><a
                                        style="font-weight: bold;" href="property.php"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All
                                        Property</a><br>
                                        </div>
                                        
                                        <div class="col-sm">
                                             <a href="customer.php"><img
                                        style="border: 0px solid ; width: 125px; height: 125px;" alt=""
                                        src="images/contract.png"></a>
                                             <span style="text-align: center;"><a
                                        style="font-weight: bold;" href="pages.php"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All
                                        Pages</a>
                                        </div>
                                        
                                        <div class="col-sm">
                                             <a href="customer.php"><img
                                        style="border: 0px solid ; width: 125px; height: 125px;" alt=""
                                        src="images/consumer.png"></a>
                                             <span style="text-align: center;"><a
                                        style="font-weight: bold;" href="contact.php"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All
                                        Contacts</a>
                                        </div>
                                        
                                        <div class="col-sm">
                                             <a href="appointments.php"><img
                                        style="border: 0px solid ; width: 125px; height: 125px;" alt=""
                                        src="images/christmas-day.png"></a>
                                             <span style="text-align: center;"><a
                                        style="font-weight: bold;" href="appointments.php"><br>All
                                        Appointments</a>
                                        </div> <br><br>
                                        
                                        <br><br> <div class="col-sm">
                                             <a href="city.php"><img
                                        style="border: 0px solid ; width: 125px; height: 125px;" alt=""
                                        src="images/cityscape.png"></a>
                                             <span style="text-align: center;"><a
                                        style="font-weight: bold;" href="city.php"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; All
                                        City</a>
                                        </div>
                                        
                                        <div class="col-sm">
                                             <a href="state.php"><img
                                        style="border: 0px solid ; width: 125px; height: 125px;" alt=""
                                        src="images/golden-gate-bridge.png"></a>
                                             <span style="text-align: center;"><a
                                        style="font-weight: bold;" href="state.php"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All
                                        State</a>
                                        </div>
                                        
                                        <div class="col-sm">
                                             <a href="location.php"><img
                                        style="border: 0px solid ; width: 125px; height: 125px;" alt=""
                                        src="images/placeholder.png"></a>
                                             <span style="text-align: center;"><a
                                        style="font-weight: bold;" href="location.php"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All
                                        Locations</a>
                                        </div>
                                        
                                        <div class="col-sm">
                                             <a href="property_type.php"><img
                                        style="border: 0px solid ; width: 125px; height: 125px;" alt=""
                                        src="images/real-estate.png"></a>
                                             <span style="text-align: center;"><a
                                        style="font-weight: bold;" href="property_type.php"><br>All
                                        Property types</a>
                                        </div>
                                        
                                        <div class="col-sm">
                                             <a href="orders.php"><img
                                        style="border: 0px solid ; width: 125px; height: 125px;" alt=""
                                        src="images/cart.png"></a>
                                             <span style="text-align: center;"><a
                                        style="font-weight: bold;" href="order.php"><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;All
                                        Orders</a>
                                        </div>
                                        

                                        
                                             
                                        </div>
                                        
                                        
                                        </div>

                    <!-- column -->
                            </div>
                        </div>
                    </div>
                </div>
 


			<div class="col-12">
            
                    </div>
			
			
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <?php include('inc/footer.php'); ?><?php 
ob_start();
include('configure.php');
DB::connect();
//require_once("check.php");
 
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include('inc/header.php'); ?>


<body>
    <?php include('inc/preloader.php'); ?>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <?php include('inc/top_menu.php'); ?>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <?php include('inc/main_menu.php'); ?>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">My Account</h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    
                                   Welcome back Dear <?php echo $rows25->admin_name; ?>!   <br><br>
								    
                                </div>
                              
                    			<div class="container">
  <div class="row">
      
     <div class="col-sm">
        <a href="customer.php"><img
 style="border: 0px solid ; width: 125px; height: 125px;" alt=""
 src="images/collaboration.png"></a>
      <span style="text-align: center;"><a
 style="font-weight: bold;" href="customer.php"><br>All
Customers</a>
 </div>
 
   <div class="col-sm">
        <a href="landlord.php"><img
 style="border: 0px solid ; width: 125px; height: 125px;" alt=""
 src="images/key.png"></a>
      <span style="text-align: center;"><a
 style="font-weight: bold;" href="landlord.php"><br>All
Landlords</a>
 </div>
 
   <div class="col-sm">
        <a href="customer.php"><img
 style="border: 0px solid ; width: 125px; height: 125px;" alt=""
 src="images/sublease.png"></a>
      <span style="text-align: center;"><a
 style="font-weight: bold;" href="property.php"><br>All
Property</a><br>
 </div>
 
   <div class="col-sm">
        <a href="customer.php"><img
 style="border: 0px solid ; width: 125px; height: 125px;" alt=""
 src="images/contract.png"></a>
      <span style="text-align: center;"><a
 style="font-weight: bold;" href="pages.php"><br>All
Pages</a>
 </div>
 
   <div class="col-sm">
        <a href="customer.php"><img
 style="border: 0px solid ; width: 125px; height: 125px;" alt=""
 src="images/consumer.png"></a>
      <span style="text-align: center;"><a
 style="font-weight: bold;" href="contact.php"><br>All
Contacts</a>
 </div>
 
   <div class="col-sm">
        <a href="appointments.php"><img
 style="border: 0px solid ; width: 125px; height: 125px;" alt=""
 src="images/christmas-day.png"></a>
      <span style="text-align: center;"><a
 style="font-weight: bold;" href="appointments.php"><br>All
Contacts</a>
 </div> 
 
     
  </div>
  
  
</div>




                    <!-- column -->
                            </div>
                        </div>
                    </div>
                </div>
 


			<div class="col-12">
            
                    </div>
			
			
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <?php include('inc/footer.php'); ?>