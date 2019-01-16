<?php
session_start();
require 'db_rw.php';
//print_r($GLOBALS);
echo "</br>";

echo "</br>";

$name=$_POST["med_name"];
$power=$_POST["power"];
$company=$_POST["company"];
$group=$_POST["group_name"];
$price=$_POST["unit_price"];

$flag = true;
foreach($_POST as $k=>$v){
	if(strlen($v)==0)
	{
		echo "You Have to put the value of  $k";
		echo "<br>";
		$flag=false;

	}
}
$code=$_SESSION['code'];
		$sql="UPDATE medicine SET Name='$name', Power='$power',Group_id='$group',Company='$company',Unit_price='$price'  WHERE MCode='$code'";
		$result =updateDB($sql);
		if (!$result) {
			$_SESSION['msg']="Data Updated Successfully. ";
			header("Location:showAll.php");
			
		}
		else{
			$_SESSION['msg']="Unsuccesfull Operation. ";
			header("Location:showAll.php");
		}

		?>

