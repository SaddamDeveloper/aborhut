<?php 
ob_start();
include('configure.php');
DB::connect();
// require_once("check.php");

$id = $_REQUEST['id'];
$start = $_REQUEST['start'];
if(isset($_POST['submit12345'])){
	
	$pay_cus_name    =  $_POST['pay_cus_name'];
	$pay_cus_id = $_POST['pay_cus_id'];
	$pay_cus_phone = $_POST['payment_phone'];
    $pay_cus_email = $_POST['pay_cus_email'];
    $pay_time = $_POST['pay_time'];
    $pay_status = $_POST['pay_status'];
 
  


	$update_user = "INSERT `payment` SET
 
    pay_cus_name = '".$pay_cus_name."',
    pay_cus_id = '".$pay_cus_id."',
    pay_cus_phone = '".$pay_cus_phone."',
    pay_cus_email = '".$pay_cus_email."',
    pay_time = '".$pay_time."',
    pay_status = '".$pay_status."'";
    $sql_update=$dbconn->prepare($update_user);
    $sql_update->execute();
    
    
    header("Location: payment.php?message=1");

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
                                
                                
                                <form id="formID" class="m-t-30" method="post" action="" enctype="multipart/form-data"> 
									
									<div class="form-group">
                                        <label  for="exampleInputEmail1">Customer Name</label>
										<input name="pay_cus_name" required=''   type="text" class="form-control" id="pay_cus_name" aria-describedby="emailHelp" value=" <?php echo $rows->pay_cus_name; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small>	
                                    </div>
 
 									
									<div class="form-group">
                                        <label  for="exampleInputEmail1">Customer id</label>
                                        <input name="pay_cus_id" required=''   type="text" class="form-control" id="pay_cus_id" aria-describedby="emailHelp" value=" <?php echo $rows->pay_cus_id; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
									
									
									 <div class="form-group">
                                        <label  for="exampleInputEmail1">Customer Phone</label>
                                        <input name="pay_cus_phone" required=''   type="text" class="form-control" id="pay_cus_phone" aria-describedby="emailHelp" value=" <?php echo $rows->pay_cus_phone; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>

                                     <div class="form-group">
                                        <label  for="exampleInputEmail1">Customer Password</label>
                                        <input name="pay_cus_email" required=''   type="text" class="form-control" id="pay_cus_email" aria-describedby="emailHelp" value=" <?php echo $rows->pay_cus_email; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>

                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Payment time</label>
                                        <input name="pay_time" required=''   type="text" class="form-control" id="pay_time" aria-describedby="emailHelp" value=" <?php echo $rows->pay_time; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>

                                    <div class="form-group">
                                        <label  for="exampleInputEmail1"> Status</label>
                                        <input name="pay_status" required=''   type="text" class="form-control" id="pay_status" aria-describedby="emailHelp" value=" <?php echo $rows->pay_status; ?>" >
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
			