<?php
include('configure.php');
DB::connect();
require_once("check.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$select_bookings= "SELECT appointment.id, checkout.chk_bill_name, checkout.chk_bill_phone,
appointment.app_date FROM `appointment` 
LEFT JOIN checkout ON appointment.app_checkout_id = checkout.id order by appointment.id desc LIMIT 20";
$sql=$dbconn->prepare($select_bookings);
$sql->execute();
$wlvd=$sql->fetchAll(PDO::FETCH_OBJ);
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
                                    <div class="table-responsive">
                                        <table id="zero_config" class="table table-striped table-bordered">
                                        
                                        <div class="panel-body">
                                        <table class="table table-hover" id="sample-table-1">
                                            <thead>
                                                <tr>
                                                    <th class="center"> ID</th>
                                                    <th class="center"> Name</th>
                                                    <th class="center">Phone</th>
                                                    <th class="center"> Appointment Date</th> 
                                                    <th class="center"> View Property</th>
                                                    <th class="center">Action</th>
                                                    </tr>
                                                    </thead>
                                            <tbody>
                                        <?php
                                                foreach ($wlvd as $row=> $rows) {
                                                    
                                            ?>
                                        <tr>
                                            <td class="center"><?php echo $rows->id;?> </td>
                                            <td class="center"><?php echo $rows->chk_bill_name; ?></td>
                                            <td class="center"><?php echo $rows->chk_bill_phone; ?></td>
                                            <td class="center"><?php echo $rows->app_date; ?></td>
                                            <td class="center"><a href="appointment_prop.php?id=<?php echo $id; ?>&start=2"target="_self"><font color="purple">View</font></a> 
                                            <td class="center"><a href="appointment_edit.php?id=<?php echo $id; ?>&start=2"target="_self"><font color="red">Check</font></a>
                                        </tr>	
                                                <?php } ?>  
                                            </tbody>
                                        </table>
                                    </div>
                                        </table>
                                    </div>
<?php include('inc/footer.php'); ?>