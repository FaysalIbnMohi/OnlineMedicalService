<?php
require 'db_rw.php';
		
		$code=$_GET['code'];
		$sql="UPDATE medicine SET Activity='Deactive'  WHERE MCode='$code'";
		$result =updateDB($sql);
		if ($result)
		echo "deleted";
		else echo "Unsuccessful";

?>