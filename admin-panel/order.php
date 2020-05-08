<?php 
ob_start();
include('configure.php');
DB::connect();
require_once("check.php");

 $select_bookings= "SELECT orders.id, orders.product_id, checkout.chk_bill_name, checkout.chk_bill_phone,
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
                        <h4 class="page-title">   </h4>
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
												<th class="center"> User Name</th>
												<th class="center"> Phone No</th>
												<th class="center">Property VIew</th>
												<th class="center"> Amount</th>
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
										<td class="center"><?php echo $rows->amount; ?></td>
                                        <td class="center">
                                        <div class="form-group row">
                                            <form method="POST">
                                                <?php
                                                if($rows->status == 1){ 
                                                ?>
                                                    <a href="appointments.php?p=<?php echo $id ?>&&v=2" name="accpt" class="btn btn-primary btn-sm">Accept</a>
                                                <?php
                                                }else if($rows->status == 2){
                                                    ?>
                                                    <a href="order.php?p=<?php echo $rows->product_id ?>&&v=1&&c=<?php echo $id ?>" name="accpt" class="btn btn-danger btn-sm">Reject</a>
                                                    <a href="" class="btn btn-primary btn-sm">Refund</a>
                                                <?php
                                                }else if($rows->status == 3){
                                                ?>
                                                    <a href="#" class="btn btn-warning" disabled>REFUNDED</a>
                                                <?php
                                                }else if($rows->status == 4){
                                                ?>
                                                    <a href="appointments.php?p=<?php echo $id ?>&&v=2" name="accpt" class="btn btn-primary btn-sm">Accept</a>
                                                <?php
                                                }
                                                ?>
                                            </form>
                                        </div>
                                        </td>
                                        <td class="center">
                                        <?php
                                        if($rows->status == 3){
                                                ?>
                                                <a href="order.php?p=<?php echo $id ?>&&v=1" name="accpt" class="btn btn-primary btn-sm">Refund</a>
                                                <?php
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