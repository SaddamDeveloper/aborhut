<?php 
ob_start();
include('configure.php');
DB::connect();
// require_once("check.php");

$id = $_REQUEST['id'];
$start = $_REQUEST['start'];
if(isset($_POST['submit12345'])){
	
	$app_name    =  $_POST['app_name'];
    $app_cus_id    =  $_POST['app_cus_id'];
    $app_phone    =  $_POST['app_phone'];
    $app_email    =  $_POST['app_email'];
    $app_date    =  $_POST['app_date'];
 
    $app_status    =  $_POST['app_status'];

 
	
	
	
	$insert_bookings = "UPDATE `appointment` SET
	
	app_name   = '".addslashes($app_name)."',
    app_cus_id   = '".addslashes($app_cus_id)."',
    app_phone   = '".addslashes($app_phone)."',
    app_email   = '".addslashes($app_email)."',
    app_date   = '".addslashes($app_date)."',
 
    app_status   = '".addslashes($app_status)."'
	WHERE id = '".$id."'
	";  

$sql_insert = $dbconn->prepare($insert_bookings);
$sql_insert->execute();
	
	$message="Details successfully updated.";
	$status="success";
	header("Location: appointment.php?id=$id&message=1&status=success");
		
}

if($id !=''){
 $select_bookings= "SELECT * FROM `appointment` WHERE id = '".$_REQUEST['id']."'";
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
                                        <input name="app_name" required=''   type="text" class="form-control" id="app_name" aria-describedby="emailHelp" value=" <?php echo $rows->app_name; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
 
                                    
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Customer ID</label>
                                        <input name="app_cus_id" required=''   type="text" class="form-control" id="app_cus_id" aria-describedby="emailHelp" value=" <?php echo $rows->app_cus_id; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                    
 
                                     <div class="form-group">
                                        <label  for="exampleInputEmail1">Phone</label>
                                        <input name="app_phone" required=''   type="text" class="form-control" id="app_phone" aria-describedby="emailHelp" value=" <?php echo $rows->app_phone; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>

                                     <div class="form-group">
                                        <label  for="exampleInputEmail1">Email</label>
                                        <input name="app_email" required=''   type="text" class="form-control" id="app_email" aria-describedby="emailHelp" value=" <?php echo $rows->app_email; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>

                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Date</label>
                                        <input name="app_date" required=''   type="text" class="form-control" id="app_date" aria-describedby="emailHelp" value=" <?php echo $rows->app_date; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>

                                    

                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Status</label>
                                        <input name="app_status" required=''   type="text" class="form-control" id="app_status" aria-describedby="emailHelp" value=" <?php echo $rows->app_status; ?>" >
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
			