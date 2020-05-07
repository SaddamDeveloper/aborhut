<?php
include_once('customer-panel/configure.php');
DB::connect();
    if(isset($_GET['p']) && !empty($_GET['p'])){
        $id = $_GET['p'];
        $select  = "select * from `property` WHERE id = '$id' LIMIT 1";
        $sql=$dbconn->prepare($select);
        $sql->execute();
        $data=$sql->fetch(PDO::FETCH_OBJ);

        $select_carts = "SELECT product_id FROM `carts` where product_id='$id' ";
        $sql2=$dbconn->prepare($select_carts);
        $sql2->execute();
        $wlvd2=$sql2->fetchAll(PDO::FETCH_OBJ);
        if($sql2->rowCount() > 0){
         $addandcheckoutStatus = 0;
        }else{
         $addandcheckoutStatus = 1;
        }

        $select_check = "select orders.product_id, orders.status, orders.user_id, property.prop_landlord_id, property.prop_latitude, property.prop_longitude, landlord.landlord_phone from `orders`
            INNER JOIN property ON orders.product_id = property.id
            INNER JOIN landlord ON property.prop_landlord_id = landlord.id
            WHERE orders.product_id = '$id' LIMIT 1";
        $sql3=$dbconn->prepare($select_check);
        $sql3->execute();
        $data3=$sql3->fetch(PDO::FETCH_OBJ);
        // print_r($data3);exit();
    }
?>
<?php include_once('include/header.php'); ?>
<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="overlay">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Properties Detail</h1>
                <ul class="breadcrumbs">
                    <li><a href="./">Home</a></li>
                    <li class="active">Properties Detail</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Sub Banner end -->

<!-- Properties details page start -->
<div class="properties-details-page content-area">
    <div class="container">
        <div class="row mb-50">
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <!-- Header -->
                <div class="heading-properties clearfix sidebar-widget">
                    <div class="pull-left">
                        <h3><?php echo $data->prop_name ?></h3>
                        <p>
                            <i class="fa fa-map-marker"></i><?php echo $data->prop_location.", ". $data->prop_address ?>
                        </p>
                    </div>
                    <div class="pull-right">
                        <h3><span>₹<?php echo $data->prop_price ?></span></h3>
                        <h5>
                            Per Month
                        </h5>
                    </div>
                </div>
                <!-- Properties details section start -->
                <div class="sidebar-widget mb-40">
                    <!-- Properties detail slider start -->
                    <div class="properties-detail-slider simple-slider mb-40">
                        <div id="carousel-custom" class="carousel slide" data-ride="carousel">
                            <div class="carousel-outer">
                                <!-- Wrapper for slides -->
                                <div class="carousel-inner">
                                    <div class="item">
                                        <img src="images/property/<?php echo $data->prop_image1 ?>" class="thumb-preview" alt="Chevrolet Impala">
                                    </div>
                                    <div class="item">
                                        <img src="images/property/<?php echo $data->prop_image2 ?>" class="thumb-preview" alt="Chevrolet Impala">
                                    </div>
                                    <div class="item">
                                        <img src="images/property/<?php echo $data->prop_image3 ?>" class="thumb-preview" alt="Chevrolet Impala">
                                    </div>
                                    <div class="item">
                                        <img src="images/property/<?php echo $data->prop_image4 ?>" class="thumb-preview" alt="Chevrolet Impala">
                                    </div>
                                    <div class="item">
                                        <img src="images/property/<?php echo $data->prop_image5 ?>" class="thumb-preview" alt="Chevrolet Impala">
                                    </div>
                                    <div class="item">
                                        <img src="img/properties/properties-7.jpg" class="thumb-preview" alt="Chevrolet Impala">
                                    </div>
                                    <div class="item">
                                        <img src="img/properties/properties-8.jpg" class="thumb-preview" alt="Chevrolet Impala">
                                    </div>
                                    <div class="item">
                                        <img src="img/properties/properties-5.jpg" class="thumb-preview" alt="Chevrolet Impala">
                                    </div>
                                    <div class="item">
                                        <img src="img/properties/properties-3.jpg" class="thumb-preview" alt="Chevrolet Impala">
                                    </div>
                                    <div class="item">
                                        <img src="img/properties/properties-6.jpg" class="thumb-preview" alt="Chevrolet Impala">
                                    </div>
                                    <div class="item">
                                        <img src="img/properties/properties-1.jpg" class="thumb-preview" alt="Chevrolet Impala">
                                    </div>
                                    <div class="item active">
                                        <img src="img/properties/properties-2.jpg" class="thumb-preview" alt="Chevrolet Impala">
                                    </div>
                                </div>
                                <!-- Controls -->
                                <a class="left carousel-control" href="#carousel-custom" role="button" data-slide="prev">
                                    <span class="slider-mover-left no-bg t-slider-r pojison" aria-hidden="true">
                                        <i class="fa fa-angle-left"></i>
                                    </span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="right carousel-control" href="#carousel-custom" role="button" data-slide="next">
                                    <span class="slider-mover-right no-bg t-slider-l pojison" aria-hidden="true">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <!-- Indicators -->
                            <ol class="carousel-indicators thumbs visible-lg visible-md">
                                <li data-target="#carousel-custom" data-slide-to="0" class=""><img src="images/property/<?php echo $data->prop_image1 ?>" alt="Chevrolet Impala"></li>
                                <li data-target="#carousel-custom" data-slide-to="1" class=""><img src="img/properties/properties-small-3.jpg" alt="Chevrolet Impala"></li>
                                <li data-target="#carousel-custom" data-slide-to="2" class=""><img src="img/properties/properties-small-4.jpg" alt="Chevrolet Impala"></li>
                                <li data-target="#carousel-custom" data-slide-to="3" class=""><img src="img/properties/properties-small-5.jpg" alt="Chevrolet Impala"></li>
                                <li data-target="#carousel-custom" data-slide-to="4" class=""><img src="img/properties/properties-small-6.jpg" alt="Chevrolet Impala"></li>
                                <li data-target="#carousel-custom" data-slide-to="5" class=""><img src="img/properties/properties-small-7.jpg" alt="Chevrolet Impala"></li>
                                <li data-target="#carousel-custom" data-slide-to="6" class=""><img src="img/properties/properties-small-8.jpg" alt="Chevrolet Impala"></li>
                                <li data-target="#carousel-custom" data-slide-to="7" class=""><img src="img/properties/properties-small-2.jpg" alt="Chevrolet Impala"></li>
                                <li data-target="#carousel-custom" data-slide-to="8" class=""><img src="img/properties/properties-small-4.jpg" alt="Chevrolet Impala"></li>
                                <li data-target="#carousel-custom" data-slide-to="9" class=""><img src="img/properties/properties-small-1.jpg" alt="Chevrolet Impala"></li>
                                <li data-target="#carousel-custom" data-slide-to="10" class=""><img src="img/properties/properties-small-2.jpg" alt="Chevrolet Impala"></li>
                                <li data-target="#carousel-custom" data-slide-to="11" class=""><img src="img/properties/properties-small-6.jpg" alt="Chevrolet Impala"></li>
                            </ol>
                        </div>
                    </div>
                    <!-- Properties detail slider end -->

                    <!-- Properties description start -->
                    <div class="properties-description mb-40 ">
                        <div class="main-title-2">
                            <h1><span>Description</span></h1>
                        </div>
                        <table class="property_detail_table">
                            <tbody>
                                <tr>
                                    <th>Lift</th>
                                    <td><?php echo $data->prop_lift == 'Yes' ? 'Available' : 'NA' ?></td>
                                </tr>
                                <tr>
                                    <th>Car Parking</th>
                                    <td><?php echo $data->prop_parking == 'Yes' ? 'Yes' : 'No' ?></td>
                                </tr>
                                <tr>
                                    <th>Electricity Back-Up</th>
                                    <td><?php //echo $data['prop_lift'] == 'Yes' ? 'Yes' : 'No' ?></td>
                                </tr>
                                <tr>
                                    <th>Furnishing Type</th>
                                    <td><?php echo $data->prop_furnishing ?></td>
                                </tr>
                                <tr>
                                    <th>Balcony</th>
                                    <td><?php echo $data->prop_balcony == 'Yes' ? 'Yes' : 'No' ?></td>
                                </tr>
                                <tr>
                                    <th>Water Facility</th>
                                    <td><?php echo $data->prop_water ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- Properties description end -->

                </div>
                <!-- Properties details section end -->
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <!-- Sidebar start -->
                <div class="sidebar right">
                    <!-- Search contents sidebar start -->
                    <div class="sidebar-widget hidden-sm hidden-xs">
                        <div class="main-title-2">
                            <h1><span>Property</span> Search</h1>
                        </div>

                        <form action="index.php" method="GET">
                        <div class="form-group">
                            <select class="selectpicker search-fields" name="property-status" data-live-search="true" data-live-search-placeholder="Search value">
                                <option>City</option>
                                <option>For Sale</option>
                                <option>For Rent</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <select class="selectpicker search-fields" name="location" data-live-search="true" data-live-search-placeholder="Search value">
                                <option>Location</option>
                                <option>United States</option>
                                <option>United Kingdom</option>
                                <option>American Samoa</option>
                                <option>Belgium</option>
                                <option>Cameroon</option>
                                <option>Canada</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <select class="selectpicker search-fields" name="property-types" data-live-search="true" data-live-search-placeholder="Search value" >
                                <option>Property Type</option>
                                <option>Residential</option>
                                <option>Commercial</option>
                                <option>Land</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="bedrooms">
                                        <option>Min Budget</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="bathroom">
                                        <option>Max budget</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-0">
                            <button class="search-button">Search</button>
                        </div>
                    </form>
                    </div>
                    <!-- Search contents sidebar end -->

                    <!-- Social media start -->
                    <div class="social-media" style="border: 15px solid #fff;">
                    <?php
                        $latitude = $data3->prop_latitude;
                        $longitude = $data3->prop_longitude;
                        if($data3->user_id == $_SESSION['id']){
                            if($data3->product_id){
                                if($data3->status == 2){ 

                    ?>
                           <iframe src = 'https://maps.google.com/maps?q=<?php echo $latitude ?>,<?php echo $longitude ?>&hl=es;z=14&amp;output=embed' width="100%" height="400" frameborder="0" style="border:0" allowfullscreen></iframe>
                            <div class="book-now">
                                <a href="tel:<?php echo $data3->chk_bill_phone ?>">+91-<?php echo $data3->landlord_phone ?></a>
                            </div>
                    <?php
                                }
                            }else{
                                ?>
                                <img src="img/map-blur.jpg" alt="property location map" title="Book Now To Unlock Map Location">
                            <div class="book-now">
                                <a href="<?php if($addandcheckoutStatus==1){ echo 'addToCart.php?pid='.base64_encode($_GET['p']); }else{ echo '#'; } ?>">Book Now</a>
                            </div>
                                <?php
                            }
                        }
                     else{
                    ?>
                            <img src="img/map-blur.jpg" alt="property location map" title="Book Now To Unlock Map Location">
                            <div class="book-now">
                                <a href="<?php if($addandcheckoutStatus==1){ echo 'addToCart.php?pid='.base64_encode($_GET['p']); }else{ echo '#'; } ?>">Book Now</a>
                            </div>
                    <?php
                    }
                    ?>
                    </div>
                </div>
                <!-- Sidebar end -->
            </div>
        </div>
        

        <div class="main-title-2">
            <h1><span>Related Properties</span></h1>
        </div>
        <div class="row">
				<?php
					$stmt = $dbconn->prepare("SELECT * FROM property ORDER BY id DESC LIMIT 4");
					$stmt->execute();
					$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);

				  if(!empty($result)) { 
					  foreach($stmt->fetchAll() as $k=>$v) {
				?>
            <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                <!-- Property 2 start -->
                <div class="property-2">
                    <!-- Property img -->
                    <div class="property-img">
                        <div class="featured">
                            Featured
                        </div>
                        <div class="price-ratings">
                            <div class="price">$<?php echo $v['prop_price'] ?></div>
                            <div class="ratings">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                        </div>
                        <img src="images/property/<?php echo $v['prop_image1'] ?>" alt="rp" class="img-responsive">
                        <div class="property-overlay">
                            <a href="properties-details.php?p=<?php echo $v['id'] ?>" class="overlay-link">
                                <i class="fa fa-link"></i>
                            </a>
                            <div class="property-magnify-gallery">
                                <a href="img/properties/properties-4.jpg" class="overlay-link">
                                    <i class="fa fa-expand"></i>
                                </a>
                                <a href="img/properties/properties-2.jpg" class="hidden"></a>
                                <a href="img/properties/properties-3.jpg" class="hidden"></a>
                            </div>
                        </div>
                    </div>
                    <!-- content -->
                    <div class="content">
                        <!-- title -->
                        <h4 class="title">
                            <a href="properties-details.php"><?php echo $v['prop_name']; ?></a>
                        </h4>
                        <!-- Property address -->
                        <h3 class="property-address">
                            <a href="properties-details.php?p=<?php echo $v['id']; ?>">
                                <i class="fa fa-map-marker"></i><?php echo $v['prop_address'] ?>
                            </a>
                        </h3>
                    </div>
                    <!-- Facilities List -->
                    <ul class="facilities-list clearfix">
                        <li>
                            <i class="flaticon-square-layouting-with-black-square-in-east-area"></i>
                            <span><?php echo $v['prop_area'] ?></span>
                        </li>
                        <li>
                            <i class="flaticon-bed"></i>
                            <span><?php echo $v['prop_bedroom'] ?></span>
                        </li>
                        <li>
                            <i class="flaticon-holidays"></i>
                            <span><?php echo $v['prop_bathroom'] ?></span>
                        </li>
                        <li>
                            <i class="flaticon-vehicle"></i>
                            <span><?php echo $v['prop_parking'] ?></span>
                        </li>
                    </ul>
                </div>
                <!-- Property 2 end -->
            </div>
				  <?php 
                  }
                  }
                  ?>
            </div>
        </div>
    </div>
</div>
<!-- Properties details page end -->
<?php
// }else{
//     echo "
//     <div class='properties-details-page content-area'>
//     <div class='container'>
//         <center><h2>NOT FOUND!!!</h2></center>
//     </div>
//     </div>
//     ";
// }
?>
<?php include_once('include/footer.php'); ?>