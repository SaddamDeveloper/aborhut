<?php 
ob_start();
include('configure.php');
DB::connect();
require_once("check.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//  $select_enquiry="SELECT * FROM checkout WHERE chk_appointment != 'complete' and chk_status = 'success' order by chk_prop_visit_date desc ";
//  $sql=$dbconn->prepare($select_enquiry);
//  $sql->execute();
//  $wlvd=$sql->fetchAll(PDO::FETCH_OBJ);
if(isset($_POST['app_submit'])){
    $id = $_GET['p'];
    $data = $_GET['v'];
    $app_date = $_POST['app_date'];
    $fetch_checkout = "SELECT * FROM orders WHERE id = '$id' LIMIT 1";
    $sql=$dbconn->prepare($fetch_checkout);
    $sql->execute();
    $wlvd=$sql->fetch(PDO::FETCH_OBJ);
    $user_id = $wlvd->user_id;
    $property_id = $wlvd->product_id;
    $checkout_id = $wlvd->checkout_id;
    if($sql){
        $update_order = "UPDATE `orders` SET
        status = '".$data."' WHERE id = '$id'";
        $sql_update=$dbconn->prepare($update_order);
        $orderId = $dbconn->lastInsertId();
        $sql_update->execute();
        if($sql_update){
            $insert_app = "INSERT `appointment` SET
            app_cus_id = '".$user_id."',
            app_property_id = '".$property_id."',
            app_checkout_id = '".$checkout_id."',
            app_date = '".$app_date."'";
            $sql_update=$dbconn->prepare($insert_app);
            $sql_update->execute();
            if($sql_update){
                 header('location:all_appointment.php');
             }
        }
    }

}
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
                
                <!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Appointments</h4>
                                <?php
                                if(isset($_GET['p']) && !empty($_GET['p'])){
                                    $id = $_GET['p'];
                                    $data = $_GET['v'];
                                    
                                    ?>
                                    <div class="form-group">
                                    <form method="POST" class="row">
                                        <div class="col-md-3">
                                            <label for="app_date">Appointment Date:</label>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="date" class="form-control" name="app_date">
                                        </div>
                                        <div class="col-md-3">
                                            <button type="submit"  name="app_submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        </form>
                                    </div>


                            </div>
                        </div>
                    </div>
                </div>
                <!-- order table -->
                                <?php } ?>
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
                                <?php include('inc/footer.php'); ?>