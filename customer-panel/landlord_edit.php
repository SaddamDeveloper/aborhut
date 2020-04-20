<?php 
ob_start();
include('configure.php');
DB::connect();
require_once("check.php");

$id = $_REQUEST['id'];
$start = $_REQUEST['start'];
if(isset($_POST['submit12345'])){
	
	$landlord_name    =  $_POST['landlord_name'];
    $landlord_email    =  $_POST['landlord_email'];
    $landlord_phone    =  $_POST['landlord_phone'];
    $landlord_password    =  $_POST['landlord_password'];
    $landlord_city    =  $_POST['landlord_city'];
    $landlord_address    =  $_POST['landlord_address'];
    $landlord_state    =  $_POST['landlord_state'];

 
	
	
	
	$insert_bookings = "UPDATE `landlord` SET
	
	landlord_name   = '".addslashes($landlord_name)."',
    landlord_email   = '".addslashes($landlord_email)."',
    landlord_phone   = '".addslashes($landlord_phone)."',
    landlord_password   = '".addslashes($landlord_password)."',
    landlord_city   = '".addslashes($landlord_city)."',
    landlord_address   = '".addslashes($landlord_address)."',
    landlord_state   = '".addslashes($landlord_state)."'
	WHERE id = '".$id."'
	";  

$sql_insert = $dbconn->prepare($insert_bookings);
$sql_insert->execute();
	
	$message="Details successfully updated.";
	$status="success";
	header("Location: landlord.php?id=$id&message=1&status=success");
		
}

if($id !=''){
 $select_bookings= "SELECT * FROM `landlord` WHERE id = '".$_REQUEST['id']."'";
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
                                        <input name="landlord_name" required=''   type="text" class="form-control" id="landlord_name" aria-describedby="emailHelp" value=" <?php echo $rows->landlord_name; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
 
                                    
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Email</label>
                                        <input name="landlord_email" required=''   type="text" class="form-control" id="landlord_email" aria-describedby="emailHelp" value=" <?php echo $rows->landlord_email; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                    
                                    
                                     <div class="form-group">
                                        <label  for="exampleInputEmail1">Phone</label>
                                        <input name="landlord_phone" required=''   type="text" class="form-control" id="landlord_phone" aria-describedby="emailHelp" value=" <?php echo $rows->landlord_phone; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>

                                     <div class="form-group">
                                        <label  for="exampleInputEmail1">Password</label>
                                        <input name="landlord_password" required=''   type="text" class="form-control" id="landlord_password" aria-describedby="emailHelp" value=" <?php echo $rows->landlord_password; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>

                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">City</label>
                                        <input name="landlord_city" required=''   type="text" class="form-control" id="landlord_city" aria-describedby="emailHelp" value=" <?php echo $rows->landlord_city; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>

                                    <div class="form-group">
                                        <label  for="exampleInputEmail1"> Address</label>
                                        <input name="landlord_address" required=''   type="text" class="form-control" id="landlord_address" aria-describedby="emailHelp" value=" <?php echo $rows->landlord_address; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>

                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">State</label>
                                        <input name="landlord_state" required=''   type="text" class="form-control" id="landlord_state" aria-describedby="emailHelp" value=" <?php echo $rows->landlord_state; ?>" >
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
			