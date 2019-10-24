<?php 
$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");
if($conn->connect_error){  
  die('Could not connect: '.$conn->connect_error);  
}  

//check whether given username and password is correct or not

$user=$_POST["user"];
$pass=$_POST["pass"];
$pass=trim($pass);
$stmt=$conn->prepare("select * from office where username=? and password=?");
$stmt->bind_param("is",$user,$pass);
		$stmt->execute();
		$re=$stmt->get_result();

$row=mysqli_num_rows($re);

if($row==1){//if correct username and password inserted
	session_start();
	$_SESSION['office']=$row;
	
header("location: office.php");
}
else{
	//if wrong username or password is inserted
header("location: officelogin.php?err=1");
//

}
$conn->close();
?>
