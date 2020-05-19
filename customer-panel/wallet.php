<?php 
ob_start();
include('configure.php');
DB::connect();
require_once("check.php");
$id = $_SESSION['id'];

if(isset($id) && !empty($id)){
 $select_bookings= "SELECT * FROM `wallet` WHERE user_id = '".$_SESSION['id']."' LIMIT 1";
 $sql=$dbconn->prepare($select_bookings);
 $sql->execute();
 $wlvd=$sql->fetch(PDO::FETCH_OBJ);
 $select_client1= "SELECT * FROM `wallet_history` WHERE 
 wallet_id = '".$wlvd->id."' AND user_id = '".$wlvd->user_id."' ORDER BY ID DESC";
 $sql1=$dbconn->prepare($select_client1);
 $sql1->execute();
 $wlvd1=$sql1->fetchAll(PDO::FETCH_OBJ);
 foreach($wlvd1 as $rows1);
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

        <?php include('inc/top_menu.php'); ?>
        <?php include('inc/main_menu.php'); ?>
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-5 align-self-center">
                        <h4 class="page-title">My Wallet</h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Info box -->
                <!-- ============================================================== -->
                
                <!-- basic table -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h3 class="card-title" style="text-align: center;">Wallet Balance: ₹ <?php echo number_format($wlvd->amount, 2) ?></h3>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
									
									<div class="panel-body">
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center"> ID</th>
                                                 <th class="center">Amount</th>
                                                 <th class="center">Total Amount</th>
                                                 <th class="center">Status</th>
                                                 <th class="center">Message</th>
                                                 <th class="center">Created At</th>
											  </tr>
                                            <?php

                                            //while($rows = mysql_fetch_array($aResult,MYSQL_ASSOC))
                                            //{ 
                                            if($sql->rowCount() > 0){

                                            foreach($wlvd1 as $rows1){

                                            $id = $rows1->id;

                                            $amount = $rows1->amount;            
                                            
                                            $total_amount = $rows1->total_amount; 
                                            $chk_status = $rows1->type;
                                            $msg = $rows1->message

                                            ?>

											 </thead>
										<tbody>
                                    <tr>
										<td class="center"><?php echo $id;?> </td>
									 
										<td class="center"><?php echo $amount; ?></td>
										<td class="center"><?php echo $total_amount; ?></td>
										<?php
                                            if($chk_status == 1){ 
                                        ?>
										<td class="center"><label class="label label-success">Cr</label></td>
                                        <?php
                                            }else{
                                                ?>
                                                <td class="center"><label class="label label-warning">Dr</label></td>

                                                <?php
                                            }
                                        ?>

                                        <td class="center">
                                            <?php echo $msg ?>
                                        </td>
                                        <td class="center">
                                            <?php echo $rows1->created_at ?>
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