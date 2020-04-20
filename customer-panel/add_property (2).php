<?php 
ob_start();
include('configure.php');
DB::connect();
// require_once("check.php");

$id = $_REQUEST['id'];
$start = $_REQUEST['start'];
if(isset($_POST['submit12345'])){
    
    $prop_name    =  $_POST['prop_name'];
    $prop_price = $_POST['prop_price'];
    $prop_address = $_POST['prop_address'];
    $prop_desc = $_POST['prop_desc'];
    $prop_city = $_POST['prop_city'];
    $prop_state = $_POST['prop_state'];
    $prop_location = $_POST['prop_location'];
    $prop_type = $_POST['prop_type'];
    $prop_ac = $_POST['prop_ac'];
    $prop_balcony = $_POST['prop_balcony'];
    $prop_d2h = $_POST['prop_d2h'];
    $prop_lift = $_POST['prop_lift'];
    $prop_bedding = $_POST['prop_bedding'];
    $prop_internet = $_POST['prop_internet'];
    $prop_parking = $_POST['prop_parking'];
    $prop_pool = $_POST['prop_pool'];
 

    
    $allow = array("jpg","JPG","jpeg","JPEG", "gif","GIF","png","PNG","pdf","PDF");
        
        
        //1st
        if($_FILES['photo1']['name'] =="") {
            //echo "No Image";
        } else {    
        
        $photo1=basename($_FILES['photo1']['name']); 
        $extension = pathinfo($photo1, PATHINFO_EXTENSION); //extenction our file name .jpg
        if(in_array($extension,$allow)){
        $target_path = "../images/property/"; 
        $photo1       = md5(rand() * time()).'.'.$extension;
        
        $target_path = $target_path . $photo1; 
        
        move_uploaded_file($_FILES['photo1']['tmp_name'], $target_path);
        
        $sql1 = ($photo1!='')?"   prop_image1='$photo1' ".',':'' ;
        
        
        
        }
        }
    
        
        
        $allow = array("jpg","JPG","jpeg","JPEG", "gif","GIF","png","PNG","pdf","PDF");
        
        
        //1st
        if($_FILES['photo2']['name'] =="") {
            //echo "No Image";
        } else {    
        
        $photo2=basename($_FILES['photo2']['name']); 
        $extension = pathinfo($photo1, PATHINFO_EXTENSION); //extenction our file name .jpg
        if(in_array($extension,$allow)){
        $target_path = "../images/property/";  
        $photo2       = md5(rand() * time()).'.'.$extension;
        
        $target_path = $target_path . $photo2; 
        
        move_uploaded_file($_FILES['photo2']['tmp_name'], $target_path);
        
        $sql2 = ($photo2!='')?"   prop_image2='$photo2' ".',':'' ;
        
        
        
        }
        }
        
        
        $allow = array("jpg","JPG","jpeg","JPEG", "gif","GIF","png","PNG","pdf","PDF");
        
        
        //1st
        if($_FILES['photo3']['name'] =="") {
            //echo "No Image";
        } else {    
        
        $photo3=basename($_FILES['photo3']['name']); 
        $extension = pathinfo($photo1, PATHINFO_EXTENSION); //extenction our file name .jpg
        if(in_array($extension,$allow)){
        $target_path = "../images/property/";  
        $photo3       = md5(rand() * time()).'.'.$extension;
        
        $target_path = $target_path . $photo3; 
        
        move_uploaded_file($_FILES['photo3']['tmp_name'], $target_path);
        
        $sql3 = ($photo3!='')?"   prop_image3='$photo3' ".',':'' ;
        
        
        
        }
        }
        
        
        $allow = array("jpg","JPG","jpeg","JPEG", "gif","GIF","png","PNG","pdf","PDF");
        
        
        //1st
        if($_FILES['photo4']['name'] =="") {
            //echo "No Image";
        } else {    
        
        $photo4=basename($_FILES['photo4']['name']); 
        $extension = pathinfo($photo4, PATHINFO_EXTENSION); //extenction our file name .jpg
        if(in_array($extension,$allow)){
        $target_path =  "../images/property/";  
        $photo4       = md5(rand() * time()).'.'.$extension;
        
        $target_path = $target_path . $photo1; 
        
        move_uploaded_file($_FILES['photo4']['tmp_name'], $target_path);
        
        $sql4 = ($photo4!='')?"   prop_image4='$photo4' ".',':'' ;
        
        
        
        }
        }
        
        
        $allow = array("jpg","JPG","jpeg","JPEG", "gif","GIF","png","PNG","pdf","PDF");
        
        
        //1st
        if($_FILES['photo5']['name'] =="") {
            //echo "No Image";
        } else {    
        
        $photo5=basename($_FILES['photo5']['name']); 
        $extension = pathinfo($photo5, PATHINFO_EXTENSION); //extenction our file name .jpg
        if(in_array($extension,$allow)){
        $target_path =  "../images/property/"; 
        $photo5      = md5(rand() * time()).'.'.$extension;
        
        $target_path = $target_path . $photo5; 
        
        move_uploaded_file($_FILES['photo5']['tmp_name'], $target_path);
        
        $sql5 = ($photo5!='')?"   prop_image5='$photo5' ".',':'' ;
        
        
        
        }
        }


    $update_user = "INSERT `property` SET
    $sql1 $sql2 $sql3 $sql4 $sql5
    prop_name = '".$prop_name."',
    prop_price = '".$prop_price."',
    prop_address = '".$prop_address."',
    prop_desc = '".$prop_desc."',
    prop_city = '".$prop_city."',
    prop_state = '".$prop_state."',
    prop_type = '".$prop_type."',
    prop_ac = '".$prop_ac."',
    prop_balcony = '".$prop_balcony."',
    prop_d2h = '".$prop_d2h."',
    prop_lift = '".$prop_lift."',
    prop_bedding = '".$prop_bedding."',
    prop_internet = '".$prop_internet."',
    prop_parking = '".$prop_parking."',
    prop_pool = '".$prop_pool."',
    prop_location = '".$prop_location."'";
    $sql_update=$dbconn->prepare($update_user);
    $sql_update->execute();
    
    
    header("Location: property.php?message=1");

}

  
$select_enquiry="SELECT * FROM location order by id desc limit 20";

 $sql1=$dbconn->prepare($select_enquiry);
 $sql1->execute();
 $wlvd1=$sql1->fetchAll(PDO::FETCH_OBJ);
 
 $select_enquiry1="SELECT * FROM property_type order by id desc limit 20";

 $sql2=$dbconn->prepare($select_enquiry1);
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
                                        <label  for="exampleInputEmail1">Name</label>
                                        <input name="prop_name" required=''   type="text" class="form-control" id="prop_name" aria-describedby="emailHelp" value=" <?php echo $rows->prop_name; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div> 
                                    
                                    <div class="form-group m-b-30">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Property Type  </label>
                                        <select class="custom-select mr-sm-2" id="prop_type" name="prop_type" >
                                        <option selected>Choose...</option>
                                        
                                        <?php               
                                            if($sql2->rowCount() > 0){
                                            foreach($wlvd2 as $rows2){
                                            $id = $rows2->id;
                                            $property_type = $rows2->property_type;
                                            ?>
                                            
                                            <option><?php echo $property_type;?></option> 
                                            <?php }} ?>
                                        </select>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Price</label>
                                        <input name="prop_price" required=''   type="text" class="form-control" id="prop_price" aria-describedby="emailHelp" value=" <?php echo $rows->prop_price; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                    
 
                                    
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Address</label>
                                        <input name="prop_address" required=''   type="text" class="form-control" id="prop_address" aria-describedby="emailHelp" value=" <?php echo $rows->prop_address; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Description</label> 
                                        <textarea name="prop_desc" id="prop_desc" cols="50" rows="15" class="ckeditor">  </textarea>
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">City</label>
                                        <input name="prop_city" required=''   type="text" class="form-control" id="prop_city" aria-describedby="emailHelp" value=" <?php echo $rows->prop_city; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                
                                    
                                    <div class="form-group">
                                        <col>
                                        <label  for="exampleInputEmail1">State</label>
                                        <input name="prop_state" required=''   type="text" class="form-control" id="prop_state" aria-describedby="emailHelp" value=" <?php echo $rows->prop_state; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>

                                    <div class="form-group m-b-30">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Location  </label>
                                        <select class="custom-select mr-sm-2" id="prop_location" name="prop_location" >
                                        <option selected>Choose...</option>
                                        
                                        <?php               
                                            if($sql1->rowCount() > 0){
                                            foreach($wlvd1 as $rows1){
                                            $id = $rows1->id;
                                            $location_name = $rows1->location_name;
                                            ?>
                                            
                                            <option><?php echo $location_name;?></option> 
                                            <?php }} ?>
                                        </select>
                                    </div>
                                    <label>Amentities</label>
                                    <div class="form-group m-b-30">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">AC  </label>
                                        <select class="custom-select mr-sm-2" id="prop_ac" name="prop_ac" >
                                        <option selected>Choose...</option>
                                        
                                         
                                            <option value="fa fa-check">Yes </option>
                                            <option value="fa fa-times">No </option> 
                                           
                                        </select>
                                    </div>
                                    
                                    <div class="form-group m-b-30">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Balcony </label>
                                        <select class="custom-select mr-sm-2" id="prop_balcony" name="prop_balcony" >
                                        <option selected>Choose...</option>
                                        
                                         
                                            <option value="fa fa-check">Yes </option>
                                            <option value="fa fa-times">No </option> 
                                           
                                        </select>
                                    </div>
                                    
                                    <div class="form-group m-b-30">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">D2h/Cable Connection  </label>
                                        <select class="custom-select mr-sm-2" id="prop_d2h" name="prop_d2h" >
                                        <option selected>Choose...</option>
                                        
                                         
                                            <option value="fa fa-check">Yes </option>
                                            <option value="fa fa-times">No </option> 
                                           
                                        </select>
                                    </div>
                                 
                                    <div class="form-group m-b-30">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Lift  </label>
                                        <select class="custom-select mr-sm-2" id="prop_lift" name="prop_lift" >
                                        <option selected>Choose...</option>
                                        
                                         
                                            <option value="fa fa-check">Yes </option>
                                            <option value="fa fa-times">No </option> 
                                           
                                        </select>
                                    </div>
                                    
                                                  
                                    <div class="form-group m-b-30">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Bedding  </label>
                                        <select class="custom-select mr-sm-2" id="prop_bedding" name="prop_bedding" >
                                        <option selected>Choose...</option>
                                        
                                         
                                            <option value="fa fa-check">Yes </option>
                                            <option value="fa fa-times">No </option> 
                                           
                                        </select>
                                    </div>
                                    
                                    <div class="form-group m-b-30">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Internet  </label>
                                        <select class="custom-select mr-sm-2" id="prop_internet" name="prop_internet" >
                                        <option selected>Choose...</option>
                                        
                                         
                                            <option value="fa fa-check">Yes </option>
                                            <option value="fa fa-times">No </option> 
                                           
                                        </select>
                                    </div>
                                    
                                    <div class="form-group m-b-30">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Parking  </label>
                                        <select class="custom-select mr-sm-2" id="prop_parking" name="prop_parking" >
                                        <option selected>Choose...</option>
                                        
                                         
                                            <option value="fa fa-check">Yes </option>
                                            <option value="fa fa-times">No </option> 
                                           
                                        </select>
                                    </div>
                                    
                                     <div class="form-group m-b-30">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Pool  </label>
                                        <select class="custom-select mr-sm-2" id="prop_pool" name="prop_pool" >
                                        <option selected>Choose...</option>
                                        
                                         
                                            <option value="fa fa-check">Yes </option>
                                            <option value="fa fa-times">No </option> 
                                           
                                        </select>
                                    </div>
                                
                                    
                                     <div class="form-group">
                                        <label  for="exampleInputEmail1">Product Photo 1</label>
                                    <input name="photo1"  type="file" class="form-control-file" id="photo1" aria-describedby="emailHelp" multiple value="<?php echo $photo1 ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Product Photo 2</label>
                                    <input name="photo2"  type="file" class="form-control-file" id="photo2" aria-describedby="emailHelp" multiple value="<?php echo $photo2 ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                    
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Product Photo 3</label>
                                    <input name="photo3"  type="file" class="form-control-file" id="photo3" aria-describedby="emailHelp" multiple value="<?php echo $photo3 ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Product Photo 4</label>
                                    <input name="photo4"  type="file" class="form-control-file" id="photo4" aria-describedby="emailHelp" multiple value="<?php echo $photo4 ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                    
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Product Photo 5  (Optional)</label>
                                    <input name="photo5"  type="file" class="form-control-file" id="photo5" aria-describedby="emailHelp" multiple value="<?php echo $photo5 ?>" >
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
