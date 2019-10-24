<?php

//start the website by initialising the tables in database



$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");
$txt="create table 2ndyearcheck (sr int primary key auto_increment ,id1 int,name1 varchar(30),id2 int,name2 varchar(30),id3 int,name3 varchar(30),username int,password varchar(8),room1 varchar(5),room2 varchar(5),room3 varchar(5),room4 varchar(5),room5 varchar(5),room6 varchar(5),room7 varchar(5),room8 varchar(5),room9 varchar(5),room10 varchar(5),room11 varchar(5),room12 varchar(5),room13 varchar(5),room14 varchar(5),room15 varchar(5),room16 varchar(5),room17 varchar(5),room18 varchar(5),room19 varchar(5),room20 varchar(5),room21 varchar(5),room22 varchar(5),room23 varchar(5),room24 varchar(5),room25 varchar(5),room26 varchar(5),room27 varchar(5),room28 varchar(5),room29 varchar(5),room30 varchar(5),avg_pointer decimal(3,2),roomalloted varchar(5))";

mysqli_query($conn,$txt);
$txt="create table 2ndyearapplicable (id int)";
mysqli_query($conn,$txt);
$txt="create table applied (id int)";
mysqli_query($conn,$txt);
$txt="create table  student (id int ,name varchar(30),pointer decimal(3,2))";
mysqli_query($conn,$txt);
$txt="create table room (roomno varchar(5),status varchar(10))";
mysqli_query($conn,$txt);

//deleting previous query and student login
mysqli_query($conn,"drop table studentinfo");
mysqli_query($conn,"drop table query");
//code for applicable students intake

$pointer=fopen("merit.csv","r") or die ("File doesn't exist");
       
		
while(!feof($pointer)){
 $temp=fgets($pointer);
		$point=explode(",",$temp);
		$mark=$point[2];
		if($mark>=4.00){
$txt="select * from 2ndyearapplicable where id=".$point[0];
$stmt=mysqli_query($conn,$txt);
$row=mysqli_num_rows($stmt);
if($row==0){

		$stmt=$conn->prepare("insert into student values(?,?,?)");
$stmt->bind_param("isd",$point[0],$point[1],$point[2]);

		$stmt->execute();
		$stmt=$conn->prepare("insert into 2ndyearapplicable values(?)");
$stmt->bind_param("i",$point[0]);

		$stmt->execute();
}
		
		}

}echo "students intake taken<br><br>";
fclose($pointer);

//code for room intake
$pointer=fopen("room.csv","r") or die ("File doesn't exist");
       
		
while(!feof($pointer)){
 $temp=fgets($pointer);
		$point=explode(",",$temp);
		
		
	$stmt=$conn->prepare("insert into room(roomno) values(?)");
$stmt->bind_param("s",$point[0]);

		$stmt->execute();
		
}echo "room inserted<br><br>";
fclose($pointer);
$stmt->close();
$conn->close();


echo "website started";
?>