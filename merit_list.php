<?php 
 session_start();
if(!isset($_SESSION["office"])){
  header("location: officelogin.php");
  

}
$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");

//disable the link for taking input of student

$txt="update link set apply=0";
$stmt=mysqli_query($conn,$txt);

$txt="update file set merit=1";
$stmt=mysqli_query($conn,$txt);

//give sr to database with increasing order

$txt="alter table  2ndyearcheck drop sr";
$stmt=mysqli_query($conn,$txt);
$txt="alter table 2ndyearcheck add sr int primary key auto_increment";
$stmt=mysqli_query($conn,$txt);
//count number of entries in database
$txt="select count(sr) from 2ndyearcheck";
$stmt=mysqli_query($conn,$txt);
$numbe=mysqli_fetch_assoc($stmt);
$num=$numbe['count(sr)'];
$copy=1;
while($copy!=$num+1){
$avg=0;
$z=0;
//outer while loop to traverse through all entries
while($z!=3){
//    inner while loop to traveres through all 3 student id and average there pointers
	$z++;
	$txt="select id".$z." from 2ndyearcheck where sr=".$copy;
$stmt=mysqli_query($conn,$txt);
$temp=mysqli_fetch_assoc($stmt);
		$stud="id".$z;
		$id=$temp[$stud];
	$sql = "SELECT * FROM student where id='$id'";
	$retval=mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($retval);
	$pointer=$row['pointer'];
	$name=$row['name'];
	$avg=(int)$avg+$pointer;
	
    $txt="update 2ndyearcheck set name".$z."='$name' where sr=".$copy;
     mysqli_query($conn,$txt);
	

}
$avg=(float)$avg/3;

 $stmt=$conn->prepare("update 2ndyearcheck set avg_pointer=? where sr=".$copy);
$stmt->bind_param("d",$avg);

$stmt->execute();
$copy++;
}
//}
//sort the entry in descending order
 $stmt=$conn->prepare("create table sort as select username,id1,name1,id2,name2,id3,name3,avg_pointer,roomalloted  from 2ndyearcheck order by avg_pointer desc");
 $stmt->execute();
 $stmt=$conn->prepare("alter table sort add sr int primary key auto_increment");
 $stmt->execute();
 $stmt=$conn->prepare("alter table sort add roomalloted varchar(5)");
 $stmt->execute();
 
 //display of merit list 
 $myfile = fopen("sort.csv", "w") or die("Unable to open file!");
$sql = "SELECT * FROM sort";
$retval=mysqli_query($conn,$sql);  
$txt="rank,student id1,student name1,student id2, student name2,student id3,student name3,average pointer"."\n"; 
file_put_contents("sort.csv",$txt,FILE_APPEND);


while($row = mysqli_fetch_assoc($retval)){
	
	

$txt="{$row['sr']}".","."{$row['id1']}".","."{$row['name1']}".","."{$row['id2']}".","."{$row['name2']}".","."{$row['id3']}".","."{$row['name3']}".","."{$row['avg_pointer']}"."\n"; 
file_put_contents("sort.csv",$txt,FILE_APPEND);

}
$txt="truncate table 2ndyearapplicable";
mysqli_query($conn,$txt);
echo "merit list ready to download";

$stmt->close();

$conn->close();

?>