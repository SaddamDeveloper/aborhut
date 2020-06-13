<?php 
ob_start();
include('configure.php');
DB::connect();
require_once("check.php");
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
if(isset($_POST['commission_submit']) && !empty($_POST['commission_submit'])){
    $commission = $_POST['commission'];
    $comError = "";
    if(empty($commission)){
        $comError = "Commission Should not be empty!";
    }else if(!is_numeric($commission)){
        $comError = "Commission Should be numeric!";
    }else{
        $sql = "UPDATE commission SET amount='$commission'";
        $stmt = $dbconn->prepare($sql);
        $stmt->execute();
    }

}
$commission = "SELECT * FROM commission";
$sql = $dbconn->prepare($commission );
$sql->execute();
$wlvd = $sql->fetchColumn(1);


$earnings = "SELECT orders.id, orders.product_id, orders.payment_status, orders.payment_time, checkout.chk_bill_name, checkout.chk_bill_phone,
            orders.amount, orders.status, property.prop_name FROM `orders` 
            LEFT JOIN checkout ON orders.checkout_id = checkout.id LEFT JOIN property ON orders.product_id = property.id WHERE orders.payment_status = 'SUCCESS'";
            $sql = $dbconn->prepare($earnings);
            $sql->execute();
            $wlvd1 = $sql->fetchAll(PDO::FETCH_OBJ);
        // print_r($wlvd1);exit();
?>

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
                        <h4 class="page-title">Set My Commission(%)</h4>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="form-group">
                    <form class="m-t-30" method="post" action="">
                        <input type="text" class="form-control" name="commission" value="<?php echo $wlvd; ?>" placeholder="Set Commission"> <br>
                        <small class="form-text text-danger"><?php if(isset($comError)) {echo $comError;} ?></small> 
                        <input type="submit" value="Submit" name="commission_submit" class="btn btn-primary float-right">
                    </form>
                    </div>
                </div>

                <h2>Earnings</h2>
                <div class="row">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Sl. No</th>
                                <th>Earning</th>
                                <th>Buyer</th>
                                <td>Property Name</td>
                                <td>Payment Time</td>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sum = 0;
                            foreach($wlvd1 as $rows=> $row){
                        ?>
                            <tr>
                                <td>
                                    <?php echo $row->id ?>
                                </td> 
                                <td>
                                    <?php echo $row->amount ?>
                                </td> 
                                <td>
                                    <?php echo $row->chk_bill_name ?>
                                </td>
                                <td>
                                    <?php echo $row->prop_name ?>
                                </td>
                                <td>
                                    <?php echo $row->payment_time ?>
                                </td>
                            </tr>
                            <?php
                            }
                        ?>
                        </tbody>   
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php include('inc/footer.php'); ?><?php 