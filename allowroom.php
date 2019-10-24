<?php 
session_start();
//insert room available in database
if(!isset($_SESSION["office"])){
  header("location: officelogin.php");
}
$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");
$pointer=fopen("room.csv","r") or die ("File doesn't exist");
       
		
while(!feof($pointer)){
 $temp=fgets($pointer);
		$point=explode(",",$temp);
		
		
	$stmt=$conn->prepare("insert into room(roomno) values(?)");
$stmt->bind_param("s",$point[0]);

		$stmt->execute();
		
}echo "successfully inserted ";
fclose($pointer);
$stmt->close();
$conn->close();


?>