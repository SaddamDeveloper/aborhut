<?php 
ob_start();
include('configure.php');
DB::connect();
require_once("check.php");





if(isset($_POST['submit'])){
	
	$id       = $_SESSION['id'];
	$cus_name    = $_POST['cus_name'];
	$cus_email   = $_POST['cus_email'];
	$cus_phone = $_POST['cus_phone']; 
				
	
	$update_user = "UPDATE `customer` SET
	cus_name = '".$cus_name."',
	cus_email = '".$cus_email."',
	cus_phone = '".$cus_phone."'
	WHERE id = '".$id."'
	";
	$sql_update=$dbconn->prepare($update_user);
    $sql_update->execute();
	
	
	header("Location: profile.php?message=1");
}


 $select_user="SELECT * FROM customer where id = '".$_SESSION['id']."' ";
 $sql=$dbconn->prepare($select_user);
 $sql->execute();
 $wlvd=$sql->fetchAll(PDO::FETCH_OBJ);
 foreach($wlvd as $rows);
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
                                <h4 class="card-title">User Profile</h4>
                                <h6 class="card-subtitle"> Update Your Profile</h6>
                                
                                <form id="formID" class="m-t-30" method="post" action="">    
									
							 
									
									
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Your Name</label>
										<input name="cus_name"  type="text" class="form-control" id="cus_name" aria-describedby="emailHelp" placeholder="Name" value="<?php echo $rows->cus_name; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small>	
                                    </div>
									
									
									<div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
										<input name="cus_email" type="text" class="form-control" id="cus_email" aria-describedby="emailHelp" placeholder="Email" value="<?php echo $rows->cus_email; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small>	
                                    </div>
									
									
									
									<div class="form-group">
                                        <label for="exampleInputEmail1">Phone Number</label>
										<input name="cus_phone"  type="text" class="form-control" id="cus_phone" aria-describedby="emailHelp" placeholder="Username" value="<?php echo $rows->cus_phone; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small>	
                                    </div>
                                    
									
									
                                    
									
									<button type="submit"  name="submit" value="Submit" class="btn btn-primary">Submit</button>
									
									
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