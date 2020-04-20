<?php 
ob_start();
include('configure.php');
DB::connect();
require_once("check.php");


 $select_enquiry="SELECT * FROM payment order by id desc limit 20";
 $sql=$dbconn->prepare($select_enquiry);
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
                        <h4 class="page-title">appointment</h4>
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
                                <h4 class="card-title">All appointment</h4>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
									
									<div class="panel-body">
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center">ID</th>
												<th class="center">Name</th>
                                                <th class="center">Customer ID</th>
                                                <th class="center">Phone</th>
												<th class="center">Email</th>
                                                <th class="center">Time</th>
                                                <th class="center">Status</th> 
                                                 
												 
											  </tr>
											  
											 
<?php

//while($rows = mysql_fetch_array($aResult,MYSQL_ASSOC))
//{ 
if($sql->rowCount() > 0){
	foreach($wlvd as $rows){
$id = $rows->id;
$pay_cus_name= $rows->pay_cus_name;
$pay_cus_id= $rows->pay_cus_id;
$pay_cus_phone= $rows->pay_cus_phone;
$pay_cus_email= $rows->pay_cus_email;
$pay_time= $rows->pay_time;
$pay_status = $rows->pay_status;

 
?>
							






											 </thead>
										<tbody>
                                    <tr>
										<td class="center"><?php echo $id;?> </td>
										<td class="center"><?php echo $pay_cus_name; ?></td>
                                        <td class="center"><?php echo $pay_cus_id; ?></td>
                                        <td class="center"><?php echo $pay_cus_phone; ?></td>
                                        <td class="center"><?php echo $pay_cus_email; ?></td>
                                        <td class="center"><?php echo $pay_time; ?></td>
                                        <td class="center"><?php echo $pay_status; ?></td>
                                        
									 
															
											
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