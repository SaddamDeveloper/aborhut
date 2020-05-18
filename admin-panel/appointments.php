<!DOCTYPE html>
<html lang="en" dir="ltr">
<?php include('inc/header.php'); ?>


<body>
    <?php include('inc/preloader.php'); ?>
    <div id="main-wrapper">

    <?php include('inc/top_menu.php'); ?>
    <?php include('inc/main_menu.php'); ?>

    <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-5 align-self-center">
                        
                    <div class="d-flex align-items-center">

                    </div>
                </div>
                
            </div>
        </div>

        <div class="container-fluid"> 

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">All Appointments</h4>
                            <?php
                            if(isset($_GET['p']) && !empty($_GET['p'])){                                
                                ?>
                                <div class="form-group">
                                <form method="POST" class="row" action="admin_appointment_add.php">
                                    <input type="hidden" name="order_id" value="<?=$_GET['p']?>">
                                    <div class="col-md-3">
                                        <label for="app_date">Appointment Date:</label>
                                    </div>
                                    <div class="col-md-6">
                                        <input type="date" class="form-control" name="app_date">
                                    </div>
                                    <div class="col-md-3">
                                        <button type="submit"  name="app_submit" class="btn btn-primary">Submit</button>
                                    </div>
                                    </form>
                                </div>


                        </div>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>

<?php include('inc/footer.php'); ?>