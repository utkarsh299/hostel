<?php 
session_start();


// check whether inserted username and password is correct or not

$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");    
if($conn->connect_error){  
  die('Could not connect: '.$conn->connect_error);  
}  

$user=$_POST["user"];
$pass=$_POST["pass"];
$pass=trim($pass);

$stmt=$conn->prepare("select * from studentinfo where username=? and password=?");
$stmt->bind_param("is",$user,$pass);
		$stmt->execute();
		$re=$stmt->get_result();

$row=mysqli_num_rows($re);
if($row==1){
//if correct usename and password is inserted 

	$num=mysqli_fetch_assoc($re);
	$_SESSION["room"]=$num["room"];
$_SESSION["studentquery"]="set";
	
header("location: query.php");
	
}
else{
	// if wrong username or password is inserted
header("location: querylogin.php?err=1");


}
$conn->close();
?>