<?php 
session_start();
$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");

$user=$_SESSION['user'];
$pass=$_SESSION['pass'];
$count=$_GET["count"];
$temp=0;
//delete preference
$stmt=$conn->prepare("update 2ndyearcheck set room$count='' where username=? and password=?");
$stmt->bind_param("is",$user,$pass);

		$stmt->execute();
//display preference from database			
$stmt=$conn->prepare("select * from 2ndyearcheck where username=? and password=?");
$stmt->bind_param("is",$user,$pass);

		$stmt->execute();
		$retval=$stmt->get_result();
		if(mysqli_num_rows($retval)>=1){
		 $row=mysqli_fetch_assoc($retval);
		while($count!=$temp+1){
		   $temp++;
		   echo "preference $temp:".$row["room$temp"]."<br>";
		    
		    
		}}
	

$conn->close();
?>
