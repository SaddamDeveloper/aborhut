<?php 
ob_start();
include('configure.php');
DB::connect();
// require_once("check.php");

$id = $_REQUEST['id'];
$start = $_REQUEST['start'];
if(isset($_POST['submit12345'])){
    
    $property_type    =  $_POST['property_type'];
    
    
    
    
    $insert_bookings = "UPDATE `property_type` SET
    
    property_type   = '".addslashes($property_type)."'
    WHERE id = '".$id."'
    ";  

$sql_insert = $dbconn->prepare($insert_bookings);
$sql_insert->execute();
    
    $message="Details successfully updated.";
    $status="success";
    header("Location: property_type.php?id=$id&message=1&status=success");
        
}

if($id !=''){
 $select_bookings= "SELECT * FROM `property_type` WHERE id = '".$_REQUEST['id']."'";
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
                        <h4 class="page-title">Edit Porperty Type </h4>
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
                                        <label  for="exampleInputEmail1"> property type</label>
                                        <input name="property_type" required=''   type="text" class="form-control" id="property_type" aria-describedby="emailHelp" value=" <?php echo $rows->property_type; ?>" >
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
            