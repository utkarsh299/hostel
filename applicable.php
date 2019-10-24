<?php 
session_start();
//insert student information from file into database
if(!isset($_SESSION["office"])){
  header("location: officelogin.php");
}
$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");
$pointer=fopen("merit.csv","r") or die ("File doesn't exist");
       
		
while(!feof($pointer)){
 $temp=fgets($pointer);
		$point=explode(",",$temp);
		$mark=$point[2];
		if($mark>=4.00){
	$stmt=$conn->prepare("select * from 2ndyearapplicable where id=?");
$stmt->bind_param("s",$point[0]);

		$stmt->execute();
		$re=$stmt->get_result();
$row=mysqli_num_rows($stmt);
if($row==0){

		$stmt=$conn->prepare("insert into student values(?,?,?)");
$stmt->bind_param("isd",$point[0],$point[1],$point[2]);

		$stmt->execute();
		$stmt=$conn->prepare("insert into 2ndyearapplicable values(?)");
$stmt->bind_param("i",$point[0]);

		$stmt->execute();
}
		
		}

}echo "successfully insert list";
fclose($pointer);
$stmt->close();
$conn->close();


?>