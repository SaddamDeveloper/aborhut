<?php 
    include('include/header.php'); 
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL); 
?>
<?php
    $select  = "select * from `city` ORDER BY id DESC";
    $sql=$dbconn->prepare($select);
    $sql->execute();
    $data=$sql->fetchAll(PDO::FETCH_OBJ);
   
   
    $select1  = "select * from `location` ORDER BY id DESC";
    $sql1=$dbconn->prepare($select1);
    $sql1->execute();
    $data1=$sql1->fetchAll(PDO::FETCH_OBJ);

    $select2  = "select * from `property_type` ORDER BY id DESC";
    $sql2=$dbconn->prepare($select2);
    $sql2->execute();
    $data2=$sql2->fetchAll(PDO::FETCH_OBJ);


?>
<!-- Banner start -->
<div class="banner">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item item-100vh active">
                <img src="img/banner/banner-slider-1.jpg" alt="banner-slider-1">
                <div class="carousel-caption banner-slider-inner banner-tb text-left">
                    <div class="banner-content banner-content-left">
                        <!--banner-search was here-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner end -->

<!--banner serach-->
<div class="banner-search-box">
    <!-- Search area start -->
    <div class="search-area animated fadeInDown delay-1s">
        <div class="search-area-inner">
            <div class="search-contents ">
                <form action="index.php" method="post">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <select class="selectpicker search-fields" name="city" data-live-search="true" data-live-search-placeholder="Search value">
                                <option value="">City</option>
                                <?php 
                                if($sql->rowCount() > 0){
                                    foreach ($data as $row) {
                                        echo '<option>'.$row->city_name.'</option>';
                                    }
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <select class="selectpicker search-fields" name="location" data-live-search="true" data-live-search-placeholder="Search value">
                                <option value="">Location</option>
                                <?php 
                                if($sql1->rowCount() > 0){
                                    foreach ($data1 as $row) {
                                        echo '<option>'.$row->location_name.'</option>';
                                    }
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <select class="selectpicker search-fields" name="property_type" data-live-search="true" data-live-search-placeholder="Search value">
                                <option value="">Property Type</option>
                                <?php 
                                if($sql1->rowCount() > 0){
                                    foreach ($data2 as $row) {
                                        echo '<option>'.$row->property_type.'</option>';
                                    }
                                } 
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <select class="selectpicker search-fields" name="min_budget" data-live-search="true" data-live-search-placeholder="Search value">
                                <option value="">Min Budget</option>
                                <option>2000</option>
                                <option>3000</option>
                                <option>4000</option>
                                <option>5000</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <div class="form-group">
                            <select class="selectpicker search-fields" name="max_budget" data-live-search="true" data-live-search-placeholder="Search value" >
                                <option value="">Max Budget</option>
                                <option>10000</option>
                                <option>15000</option>
                                <option>20000</option>
                                <option>25000</option>
                                <option>30000</option>
                                <option>40000</option>
                                <option>50000</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                        <div class="form-group mb-0">
                            <button class="search-button" name="search" type="submit">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Search area start -->
</div>
<!--banner search-->

<!-- Properties section body start -->
<div class="properties-section-body content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-xs-12 col-lg-offset-1">
                <!-- Option bar start -->
                <!-- <div class="option-bar">
                    <div class="row">
                        <div class="col-lg-6 col-md-5 col-sm-5 col-xs-2">
                            <h4>
                                <span class="heading-icon">
                                    <i class="fa fa-th-list"></i>
                                </span>
                                <span class="hidden-xs">Properties List</span>
                            </h4>
                        </div>
                        <div class="col-lg-6 col-md-7 col-sm-7 col-xs-10 cod-pad">
                            <div class="sorting-options">
                                <select class="sorting">
                                    <option>New To Old</option>
                                    <option>Old To New</option>
                                    <option>Properties (High To Low)</option>
                                    <option>Properties (Low To High)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- Option bar end -->

                <div class="clearfix"></div>
                <?php
                $pagination = true;
                if(isset($_POST['search'])){
                    $pagination = false;
                    $city = $_POST['city'];
                    $location = $_POST['location'];
                    $type = $_POST['property_type'];
                    $min_budget = $_POST['min_budget'];
                    $max_budget = $_POST['max_budget'];

                    $query_flag = false;
                  
                    if(!empty($_GET['page']) > 0)
                        $page = $_GET['page'];
                    else
                        $page = 1;

                    $limit = ($page * 10) - 10;
                    $select13 = "select * from `property` WHERE";
                    
                    if(!empty($_POST['city'])){                                              
                        $select13  .= " prop_city LIKE '%$city%'";
                        $query_flag = true;  
                    }
                    if(!empty($_POST['location'])){                        
                        if ($query_flag) {                            
                            $select13  .= " AND prop_location LIKE '%$location%'";
                        } else {
                            $select13  .= " prop_location LIKE '%$location%'";
                        }                        
                        $query_flag = true;
                    }
                    if(!empty($type)){
                        if ($query_flag) {
                            $select13  .= " AND prop_type LIKE '%$type%'";
                        } else {
                            $select13  .= " prop_type LIKE '%$type%'";
                        }   
                        $query_flag = true;
                    }
                    if(!empty($min_budget)){
                        if ($query_flag) {
                            $select13  .= " AND prop_price >= '$min_budget'";
                        } else {
                            $select13  .= " prop_price >= '$min_budget'";
                        }  
                        $query_flag = true;
                    }
                    if(!empty($max_budget)){
                        if ($query_flag) {
                            $select13  .= " AND prop_price <= '$max_budget'";
                        } else {
                            $select13  .= " prop_price <= '$max_budget'";
                        } 
                        $query_flag = true;
                    }

                    $select13 .= " ORDER BY id DESC LIMIT $limit, 50";
                    $sql13=$dbconn->prepare($select13);
                    $sql13->execute();
                    $result=$sql13->fetchAll();
                }else{
                    if(!empty($_GET['page']) > 0)
                        $page = $_GET['page'];
                    else
                        $page = 1;
    
                    $limit = ($page * 10) - 10;
    
                    $pdo_statement = $dbconn->prepare("SELECT * FROM property WHERE prop_status='Approved' ORDER BY id DESC LIMIT $limit, 10");
                    $pdo_statement->execute();
                    $result = $pdo_statement->fetchAll();
                }

                if(!empty($result)) { 
                    foreach($result as $row) {
                        $id = $row['id'];
                        $statement = $dbconn->prepare("SELECT * FROM property_image WHERE property_id = $id");
                        $statement->execute();
                        $img_result = $statement->fetchAll();
                        // echo"<pre>";
                        // print_r($img_result[0]['image']);exit();
                ?>
                <!-- Property start -->
                <div class="property clearfix wow fadeInUp delay-03s">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-5 col-pad">
                        <!-- Property img -->
                        <div class="property-img">
                            <!-- <div class="property-tag button alt featured">Featured</div> -->
                            <div class="property-price">₹<?php echo $row['prop_price']; ?></div>
                            <img src="images/property/<?php echo $img_result[0]['image']; ?>" alt="fp-list" class="img-responsive hp-1">
                            <div class="property-overlay">
                                <div class="property-magnify-gallery">
                                    <a href="images/property/<?php echo $img_result[0]['image']; ?>" class="overlay-link">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                    <?php foreach($img_result as $im) {?>
                                    <a href="images/property/<?php echo $im['image']; ?>" class="hidden"></a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-3 col-xs-7 property-content " onclick="window.open('properties-details.php?p=<?php echo $row['id'] ?>', '_blank');">
                    <?php $id = $row['id']; ?>
                        <!-- title -->
                        <h1 class="title">
                            <a href="#!"><?php print $row['prop_name']; ?></a>
                        </h1>                        <!-- Facilities List -->
                        <ul class="facilities-list clearfix">
                            <li>
                                <p class="property_listing_features">Property Type</p>
                                <span class="mobile-lc-1"><?php print $row['prop_type']; ?></span>
                            </li>
                            <li class="hidden-mobile">
                                <p class="property_listing_features">Bathroom</p>
                                <span><?php print $row['prop_bathroom']; ?></span>
                            </li>
                            <li class="hidden-mobile">
                                <p class="property_listing_features">Property area</p>
                                <span><?php print $row['prop_area']; ?> sq ft.</span>
                            </li>
                            <li class="hidden-mobile">
                                <p class="property_listing_features">Bedroom</p>
                                <span><?php print $row['prop_bedroom']; ?></span>
                            </li>
                            <li>
                                <p class="property_listing_features">Location</p>
                                <span class="mobile-lc-1"><?php print $row['prop_location']; ?>, <?php print $row['prop_city']; ?></span>
                            </li>
                            <li class="visible-mobile more-li"><a class="more" href="properties-details.php?p=<?php echo $id ?>">more...</a></li>
                        </ul>
                        <!-- Property footer -->
                        <div class="property-footer">
                            <span class="left">
                                <a href="#">Posted by: <i class="fa fa-user"></i><?php echo $row['posted_by'] ?></a>
                                <span style="padding: 0 10px;">|</span>
                                <i class="fa fa-calendar"></i><?php echo date("m/d/Y",strtotime($row['created_at'])) ?>
                            </span>
                            <span class="right">
                                <a href="#!">View Detail</a>
                            </span>
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
                <!-- Page navigation start -->
                <?php if($pagination){?>
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <?php

                        $pdo_statement = $dbconn->prepare("SELECT * FROM property order by id desc");
                        $pdo_statement->execute();
                        $total = $pdo_statement->rowCount();

                        if($page > 1){

                            $prev = $page - 1;
                            print "<li><a href=\"index.php?page=$prev\" aria-label=\"Previous\"><span aria-hidden=\"true\">«</span></a></li>";
                        }

                        $no_page = ceil($total/10);

                        for($i = 1; $i <= $no_page; $i++){

                            if($page == $i)
                                print "<li class=\"active\"><a href=\"index.php?page=$i\">$i<span class=\"sr-only\">(current)</span></a></li>";
                            else
                                print "<li><a href=\"index.php?page=$i\">$i</a></li>";
                        }

                        if($page < $no_page){

                            $next = $page + 1;
                            print "<li><a href=\"index.php?page=$next\" aria-label=\"Next\"><span aria-hidden=\"true\">»</span></a></li>";
                        }
                        ?>
                    </ul>
                </nav>
                    <?php } ?>
                <!-- Page navigation end-->
            </div>
        </div>
    </div>
</div>
<!-- Properties section body end -->

<div class="clearfix"></div>

<!-- Intro section strat -->
<div class="intro-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-12">
                <img src="img/logos/logo-2.png" alt="logo-2">
            </div>
            <div class="col-md-7 col-sm-6 col-xs-12">
                <h3>Looking To Sell Or Rent Your Property?</h3>
            </div>
            <div class="col-md-2 col-sm-3 col-xs-12">
                <a href="list_your_property.php" class="btn button-md button-theme">Submit Now</a>
            </div>
        </div>
    </div>
</div>
<!-- Intro section end -->
<?php include('include/footer.php'); ?>