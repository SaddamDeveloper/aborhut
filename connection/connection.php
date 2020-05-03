<?php
	error_reporting(1);
	session_start();
	// $database_username = 'root';
	// $database_password = '';
	// $pdo_conn = new PDO( 'mysql:host=localhost;dbname=indiasbc_aborhut', $database_username, $database_password );
	$host_name = "localhost";
	$database = "indiasbc_aborhut"; // Change your database name
	$dbusername = "root"; // Your database user id 
	$dbpassword = ""; // Your password
	$dbh = null;

	require './customer-panel/classes/DB.php';
	require './customer-panel/classes/AUTH.php';
	require './customer-panel/classes/ROLE.php';

	DB::connect();
?>