<?php 
session_start();
$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh"); 
if($conn->connect_error){  
  die('Could not connect: '.$conn->connect_error);  
}  

$user=$_POST["user"];
$pass=$_POST["pass"];
$pass=trim($pass);
//check whether given login and password match any database 
$stmt=$conn->prepare("select * from 2ndyearcheck where username=? and password=?");
$stmt->bind_param("is",$user,$pass);

		$stmt->execute();
		$re=$stmt->get_result();

$row=mysqli_num_rows($re);

if($row==1){//if matched
	
	$_SESSION['user']=$user;
	$_SESSION['pass']=$pass;
	$_SESSION['allotstudent']=$row;
	
header("location: 2ndyear1.php");
	
}
else{
// if not matched then redirect to login page with erro message like invalid usename and password	
header("location: login1.php?err=1");


}
$conn->close();
?>