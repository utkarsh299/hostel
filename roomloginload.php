<?php
session_start();
$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");  
$count=$_GET["count"];
$temp=0;
$user=$_SESSION['user'];
$pass=$_SESSION['pass'];



// php file to display all preference given by the student if earlier given



$stmt=$conn->prepare("select * from 2ndyearcheck where username=? and password=?");
$stmt->bind_param("is",$user,$pass);

		$stmt->execute();
		$retval=$stmt->get_result();
		if(mysqli_num_rows($retval)>=1){
		 $row=mysqli_fetch_assoc($retval);
		while($count!=$temp){
		   $temp++;
		   echo "preference $temp:".$row["room$temp"]."<br>";
		    
		    
		}}
	

$conn->close();
?>