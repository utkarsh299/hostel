<?php 
session_start();
if(!isset($_SESSION["office"])){
  header("location: officelogin.php");
}

//check whether room is available for allotment process or not


$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");
$room=$_GET["count"];
$txt="select * from room where roomno='$room'";
$st=mysqli_query($conn,$txt);
$row=mysqli_num_rows($st);
if($row==1){
	echo "present";
}else{echo "not present";}


?>
