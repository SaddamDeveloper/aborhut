<?php 
ob_start();
include('configure.php');
DB::connect();
require_once("check.php");


$id = $_REQUEST['id'];

if(isset($id) && !empty($id)){
//  $select_bookings= "SELECT * FROM `orders` WHERE product_id = '$id'";
//  $sql=$dbconn->prepare($select_bookings);
//  $sql->execute();
//  $wlvd=$sql->fetchAll(PDO::FETCH_OBJ);
//  foreach($wlvd as $rows);
//  print_r($wlvd);exit();

$select_enquiry="SELECT property.*, property_image.image FROM property
LEFT JOIN property_image ON property.id = property_image.property_id
 WHERE property.id= '$id' ";
$sql1=$dbconn->prepare($select_enquiry);
$sql1->execute();
$wlvd1=$sql1->fetchAll(PDO::FETCH_OBJ);
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
                        <h4 class="page-title"> </h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="container-fluid">
                
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
												<th class="center"> Name</th>
										 
                                                <th class="center">  Image</th>
											  </tr>
                                                <?php
                                                if($sql1->rowCount() > 0){
                                                    foreach($wlvd1 as $rows1){
                                                    $id = $rows1->id;
                                                    $prop_name = $rows1->prop_name;
                                                    $prop_image1 = $rows1->image;
                                                ?>
											 </thead>
										<tbody>
                                    <tr>
										<td class="center"><?php echo $id;?> </td>
										<td class="center"><?php echo $prop_name;?> </td>
					 
      
                                        <td class="center"><img src="../images/property/<?php echo $prop_image1; ?>" alt="" width="228" height="94"/></td>
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
                
            </div>
            <?php include('inc/footer.php'); ?>