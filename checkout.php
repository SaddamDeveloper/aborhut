<?php include('include/header.php'); ?>
<!-- Sub banner start -->
<div class="sub-banner overview-bgi">
    <div class="overlay">
        <div class="container">
            <div class="breadcrumb-area">
                <h1>Checkout</h1>
                <ul class="breadcrumbs">
                    <li><a href="./">Home</a></li>
                    <li class="active">Checkout</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Sub Banner end -->
<!-- Submit Property start -->
<div class="content-area-7 submit-property">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="submit-address">
                    <form method="GET">
                        <div class="main-title-2">
                            <h1><span>Billing</span> Details</h1>
                        </div>
                        <div class="search-contents-sidebar mb-30">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="input-text" name="name" placeholder="Name">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="input-text" name="email" placeholder="Email">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Phone (optional)</label>
                                    <input type="text" class="input-text" name="phone"  placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Visit Date</label>
                                    <input type="date" class="input-text" name="date"  placeholder="Visit Date">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Address (Optional)</label>
                                    <textarea class="input-text" name="message" placeholder="Your Address"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>City (Optional)</label>
                                    <input type="text" class="input-text" name="city"  placeholder="Your City">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State (Optional)</label>
                                    <input type="text" class="input-text" name="state"  placeholder="Your State">
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="main-title-2" style="margin-bottom: 20px;">
                            <h1><span>Your</span> order</h1>
                        </div>
                        <table id="checkout-table" class="table table-bordered" style="background: #fff; font-size: 16px;">
                            <tbody>
                                <tr>
                                    <th>Cart Subtotal</th>
                                    <td>₹ 150</td>
                                </tr>
                                <tr>
                                    <th>Shipping and Handling</th>
                                    <td>Free Shipping</td>
                                </tr>
                                <tr>
                                    <th>Order Total</th>
                                    <td><b>₹ 150</b></td>
                                </tr>
                            </tbody>
                        </table>  
                        <button class="btn btn-primary pull-right" type="submit">Pay Now</button>              
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Submit Property end -->
<div class="clearfix" style="padding-top: 60px;"></div>
<!-- Intro section -->
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
                <a href="submit-property.html" class="btn button-md button-theme">Submit Now</a>
            </div>
        </div>
    </div>
</div>
<!-- Intro end -->
<?php include('include/footer.php'); ?>