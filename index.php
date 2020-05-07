<?php 
include_once('customer-panel/configure.php');
DB::connect();

?>

<?php include('include/header.php'); ?>
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
                        <div class="banner-search-box">
                            <!-- Search area start -->
                            <div class="search-area animated fadeInDown delay-1s">
                                <div class="search-area-inner">
                                    <div class="search-contents ">
                                        <form action="index.php" method="post">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields" name="city" data-live-search="true" data-live-search-placeholder="Search value">
                                                        <option>City</option>
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
                                                        <option>Location</option>
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
                                                    <select class="selectpicker search-fields" name="location" data-live-search="true" data-live-search-placeholder="Search value">
                                                        <option>Property Type</option>
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
                                                    <select class="selectpicker search-fields" name="property-types" data-live-search="true" data-live-search-placeholder="Search value">
                                                        <option>Min Budget</option>
                                                        <option>2000</option>
                                                        <option>3000</option>
                                                        <option>4000</option>
                                                        <option>5000</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields" name="bedrooms" data-live-search="true" data-live-search-placeholder="Search value" >
                                                        <option>Max Budget</option>
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
                                                    <button class="search-button">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Search area start -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner end -->

<!-- Search area start -->
<!-- <div class="search-area hidden-lg hidden-md">
    <div class="container">
        <div class="search-area-inner">
            <div class="search-contents ">
                <form method="GET">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="area-from" data-live-search="true" data-live-search-placeholder="Search value">
                                    <option>Area From</option>
                                    <option>1000</option>
                                    <option>800</option>
                                    <option>600</option>
                                    <option>400</option>
                                    <option>200</option>
                                    <option>100</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="property-status" data-live-search="true" data-live-search-placeholder="Search value">
                                    <option>Property Status</option>
                                    <option>For Sale</option>
                                    <option>For Rent</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
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
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="property-types" data-live-search="true" data-live-search-placeholder="Search value">
                                    <option>Property Types</option>
                                    <option>Residential</option>
                                    <option>Commercial</option>
                                    <option>Land</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="bedrooms" data-live-search="true" data-live-search-placeholder="Search value" >
                                    <option>Bedrooms</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <select class="selectpicker search-fields" name="bathrooms" data-live-search="true" data-live-search-placeholder="Search value" >
                                    <option>Bathrooms</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                            <div class="form-group">
                                <div class="range-slider">
                                    <div data-min="0" data-max="150000" data-unit="USD" data-min-name="min_price" data-max-name="max_price" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 ">
                            <div class="form-group">
                                <button class="search-button">Search</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->
<!-- Search area start -->

<!-- Properties section body start -->
<div class="properties-section-body content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 col-md-10 col-xs-12 col-lg-offset-1">
                <!-- Option bar start -->
                <div class="option-bar">
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
                </div>
                <!-- Option bar end -->

                <div class="clearfix"></div>
                <?php

                if(!empty($_GET['page']) > 0)
                    $page = $_GET['page'];
                else
                    $page = 1;

                $limit = ($page * 10) - 10;

                $pdo_statement = $dbconn->prepare("SELECT * FROM property order by id desc LIMIT $limit, 10");
                $pdo_statement->execute();
                $result = $pdo_statement->fetchAll();

                if(!empty($result)) { 
                    foreach($result as $row) {
                ?>
                <!-- Property start -->
                <div class="property clearfix wow fadeInUp delay-03s">
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12 col-pad">
                        <!-- Property img -->
                        <div class="property-img">
                            <!-- <div class="property-tag button alt featured">Featured</div> -->
                            <div class="property-tag button sale">For Sale</div>
                            <div class="property-price">₹<?php echo $row['prop_price']; ?></div>
                            <img src="images/property/<?php echo $row['prop_image1']; ?>" alt="fp-list" class="img-responsive hp-1">
                            <div class="property-overlay">
                                <div class="property-magnify-gallery">
                                    <a href="images/property/<?php echo $row['prop_image1']; ?>" class="overlay-link">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                    <a href="images/property/<?php echo $row['prop_image2']; ?>" class="hidden"></a>
                                    <a href="images/property/<?php echo $row['prop_image3']; ?>" class="hidden"></a>
                                    <a href="images/property/<?php echo $row['prop_image4']; ?>" class="hidden"></a>
                                    <a href="images/property/<?php echo $row['prop_image5']; ?>" class="hidden"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-9 col-sm-3 col-xs-12 property-content ">
                    <?php $id = $row['id']; ?>
                        <!-- title -->
                        <h1 class="title">
                            <a href="properties-details.php?p=<?php echo $id ?>"><?php print $row['prop_name']; ?></a>
                        </h1>                        <!-- Facilities List -->
                        <ul class="facilities-list clearfix">
                            <li>
                                <p class="property_listing_features">Property Type</p>
                                <span><?php print $row['prop_type']; ?></span>
                            </li>
                            <li>
                                <p class="property_listing_features">Bathroom</p>
                                <span><?php print $row['prop_bathroom']; ?></span>
                            </li>
                            <li>
                                <p class="property_listing_features">Property area</p>
                                <span><?php print $row['prop_area']; ?></span>
                            </li>
                            <li>
                                <p class="property_listing_features">Bedroom</p>
                                <span><?php print $row['prop_bedroom']; ?></span>
                            </li>
                            <li>
                                <p class="property_listing_features">Location</p>
                                <span><?php print $row['prop_location']; ?>, <?php print $row['prop_city']; ?></span>
                            </li>
                        </ul>
                        <!-- Property footer -->
                        <div class="property-footer">
                            <!-- <span class="left">
                                <a href="#">Posted by: <i class="fa fa-user"></i>Narayan</a>
                            </span> -->
                            <!-- <span class="right">
                                <i class="fa fa-calendar"></i>21/03/20
                            </span> -->
                        </div>
                    </div>
                </div>
                <?php
                    }
                }
                ?>
                <!-- Page navigation start -->
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