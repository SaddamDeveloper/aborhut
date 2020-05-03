<?php
class AUTH{


	public static function do_login()
	{
		DB::connect();
		global $dbconn;
		
		

   	    $s=$_POST["id"];
		$v=md5($_POST["st_password"]);
		$abc = $dbconn->prepare("select * from student where id= '$s' and st_password='$v' ");
		$abc->execute();

	
		$results = $abc->fetchAll(PDO::FETCH_OBJ);
		if (count($results)) {
      

			session_start();
           

			foreach ($results as $row) {

        //print_r($row);
				
				$_SESSION['st_password']=$row->st_password;
				$_SESSION['u_id']=$row->admin_id;
				$_SESSION['name']=$row->st_name; 
				$_SESSION['st_name']=$row->st_name;
				
				//$usr=$_SESSION['u_id'];
			

					header("location: dashboard.php");
				}
			}
		else
		{

			echo"<script type='text/javascript'>alert('username and password doesnt match')</script>";
		}

	}
	public static function do_logout()
	{

		session_destroy();
		
	}

	public static function has($perm='view') {

		try{
        //$group = Group::open($_SESSION['group_id']);
        //return in_array($perm, json_decode($group->permissions));
			return in_array($perm, json_decode($_SESSION['permissions']));

		}catch(Exception $e){
			return false;
		}
		return false;


   /* public static function do_logout()
	{
		if(isset($_POST['logout'])&& $_SERVER["REQUEST_METHOD"] == "POST"){
	
	session_destroy();
	header("location:index.php");
	
}*/

}




public static function hasperm($perm='view',$allperm) {

		try{
        //$group = Group::open($_SESSION['group_id']);
        //return in_array($perm, json_decode($group->permissions));
			return in_array($perm, json_decode($allperm));

		}catch(Exception $e){
			return false;
		}
		return false;


   /* public static function do_logout()
	{
		if(isset($_POST['logout'])&& $_SERVER["REQUEST_METHOD"] == "POST"){
	
	session_destroy();
	header("location:index.php");
	
}*/

}


public static function check()
{


}
}


?>