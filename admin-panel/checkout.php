<?php 
ob_start();
include('configure.php');
DB::connect();
require_once("check.php");

 $id = $_REQUEST['id'];


if($id !=''){
 $select_bookings= "SELECT * FROM `checkout` WHERE id = '".$_REQUEST['id']."'";
 $sql=$dbconn->prepare($select_bookings);
 $sql->execute();
 $wlvd=$sql->fetchAll(PDO::FETCH_OBJ);
 foreach($wlvd as $rows);
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
                        <h4 class="page-title"></h4>
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
												 
                                                <th class="center">ID</th>
                                                <th class="center">Billing time</th>
                                                <th class="center">Username</th>
                                                <th class="center">Name</th>
                                                <th class="center">Company Name</th>
                                                <th class="center">Street</th>
                                                <th class="center">City</th> 
                                                <th class="center">State</th>
                                                <th class="center">Zip Code</th>
                                                <th class="center">Country</th>
                                                <th class="center">Phone</th>
                                                <th class="center">Email</th> 
												
												 
											  </tr>

											 </thead>
										<tbody>

                                             
                                    <tr>
										 
                                        <td class="center"><?php echo $rows->id; ?></td>
                                        <td class="center"><?php echo $rows->chk_bill_time; ?></td>
                                        <td class="center"><?php echo $rows->chk_username; ?></td>
                                        <td class="center"><?php echo $rows->chk_bill_name; ?></td>
                                        <td class="center"><?php echo $rows->chk_bill_cname; ?></td>
                                        <td class="center"><?php echo $rows->chk_bill_street_addr; ?></td>
                                        <td class="center"><?php echo $rows->chk_bill_city; ?></td>
                                        <td class="center"><?php echo $rows->chk_bill_state; ?></td>
                                        <td class="center"><?php echo $rows->chk_bill_zip; ?></td>
                                        <td class="center"><?php echo $rows->chk_bill_country; ?></td>
                                        <td class="center"><?php echo $rows->chk_bill_phone;   ?></td>
                                        <td class="center"><?php echo $rows->chk_bill_email;   ?></td>
                                         
 			
									</tr>	
                                 
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