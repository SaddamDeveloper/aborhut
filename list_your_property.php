<?php include('include/header.php'); ?>
<!-- Content area start -->
<div class="content-area login">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <!-- Form content box start -->
                <div class="form-content-box">
                    <!-- details -->
                    <div class="details">
                        <!-- Main title -->
                        <div class="main-title">
                            <h1><span>Login</span></h1>
                        </div>
                        <!-- Form start -->
                        <form action="#" method="GET">
                            <div class="form-group">
                                <input type="email" name="email" class="input-text" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <input type="password" name="Password" class="input-text" placeholder="Password">
                            </div>
                            <div class="checkbox" style="padding-top: 22px;">
                                <div class="ez-checkbox pull-left">
                                    <label>
                                        <input type="checkbox" class="ez-hide">
                                        Remember me
                                    </label>
                                </div>
                                <a href="forgot-password.html" class="link-not-important pull-right">Forgot Password</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="button-md button-theme btn-block">login</button>
                            </div>
                        </form>
                        <!-- Form end -->
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
            <div class="col-lg-2"></div>
            <div class="col-lg-5">
                <!-- Form content box start -->
                <div class="form-content-box">
                    <!-- details -->
                    <div class="details">
                        <!-- Main title -->
                        <div class="main-title">
                            <h1><span>Signup</span></h1>
                        </div>
                        <!-- Form start-->
                        <form action="#" method="GET">
                            <div class="form-group">
                                <input type="text" name="fullname" class="input-text" placeholder="Full Name">
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="input-text" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <input type="text" name="number" class="input-text" placeholder="Mobile">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="button-md button-theme btn-block">Signup</button>
                            </div>
                        </form>
                        <!-- Form end-->
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
<!-- Content area end -->
<?php include('include/footer.php'); ?>