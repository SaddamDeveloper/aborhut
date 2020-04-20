<?php 
ob_start();
include('configure.php');
DB::connect();
// require_once("check.php");

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
    $prop_bedding = $_POST['prop_bedding'];
    $prop_internet = $_POST['prop_internet'];
    $prop_parking = $_POST['prop_parking'];
    $prop_pool = $_POST['prop_pool']; 
    $prop_status = $_POST['prop_status'];
   
    $prop_visit_price = $_POST['prop_visit_price']; 
    $prop_bedroom = $_POST['prop_bedroom'];
    $prop_bathroom = $_POST['prop_bathroom'];
    $prop_category = $_POST['prop_category'];


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
 

    $update_user = "UPDATE `property` SET
    $sql1 $sql2 $sql3 $sql4 $sql5
    prop_name   = '".addslashes($prop_name)."',
    prop_status   = '".addslashes($prop_status)."',
    prop_price   = '".addslashes($prop_price)."',
    prop_address   = '".addslashes($prop_address)."',
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
 
    prop_visit_price   = '".addslashes($prop_visit_price)."',
    prop_pool   = '".addslashes($prop_pool)."'
    
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
 $image1= $rows->prop_image1;
 $image2= $rows->prop_image2;
 $image3= $rows->prop_image3;
 $image4= $rows->prop_image4;
 $image5= $rows->prop_image5;
}

if($id !=''){ 
 $select_bookings1= "SELECT * FROM `property_type` WHERE id = '".$_REQUEST['id']."'";
 $sql11=$dbconn->prepare($select_bookings1);
 $sql11->execute();
 $wlvd1=$sql11->fetchAll(PDO::FETCH_OBJ);
 foreach($wlvd1 as $rows1);
}
 
 if($id !=''){
 $select_bookings2= "SELECT * FROM `city` WHERE id = '".$_REQUEST['id']."'";
 $sql12=$dbconn->prepare($select_bookings2);
 $sql12->execute();
 $wlvd2=$sql12->fetchAll(PDO::FETCH_OBJ);
 foreach($wlvd2 as $rows2);
 }

 if($id !=''){
 $select_bookings3= "SELECT * FROM `state` WHERE id = '".$_REQUEST['id']."'";
 $sql13=$dbconn->prepare($select_bookings3);
 $sql13->execute();
 $wlvd3=$sql13->fetchAll(PDO::FETCH_OBJ);
 foreach($wlvd3 as $rows3);
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
                                
                               
                          <form id="formID" class="m-t-30" method="post" action="" enctype="multipart/form-data" > 
                                     
                                    
                                    
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Name</label>
                                        <input name="prop_name" required=''   type="text" class="form-control" id="prop_name" aria-describedby="emailHelp" value=" <?php echo $rows->prop_name; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div> 
                                    
                                    <div class="form-group">
                                        <col>
                                        <label  for="exampleInputEmail1">Property Type </label>
                                        <input name="prop_type" required=''   type="text" class="form-control" id="prop_type" aria-describedby="emailHelp" value=" <?php echo $rows->prop_type; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                 
                                    
                                    
                                    
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Price</label>
                                        <input name="prop_price" required=''   type="text" class="form-control" id="prop_price" aria-describedby="emailHelp" value=" <?php echo $rows->prop_price; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                              
                                    
                                    <div class="form-group">
                                        <label  for="exampleInputEmail1">Visit Charge</label>
                                        <input name="prop_visit_price" required=''   type="text" class="form-control" id="prop_visit_price" aria-describedby="emailHelp" value=" <?php echo $rows->prop_visit_price; ?>" >
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
                                        <col>
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

                                    <div class="form-group">
                                        <col>
                                        <label  for="exampleInputEmail1">location</label>
                                        <input name="prop_location" required=''   type="text" class="form-control" id="prop_location" aria-describedby="emailHelp" value=" <?php echo $rows->prop_location; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                    
                                    <label>Amentities</label>
                                    
                                    
                                                                       <div class="box-body">
                                     
                                    
                                    
                                     <div class="form-group">
                                        <col>
                                        <label  for="exampleInputEmail1">No. of Bedrooms</label>
                                        <input name="prop_bedroom" required=''   type="text" class="form-control" id="prop_bedroom" aria-describedby="emailHelp" value=" <?php echo $rows->prop_bedroom; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                    
 
                                    
                                     <div class="form-group">
                                        <col>
                                        <label  for="exampleInputEmail1">No. of Balcony </label>
                                        <input name="prop_balcony" required=''   type="text" class="form-control" id="prop_balcony" aria-describedby="emailHelp" value=" <?php echo $rows->prop_balcony; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                    </div>
                                    
                                    
                                    <div class="form-group">
                                        <col>
                                        <label  for="exampleInputEmail1"> D2h/Cable Connection </label>
                                        <input name="prop_d2h" required=''   type="text" class="form-control" id="prop_d2h" aria-describedby="emailHelp" value=" <?php echo $rows->prop_d2h; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                     
                                    <div class="form-group">
                                        <col>
                                        <label  for="exampleInputEmail1">Lift </label>
                                        <input name="prop_lift" required=''   type="text" class="form-control" id="prop_lift" aria-describedby="emailHelp" value=" <?php echo $rows->prop_lift; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                    
                                    <div class="form-group">
                                        <col>
                                        <label  for="exampleInputEmail1">Bedding </label>
                                        <input name="prop_bedding" required=''   type="text" class="form-control" id="prop_bedding" aria-describedby="emailHelp" value=" <?php echo $rows->prop_bedding; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                    
                                    <div class="form-group">
                                        <col>
                                        <label  for="exampleInputEmail1">Internet </label>
                                        <input name="prop_internet" required=''   type="text" class="form-control" id="prop_internet" aria-describedby="emailHelp" value=" <?php echo $rows->prop_internet; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                    
                                    <div class="form-group">
                                        <col>
                                        <label  for="exampleInputEmail1">Parking</label>
                                        <input name="prop_parking" required=''   type="text" class="form-control" id="prop_parking" aria-describedby="emailHelp" value=" <?php echo $rows->prop_parking; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                    
                                    <div class="form-group">
                                        <col>
                                        <label  for="exampleInputEmail1">Pool</label>
                                        <input name="prop_pool" required=''   type="text" class="form-control" id="prop_pool" aria-describedby="emailHelp" value=" <?php echo $rows->prop_pool; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
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
                                        <col>
                                        <label  for="exampleInputEmail1">Category</label>
                                        <input name="prop_category" required=''   type="text" class="form-control" id="prop_category" aria-describedby="emailHelp" value=" <?php echo $rows->prop_category; ?>" >
                                        <small id="emailHelp" class="form-text text-muted"></small> 
                                    </div>
                                    
                                    
                                    <div class="form-group m-b-30">
                                        <label class="mr-sm-2" for="inlineFormCustomSelect">Status  </label>
                                        <select class="custom-select mr-sm-2" id="prop_status" name="prop_status" >
                                        <option selected>Choose...</option>
                                        
                                         
                                            <option value="Approved">Approved </option>
                                            <option value="Reject">Reject </option> 
                                            <option value="Pending">Pending </option>
                                           
                                        </select>
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