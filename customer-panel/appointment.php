<?php
include('configure.php');
DB::connect();
require_once("check.php");

$id = $_SESSION['id'];
$select_bookings= "SELECT appointment.id, checkout.chk_bill_name, checkout.chk_bill_phone,
appointment.app_date, property.prop_address, property.id as prop_id, landlord.landlord_name, landlord.landlord_phone FROM `appointment` 
LEFT JOIN checkout ON appointment.app_checkout_id = checkout.id
INNER JOIN property ON appointment.app_property_id = property.id
INNER JOIN landlord ON property.prop_landlord_id = landlord.id
WHERE appointment.app_cus_id = '$id' order by appointment.id desc LIMIT 20";
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
                                                    <th class="center"> Landlord Name</th>
                                                    <th class="center">Property Address</th>
                                                    <th class="center">Landlord Phone No</th>
                                                    <th class="center"> Appointment Date</th> 
                                                    <th class="center"> View Property</th>
                                                    </tr>
                                                    </thead>
                                            <tbody>
                                        <?php
                                                foreach ($wlvd as $row=> $rows) {
                                                    
                                            ?>
                                        <tr>
                                            <td class="center"><?php echo $rows->id;?> </td>
                                            <td class="center"><?php echo $rows->landlord_name; ?></td>
                                            <td class="center"><?php echo $rows->prop_address; ?></td>
                                            <td class="center"><?php echo $rows->landlord_phone; ?></td>
                                            <td class="center"><?php echo $rows->app_date; ?></td>
                                            <td><a href="appointment_prop.php?id=<?php echo $rows->prop_id; ?>&start=2"target="_self"><font color="purple">View</font></a</td>
                                        </tr>	
                                                <?php } ?>  
                                            </tbody>
                                        </table>
                                    </div>
                                        </table>
                                    </div>
<?php include('inc/footer.php'); ?>