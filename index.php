<?php include('include/header.php'); ?>
<!-- Banner start -->
<div class="banner">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">
            <div class="item item-100vh active">
                <img src="img/banner/banner-slider-1.jpg" alt="banner-slider-1">
                <div class="carousel-caption banner-slider-inner banner-tb text-left">
                    <div class="banner-content banner-content-left">
                        <div class="text-center hidden-md hidden-lg">
                            <h1 data-animation="animated fadeInDown delay-05s"><span>Find your </span> Dream House</h1>
                            <p data-animation="animated fadeInUp delay-1s">Lorem ipsum dolor sit amet, conconsectetuer adipiscing elit Lorem ipsum dolor sit amet, conconsectetuer</p>
                            <a href="#" class="btn button-md button-theme" data-animation="animated fadeInUp delay-15s">Get Started Now</a>
                            <a href="#" class="btn button-md border-button-theme" data-animation="animated fadeInUp delay-15s">Learn More</a>
                        </div>

                        <div class="banner-search-box hidden-xs hidden-sm">
                            <!-- Search area start -->
                            <div class="search-area animated fadeInDown delay-1s">
                                <div class="search-area-inner">
                                    <div class="search-contents ">
                                        <form action="properties-list.php" method="post">
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields" name="area-from" data-live-search="true" data-live-search-placeholder="Search value">
                                                        <option>City</option>
                                                        <option>1000</option>
                                                        <option>800</option>
                                                        <option>600</option>
                                                        <option>400</option>
                                                        <option>200</option>
                                                        <option>100</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields" name="property-status" data-live-search="true" data-live-search-placeholder="Search value">
                                                        <option>Location</option>
                                                        <option>For Sale</option>
                                                        <option>For Rent</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields" name="location" data-live-search="true" data-live-search-placeholder="Search value">
                                                        <option>Property Type</option>
                                                        <option>United States</option>
                                                        <option>United Kingdom</option>
                                                        <option>American Samoa</option>
                                                        <option>Belgium</option>
                                                        <option>Cameroon</option>
                                                        <option>Canada</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields" name="property-types" data-live-search="true" data-live-search-placeholder="Search value">
                                                        <option>Min Budget</option>
                                                        <option>Residential</option>
                                                        <option>Commercial</option>
                                                        <option>Land</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                                <div class="form-group">
                                                    <select class="selectpicker search-fields" name="bedrooms" data-live-search="true" data-live-search-placeholder="Search value" >
                                                        <option>Max Budget</option>
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
<div class="search-area hidden-lg hidden-md">
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
</div>
<!-- Search area start -->

<!-- Properties section body start -->
<div class="properties-section-body content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8 col-xs-12">
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
                <!-- Property start -->
                <div class="property clearfix wow fadeInUp delay-03s">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-pad">
                        <!-- Property img -->
                        <div class="property-img">
                            <div class="property-tag button alt featured">Featured</div>
                            <div class="property-tag button sale">For Sale</div>
                            <div class="property-price">$150,000</div>
                            <img src="img/properties/properties-list-1.jpg" alt="fp-list" class="img-responsive hp-1">
                            <div class="property-overlay">
                                <div class="property-magnify-gallery">
                                    <a href="img/properties/properties-1.jpg" class="overlay-link">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                    <a href="img/properties/properties-2.jpg" class="hidden"></a>
                                    <a href="img/properties/properties-3.jpg" class="hidden"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 property-content ">
                        <!-- title -->
                        <h1 class="title">
                            <a href="properties-details.php">2 BHK House for rent in Gandhi Basti 1200 sqft</a>
                        </h1>                        <!-- Facilities List -->
                        <ul class="facilities-list clearfix">
                            <li>
                                <p class="property_listing_features">Property ID</p>
                                <span>4800 sq ft</span>
                            </li>
                            <li>
                                <p class="property_listing_features">Bathroom</p>
                                <span>4800 sq ft</span>
                            </li>
                            <li>
                                <p class="property_listing_features">Built-up area</p>
                                <span>4800 sq ft</span>
                            </li>
                            <li>
                                <p class="property_listing_features">Carpet area</p>
                                <span>4800 sq ft</span>
                            </li>
                            <li>
                                <p class="property_listing_features">Availability</p>
                                <span>4800 sq ft</span>
                            </li>
                        </ul>
                        <!-- Property footer -->
                        <div class="property-footer">
                            <span class="left">
                                <a href="#">Posted by: <i class="fa fa-user"></i>Narayan</a>
                            </span>
                            <span class="right">
                                <i class="fa fa-calendar"></i>5 Days ago
                            </span>
                        </div>
                    </div>
                </div>
                <div class="property clearfix wow fadeInUp delay-03s">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-pad">
                        <!-- Property img -->
                        <div class="property-img">
                            <div class="property-tag button alt featured">Featured</div>
                            <div class="property-tag button sale">For Sale</div>
                            <div class="property-price">$150,000</div>
                            <img src="img/properties/properties-list-1.jpg" alt="fp-list" class="img-responsive hp-1">
                            <div class="property-overlay">
                                <div class="property-magnify-gallery">
                                    <a href="img/properties/properties-1.jpg" class="overlay-link">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                    <a href="img/properties/properties-2.jpg" class="hidden"></a>
                                    <a href="img/properties/properties-3.jpg" class="hidden"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 property-content ">
                        <!-- title -->
                        <h1 class="title">
                            <a href="properties-details.php">2 BHK House for rent in Gandhi Basti 1200 sqft</a>
                        </h1>                        <!-- Facilities List -->
                        <ul class="facilities-list clearfix">
                            <li>
                                <p class="property_listing_features">Property ID</p>
                                <span>4800 sq ft</span>
                            </li>
                            <li>
                                <p class="property_listing_features">Bathroom</p>
                                <span>4800 sq ft</span>
                            </li>
                            <li>
                                <p class="property_listing_features">Built-up area</p>
                                <span>4800 sq ft</span>
                            </li>
                            <li>
                                <p class="property_listing_features">Carpet area</p>
                                <span>4800 sq ft</span>
                            </li>
                            <li>
                                <p class="property_listing_features">Availability</p>
                                <span>4800 sq ft</span>
                            </li>
                        </ul>
                        <!-- Property footer -->
                        <div class="property-footer">
                            <span class="left">
                                <a href="#">Posted by: <i class="fa fa-user"></i>Narayan</a>
                            </span>
                            <span class="right">
                                <i class="fa fa-calendar"></i>5 Days ago
                            </span>
                        </div>
                    </div>
                </div>
                <div class="property clearfix wow fadeInUp delay-03s">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-pad">
                        <!-- Property img -->
                        <div class="property-img">
                            <div class="property-tag button alt featured">Featured</div>
                            <div class="property-tag button sale">For Sale</div>
                            <div class="property-price">$150,000</div>
                            <img src="img/properties/properties-list-1.jpg" alt="fp-list" class="img-responsive hp-1">
                            <div class="property-overlay">
                                <div class="property-magnify-gallery">
                                    <a href="img/properties/properties-1.jpg" class="overlay-link">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                    <a href="img/properties/properties-2.jpg" class="hidden"></a>
                                    <a href="img/properties/properties-3.jpg" class="hidden"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 property-content ">
                        <!-- title -->
                        <h1 class="title">
                            <a href="properties-details.php">2 BHK House for rent in Gandhi Basti 1200 sqft</a>
                        </h1>                        <!-- Facilities List -->
                        <ul class="facilities-list clearfix">
                            <li>
                                <p class="property_listing_features">Property ID</p>
                                <span>4800 sq ft</span>
                            </li>
                            <li>
                                <p class="property_listing_features">Bathroom</p>
                                <span>4800 sq ft</span>
                            </li>
                            <li>
                                <p class="property_listing_features">Built-up area</p>
                                <span>4800 sq ft</span>
                            </li>
                            <li>
                                <p class="property_listing_features">Carpet area</p>
                                <span>4800 sq ft</span>
                            </li>
                            <li>
                                <p class="property_listing_features">Availability</p>
                                <span>4800 sq ft</span>
                            </li>
                        </ul>
                        <!-- Property footer -->
                        <div class="property-footer">
                            <span class="left">
                                <a href="#">Posted by: <i class="fa fa-user"></i>Narayan</a>
                            </span>
                            <span class="right">
                                <i class="fa fa-calendar"></i>5 Days ago
                            </span>
                        </div>
                    </div>
                </div>
                <div class="property clearfix wow fadeInUp delay-03s">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 col-pad">
                        <!-- Property img -->
                        <div class="property-img">
                            <div class="property-tag button alt featured">Featured</div>
                            <div class="property-tag button sale">For Sale</div>
                            <div class="property-price">$150,000</div>
                            <img src="img/properties/properties-list-1.jpg" alt="fp-list" class="img-responsive hp-1">
                            <div class="property-overlay">
                                <div class="property-magnify-gallery">
                                    <a href="img/properties/properties-1.jpg" class="overlay-link">
                                        <i class="fa fa-search-plus"></i>
                                    </a>
                                    <a href="img/properties/properties-2.jpg" class="hidden"></a>
                                    <a href="img/properties/properties-3.jpg" class="hidden"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 property-content ">
                        <!-- title -->
                        <h1 class="title">
                            <a href="properties-details.php">2 BHK House for rent in Gandhi Basti 1200 sqft</a>
                        </h1>                        <!-- Facilities List -->
                        <ul class="facilities-list clearfix">
                            <li>
                                <p class="property_listing_features">Property ID</p>
                                <span>4800 sq ft</span>
                            </li>
                            <li>
                                <p class="property_listing_features">Bathroom</p>
                                <span>4800 sq ft</span>
                            </li>
                            <li>
                                <p class="property_listing_features">Built-up area</p>
                                <span>4800 sq ft</span>
                            </li>
                            <li>
                                <p class="property_listing_features">Carpet area</p>
                                <span>4800 sq ft</span>
                            </li>
                            <li>
                                <p class="property_listing_features">Availability</p>
                                <span>4800 sq ft</span>
                            </li>
                        </ul>
                        <!-- Property footer -->
                        <div class="property-footer">
                            <span class="left">
                                <a href="#">Posted by: <i class="fa fa-user"></i>Narayan</a>
                            </span>
                            <span class="right">
                                <i class="fa fa-calendar"></i>5 Days ago
                            </span>
                        </div>
                    </div>
                </div>
                <!-- Page navigation start -->
                <nav aria-label="Page navigation">
                    <ul class="pagination">
                        <li>
                            <a href="properties-list-leftside.php" aria-label="Previous">
                                <span aria-hidden="true">«</span>
                            </a>
                        </li>
                        <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
                        <li><a href="properties-list-leftside.php">2</a></li>
                        <li><a href="properties-list-fullwidth.php">3</a></li>
                        <li>
                            <a href="properties-list-fullwidth.php" aria-label="Next">
                                <span aria-hidden="true">»</span>
                            </a>
                        </li>
                    </ul>
                </nav>
                <!-- Page navigation end-->
            </div>

            <div class="col-lg-4 col-md-4 col-xs-12">
                <!-- Search contents sidebar start -->
                <div class="sidebar-widget">
                    <div class="main-title-2">
                        <h1><span>Property</span> Search</h1>
                    </div>

                    <form method="GET">
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
                <!-- Category posts start -->
                <div class="sidebar-widget category-posts">
                    <div class="main-title-2">
                        <h1><span>popular</span> Category</h1>
                    </div>
                    <ul class="list-unstyled list-cat">
                        <li><a href="#">Single Family </a> <span>(45)  </span></li>
                        <li><a href="#">Apartment  </a> <span>(21)  </span></li>
                        <li><a href="#">Condo </a> <span>(23)  </span></li>
                        <li><a href="#">Multi Family </a> <span>(19)  </span></li>
                        <li><a href="#">Villa </a> <span>(19)  </span></li>
                        <li><a href="#">Other  </a> <span>(22)  </span></li>
                    </ul>
                </div>

                <!-- Popular posts start -->
                <div class="sidebar-widget popular-posts">
                    <div class="main-title-2">
                        <h1><span>Recent</span> Properties</h1>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <img class="media-object" src="img/properties/small-properties-1.jpg" alt="small-properties-1">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">
                                <a href="properties-details.php">Modern Family Home</a>
                            </h3>
                            <p>February 27, 2018</p>
                            <div class="price">
                                $734,000
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <img class="media-object" src="img/properties/small-properties-2.jpg" alt="small-properties-2">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">
                                <a href="properties-details.php">Modern Family Home</a>
                            </h3>
                            <p>February 27, 2018</p>
                            <div class="price">
                                $734,000
                            </div>
                        </div>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <img class="media-object" src="img/properties/small-properties-3.jpg" alt="small-properties-3">
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading">
                                <a href="properties-details.php">2 BHK House for rent in Gandhi Basti 1200 sqft</a>
                            </h3>
                            <p>February 27, 2018</p>
                            <div class="price">
                                $734,000
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Helping box Start -->
                <div class="sidebar-widget helping-box clearfix">
                    <div class="main-title-2">
                        <h1><span>Helping</span> Center</h1>
                    </div>
                    <div class="helping-center">
                        <div class="icon"><i class="fa fa-map-marker"></i></div>
                        <h4>Address</h4>
                        <p>123 Kathal St. Tampa City,</p>
                    </div>
                    <div class="helping-center">
                        <div class="icon"><i class="fa fa-phone"></i></div>
                        <h4>Phone</h4>
                        <p><a href="tel:+55-417-634-7071">+55 417 634 7071</a> </p>
                    </div>
                </div>

                <!-- Latest reviews start -->
                <div class="sidebar-widget latest-reviews mb-0">
                    <div class="main-title-2">
                        <h1><span>Latest</span> Reviews</h1>
                    </div>
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="img/avatar/avatar-1.jpg" alt="avatar-1">
                            </a>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading"><a href="#">John Antony</a></h3>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit.
                                Etiamrisus tortor, accumsan at nisi et,
                            </p>
                        </div>
                    </div>
                    <div class="media mb-0">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="img/avatar/avatar-2.jpg" alt="avatar-2">
                            </a>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading"><a href="#">Karen Paran</a></h3>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <p>Lorem ipsum dolor sit amet,
                                consectetur adipiscing elit.
                                Etiamrisus tortor, accumsan at nisi et,
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Properties section body end -->

<!-- Testimonials 2 -->
<div class="testimonials-2">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="sec-title-three">
                        <h4>Happy Clients</h4>
                        <h2>Testimonials</h2>
                        <div class="text">
                            We collect reviews from our customers so you can get an honest opinion of what an apartment is really like!
                        </div>
                    </div>
                </div>
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div id="carouse3-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <div class="item content clearfix">
                            <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
                                <div class="avatar">
                                    <img src="img/testimonial/avatar-1.jpg" alt="avatar-1" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                <div class="text">
                                    Aliquam dictum elit vitae mauris facilisis, at dictum urna dignissim. Donec vel lectus vel felis lacinia luctus vitae iaculis arcu. Mauris mattis, massa eu porta ultricies.
                                </div>
                                <div class="author-name">
                                    John Antony
                                </div>
                                <ul class="rating">
                                    <li>
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star-half-full"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="item content active clearfix">
                            <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
                                <div class="avatar">
                                    <img src="img/testimonial/avatar-2.jpg" alt="avatar-2" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                <div class="text">
                                    Aliquam dictum elit vitae mauris facilisis, at dictum urna dignissim. Donec vel lectus vel felis lacinia luctus vitae iaculis arcu. Mauris mattis, massa eu porta ultricies.
                                </div>
                                <div class="author-name">
                                    John Antony
                                </div>
                                <ul class="rating">
                                    <li>
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star-half-full"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="item content clearfix">
                            <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
                                <div class="avatar">
                                    <img src="img/testimonial/avatar-3.jpg" alt="avatar-3" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12">
                                <div class="text">
                                    Aliquam dictum elit vitae mauris facilisis, at dictum urna dignissim. Donec vel lectus vel felis lacinia luctus vitae iaculis arcu. Mauris mattis, massa eu porta ultricies.
                                </div>
                                <div class="author-name">
                                    John Antony
                                </div>
                                <ul class="rating">
                                    <li>
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star-half-full"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="item content clearfix">
                            <div class="col-lg-4 col-md-5 col-sm-5 col-xs-12">
                                <div class="avatar">
                                    <img src="img/testimonial/avatar-4.jpg" alt="avatar-4" class="img-responsive">
                                </div>
                            </div>
                            <div class="col-lg-8 col-md-7 col-sm-7 col-xs-12 ">
                                <div class="text">
                                    Aliquam dictum elit vitae mauris facilisis, at dictum urna dignissim. Donec vel lectus vel felis lacinia luctus vitae iaculis arcu. Mauris mattis, massa eu porta ultricies.
                                </div>
                                <div class="author-name">
                                    John Antony
                                </div>
                                <ul class="rating">
                                    <li>
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star"></i>
                                    </li>
                                    <li>
                                        <i class="fa fa-star-half-full"></i>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#carouse3-example-generic" role="button" data-slide="prev">
                        <span class="slider-mover-left t-slider-l" aria-hidden="true">
                            <i class="fa fa-angle-left"></i>
                        </span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#carouse3-example-generic" role="button" data-slide="next">
                        <span class="slider-mover-right t-slider-r" aria-hidden="true">
                            <i class="fa fa-angle-right"></i>
                        </span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial 2 end -->
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
                <a href="submit-property.php" class="btn button-md button-theme">Submit Now</a>
            </div>
        </div>
    </div>
</div>
<!-- Intro section end -->
<?php include('include/footer.php'); ?>