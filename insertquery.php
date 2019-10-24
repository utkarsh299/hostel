<?php 
session_start();
if(!isset($_SESSION["studentquery"])){
	header("location: querylogin.php");
}
$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");  
if($conn->connect_error){  
  die('Could not connect: '.$conn->connect_error);  
}  
$roomno=$_SESSION["room"];
$type=$_POST["type"];
$query=$_POST["query"];
$date=date("Y-m-d");

//insert query into database like broken chair etc

$stmt=$conn->prepare("insert into query values(?,?,?,'$date')");
$stmt->bind_param("sss",$roomno,$type,$query);

		$stmt->execute();
		$re=$stmt->get_result();


echo "query inserted succesfully";
$conn->close();
?>
<html><body><br><br><br><a href="dynamic dropbox.php">go back</a>;
<br><br>
<form action="querylogout.php"><input type="submit" value="logout"></form></body></html>