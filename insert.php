<?php 
$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");
if($conn->connect_error){  
  die('Could not connect: '.$conn->connect_error);  
}  
$id=$_POST["id"];
$name=$_POST["name"];
$pointer=$_POST["pointer"];
//insert student info into database
$stmt=$conn->prepare("insert into student values(?,?,?)");
$stmt->bind_param("isd",$id,$name,$pointer);

		$stmt->execute();
		
$stmt=$conn->prepare("insert into 2ndyearapplicable values(?)");
$stmt->bind_param("i",$id);

		$stmt->execute();
		

echo "response inserted";
?>