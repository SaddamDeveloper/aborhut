<?php 
ob_start();
include('configure.php');
DB::connect();
require_once("check.php");

$id = $_REQUEST['id'];


$nameErr = $priceErr = $typeErr = $visitErr = $addressErr = $cityErr = $stateErr = $landlordErr = $locationErr = $latErr = $longErr = $categoryErr = $statusErr = "";
if(isset($_POST['submit'])){
   
    empty($_POST['prop_name']) ? $nameErr = "Name is required!" : $prop_name = test_input($_POST['prop_name']);
    empty($_POST['prop_price']) ? $priceErr = "Price is required!" : $prop_price = test_input($_POST['prop_price']);
    empty($_POST['prop_type']) ? $typeErr = "Type is required!" : $prop_type = test_input($_POST['prop_type']);
    empty($_POST['prop_address']) ? $typeErr = "Address is required!" : $prop_address = test_input($_POST['prop_address']);
    empty($_POST['prop_city']) ? $cityErr = "City is required!" : $prop_city = test_input($_POST['prop_city']);
    empty($_POST['prop_state']) ? $stateErr = "State is required!" : $prop_state = test_input($_POST['prop_state']);
    empty($_POST['prop_landlord_id']) ? $landlordErr = "Landlord is required!" : $prop_landlord_id = test_input($_POST['prop_landlord_id']);
    empty($_POST['prop_location']) ? $locationErr = "Location is required!" : $prop_location = test_input($_POST['prop_location']);
    empty($_POST['prop_visit_price']) ? $visitErr = "Visit charge is required!" : $prop_visit_price = test_input($_POST['prop_visit_price']);
    empty($_POST['latitude']) ? $latErr = "Latitude is required!" : $prop_latitude = test_input($_POST['latitude']);
    empty($_POST['longitude']) ? $longErr = "Longitude is required!" : $prop_longitude = test_input($_POST['longitude']);
    empty($_POST['prop_category']) ? $categoryErr = "Category is required!" : $prop_category = test_input($_POST['prop_category']);
    empty($_POST['prop_status']) ? $statusErr = "Status is required!" : $prop_status = test_input($_POST['prop_status']);
    !is_numeric($_POST['bua']) ? $buaErr = "Built Up area should be numeric!" : $prop_bua = test_input($_POST['bua']);
    !is_numeric($_POST['ca']) ? $caErr = "Carpet area should be numeric!" : $prop_ca = test_input($_POST['ca']);

    $prop_desc = test_input($_POST['prop_desc']);

    $prop_ac = test_input($_POST['prop_ac']);
    $prop_balcony = test_input($_POST['prop_balcony']);
    $prop_d2h = test_input($_POST['prop_d2h']);
    $prop_lift = test_input($_POST['prop_lift']);
    $prop_bedding = test_input($_POST['prop_bedding']);
    $prop_internet = test_input($_POST['prop_internet']);
    $prop_parking = test_input($_POST['prop_parking']);
    $prop_pool = test_input($_POST['prop_pool']);
    $prop_status = test_input($_POST['prop_status']);
    $prop_bedroom = test_input($_POST['prop_bedroom']);
    $prop_bathroom = test_input($_POST['prop_bathroom']);
    $prop_posted_by = test_input($_SESSION['admin_name']);
    $prop_created_at = test_input(date('Y-m-d H:i:s', time()));


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
        $photo3 = md5(rand() * time()).'.'.$extension;
        
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
        $photo5 = md5(rand() * time()).'.'.$extension;
        
        $target_path = $target_path . $photo5; 
        
        move_uploaded_file($_FILES['photo5']['tmp_name'], $target_path);
        
        $sql5 = ($photo5!='')?"prop_image5='$photo5' ".',':'' ;
        
        }
        }
 
        if($prop_name && $prop_price && $prop_type && $prop_address && $prop_city && $prop_state && $prop_landlord_id 
        && $prop_location && $prop_latitude && $prop_longitude && $prop_visit_price
        && $prop_category && $prop_status != ""){

            $update_user = "UPDATE `property` SET
            $sql1 $sql2 $sql3 $sql4 $sql5
            prop_name   = '".addslashes($prop_name)."',
            prop_status   = '".addslashes($prop_status)."',
            prop_price   = '".addslashes($prop_price)."',
            prop_address   = '".addslashes($prop_address)."',
            prop_landlord_id   = '".addslashes($prop_landlord_id)."',
            prop_desc   = '".addslashes($prop_desc)."',
            prop_city   = '".addslashes($prop_city)."',
            prop_state   = '".addslashes($prop_state)."',
            prop_type   = '".addslashes($prop_type)."',
            prop_ac   = '".addslashes($prop_ac)."',
            prop_balcony   = '".addslashes($prop_balcony)."',
            prop_d2h   = '".addslashes($prop_d2h)."',
            prop_bedroom   = '".addslashes($prop_bedroom)."',
            prop_bathroom   = '".addslashes($prop_bathroom)."',
            prop_lift   = '".addslashes($prop_lift)."',
            prop_bedding   = '".addslashes($prop_bedding)."',
            prop_internet   = '".addslashes($prop_internet)."',
            prop_parking   = '".addslashes($prop_parking)."',
            prop_state   = '".addslashes($prop_state)."',
            prop_category   = '".addslashes($prop_category)."',
            prop_bua = '".addslashes($prop_bua)."',
            prop_ca = '".addslashes($prop_ca)."',
            prop_visit_price   = '".addslashes($prop_visit_price)."',
            prop_pool   = '".addslashes($prop_pool)."',
            prop_furnishing   = '".addslashes($prop_furnishing)."',
            prop_water   = '".addslashes($prop_water)."'
            WHERE id = '".$id."'"; 

            $sql_update=$dbconn->prepare($update_user);
            $sql_update->execute();
            if($update_user){
                $message = urlencode("Property Updated Successfully!");
                header("Location: property.php?message=".$message);
            }
        }
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
if($id !=''){
 $select_bookings= "SELECT * FROM `property` WHERE id = '".$_REQUEST['id']."'";
 $sql=$dbconn->prepare($select_bookings);
 $sql->execute();
 $wlvd=$sql->fetchAll(PDO::FETCH_OBJ);
 foreach($wlvd as $rows);
 $image1= $rows->prop_image1;
 $image2= $rows->prop_image2;
 $image3= $rows->prop_image3;
 $image4= $rows->prop_image4;
 $image5= $rows->prop_image5;
}

$select_enquiry2="SELECT * FROM landlord order by id desc";
$sql33=$dbconn->prepare($select_enquiry2);
$sql33->execute();
$wlvd33=$sql33->fetchAll(PDO::FETCH_OBJ);

$select_bookings1= "SELECT * FROM `property_type` order by id desc";
$sql11=$dbconn->prepare($select_bookings1);
$sql11->execute();
$wlvd1=$sql11->fetchAll(PDO::FETCH_OBJ);

$select_bookings2= "SELECT * FROM `city` order by id desc";
$sql12=$dbconn->prepare($select_bookings2);
$sql12->execute();
$wlvd2=$sql12->fetchAll(PDO::FETCH_OBJ);

 $select_bookings3= "SELECT * FROM `state` order by id desc";
 $sql13=$dbconn->prepare($select_bookings3);
 $sql13->execute();
 $wlvd3=$sql13->fetchAll(PDO::FETCH_OBJ);

$select_bookings4= "SELECT * FROM `location` order by id desc";
$sql14=$dbconn->prepare($select_bookings4);
$sql14->execute();
$wlvd4=$sql14->fetchAll(PDO::FETCH_OBJ);
 

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
                        <h4 class="page-title">Edit this Property </h4>
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
                              
                                <!-- <label for="location">Location</label> -->
                                <button type="hidden" class="btn btn-primary" onclick="getLocation()"><i class="fa fa-map-marker"></i></button>

                                <p id="demo"></p> 

                               
                          <form id="formID" class="m-t-30" method="post" action="" enctype="multipart/form-data" > 
  
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Name</label>
                                        <input name="prop_name" type="text" class="form-control" id="prop_name" value=" <?php echo $rows->prop_name; ?>" >
                                        <small id="emailHelp" class="form-text text-danger"><?php echo $nameErr; ?></small> 
                                    </div> 

                                    <div class="form-group m-b-30">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Landlord  </label>
                                        <select class="custom-select mr-sm-2" id="prop_landlord_id" name="prop_landlord_id">
                                        <option selected value="">--Select Landlord--</option>
                                        <?php 
                                            if($sql33->rowCount() > 0){
                                            foreach($wlvd33 as $rows33){
                                            $id = $rows33->id;
                                            $landlord_name = $rows33->landlord_name;
                                            ?>
                                            <option value="<?php echo $id;?>" <?php echo $id == $rows->prop_landlord_id ? "selected": ""?>><?php echo $landlord_name;?></option> 
                                            <?php }} ?>
                                        </select>
                                        <small class="form-text text-danger"><?php echo $landlordErr; ?></small> 
                                    </div>

                                    <div class="form-group m-b-30">
                                        <label for="">Property Type</label>
                                        <select class="custom-select mr-sm-2" id="prop_type" name="prop_type" value="">
                                        <option selected value="">--Select Property Type--</option>
                                        <?php 
                                            foreach($wlvd1 as $rows1){
                                            $id = $rows1->id;
                                            $property_type = $rows1->property_type;
                                            ?>
                                            <option <?php echo $property_type == $rows->prop_type ? "selected": ""?>><?php echo $property_type ?></option>
                                        <?php } ?>
                                        </select>
                                        <small id="emailHelp" class="form-text text-danger">><?php echo $typeErr ?></small> 
                                    </div>

                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Price</label>
                                        <input name="prop_price" type="text" class="form-control" id="prop_price" value="<?php echo $rows->prop_price ?>">
                                        <small id="emailHelp" class="form-text text-danger"><?php echo $priceErr ?></small> 
                                    </div>
                              
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Visit Charge</label>
                                        <input name="prop_visit_price" type="text" class="form-control" id="prop_visit_price" value=" <?php echo $rows->prop_visit_price; ?>" >
                                        <small id="emailHelp" class="form-text text-danger"><?php echo $visitErr ?></small> 
                                    </div>
                                    
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Address</label>
                                        <input name="prop_address" type="text" class="form-control" id="prop_address" value=" <?php echo $rows->prop_address; ?>" >
                                        <small class="form-text text-danger"><?php echo $addressErr ?></small>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Description</label> 
                                        <textarea name="prop_desc" id="prop_desc" cols="50" rows="15" class="ckeditor"><?php echo $rows->prop_desc; ?> </textarea>
                                    </div>
     
                                    <div class="form-group">
                                    <label for="">City</label>
                                        <select class="custom-select mr-sm-2" id="prop_city" name="prop_city">
                                        <option selected value="">--Select City--</option>
                                    <?php 
                                            foreach($wlvd2 as $rows11){
                                            $id = $rows11->id;
                                            $city_name = $rows11->city_name;
                                            ?>
                                            <option <?php echo $city_name == $rows->prop_city ? "selected": ""?>><?php echo $city_name ?></option>
                                            <?php } ?>
                                        </select>
                                        <small id="emailHelp" class="form-text text-danger"><?php echo $cityErr; ?></small> 
                                    </div>
                                    
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">State</label>
                                        <select class="custom-select mr-sm-2" id="prop_state" name="prop_state">
                                        <option selected value="">--Select State--</option>
                                    <?php 
                                            foreach($wlvd3 as $rows1){
                                            $id = $rows1->id;
                                            $state_name = $rows1->state_name;
                                            ?>
                                            <option <?php echo $state_name == $rows->prop_state ? "selected": ""?>><?php echo $state_name ?></option>
                                        <?php } ?>
                                        </select>
                                        <small id="emailHelp" class="form-text text-danger"><?php echo $stateErr; ?></small> 
                                    </div>
                                    <div class="form-group">
                                        <p id="demo"></p>
                                            <span onclick="getLocation()" style="cursor:pointer;">
                                                <i class="fa fa-map-marker"></i>
                                            </span>
                                    </div>
                                    <div class="form-group m-b-30 row">
                                        <div class="col-md-6">
                                            <label for="latitude">Latitude</label>
                                            <input type="text" class="form-control" id="latitude" name="latitude" value="<?php echo $rows->prop_latitude ?>">    
                                            <small id="emailHelp" class="form-text text-danger"><?php echo $latErr ?></small> 
                                        </div>
                                        <div class="col-md-6">
                                            <label for="longitude">Longitude</label>
                                            <input type="text" class="form-control" id="longitude" name="longitude" value="<?php echo $rows->prop_longitude ?>">    
                                            <small id="emailHelp" class="form-text text-danger"><?php echo $longErr ?></small> 
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Location</label>
                                        <select class="custom-select mr-sm-2" id="prop_location" name="prop_location">
                                        <option selected value="">--Select Location--</option>
                                    <?php 
                                            foreach($wlvd4 as $rows1){
                                            $id = $rows1->id;
                                            $location_name = $rows1->location_name;
                                            ?>
                                            <option <?php echo $location_name == $rows->prop_location ? "selected": ""?>><?php echo $location_name ?></option>
                                        <?php } ?>
                                        </select>
                                        <small id="emailHelp" class="form-text text-danger"><?php echo $locationErr; ?></small> 
                                    </div>
                                    <div class="form-group m-b-30 row">
                                        <div class="col-md-6">
                                            <label for="bua">Built Up Area</label>
                                            <input type="text" class="form-control" id="bua" name="bua" value="<?php echo $rows->prop_bua ?>">    
                                            <small class="form-text text-danger"><?php echo $buaErr ?></small> 
                                        </div>
                                        <div class="col-md-6">
                                            <label for="ca">Carpet Area</label>
                                            <input type="text" class="form-control" id="ca" name="ca" value="<?php echo $rows->prop_ca ?>">    
                                            <small class="form-text text-danger"><?php echo $caErr ?></small> 
                                        </div>
                                    </div>
                                    <h4>Amentities</h4>
                                    <hr>
                                    <div class="box-body row">
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">No. of Bedrooms </label>
                                            <input type="text" class="form-control" id="prop_bedroom" name="prop_bedroom" value=" <?php echo $rows->prop_bedroom ?>">
                                        </div>  
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">No. of Bathrooms </label>
                                                <input type="text" class="form-control" id="prop_bathroom" name="prop_bathroom" value=" <?php echo $rows->prop_bathroom ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="box-body row">
                                        <div class="col-md-6">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Pool</label>
                                            <select class="custom-select mr-sm-2" id="prop_pool" name="prop_pool" >
                                            <option selected value="">--Select Pool--</option>
                                                <option <?php echo $rows->prop_pool === 'Yes' ? 'selected' : '';  ?>>Yes </option>
                                                <option <?php echo $rows->prop_pool === 'No' ? 'selected' : '';  ?>>No </option> 
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">AC</label>
                                            <select class="custom-select mr-sm-2" id="prop_ac" name="prop_ac" >
                                            <option selected value="">--Select AC--</option>
                                                <option <?php echo $rows->prop_ac === 'Yes' ? 'selected' : '';  ?>>Yes </option>
                                                <option <?php echo $rows->prop_ac === 'No' ? 'selected' : '';  ?>>No </option> 
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="box-body row">
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">No of Balcony </label>
                                            <input type="text" class="form-control" id="prop_balcony" name="prop_balcony" value="<?php echo $rows->prop_balcony ?>">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Furnishing Type </label>
                                            <select class="custom-select mr-sm-2" id="prop_furnishing" name="prop_furnishing" >
                                            <option selected value="">--Select Furnishing Type--</option>
                                                <option <?php echo $rows->prop_furnishing === 'Furnished' ? 'selected' : '';  ?>>Furnished</option>
                                                <option <?php echo $rows->prop_furnishing === 'Unfurnished' ? 'selected' : '';  ?>>Unfurnished</option> 
                                            </select>   
                                        </div>
                                    </div>
                                    
                                    <div class="box-body row">
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Water Facilities</label>
                                            <select class="custom-select mr-sm-2" id="prop_water" name="prop_water" >
                                            <option selected value="">--Select Water facility--</option>
                                                <option <?php echo $rows->prop_water === 'Yes' ? 'selected' : '';  ?>>Yes</option>
                                                <option <?php echo $rows->prop_water === 'No' ? 'selected' : '';  ?>>No</option> 
                                            </select>   
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">D2h/Cable Connection  </label>
                                            <select class="custom-select mr-sm-2" id="prop_d2h" name="prop_d2h" >
                                            <option selected value="">--Select D2H/Cable Connection--</option>
                                                <option <?php echo $rows->prop_d2h === 'Yes' ? 'selected' : '';  ?>>Yes</option>
                                                <option <?php echo $rows->prop_d2h === 'No' ? 'selected' : '';  ?>>No </option> 
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="box-body row">
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Lift </label>
                                            <select class="custom-select mr-sm-2" id="prop_lift" name="prop_lift" >
                                            <option selected value="">--Select Lift--</option>
                                                <option <?php echo $rows->prop_lift === 'Yes' ? 'selected' : '';  ?>>Yes </option>
                                                <option <?php echo $rows->prop_lift === 'No' ? 'selected' : '';  ?>>No </option> 
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Bedding  </label>
                                            <select class="custom-select mr-sm-2" id="prop_bedding" name="prop_bedding" >
                                            <option selected value="">--Select Bedding--</option>
                                                <option <?php echo $rows->prop_bedding === 'Yes' ? 'selected' : '';  ?>>Yes </option>
                                                <option <?php echo $rows->prop_bedding === 'No' ? 'selected' : '';  ?>>No </option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="box-body row">
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Internet  </label>
                                            <select class="custom-select mr-sm-2" id="prop_internet" name="prop_internet" >
                                            <option selected value="">--Select Internet--</option>
                                                <option <?php echo $rows->prop_internet === 'Yes' ? 'selected' : ''; ?>>Yes </option>
                                                <option <?php echo $rows->prop_internet === 'No' ? 'selected' : ''; ?>>No </option> 
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Parking</label>
                                            <select class="custom-select mr-sm-2" id="prop_parking" name="prop_parking" >
                                            <option selected value="">--Select Parking--</option>
                                                <option <?php echo $rows->prop_parking === 'Yes' ? 'selected' : '';?>>Yes </option>
                                                <option <?php echo $rows->prop_parking === 'No' ? 'selected' : '';?>>No </option> 
                                            </select>
                                        </div>
                                    </div>                                                  
                                    </div>

                                     <div class="form-group">
                                        <label  for="exampleInputEmail1">Product Photo 1</label>
                                        <input name="photo1"  type="file" class="form-control-file" id="photo1" aria-describedby="emailHelp" placeholder="<?php echo $rows->prop_image1; ?>"   value="<?php echo $rows->prop_image1; ?>" > 
                                        <small id="emailHelp" class="form-text text-muted"></small><?php if($image1 !=""){ ?> <img src="../images/property/<?php echo $rows->prop_image1;?>" height="100" width="100"> <?php } ?>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Product Photo 2</label>
                                        <input name="photo2"  type="file" class="form-control-file" id="photo2" aria-describedby="emailHelp"   value="<?php echo $rows->prop_image2; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small><?php if($image2 !=""){ ?> <img src="../images/property/<?php echo $rows->prop_image2;?>" height="100" width="100"> <?php } ?>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Product Photo 3</label>
                                        <input name="photo3"  type="file" class="form-control-file" id="photo3" aria-describedby="emailHelp"   value="<?php echo $rows->prop_image3; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> <?php if($image3 !=""){ ?> <img src="../images/property/<?php echo $rows->prop_image3;?>" height="100" width="100"> <?php } ?>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Product Photo 4</label>
                                        <input name="photo4"  type="file" class="form-control-file" id="photo4" aria-describedby="emailHelp"   value="<?php echo $rows->prop_image4; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> <?php if($image4 !=""){ ?> <img src="../images/property/<?php echo $rows->prop_image4;?>" height="100" width="100"> <?php } ?>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Product Photo 5  (Optional)</label>
                                    <input name="photo5"  type="file" class="form-control-file" id="photo5" aria-describedby="emailHelp"   value="<?php echo $rows->prop_image5; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> <?php if($image5 !=""){ ?> <img src="../images/property/<?php echo $rows->prop_image5;?>" height="100" width="100"> <?php } ?>
                                    </div>
                                    
                                    <div class="form-group">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Category</label>
                                        <select class="custom-select mr-sm-2" id="prop_category" name="prop_category" >
                                        <option selected value="">--Select Category--</option>
                                            <option <?php echo $rows->prop_category === 'Commercial' ? 'selected' : '';?>>Commercial </option>
                                            <option <?php echo $rows->prop_category === 'Rental' ? 'selected' : '';?>>Rental </option> 
                                        </select>
                                        <small id="emailHelp" class="form-text text-danger"><?php echo $categoryErr; ?></small> 
                                    </div>
                                    
                                    <div class="form-group m-b-30">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Status  </label>
                                        <select class="custom-select mr-sm-2" id="prop_status" name="prop_status" >
                                        <option selected value="">--Select Status--</option>
                                            <option value="Approved" <?php echo $rows->prop_status === 'Approved' ? 'selected' : '';?>>Approved </option>
                                            <option value="Reject" <?php echo $rows->prop_status === 'Reject' ? 'selected' : '';?>>Reject </option> 
                                            <option value="Pending" <?php echo $rows->prop_status === 'Pending' ? 'selected' : '';?>>Pending </option>
                                        </select>
                                        <small class="form-text text-danger"><?php echo $statusErr; ?></small> 
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

            <script>
                //Location get By GPS
                var x = document.getElementById("demo");
                function getLocation() {
                if (navigator.geolocation) {
                    navigator.geolocation.watchPosition(showPosition);
                } else { 
                    x.innerHTML = "Geolocation is not supported by this browser.";
                }
                }
                    
                function showPosition(position) {
                    // x.innerHTML="Latitude: " + position.coords.latitude + 
                    // "<br>Longitude: " + position.coords.longitude;
                    document.getElementById("latitude").value=position.coords.latitude;
                    document.getElementById("longitude").value=position.coords.longitude;
                }
            </script>
            <?php include('inc/footer.php'); ?>