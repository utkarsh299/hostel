<?php 
session_start();
if(!isset($_SESSION["office"])){
  header("location: officelogin.php");
  
  
}
$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");

//disable link from website

$txt="update link set login=0";
$stmt=mysqli_query($conn,$txt);

$txt="update file set room=1";
$stmt=mysqli_query($conn,$txt);
$txt="alter table 2ndyearcheck drop sr ";
mysqli_query($conn,$txt);
$txt="alter table 2ndyearcheck add sr int primary key auto_increment";
mysqli_query($conn,$txt);
$txt="select count(sr) from 2ndyearcheck";
$stmt=mysqli_query($conn,$txt);
$numbe=mysqli_fetch_assoc($stmt);
$num=$numbe['count(sr)'];
//count number of entries from database
$copy=1;
while($copy!=$num+1){
//{   
$avg=0;
$z=0;
//outer while loop to traverse from each entry
while($z!=30){
	$z++;
	//inner while loop to traverse through each room options
	$txt="select username from sort where sr=".$copy;
$stmt=mysqli_query($conn,$txt);
$temp=mysqli_fetch_assoc($stmt);
		
		$id=$temp["username"];
	$sql = "SELECT * FROM 2ndyearcheck where username='$id'";
	$retval=mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($retval);
	$roo="room".$z;
	
	$room=$row[$roo];
	if(empty($room)){ 
	    //break inner while loop if options if empty
	    break;}
	
	$txt="select * from room where roomno='$room'";
	$retval=mysqli_query($conn,$txt);
	$roww= mysqli_fetch_assoc($retval);
	$te="status";
	$check=$roww[$te];
	
	if(empty($check)){
	    //break inner while loop when room is available to be given to student
		$txt="update room set status='booked' where roomno='".$room."'";
	    $retval=mysqli_query($conn,$txt);

	$txt="update 2ndyearcheck set roomalloted='".$room."'where username='".$id."'";
	$retval=mysqli_query($conn,$txt);
	$txt="update sort set roomalloted='".$room."'where username='".$id."'";
	$retval=mysqli_query($conn,$txt);
	
	break;}

}
$copy++;
}

//student database created
mysqli_query($conn,"create table studentinfo as select id1,id2,id3,roomalloted room,username,password from 2ndyearcheck");
mysqli_query($conn,"create table query (roomno varchar(5),type varchar(20),query varchar(20),date date)");
// print the room alloted with there id no

//$conn = new mysqli("localhost:3306","root","","utkarsh");
$myfile = fopen("roomalloted.csv", "w") or die("Unable to open file!");
$sql = "SELECT sr,id1,name1,id2,name2,id3,name3,roomalloted FROM 2ndyearcheck";
$retval=mysqli_query($conn,$sql);  

$txt="sr,student id1,student name1, student id2,student name2,student id3,student name3,room alloted"."\n"; 
file_put_contents("roomalloted.csv",$txt,FILE_APPEND);


while($row = mysqli_fetch_assoc($retval)){
	
	

$txt="{$row['sr']}".","."{$row['id1']}".","."{$row['name1']}".","."{$row['id2']}".","."{$row['name2']}".","."{$row['id3']}".","."{$row['name3']}".","."{$row['roomalloted']}"."\n"; 
file_put_contents("roomalloted.csv",$txt,FILE_APPEND);

}
echo "room allotment list ready to download";
$conn->close();
?>

