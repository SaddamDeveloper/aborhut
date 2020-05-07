<?php 
ob_start();
include('configure.php');
DB::connect();
require_once("check.php");

$id = $_REQUEST['id'];
$start = $_REQUEST['start'];

$nameErr = $priceErr = $typeErr = $visitErr = $addressErr = $cityErr = $stateErr = $locationErr = $latErr = $longErr = $categoryErr = "";
if(isset($_POST['submit12345'])){
    empty($_POST['prop_name']) ? $nameErr = "Name is required!" : $prop_name = test_input($_POST['prop_name']);
    empty($_POST['prop_price']) ? $priceErr = "Price is required!" : $prop_price = test_input($_POST['prop_price']);
    empty($_POST['prop_type']) ? $typeErr = "Type is required!" : $prop_type = test_input($_POST['prop_type']);
    empty($_POST['prop_address']) ? $typeErr = "Address is required!" : $prop_address = test_input($_POST['prop_address']);
    empty($_POST['prop_city']) ? $cityErr = "City is required!" : $prop_city = test_input($_POST['prop_city']);
    empty($_POST['prop_state']) ? $stateErr = "State is required!" : $prop_state = test_input($_POST['prop_state']);
    empty($_POST['prop_location']) ? $locationErr = "Location is required!" : $prop_location = test_input($_POST['prop_location']);
    empty($_POST['latitude']) ? $latErr = "Latitude is required!" : $prop_latitude = test_input($_POST['latitude']);
    empty($_POST['longitude']) ? $longErr = "Longitude is required!" : $prop_longitude = test_input($_POST['longitude']);
    empty($_POST['prop_category']) ? $categoryErr = "Category is required!" : $prop_category = test_input($_POST['prop_category']);

    $prop_desc = test_input($_POST['prop_desc']);

    $prop_ac = test_input($_POST['prop_ac']);
    $prop_balcony = test_input($_POST['prop_balcony']);
    $prop_d2h = test_input($_POST['prop_d2h']);
    $prop_lift = test_input($_POST['prop_lift']);
    $prop_bedding = test_input($_POST['prop_bedding']);
    $prop_internet = test_input($_POST['prop_internet']);
    $prop_parking = test_input($_POST['prop_parking']);
    $prop_pool = test_input($_POST['prop_pool']);
 
    $prop_bedroom = test_input($_POST['prop_bedroom']);
    $prop_bathroom = test_input($_POST['prop_bathroom']);
    $prop_posted_by = test_input($_SESSION['landlord_name']);
    $prop_landlord_id = test_input($_SESSION['id']);
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


    if($prop_name && $prop_price && $prop_type && $prop_address && $prop_city && $prop_state
    && $prop_location && $prop_latitude && $prop_longitude && $prop_category != ""){
        $update_user = "INSERT `property` SET
        $sql1 $sql2 $sql3 $sql4 $sql5
        prop_name = '".$prop_name."',
        prop_landlord_id = '".$prop_landlord_id."',
        prop_price = '".$prop_price."',
        prop_address = '".$prop_address."',
        prop_desc = '".$prop_desc."',
        prop_city = '".$prop_city."',
        prop_state = '".$prop_state."',
        prop_type = '".$prop_type."',
        prop_ac = '".$prop_ac."',
        prop_bedroom = '".$prop_bedroom."',
        prop_bathroom = '".$prop_bathroom."',
        prop_balcony = '".$prop_balcony."',
        prop_d2h = '".$prop_d2h."',
        prop_lift = '".$prop_lift."',
        prop_bedding = '".$prop_bedding."',
        prop_internet = '".$prop_internet."',
        prop_parking = '".$prop_parking."',
        prop_pool = '".$prop_pool."',
     
        prop_category = '".$prop_category."',
        prop_latitude = '".$prop_latitude."',
        prop_longitude = '".$prop_longitude."',
        prop_location = '".$prop_location."',
        posted_by = '".$prop_posted_by."',
        created_at = '".$prop_created_at."'";
        $sql_update=$dbconn->prepare($update_user);
        $sql_update->execute();
        $last_id = $dbconn->lastInsertId();
        if($last_id){
            $p_id = propertyID($last_id);
            $pID_update = "UPDATE `property` SET propertyID = '".$p_id."' WHERE id = '".$last_id."'";
            $stmt = $dbconn->prepare($pID_update);
            $stmt->execute();
        }

        if($update_user){
            $message = urlencode("Property Inserted Successfully!");
            header("Location: property.php?message=".$message);
        }
        
    }


}
function propertyID($lastID){
    // Available alpha caracters
    $characters = 'AH';
    $l_id = 7 - strlen((string)$lastID);
    $generatedID = $characters;
    for ($i=0; $i < $l_id; $i++) { 
        $generatedID .= "0";
    }
    $generatedID .= $lastID;
    return $generatedID;
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
  

$select_enquiry="SELECT * FROM location order by id desc limit 20";

 $sql1=$dbconn->prepare($select_enquiry);
 $sql1->execute();
 $wlvd1=$sql1->fetchAll(PDO::FETCH_OBJ);
 
 $select_enquiry1="SELECT * FROM property_type order by id desc limit 20";

 $sql2=$dbconn->prepare($select_enquiry1);
 $sql2->execute();
 $wlvd2=$sql2->fetchAll(PDO::FETCH_OBJ);

 
$select_enquiry3="SELECT * FROM city order by id desc";

 $sql4=$dbconn->prepare($select_enquiry3);
 $sql4->execute();
 $wlvd4=$sql4->fetchAll(PDO::FETCH_OBJ);
 
    $select_enquiry4="SELECT * FROM state order by id desc";

 $sql5=$dbconn->prepare($select_enquiry4);
 $sql5->execute();
 $wlvd5=$sql5->fetchAll(PDO::FETCH_OBJ);
    
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
                        <h4 class="page-title"> Add Property</h4>
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
                            <div class="box-body">
                            <?php if($_REQUEST['message']!="") { 
                                    
                                    echo "Details Successfully Updated.";
                                    
                                    } ?>

                                <!-- <label for="location">Location</label> -->
                                <button type="hidden" class="btn btn-primary" onclick="getLocation()"><i class="fa fa-map-marker"></i></button>

                                <p id="demo"></p> 

                                <form id="formID" class="m-t-30" method="post" action="" enctype="multipart/form-data"> 

                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Name</label>
                                        <input name="prop_name" type="text" class="form-control" id="prop_name" value="<?php echo isset($_POST['prop_name']) ? $_POST['prop_name'] : '' ?>" >
                                        <small id="emailHelp" class="form-text text-danger"><?php echo $nameErr; ?></small> 
                                    </div> 
                                    
                                    <div class="form-group m-b-30">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Property Type  </label>
                                        <select class="custom-select mr-sm-2" id="prop_type" name="prop_type" value="<?php echo isset($_POST['type']) ? $_POST['type'] : '' ?>">
                                        <option selected value="">--Select Property Type--</option>
                                        
                                        <?php               
                                            if($sql2->rowCount() > 0){
                                            foreach($wlvd2 as $rows2){
                                            $id = $rows2->id;
                                            $property_type = $rows2->property_type;
                                            ?>
                                            
                                            <option <?php echo isset($_POST['type']) ? 'selected' : '' ?>><?php echo $property_type;?></option> 
                                            <?php }} ?>
                                        </select>
                                        <small id="emailHelp" class="form-text text-danger"><?php echo $typeErr; ?></small> 
                                    </div>
                                     
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Price</label>
                                        <input name="prop_price" type="text" class="form-control" id="prop_price" value="<?php echo isset($_POST['prop_price']) ? $_POST['prop_price'] : '' ?>">
                                        <small id="emailHelp" class="form-text text-danger"><?php echo $priceErr ?></small> 
                                    </div>
                                    
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Address</label>
                                        <input name="prop_address"  type="text" class="form-control" id="prop_address" value="<?php echo isset($_POST['prop_address']) ? $_POST['prop_address'] : '' ?>" >
                                        <small id="emailHelp" class="form-text text-danger"><?php echo $addressErr ?></small> 
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Description</label> 
                                        <textarea name="prop_desc" id="prop_desc" cols="50" rows="15" class="ckeditor"><?php echo isset($_POST['prop_desc']) ? $_POST['prop_desc'] : '' ?> </textarea>
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                    
                                     <div class="form-group m-b-30">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">City</label>
                                        <select class="custom-select mr-sm-2" id="prop_city" name="prop_city" value="<?php echo isset($_POST['prop_city']) ? $_POST['prop_city'] : '' ?>">
                                        <option selected value="">--Select City--</option>
                                        <?php               
                                            if($sql4->rowCount() > 0){
                                            foreach($wlvd4 as $rows4){
                                            $id = $rows4->id;
                                            $city_name = $rows4->city_name;
                                            ?>
                                            
                                            <option <?php echo isset($_POST['prop_city']) ? 'selected' : '' ?>><?php echo $city_name;?></option> 
                                            <?php }} ?>
                                        </select>
                                        <small id="emailHelp" class="form-text text-danger"><?php echo $cityErr ?></small> 
                                    </div>
                                
                                    
                                    <div class="form-group m-b-30">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">State</label>
                                        <select class="custom-select mr-sm-2" id="prop_state" name="prop_state" value=" <?php echo isset($_POST['prop_state']) ? $_POST['prop_state'] : '' ?>">
                                        <option selected value="">--Select State--</option>
                                        <?php               
                                            if($sql5->rowCount() > 0){
                                            foreach($wlvd5 as $rows5){
                                            $id = $rows5->id;
                                            $state_name = $rows5->state_name;
                                            ?>
                                            
                                            <option <?php echo (isset($_POST['prop_state']) && $_POST['prop_state'] === $state_name) ? 'selected' : '';  ?>><?php echo $state_name;?></option> 
                                            <?php }} ?>
                                        </select>
                                        <small id="emailHelp" class="form-text text-danger"><?php echo $stateErr ?></small> 
                                    </div>
                                    <div class="form-group m-b-30">
                                            <p id="demo"></p>
                                            <span onclick="getLocation()" style="cursor:pointer;"><i class="fa fa-map-marker"></i></span>
                                    </div>
                                    <div class="form-group m-b-30 row">
                                        <div class="col-md-6">
                                            <label for="latitude">Latitude</label>
                                            <input type="text" class="form-control" id="latitude" name="latitude" value="<?php echo isset($_POST['latitude']) ? $_POST['latitude'] : '' ?>">    
                                            <small id="emailHelp" class="form-text text-danger"><?php echo $latErr ?></small> 
                                        </div>
                                        <div class="col-md-6">
                                            <label for="longitude">Longitude</label>
                                            <input type="text" class="form-control" id="longitude" name="longitude" value="<?php echo isset($_POST['longitude']) ? $_POST['longitude'] : '' ?>">    
                                            <small id="emailHelp" class="form-text text-danger"><?php echo $longErr ?></small> 
                                        </div>
                                    </div>
                                    <div class="form-group m-b-30">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Location  </label>
                                        <select class="custom-select mr-sm-2" id="prop_location" name="prop_location" >
                                        <option selected value="">--Select Location--</option>
                                        <?php               
                                            if($sql1->rowCount() > 0){
                                            foreach($wlvd1 as $rows1){
                                            $id = $rows1->id;
                                            $location_name = $rows1->location_name;
                                            ?>
                                            <option <?php echo isset($_POST['prop_location']) ? $_POST['prop_location'] : '' ?>><?php echo $location_name;?></option> 
                                            <?php }} ?>
                                        </select>
                                        <small class="form-text text-danger"><?php echo $locationErr ?></small> 
                                    </div>
                                    <h4>Amentities</h4>
                                    <hr>
                                    <div class="box-body row">
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">No. of Bedrooms </label>
                                            <select class="custom-select mr-sm-2" id="prop_bedroom" name="prop_bedroom" >
                                                <option selected value="">--Select No of Bedrooms--</option>
                                                <option <?php echo (isset($_POST['prop_bedroom']) && $_POST['prop_bedroom'] === '1') ? 'selected' : ''; ?>>1 </option>
                                                <option <?php echo (isset($_POST['prop_bedroom']) && $_POST['prop_bedroom'] === '2') ? 'selected' : ''; ?>>2 </option>
                                                <option <?php echo (isset($_POST['prop_bedroom']) && $_POST['prop_bedroom'] === '3') ? 'selected' : ''; ?>>3 </option>
                                                <option <?php echo (isset($_POST['prop_bedroom']) && $_POST['prop_bedroom'] === '4') ? 'selected' : ''; ?>>4 </option>
                                                <option <?php echo (isset($_POST['prop_bedroom']) && $_POST['prop_bedroom'] === '5') ? 'selected' : ''; ?>>5</option>
                                                <option <?php echo (isset($_POST['prop_bedroom']) && $_POST['prop_bedroom'] === '6') ? 'selected' : ''; ?>>6</option>
                                                <option <?php echo (isset($_POST['prop_bedroom']) && $_POST['prop_bedroom'] === '7') ? 'selected' : ''; ?>>7 </option>
                                            </select>
                                        </div>  
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">No. of Bathrooms </label>
                                            <select class="custom-select mr-sm-2" id="prop_bathroom" name="prop_bathroom" >
                                            <option selected value="">--Select No of Bathrooms--</option>
                                                <option <?php echo (isset($_POST['prop_bathroom']) && $_POST['prop_bathroom'] === '1') ? 'selected' : ''; ?>>1 </option>
                                                <option <?php echo (isset($_POST['prop_bathroom']) && $_POST['prop_bathroom'] === '2') ? 'selected' : ''; ?>>2 </option>
                                                <option <?php echo (isset($_POST['prop_bathroom']) && $_POST['prop_bathroom'] === '3') ? 'selected' : ''; ?>>3 </option>
                                                <option <?php echo (isset($_POST['prop_bathroom']) && $_POST['prop_bathroom'] === '4') ? 'selected' : ''; ?>>4 </option>
                                                <option <?php echo (isset($_POST['prop_bathroom']) && $_POST['prop_bathroom'] === '5') ? 'selected' : ''; ?>>5</option>
                                                <option <?php echo (isset($_POST['prop_bathroom']) && $_POST['prop_bathroom'] === '6') ? 'selected' : ''; ?>>6</option>
                                                <option <?php echo (isset($_POST['prop_bathroom']) && $_POST['prop_bathroom'] === '7') ? 'selected' : ''; ?>>7 </option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="box-body row">
                                        <div class="col-md-6">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Pool</label>
                                            <select class="custom-select mr-sm-2" id="prop_pool" name="prop_pool" >
                                            <option selected value="">--Select Pool--</option>
                                                <option <?php echo (isset($_POST['prop_pool']) && $_POST['prop_pool'] === 'Yes') ? 'selected' : '';  ?>>Yes </option>
                                                <option <?php echo (isset($_POST['prop_pool']) && $_POST['prop_pool'] === 'No') ? 'selected' : '';  ?>>No </option> 
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">AC  </label>
                                            <select class="custom-select mr-sm-2" id="prop_ac" name="prop_ac" >
                                            <option selected value="">--Select AC--</option>
                                                <option <?php echo (isset($_POST['prop_ac']) && $_POST['prop_ac'] === 'Yes') ? 'selected' : '';  ?>>Yes </option>
                                                <option <?php echo (isset($_POST['prop_ac']) && $_POST['prop_ac'] === 'No') ? 'selected' : '';  ?>>No </option> 
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="box-body row">
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Balcony </label>
                                            <select class="custom-select mr-sm-2" id="prop_balcony" name="prop_balcony" >
                                            <option selected value="">--Select Balcony--</option>
                                                <option <?php echo (isset($_POST['prop_balcony']) && $_POST['prop_balcony'] === 'Yes') ? 'selected' : '';  ?>>Yes </option>
                                                <option <?php echo (isset($_POST['prop_balcony']) && $_POST['prop_balcony'] === 'No') ? 'selected' : '';  ?>>No </option> 
                                            </select>   
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Furnishing Type </label>
                                            <select class="custom-select mr-sm-2" id="prop_furnishing" name="prop_furnishing" >
                                            <option selected value="">--Select Furnishing Type--</option>
                                                <option <?php echo (isset($_POST['prop_furnishing']) && $_POST['prop_furnishing'] === 'Furnished') ? 'selected' : '';  ?>>Furnished</option>
                                                <option <?php echo (isset($_POST['prop_furnishing']) && $_POST['prop_furnishing'] === 'Unfurnished') ? 'selected' : '';  ?>>Unfurnished</option> 
                                            </select>   
                                        </div>
                                    </div>
                                    
                                    <div class="box-body row">
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Water Facilities</label>
                                            <select class="custom-select mr-sm-2" id="prop_water" name="prop_water" >
                                            <option selected value="">--Select Water facility--</option>
                                                <option <?php echo (isset($_POST['prop_water']) && $_POST['prop_water'] === 'Available') ? 'selected' : '';  ?>>Available</option>
                                                <option <?php echo (isset($_POST['prop_water']) && $_POST['prop_water'] === 'NA') ? 'selected' : '';  ?>>NA</option> 
                                            </select>   
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">D2h/Cable Connection  </label>
                                            <select class="custom-select mr-sm-2" id="prop_d2h" name="prop_d2h" >
                                            <option selected value="">--Select D2H/Cable Connection--</option>
                                                <option <?php echo (isset($_POST['prop_d2h']) && $_POST['prop_d2h'] === 'Yes') ? 'selected' : '';  ?>>Yes</option>
                                                <option <?php echo (isset($_POST['prop_d2h']) && $_POST['prop_d2h'] === 'No') ? 'selected' : '';  ?>>No </option> 
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="box-body row">
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Lift  </label>
                                            <select class="custom-select mr-sm-2" id="prop_lift" name="prop_lift" >
                                            <option selected value="">--Select Lift--</option>
                                                <option <?php echo (isset($_POST['prop_lift']) && $_POST['prop_lift'] === 'Yes') ? 'selected' : '';  ?>>Yes </option>
                                                <option <?php echo (isset($_POST['prop_lift']) && $_POST['prop_lift'] === 'No') ? 'selected' : '';  ?>>No </option> 
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Bedding  </label>
                                            <select class="custom-select mr-sm-2" id="prop_bedding" name="prop_bedding" >
                                            <option selected value="">--Select Bedding--</option>
                                                <option <?php echo (isset($_POST['prop_bedding']) && $_POST['prop_bedding'] === 'Yes') ? 'selected' : '';  ?>>Yes </option>
                                                <option <?php echo (isset($_POST['prop_bedding']) && $_POST['prop_bedding'] === 'No') ? 'selected' : '';  ?>>No </option> 
                                            </select>
                                        </div>
                                    </div>
                                    <div class="box-body row">
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Internet  </label>
                                            <select class="custom-select mr-sm-2" id="prop_internet" name="prop_internet" >
                                            <option selected value="">--Select Internet--</option>
                                                <option <?php echo (isset($_POST['prop_internet']) && $_POST['prop_internet'] === 'Yes') ? 'selected' : ''; ?>>Yes </option>
                                                <option <?php echo (isset($_POST['prop_internet']) && $_POST['prop_internet'] === 'No') ? 'selected' : ''; ?>>No </option> 
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="mr-sm-2" for="inlineFormCustomSelect">Parking  </label>
                                            <select class="custom-select mr-sm-2" id="prop_parking" name="prop_parking" >
                                            <option selected value="">--Select Parking--</option>
                                                <option <?php echo (isset($_POST['prop_parking']) && $_POST['prop_parking'] === 'Yes') ? 'selected' : '';?>>Yes </option>
                                                <option <?php echo (isset($_POST['prop_parking']) && $_POST['prop_parking'] === 'No') ? 'selected' : '';?>>No </option> 
                                            </select>
                                        </div>
                                    </div>                                                  
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label  for="exampleInputEmail1">Product Photo 1</label>
                                                <input name="photo1"  type="file" class="form-control-file" id="photo1" aria-describedby="emailHelp" multiple value="<?php echo $photo1 ?>" >
                                                <small id="emailHelp" class="form-text text-muted"></small> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label  for="exampleInputEmail1">Product Photo 2</label>
                                            <input name="photo2"  type="file" class="form-control-file" id="photo2" aria-describedby="emailHelp" multiple value="<?php echo $photo2 ?>" >
                                                <small id="emailHelp" class="form-text text-muted"></small> 
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label  for="exampleInputEmail1">Product Photo 3</label>
                                                <input name="photo3"  type="file" class="form-control-file" id="photo3" aria-describedby="emailHelp" multiple value="<?php echo $photo3 ?>" >
                                                <small id="emailHelp" class="form-text text-muted"></small> 
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label  for="exampleInputEmail1">Product Photo 4</label>
                                                <input name="photo4"  type="file" class="form-control-file" id="photo4" aria-describedby="emailHelp" multiple value="<?php echo $photo4 ?>" >
                                                <small id="emailHelp" class="form-text text-muted"></small> 
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label  for="exampleInputEmail1">Product Photo 5  (Optional)</label>
                                                <input name="photo5"  type="file" class="form-control-file" id="photo5" aria-describedby="emailHelp" multiple value="<?php echo $photo5 ?>" >
                                                <small id="emailHelp" class="form-text text-muted"></small> 
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box-body">
                                        <div class="form-group">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Category  </label>
                                        <select class="custom-select mr-sm-2" id="prop_category" name="prop_category" value="<?php echo isset($_POST['prop_category']) ? $_POST['prop_category'] : '' ?>">
                                        <option selected value="">--Select Category--</option>
                                            <option value="Commercial" >Commercial </option>
                                            <option value="Rental">Rental </option> 
                                        </select>
                                        <small id="emailHelp" class="form-text text-danger"><?php echo $categoryErr ?></small>
                                    </div>
                                    
                                <button type="submit"  name="submit12345" value="Submit" class="btn btn-primary">Submit</button>
                                </form>
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