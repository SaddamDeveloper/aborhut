<?php
session_start();
ob_start();
/******     *Condition*                  *True*             *False***/
$admin_id=isset($_SESSION["admin_id"])?$_SESSION["admin_id"]:"";
if($admin_id==0)
{
	header("Location:index.php");
}
//session_destroy();
?>
<? ob_end_flush();?>
