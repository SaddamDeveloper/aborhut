<?php 
ob_start();
include('configure.php');
DB::connect();
// require_once("check.php");

$id = $_REQUEST['id'];
$start = $_REQUEST['start'];
if(isset($_POST['submit12345'])){
	
	$cus_name    =  $_POST['cus_name'];
	$cus_email = $_POST['cus_email'];
	$cus_phone = $_POST['cus_phone'];
    $cus_password = $_POST['cus_password'];
    $cus_city = $_POST['cus_city'];
    $cus_address = $_POST['cus_address'];
    $cus_state = $_POST['cus_state'];

  


	$update_user = "INSERT `customer` SET
 
    cus_name = '".$cus_name."',
    cus_email = '".$cus_email."',
    cus_phone = '".$cus_phone."',
    cus_password = '".$cus_password."',
    cus_city = '".$cus_city."',
    cus_address = '".$cus_address."',
    cus_state = '".$cus_state."'";
    $sql_update=$dbconn->prepare($update_user);
    $sql_update->execute();
    
    
    header("Location: customer.php?message=1");

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
                        <h4 class="page-title"> Add Customer </h4>
                        <div class="d-flex align-items-center">

                        </div>
                    </div>
                    
                </div>
            </div>
            <div class="container-fluid">
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
            </div>
			<script src="assets/libs/ckeditor/ckeditor.js"></script>
    <script src="assets/libs/ckeditor/samples/js/sample.js"></script>
			<script>
    //default
    initSample();
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
			