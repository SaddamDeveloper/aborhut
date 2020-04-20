<?php 
ob_start();
include('configure.php');
DB::connect();
require_once("check.php");


 $select_enquiry="SELECT * FROM appointment order by id desc limit 20";
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
                                                <th class="center">Date</th>
                                                 
                                                <th class="center">Status</th>
												<th class="center">Edit</th>
                                                <th class="center">Delete</th>
											  </tr>
											  
											 
<?php

//while($rows = mysql_fetch_array($aResult,MYSQL_ASSOC))
//{ 
if($sql->rowCount() > 0){
	foreach($wlvd as $rows){
$id = $rows->id;
$app_name= $rows->app_name;
$app_cus_id= $rows->app_cus_id;
$app_phone= $rows->app_phone;
$app_email= $rows->app_email;
$app_date= $rows->app_date;
 
$app_status = $rows->app_status;

 
?>
							






											 </thead>
										<tbody>
                                    <tr>
										<td class="center"><?php echo $id;?> </td>
										<td class="center"><?php echo $app_name; ?></td>
                                        <td class="center"><?php echo $app_cus_id; ?></td>
                                        <td class="center"><?php echo $app_phone; ?></td>
                                        <td class="center"><?php echo $app_email; ?></td>
                                        <td class="center"><?php echo $app_date; ?></td>
                                       
                                        <td class="center"><?php echo $app_status; ?></td>
                                        
										
										<td class="center"><a href="appointment_edit.php?id=<?php echo $id; ?>&start=2"target="_self">Edit</a> 
										
										<td class="center"><a href="appointment_del.php?id=<?php echo $id; ?>&start=2"target="_self">Delete</a>
										
															
											
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