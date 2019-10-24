<?php
$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");
if($conn->connect_error){  
  die('Could not connect: '.$conn->connect_error);  
}  
$q=$_GET['q'];
//check whether student is applicable or not
$stmt=$conn->prepare("select * from 2ndyearapplicable where id=?");
$stmt->bind_param("i",$q);

		$stmt->execute();
		$re=$stmt->get_result();


$row=mysqli_num_rows($re);


if( $row==0){
	
	echo "$q is  not applicable for hostel !!<br>";
	echo "please contact hostel office for query";
}
//check whether student has earlier applied or not
$stmt=$conn->prepare("select * from applied where id=?");
$stmt->bind_param("i",$q);

		$stmt->execute();
		$re=$stmt->get_result();

$row=mysqli_num_rows($re);
if($row>=1){
	
	echo "$q has already registered";
}
$conn->close();
?>