<?php 
ob_start();
include('configure.php');
DB::connect();
require_once("check.php");

 $id=$_SESSION["seller_name"];  
$start = $_REQUEST['start'];
 

if($id !=''){
 $select_bookings= "SELECT * FROM `orders` WHERE seller_name = '".$_SESSION["seller_name"]."'";
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

                <?php
                  $subtotal = 0;
                /* get Carts Data */
                $select_carts = "SELECT product.*,orders.*,orders.id as c_id,product.id as pid FROM `orders` JOIN product ON product.id = orders.product_id";
                $sql=$dbconn->prepare($select_carts);
                $sql->execute();
          
                $cartsData = $sql->fetchAll(PDO::FETCH_OBJ);
                $qtyArr = array();
                $pidArr = array();
                if($sql->rowCount() > 0){
                      ?>


                                    <table id="zero_config" class="table table-striped table-bordered">
									
									<div class="panel-body">
									<table class="table table-hover" id="sample-table-1">
										<thead>
											<tr>
												 
                                                <th class="center">Product Name</th>
                                                <!-- <th class="center">Seller</th> -->
                                                <th class="center">Quantity</th>
                                                <th class="center">Price /unit</th>
                                                <th class="center">Total</th> 
                                                <th class="center">View</th> 
												
												 
											  </tr>

											 </thead>
										<tbody>

                                             <?php
                      
                                                 foreach($cartsData as $cartVal)
                                                 {  
                                                     $pidArr[] = $cartVal->pid;
                                                    $qtyArr[] = $cartVal->qty; 
                                            ?>
                                    <tr>
										 
                                        <td class="center"><?php echo $cartVal->product_title; ?></td>
                                        <!-- <td class="center"><?php echo $cartVal->product_seller; ?></td> -->
                                        <td class="center"><?php echo $cartVal->qty; ?></td>
                                        <td class="center"><?php echo $cartVal->product_mrp; ?></td>
                                        <th class="center">$<?php echo number_format($cartVal->product_mrp * $cartVal->qty,2); $subtotal += ($cartVal->product_mrp * $cartVal->qty); ?> </th>
                                        <td class="center"><a href="checkout.php?id=<?php echo $cartVal->checkout_id ; ?>&start=2"target="_self">customer details</a>
 			
									</tr>	
                                     <!-- <tr>
                                         
                                        <td class="center"> </td>
                                        <td class="center"> </td>
                                        <td class="center"> Grand Total: </td>
                                        <td class="center">$<?php echo number_format($carttot->product_mrp * $cartVal->qty,2); $subtotal1 += ($cartVal->product_mrp * $cartVal->qty); ?> </td>
            
                                    </tr> -->
                                        <?php 
                                                  }
                                        ?>
										 
										</tbody>
									</table>
								</div>
								
								
                                        
                                        
                                    </table><?php } ?>
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