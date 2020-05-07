<?php 
ob_start();
include('configure.php');
DB::connect();
// require_once("check.php");

$id = $_REQUEST['id'];
$start = $_REQUEST['start'];
if(isset($_POST['submit12345'])){
	
	$landlord_name    =  $_POST['landlord_name'];
	$landlord_email = $_POST['landlord_email'];
	$landlord_phone = $_POST['landlord_phone'];
    $landlord_password = $_POST['landlord_password'];
    $landlord_city = $_POST['landlord_city'];
    $landlord_address = $_POST['landlord_address'];
    $landlord_state = $_POST['landlord_state'];

  


	$update_user = "INSERT `landlord` SET
 
    landlord_name = '".$landlord_name."',
    landlord_email = '".$landlord_email."',
    landlord_phone = '".$landlord_phone."',
    landlord_password = '".$landlord_password."',
    landlord_city = '".$landlord_city."',
    landlord_address = '".$landlord_address."',
    landlord_state = '".$landlord_state."'";
    $sql_update=$dbconn->prepare($update_user);
    $sql_update->execute();
    
    
    header("Location: landlord.php?message=1");

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
                        <h4 class="page-title"> Add landlord </h4>
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
                                
                                
                                <form id="formID" class="m-t-30" method="post" action="" enctype="multipart/form-data"> 
									
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
			<script src="assets/libs/ckeditor/ckeditor.js"></script>
    <script src="assets/libs/ckeditor/samples/js/sample.js"></script>
			<script>
    //default
    initSample();

    //inline editor
    // We need to turn off the automatic editor creation first.
    CKEDITOR.disableAutoInline = true;

    CKEDITOR.inline('editor2', {
        extraPlugins: 'sourcedialog',
        removePlugins: 'sourcearea'
    });

    var editor1 = CKEDITOR.replace('editor1', {
        extraAllowedContent: 'div',
        height: 460
    });
    editor1.on('instanceReady', function() {
        // Output self-closing tags the HTML4 way, like <br>.
        this.dataProcessor.writer.selfClosingEnd = '>';

        // Use line breaks for block elements, tables, and lists.
        var dtd = CKEDITOR.dtd;
        for (var e in CKEDITOR.tools.extend({}, dtd.$nonBodyContent, dtd.$block, dtd.$listItem, dtd.$tableContent)) {
            this.dataProcessor.writer.setRules(e, {
                indent: true,
                breakBeforeOpen: true,
                breakAfterOpen: true,
                breakBeforeClose: true,
                breakAfterClose: true
            });
        }
        // Start in source mode.
        this.setMode('source');
    });
    </script>
            <?php include('inc/footer.php'); ?>
			