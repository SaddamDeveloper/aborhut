<?php
class ROLE
{
	
	public static function check($id)
	{
		global $dbconn;
    	$abc = $dbconn->prepare("select * from role where r_id=$id");
		$abc->execute();
		$row = $abc->fetch(PDO::FETCH_OBJ);
		return $row->permissions;
    
	}


}
?>