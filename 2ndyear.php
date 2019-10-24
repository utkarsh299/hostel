<?php 

session_start();

$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");  

$user=$_SESSION['user'];
$pass=$_SESSION['pass'];
$q=$_GET["stri"];
$count=$_GET["count"];

$temp=1;
//update room in database
$stmt=$conn->prepare("update 2ndyearcheck set room".$count."=? where username=? and password=?");
$stmt->bind_param("sis",$q,$user,$pass);

		$stmt->execute();
//display all preference from database		
$stmt=$conn->prepare("select * from 2ndyearcheck where username=? and password=?");
$stmt->bind_param("is",$user,$pass);

		$stmt->execute();
		$retval=$stmt->get_result();
			
		 $row=mysqli_fetch_assoc($retval);
		 $txt="room$temp";
		 $check=$row["$txt"];
		while(!empty($check)){
		   $temp++;
		   $txt="room$temp";
		$check=$row["$txt"];
		    
		}
		$cou=0;
		while($cou+1!=$temp){
		   $cou++;
		   $txt="room$cou";
		   echo "preference $cou:".$row["$txt"]."<br>";
		    
		    
		}
		
$conn->close();


?>
