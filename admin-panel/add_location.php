<?php 
ob_start();
include('configure.php');
DB::connect();
// require_once("check.php");

$id = $_REQUEST['id'];
$start = $_REQUEST['start'];
if(isset($_POST['submit12345'])){
	
	$location_name    =  $_POST['location_name'];
	$location_city = $_POST['location_city'];
	$location_state = $_POST['location_state'];
 
  


	$update_user = "INSERT `location` SET
 
    location_name = '".$location_name."',
    location_city = '".$location_city."',
    location_state = '".$location_state."'";
    $sql_update=$dbconn->prepare($update_user);
    $sql_update->execute();
    
    
    header("Location: location.php?message=1");

}
	


$select_enquiry="SELECT * FROM city order by id desc limit 20";

 $sql1=$dbconn->prepare($select_enquiry);
 $sql1->execute();
 $wlvd1=$sql1->fetchAll(PDO::FETCH_OBJ);


$select_enquiry2="SELECT * FROM state order by id desc limit 20";

 $sql2=$dbconn->prepare($select_enquiry2);
 $sql2->execute();
 $wlvd2=$sql2->fetchAll(PDO::FETCH_OBJ);

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
                        <h4 class="page-title">Add Location </h4>
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
                                        <label  for="exampleInputEmail1">location Name</label>
										<input name="location_name" required=''   type="text" class="form-control" id="location_name" aria-describedby="emailHelp" value=" <?php echo $rows->location_name; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small>	
                                    </div>
 
 									
									<div class="form-group m-b-30">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Location City</label>
                                        <select class="custom-select mr-sm-2" id="location_city" name="location_city" >
                                        <option selected>Choose...</option>
                                        
                                        <?php               
                                            if($sql1->rowCount() > 0){
                                            foreach($wlvd1 as $rows1){
                                            $id = $rows1->id;
                                            $city_name = $rows1->city_name;
                                            ?>
                                            
                                            <option><?php echo $city_name;?></option> 
                                            <?php }} ?>
                                        </select>
                                    </div>
									
									
									<div class="form-group m-b-30">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Location State</label>
                                        <select class="custom-select mr-sm-2" id="location_state" name="location_state" >
                                        <option selected>Choose...</option>
                                        
                                        <?php               
                                            if($sql2->rowCount() > 0){
                                            foreach($wlvd2 as $rows2){
                                            $id = $rows2->id;
                                            $state_name = $rows2->state_name;
                                            ?>
                                            
                                            <option><?php echo $state_name;?></option> 
                                            <?php }} ?>
                                        </select>
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
			