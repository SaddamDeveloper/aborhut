<?php

/**
* yhis is for dataabse connection
*/
class DB{


	public static function connect()
	{
		global $host_name, $database, $dbusername, $dbpassword, $dbconn;

		try {
			$dbconn = new PDO('mysql:host='.$host_name.';dbname='.$database, $dbusername, $dbpassword);
			//echo 'connected';
		} catch (PDOException $e) {
			print "Error!: " . $e->getMessage() . "<br/>";
			die();
		}


	}

}

?>