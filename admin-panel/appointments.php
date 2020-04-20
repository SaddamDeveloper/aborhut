<?php 
ob_start();
include('configure.php');
DB::connect();
// require_once("check.php");


 $select_enquiry="SELECT * FROM checkout WHERE chk_appointment != 'complete' and chk_status = 'success' order by chk_prop_visit_date desc ";
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
                                                <th class="center">Email</th>  
                                                <th class="center"> City</th> 
                                                <th class="center"> State</th>
                                                <th class="center"> Date</th>
                                                <th class="center"> View Property</th>
                                                <th class="center"> Status</th>
												
											  </tr>
											  
											 
<?php

//while($rows = mysql_fetch_array($aResult,MYSQL_ASSOC))
//{ 
if($sql->rowCount() > 0){
	foreach($wlvd as $rows){
$id = $rows->id;
$chk_bill_name= $rows->chk_bill_name;
$chk_bill_city= $rows->chk_bill_city;
$chk_bill_state = $rows->chk_bill_state;
$chk_bill_phone = $rows->chk_bill_phone;
$chk_bill_email = $rows->chk_bill_email;
$chk_prop_visit_date = $rows->chk_prop_visit_date;

 
?>
							






											 </thead>
										<tbody>
                                    <tr>
										<td class="center"><?php echo $id;?> </td>
										<td class="center"><?php echo $chk_bill_name; ?></td>
                                        <td class="center"><?php echo $chk_bill_phone; ?></td>
                                        <td class="center"><?php echo $chk_bill_email; ?></td>
                                        <td class="center"><?php echo $chk_bill_city; ?></td>
                                        <td class="center"><?php echo $chk_bill_state; ?></td>
                                        <td class="center"><?php echo $chk_prop_visit_date; ?></td>
										
										<td class="center"><a href="appointment_prop.php?id=<?php echo $id; ?>&start=2"target="_self"><font color="purple">View</font></a> 
									    <td class="center"><a href="appointment_edit.php?id=<?php echo $id; ?>&start=2"target="_self"><font color="red">Check</font></a>
											
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