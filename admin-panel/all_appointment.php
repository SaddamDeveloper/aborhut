<?php
include('configure.php');
DB::connect();
require_once("check.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$select_bookings= "SELECT appointment.id,appointment.app_property_id, checkout.chk_bill_name, checkout.chk_bill_phone,
appointment.app_date, appointment.app_status FROM `appointment` 
LEFT JOIN checkout ON appointment.app_checkout_id = checkout.id order by appointment.id desc LIMIT 20";
$sql=$dbconn->prepare($select_bookings);
$sql->execute();
$wlvd=$sql->fetchAll(PDO::FETCH_OBJ);

if(isset($_GET['c'])){
    $c_status = $_GET['c'];
    $p = $_GET['p'];
    $update_wallet = "UPDATE `appointment` SET
	app_status   = '".addslashes($c_status)."'
    WHERE id  = '".$p."'"; 

    $sql = $dbconn->prepare($update_wallet);
    // die($update_wallet);
    $sql->execute();
    header('location:all_appointment.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include('inc/header.php'); ?>


<body>
    <?php include('inc/preloader.php'); ?>

    <div id="main-wrapper">
        <?php include('inc/top_menu.php'); ?>
        <?php include('inc/main_menu.php'); ?>
        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                         
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="container-fluid">
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
                                            <td class="center"><a href="appointment_prop.php?id=<?php echo $rows->app_property_id; ?>&start=2"target="_self"><font color="purple">View</font></a></td> 
                                            <td class="center"> 
                                            <?php
                                                if($rows->app_status == 1){ 
                                                    print '<a href="#" name="accpt" class="btn btn-danger btn-sm">Incomplete</a>';
                                                }else if($rows->app_status == 2){
                                                    print '<a href="#" name="accpt" class="btn btn-danger btn-sm">COMPLETED</a>';
                                                }else{
                                                    print '<a href="all_appointment.php?p='.$rows->id.'&&c=2" name="accpt" class="btn btn-primary btn-sm">Complete</a>
                                                    <a href="all_appointment.php?p='.$rows->id.'&&c=1" name="accpt" class="btn btn-danger btn-sm">InComplete</a>';
                                                }
                                            ?>
                                            </td>
                                        </tr>	
                                                <?php } ?>  
                                            </tbody>
                                        </table>
                                    </div>
                                        </table>
                                    </div>
<?php include('inc/footer.php'); ?>