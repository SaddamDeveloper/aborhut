<?php 
ob_start();
include('configure.php');
DB::connect();
require_once("check.php");

$id = $_REQUEST['id'];



if(isset($_POST['submit'])){
    
   
    $prop_name    =  $_POST['prop_name'];
    $prop_price = $_POST['prop_price'];
    $prop_type = $_POST['prop_type'];
    $prop_address = $_POST['prop_address'];
    $prop_desc = $_POST['prop_desc'];
    $prop_city = $_POST['prop_city'];
    $prop_state = $_POST['prop_state'];
    $prop_location = $_POST['prop_location'];
    $prop_ac = $_POST['prop_ac'];
    $prop_balcony = $_POST['prop_balcony'];
    $prop_d2h = $_POST['prop_d2h'];
    $prop_lift = $_POST['prop_lift'];
    $prop_status = $_POST['prop_status'];
    $prop_bedding = $_POST['prop_bedding'];
    $prop_internet = $_POST['prop_internet'];
    $prop_parking = $_POST['prop_parking'];
    $prop_pool = $_POST['prop_pool'];
    $prop_bedroom = $_POST['prop_bedroom'];
    $prop_bathroom = $_POST['prop_bathroom'];

                


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
 

    $update_user = "UPDATE `product` SET
    $sql1 $sql2 $sql3 $sql4 $sql5
    prop_name   = '".addslashes($prop_name)."',
    prop_price   = '".addslashes($prop_price)."',
    prop_address   = '".addslashes($prop_address)."',
    prop_desc   = '".addslashes($prop_desc)."',
    prop_city   = '".addslashes($prop_city)."',
    prop_state   = '".addslashes($prop_state)."',
    prop_type   = '".addslashes($prop_type)."',
    prop_ac   = '".addslashes($prop_ac)."',
    prop_balcony   = '".addslashes($prop_d2h)."',
    prop_bedroom   = '".addslashes($prop_bedroom)."',
    prop_bathroom   = '".addslashes($prop_bathroom)."',
    prop_d2h   = '".addslashes($prop_lift)."',
    prop_lift   = '".addslashes($prop_bedding)."',
    prop_bedding   = '".addslashes($prop_internet)."',
    prop_internet   = '".addslashes($prop_parking)."',
    prop_parking   = '".addslashes($prop_state)."',
    prop_status   = '".addslashes($prop_status)."',
    prop_state   = '".addslashes($prop_pool)."',
    prop_pool   = '".addslashes($prop_location)."'
    WHERE id = '".$id."'
    "; 

    $sql_update=$dbconn->prepare($update_user);
    $sql_update->execute();
    
    
    header("Location: property.php?message=1");
}


if($id !=''){
 $select_bookings= "SELECT * FROM `property` WHERE id = '".$_REQUEST['id']."'";
 $sql=$dbconn->prepare($select_bookings);
 $sql->execute();
 $wlvd=$sql->fetchAll(PDO::FETCH_OBJ);
 foreach($wlvd as $rows);
}

if($id !=''){
 $select_bookings1= "SELECT * FROM `property_type` WHERE id = '".$_REQUEST['id']."'";
 $sql1=$dbconn->prepare($select_bookings1);
 $sql1->execute();
 $wlvd1=$sql1->fetchAll(PDO::FETCH_OBJ);
 foreach($wlvd1 as $rows1);
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
                                <h4 class="card-title"> </h4>
                                <h6 class="card-subtitle">  </h6>
                                
                               
                          <form id="formID" class="m-t-30" method="post" action="" enctype="multipart/form-data" > 
                                     
                                    
                                    
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
                                            if($sql1->rowCount() > 0){
                                            foreach($wlvd1 as $rows1){
                                            $id = $rows1->id;
                                            $property_type = $rows1->property_type;
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
                                        <textarea name="prop_desc" id="prop_desc" cols="50" rows="15" class="ckeditor"><?php echo $rows->prop_desc; ?>  </textarea>
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">city</label>
                                        <input name="prop_city" required=''   type="text" class="form-control" id="prop_city" aria-describedby="emailHelp" value=" <?php echo $rows->prop_city; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                
                                    
                                    <div class="form-group">
                                        <col>
                                        <label  for="exampleInputEmail1">state</label>
                                        <input name="prop_state" required=''   type="text" class="form-control" id="prop_state" aria-describedby="emailHelp" value=" <?php echo $rows->prop_state; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>

                                    <div class="form-group">
                                        <col>
                                        <label  for="exampleInputEmail1">location</label>
                                        <input name="prop_location" required=''   type="text" class="form-control" id="prop_location" aria-describedby="emailHelp" value=" <?php echo $rows->prop_location; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                    
                                    <label>Amentities</label>
                                    
                                    <div class="box-body">
                                    <div class="col-md-4">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">No. of Bedrooms </label>
                                        <select class="custom-select mr-sm-2" id="prop_bedroom" name="prop_bedroom" >
                                        <option selected>Select</option>
                                         
                                            <option>1 </option>
                                            <option>2 </option>
                                            <option>3 </option>
                                            <option>4 </option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7 </option>
                                       
                                        </select>
                                    </div>
                                    </div>
                                    
                                    
                                     <div class="box-body">
                                    <div class="col-md-4">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">No. of Bathrooms </label>
                                        <select class="custom-select mr-sm-2" id="prop_bathroom" name="prop_bathroom" >
                                        <option selected>Select</option>
                                         
                                            <option>1 </option>
                                            <option>2 </option>
                                            <option>3 </option>
                                            <option>4 </option>
                                            <option>5</option>
                                            <option>6</option>
                                            <option>7 </option>
                                       
                                        </select>
                                    </div>
                                    </div>
                                    
                                    
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
                                    
                                     <div class="form-group" style="display: none;">
                                        <label  for="exampleInputEmail1">Address</label>
                                        <input name="prop_status" required=''   type="text" class="form-control" id="prop_status" aria-describedby="emailHelp" value=" <?php echo $rows->prop_status; ?>" >
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