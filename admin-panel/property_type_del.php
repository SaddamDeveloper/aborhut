<?php 
ob_start();
include('configure.php');
DB::connect();
// require_once("check.php");
$id = $_REQUEST['id'];


if($id !='')
{
    $insert_bookings = "DELETE FROM property_type WHERE id = '".$_REQUEST['id']."'";
    $sql_insert = $dbconn->prepare($insert_bookings);
    $sql_insert->execute();
    
    $message="Details successfully deleted.";
    echo "<script type='text/javascript'>alert('$message');</script>";
    
    header("Location: property_type.php?id=$id&message=1&status=success");	
}
?>