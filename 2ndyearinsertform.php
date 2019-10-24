<?php
session_start();

$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");
if($conn->connect_error){  
  die('Could not connect: '.$conn->connect_error);  
} 
$student1=$_POST["name1"];
 $student2=$_POST["name2"];
$student3=$_POST["name3"];
//check if student 1 is already applied or not
$stmt=$conn->prepare("select * from applied where id=?");
$stmt->bind_param("i",$student1);

		$stmt->execute();
		$re=$stmt->get_result();


$row=mysqli_num_rows($re);


if( $row!=0){
	header("location:  2ndyearinsertform1.php?err=1");
	
}else{
//check if student 2 is already applied or not    
$stmt=$conn->prepare("select * from applied where id=?");
$stmt->bind_param("i",$student2);

		$stmt->execute();
		$re=$stmt->get_result();


$row=mysqli_num_rows($re);

if( $row!=0){
	header("location:  2ndyearinsertform1.php?err=1");
	
}else{//check if student 3 is already applied or not
$stmt=$conn->prepare("select * from applied where id=?");
$stmt->bind_param("i",$student3);

		$stmt->execute();
		$re=$stmt->get_result();


$row=mysqli_num_rows($re);

if( $row!=0){
	header("location:  2ndyearinsertform1.php?err=1");
	
}else{//generate password
	function randompasswd(){
     $alphabet="abcdefghijklmnopqrstuvwxyz0123456789";
	$pass=array();
	$alphalength=strlen($alphabet)-1;
    for($i=0;$i<8;$i++){
		$n=rand(0,$alphalength);
		$pass[]=$alphabet[$n];
		
	}	
		return implode($pass);
	}
	$pass=randompasswd();
//insert the student response into database and mark student as applied
	$stmt=$conn->prepare("insert into 2ndyearcheck(id1,id2,id3,username,password ) values(?,?,?,?,?)");
	$stmt->bind_param("iiiis",$student1,$student2,$student3,$student1,$pass);
	$stmt->execute();
	$stmt=$conn->prepare("insert into applied values(?)");
	$stmt->bind_param("i",$student1);
	$stmt->execute();
	$stmt=$conn->prepare("insert into applied values(?)");
	$stmt->bind_param("i",$student2);
	$stmt->execute();	
	$stmt=$conn->prepare("insert into applied values(?)");
	$stmt->bind_param("i",$student3);
	$stmt->execute();

	$_SESSION['student1']=$student1;
	$_SESSION['student2']=$student2;
	$_SESSION['student3']=$student3;

$_SESSION['pass']=$pass;
$_SESSION['user']=$student1;
	
	$conn->close();
	header("location: 2ndyearinsertformdisplay.php");
	exit();
}

}	
	
}

	
?>
