<?php 
ob_start();
include('configure.php');
DB::connect();
require_once("check.php");
$id = $_SESSION['id'];

if($id !=''){
    $select_bookings= "SELECT orders.id, orders.product_id, checkout.chk_bill_name, checkout.chk_bill_phone,
    orders.amount, orders.status FROM `orders` 
    LEFT JOIN checkout ON orders.checkout_id = checkout.id WHERE orders.user_id = '$id' order by orders.id desc LIMIT 20";
   $sql=$dbconn->prepare($select_bookings);
   $sql->execute();
   $wlvd=$sql->fetchAll(PDO::FETCH_OBJ);
}




// {
//  $select_client1= "SELECT * FROM `checkout` WHERE 
// chk_bill_phone = '".$rows->cus_phone."' ORDER BY ID DESC";
//  $sql1=$dbconn->prepare($select_client1);
//  $sql1->execute();
//  $wlvd1=$sql1->fetchAll(PDO::FETCH_OBJ);
//  foreach($wlvd1 as $rows1);
// }
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
                        <h4 class="page-title">My Orders</h4>
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
                                <h4 class="card-title">All Orders</h4>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
									
									<div class="panel-body">
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
                                                <th class="center"> ID</th>
												<th class="center">Property View</th>
												<th class="center"> Amount</th>
												<th class="center"> Status</th>
											  </tr>
                                            <?php

                                            //while($rows = mysql_fetch_array($aResult,MYSQL_ASSOC))
                                            //{ 
                                            if($sql->rowCount() > 0){
                                                foreach($wlvd as $rows=> $row){
                                                $id = $row->id;
                                            ?>

											 </thead>
										<tbody>
                                    <tr>
										<td class="center"><?php echo $id;?> </td>
									 
										<td class="center">
                                            <a href="appointment_prop.php?id=<?php echo $row->product_id; ?>&start=2"target="_self"><font color="purple">View</font></a>
                                        </td>
										
										<td class="center">₹<?php echo number_format($row->amount, 2); ?></td>
										<td class="center">
                                        <?php 
                                        if($row->status == 2){
                                            echo '<label class="label-success">ACCEPTED</label>';
                                        }else if($row->status == 1){ 
                                            echo '<label class="label-danger">REJECTED</label>';
                                        }else if($row->status == 3){
                                            echo '<label class="label-warning">REFUNDED</label>';
                                        }
                                        ?></td>
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