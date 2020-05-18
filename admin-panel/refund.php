<?php
include('configure.php');
DB::connect();
require_once("check.php");

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
if(isset($_GET['c'])){
    $c_status = $_GET['c'];
    
}
?>
