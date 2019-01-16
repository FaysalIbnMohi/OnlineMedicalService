<?php
session_start();
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



	// if(isset($name))
	// 	{
	// 		if(!is_string($name)  && strlen($name)==0)
	// 	{
	// 		echo "You Have To Put Medicine Name.";
	// 		echo "<br>"; 
	// 		$flag=false;
	// 	}
		
	// 	}
	// if(isset($company))
	// 	{
	// 		if(!is_string($company) && strlen($company)==0)
	// 	{
	// 		echo "You Have To Put Company Name";
	// 		echo "<br>";
	// 		$flag=false;
	// 	}
		
	// 	}
	// if(isset($group_name))
	// 	{
	// 		if(strlen($group_name)==0)
	// 	{
	// 		echo "You Have To Select Group Name";
	// 		echo "<br>";
	// 		$flag=false;
	// 	}
		
	// 	}
	// if(isset($price))
	// 	{
	// 		if(!is_numeric($price) && strlen($price)==0)
	// 	{
	// 		echo "You Have To Put Integer Value In Unit Price";
	// 		echo "<br>";
	// 		$flag=false;
	// 	}
		
		
	// 	} 

$conn = mysqli_connect("localhost", "root", "","oms");
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

$sql = "INSERT INTO medicine (MCode, Name, Power,Group_id,Company,Unit_price,Activity)
VALUES (NULL,'".$_POST['med_name']."','".$_POST['power']."','".$_POST['group_name']."','".$_POST['company']."','".$_POST['unit_price']."','Active')";

   // $result = mysqli_query($conn,$query)or die(mysqli_error($conn));
       // '".$_REQUEST['uname']."'

	//echo $sql;
if($flag==true && mysqli_query($conn, $sql)){
	echo "Records inserted successfully.";
	header('Location: medicine.php');
	alert("$name inserted successfully.");

} 
else{
	echo "ERROR: Could not able to execute $sql. " . mysqli_error();
} 

?>