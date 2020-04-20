<?php
session_start();
ob_start();
/******     *Condition*                  *True*             *False***/
$id=isset($_SESSION["id"])?$_SESSION["id"]:"";
if($id==0)
{
	header("Location:index.php");
}
//session_destroy();
?>
<? ob_end_flush();?>
