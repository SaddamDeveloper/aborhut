<?php 
ob_start();
include('configure.php');
DB::connect();
// require_once("check.php");

$id = $_REQUEST['id'];
$start = $_REQUEST['start'];
if(isset($_POST['submit12345'])){
	
	$cus_name    =  $_POST['cus_name'];
    $cus_email    =  $_POST['cus_email'];
    $cus_phone    =  $_POST['cus_phone'];
    $cus_password    =  $_POST['cus_password'];
    $cus_city    =  $_POST['cus_city'];
    $cus_address    =  $_POST['cus_address'];
    $cus_state    =  $_POST['cus_state'];

 
	
	
	
	$insert_bookings = "UPDATE `customer` SET
	
	cus_name   = '".addslashes($cus_name)."',
    cus_email   = '".addslashes($cus_email)."',
    cus_phone   = '".addslashes($cus_phone)."',
    cus_password   = '".addslashes($cus_password)."',
    cus_city   = '".addslashes($cus_city)."',
    cus_address   = '".addslashes($cus_address)."',
    cus_state   = '".addslashes($cus_state)."'
	WHERE id = '".$id."'
	";  

$sql_insert = $dbconn->prepare($insert_bookings);
$sql_insert->execute();
	
	$message="Details successfully updated.";
	$status="success";
	header("Location: customer.php?id=$id&message=1&status=success");
		
}

if($id !=''){
 $select_bookings= "SELECT * FROM `customer` WHERE id = '".$_REQUEST['id']."'";
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
                <!-- Start Page Content -->
                <!-- ============================================================== -->
                <!-- row -->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
							
							<?php if($_REQUEST['message']!="") { 
                                    
                                    echo "Details Successfully Updated.";
                                    
                                    } ?>
                                
                                
                                <form id="formID" class="m-t-30" method="post" action="">    
									
									<div class="form-group">
                                        <label  for="exampleInputEmail1">Name</label>
                                        <input name="cus_name" required=''   type="text" class="form-control" id="cus_name" aria-describedby="emailHelp" value=" <?php echo $rows->cus_name; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
 
                                    
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Email</label>
                                        <input name="cus_email" required=''   type="text" class="form-control" id="cus_email" aria-describedby="emailHelp" value=" <?php echo $rows->cus_email; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                    
                                    
                                     <div class="form-group">
                                        <label  for="exampleInputEmail1">Phone</label>
                                        <input name="cus_phone" required=''   type="text" class="form-control" id="cus_phone" aria-describedby="emailHelp" value=" <?php echo $rows->cus_phone; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>

                                     <div class="form-group">
                                        <label  for="exampleInputEmail1">Password</label>
                                        <input name="cus_password" required=''   type="text" class="form-control" id="cus_password" aria-describedby="emailHelp" value=" <?php echo $rows->cus_password; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>

                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">City</label>
                                        <input name="cus_city" required=''   type="text" class="form-control" id="cus_city" aria-describedby="emailHelp" value=" <?php echo $rows->cus_city; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>

                                    <div class="form-group">
                                        <label  for="exampleInputEmail1"> Address</label>
                                        <input name="cus_address" required=''   type="text" class="form-control" id="cus_address" aria-describedby="emailHelp" value=" <?php echo $rows->cus_address; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>

                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">State</label>
                                        <input name="cus_state" required=''   type="text" class="form-control" id="cus_state" aria-describedby="emailHelp" value=" <?php echo $rows->cus_state; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
									
									
									
								<button type="submit"  name="submit12345" value="Submit" class="btn btn-primary">Submit</button>
									
									
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- row -->
                <!-- .row -->
                
                
            </div>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
			
            <?php include('inc/footer.php'); ?>
			