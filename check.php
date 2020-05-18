<?php
session_start();
ob_start();
include('customer-panel/configure.php');
DB::connect();

/******     *Condition*                  *True*             *False***/
$id=isset($_SESSION["id"])?$_SESSION["id"]:"";
$product = $_GET['product'];
if($id==0)
{
	header("Location:cartLogin.php?product=$product");
}
//session_destroy();
?>
<? ob_end_flush();?>