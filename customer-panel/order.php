<?php 
ob_start();
include('configure.php');
DB::connect();
require_once("check.php");
$id = $_SESSION['id'];

if($id !=''){
    $select_bookings= "SELECT orders.id, orders.product_id, orders.payment_status, checkout.chk_bill_name, checkout.chk_bill_phone,
    orders.amount, orders.status FROM `orders` 
    LEFT JOIN checkout ON orders.checkout_id = checkout.id WHERE orders.user_id = '$id' order by orders.id desc LIMIT 20";
   $sql=$dbconn->prepare($select_bookings);
   $sql->execute();
   $wlvd=$sql->fetchAll(PDO::FETCH_OBJ);
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
                        <h4 class="page-title">My Orders</h4>
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
												<th class="center">Property View</th>
												<th class="center"> Amount</th>
												<th class="center">Payment Status</th>
											  </tr>
										</thead>
										<tbody>
                                        <?php
                                            if($sql->rowCount() > 0){
                                                foreach($wlvd as $rows=> $row){
                                                    $id = $row->id;
                                        ?>
                                            <tr>
                                                <td class="center"><?php echo $id;?> </td>
                                            
                                                <td class="center">
                                                    <a href="appointment_prop.php?id=<?php echo $row->product_id; ?>&status=<?php echo $row->status?>" target="_self"><font color="purple">View</font></a>
                                                </td>
                                                
                                                <td class="center">₹<?php echo number_format($row->amount, 2); ?></td>
                                                <td class="center">
                                                <?php 
                                                    if($row->payment_status == 'PENDING' && $row->status == '5'){
                                                        print ' <label class="label label-danger">Cancelled</label>';
                                                    }elseif($row->payment_status == 'PENDING'){
                                                        print '<label class="label label-warning"><'.$row->payment_status.'</label>';
                                                    }elseif ($row->payment_status == 'SUCCESS' &&  $row->status == '3') {
                                                        print '<label class="label label-primary">Refunded</label>';
                                                    }elseif ($row->payment_status == 'PENDING' &&  $row->status == '4') {
                                                        print '<label class="label label-primary">Failed</label>';
                                                    }else{
                                                        print '<label class="label label-success">'.$row->payment_status.'</label>';
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