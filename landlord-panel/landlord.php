<?php 
ob_start();
include('configure.php');
DB::connect();
require_once("check.php");


 $select_enquiry="SELECT * FROM landlord order by id desc limit 20";
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
                        <h4 class="page-title">landlord</h4>
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
                                <h4 class="card-title">All landlord</h4>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
									
									<div class="panel-body">
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center"> ID</th>
												<th class="center">landlord Name</th>
                                                <th class="center">landlord email</th>
                                                <th class="center">landlord phone</th>
												<th class="center">landlord password</th>
                                                <th class="center">landlord city</th>
                                                <th class="center">landlord address</th>
                                                <th class="center">landlord state</th>
												<th class="center">Edit</th>
                                               
											  </tr>
											  
											 
<?php

//while($rows = mysql_fetch_array($aResult,MYSQL_ASSOC))
//{ 
if($sql->rowCount() > 0){
	foreach($wlvd as $rows){
$id = $rows->id;
$landlord_name= $rows->landlord_name;
$landlord_email= $rows->landlord_email;
$landlord_phone= $rows->landlord_phone;
$landlord_password= $rows->landlord_password;
$landlord_city= $rows->landlord_city;
$landlord_address= $rows->landlord_address;
$landlord_state = $rows->landlord_state;

 
?>
							






											 </thead>
										<tbody>
                                    <tr>
										<td class="center"><?php echo $id;?> </td>
										<td class="center"><?php echo $landlord_name; ?></td>
                                        <td class="center"><?php echo $landlord_email; ?></td>
                                        <td class="center"><?php echo $landlord_phone; ?></td>
                                        <td class="center"><?php echo $landlord_password; ?></td>
                                        <td class="center"><?php echo $landlord_city; ?></td>
                                        <td class="center"><?php echo $landlord_address; ?></td>
                                        <td class="center"><?php echo $landlord_state; ?></td>
                                        
										
										<td class="center"><a href="landlord_edit.php?id=<?php echo $id; ?>&start=2"target="_self">Edit</a> 
										
										 
										
															
											
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