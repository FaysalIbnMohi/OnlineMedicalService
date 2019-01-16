<?php
print_r($GLOBALS);
session_start();
$user=$_POST["username"];
$pass = $_POST["password"];

if($user=="Admin" && $pass=="1234"){
	$_SESSION["user"]=$user;
	header("Location:medicine.php");
}
else{
	header("Location:index.php");
}

?>