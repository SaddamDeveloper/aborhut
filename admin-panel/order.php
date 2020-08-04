<?php 
ob_start();
include('configure.php');
DB::connect();
require_once("check.php");
date_default_timezone_set('Asia/Kolkata');
$created_at = date('Y-m-d H:i:s');

 $select_bookings= "SELECT orders.id, orders.product_id, orders.payment_status, checkout.chk_bill_name, checkout.chk_bill_phone,
  orders.amount, orders.status FROM `orders` 
  LEFT JOIN checkout ON orders.checkout_id = checkout.id order by orders.id desc LIMIT 20";
 $sql=$dbconn->prepare($select_bookings);
 $sql->execute();
 $wlvd=$sql->fetchAll(PDO::FETCH_OBJ);

if(isset($_GET['v']) == 2){
    $id = $_GET['p'];
    $data = $_GET['v'];
    $c = $_GET['c'];
    $update_order = "UPDATE `orders` SET
    status = '".$data."' WHERE id = '$c'";
    $sql_update=$dbconn->prepare($update_order);
    $sql_update->execute();

    if($sql_update){
        $delete_app = "DELETE FROM appointment WHERE app_property_id ='$id'";
        $sql_update=$dbconn->prepare($delete_app);
        $sql_update->execute();
        header('location:order.php');
    }
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
                        <h4 class="page-title">   </h4>
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
                                <h4 class="card-title">All Orders</h4>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
									
									<div class="panel-body">
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center"> ID</th>
												<th class="center"> User Name</th>
												<th class="center"> Phone No</th>
												<th class="center">Property VIew</th>
												<th class="center"> Amount</th>
												<th class="center"> Payment Status</th>
												<th class="center"> Status</th>
                                                <th class="center">Action</th>
											  </tr>
											  
                                        <?php

                                        //while($rows = mysql_fetch_array($aResult,MYSQL_ASSOC))
                                        //{ 
                                        if($sql->rowCount() > 0){

                                        foreach($wlvd as $rows){

                                        $id = $rows->id;
                                        // print_r($rows);
                                        ?>
						            </thead>
										<tbody>
                                    <tr>
										<td class="center"><?php echo $id;?> </td>
										<td class="center"><?php echo $rows->chk_bill_name;?> </td>
									    <td class="center"><?php echo $rows->chk_bill_phone; ?></td>
										<td class="center"><a href="appointment_prop.php?id=<?php echo $rows->product_id; ?>&start=2"target="_self"><font color="purple">View</font></a> 
										<td class="center">₹<?php echo number_format($rows->amount, 2); ?></td>
										<td class="center">
                                        <?php  if($rows->payment_status == 'PENDING' && $rows->status =='5'){
                                            print '<label class="label label-danger">Payment Failed</label>';
                                        }elseif($rows->payment_status == 'PENDING'){ ?>
                                                <label class="label label-warning"><?php echo $rows->payment_status ?></label>
                                            <?php }else{?>
                                                <label class="label label-success"><?php echo $rows->payment_status ?></label>
                                           <?php } ?>
                                        </td>
                                        <td class="center">
                                        <div class="form-group row">
                                            <form method="POST">
                                                <?php
                                                if ($rows->payment_status == 'PENDING' && $rows->status == 5) {
                                                    print '<a href="#" class="btn btn-danger btn-sm">Cancelled</a>';
                                                 }elseif ($rows->payment_status == 'PENDING') {
                                                    print '<a href="#" class="btn btn-info btn-sm">Payment Failed</a>';
                                                 }elseif ($rows->status == 4) {
                                                     print '<a href="#" name="accpt" class="btn btn-primary btn-sm">Waiting For accept</a>
                                                     ';
                                                 }else if($rows->status == 3){
                                                    print '<a href="#" name="accpt" class="btn btn-warning btn-sm">Refunded</a>
                                                     ';
                                                }else if($rows->status == 3){
                                                    ?>
                                                    <a href="#" class="btn btn-warning btn-sm" disabled>REFUNDED</a>
                                                <?php
                                                }else if($rows->status == 2){
                                                   print '<a href="#" class="btn btn-primary btn-sm" disabled>Accepted</a>';
                                                }
                                                ?>
                                            </form>
                                        </div>
                                        </td>
                                        <td class="center">
                                        <?php
                                            if ($rows->payment_status == 'PENDING' && $rows->status == 5) {
                                                print '<a href="admin_order_cancel.php?r='.$id.'" class="btn btn-info btn-sm">Cancel</a>';
                                             }elseif ($rows->payment_status == 'PENDING' && $rows->status == 4) {
                                                print '<a href="appointments.php?p='.$id.'&&v=2" name="accpt" class="btn btn-primary btn-sm">Accept</a>
                                                <a href="admin_order_refund.php?r='.$id.'" class="btn btn-info btn-sm">Refund</a>
                                                ';
                                            }
                                            ?>
                                        </td>
									</tr>	
										<?php } } ?>
										</tbody>
									</table>
								</div>
								
								
                                        
                                        
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- order table -->
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <?php include('inc/footer.php'); ?>