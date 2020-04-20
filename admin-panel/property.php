<?php 
ob_start();
include('configure.php');
DB::connect();
// require_once("check.php");


 $select_enquiry="SELECT * FROM property order by id desc  ";
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
                        <h4 class="page-title"> </h4>
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
                                <h4 class="card-title">All property</h4>
                                
                                <div class="table-responsive">
                                    <table id="zero_config" class="table table-striped table-bordered">
									
									<div class="panel-body">
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												<th class="center"> ID</th>
												<th class="center">  Name</th>
                                                <th class="center">  Price</th>
                                                <th class="center">  address</th>
												 
                                                <th class="center">  city</th>
                                                 
                                                <th class="center">  State</th>
                                                <th class="center">  Status</th>
                                                 

												<th class="center">Edit</th>
                                                <th class="center">Delete</th>
											  </tr>
											  
											 
<?php

//while($rows = mysql_fetch_array($aResult,MYSQL_ASSOC))
//{ 
if($sql->rowCount() > 0){
	foreach($wlvd as $rows){
$id = $rows->id;
$prop_name= $rows->prop_name;
$prop_price= $rows->prop_price;
$prop_address= $rows->prop_address;
$prop_desc= $rows->prop_desc;
$prop_city= $rows->prop_city;
$prop_location= $rows->prop_location;
$prop_state = $rows->prop_state;
$prop_image1 = $rows->prop_image1;
$prop_image2 = $rows->prop_image2;
$prop_image3 = $rows->prop_image3;
$prop_image4 = $rows->prop_image4;
$prop_image5 = $rows->prop_image5;
$prop_status = $rows->prop_status;
 
?>
							






											 </thead>
										<tbody>
                                    <tr>
										<td class="center"><?php echo $id;?> </td>
										<td class="center"><?php echo $prop_name; ?></td>
                                        <td class="center">₹<?php echo $prop_price; ?></td>
                                        <td class="center"><?php echo $prop_address; ?></td>
                                        
                                        <td class="center"><?php echo $prop_city; ?></td>
                                         
                                        <td class="center"><?php echo $prop_state; ?></td>
                                         
                                        <td class="center"><b><font color="red"><?php echo $prop_status; ?></font></b></td>

										
										<td class="center"><a href="property_edit.php?id=<?php echo $id; ?>&start=2"target="_self">Edit</a> 
										
										<td class="center"><a href="property_del.php?id=<?php echo $id; ?>&start=2"target="_self">Delete</a>
										
															
											
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