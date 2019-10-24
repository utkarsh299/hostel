<?php 
  
  
  // code for allotment of room one by one


$conn = new mysqli("localhost","id11047988_utkarsh","passwd@123","id11047988_utkarsh");

$copy=$_GET["q"];
$avg=0;
$z=0;

while($z!=30){
	$z++;
	
	$txt="select username from sort where sr=".$copy;
$stmt=mysqli_query($conn,$txt);
$temp=mysqli_fetch_assoc($stmt);
		
		$id=$temp["username"];
	$sql = "SELECT * FROM 2ndyearcheck where username='$id'";
	$retval=mysqli_query($conn,$sql);
	$row = mysqli_fetch_assoc($retval);
	$roo="room".$z;
	
	$room=$row[$roo];
	if(empty($room)){ break;}
	
	$txt="select * from room where roomno='$room'";
	$retval=mysqli_query($conn,$txt);
	$roww= mysqli_fetch_assoc($retval);
	$te="status";
	$check=$roww[$te];
	
	if(empty($check)){
		$txt="update room set status='booked' where roomno='".$room."'";
	    $retval=mysqli_query($conn,$txt);
	$txt="update sort set roomalloted='".$room."'where username='".$id."'";
	$retval=mysqli_query($conn,$txt);
	$txt="update 2ndyearcheck set roomalloted='".$room."'where username='".$id."'";
	$retval=mysqli_query($conn,$txt);

	break;}

}
$stmt=mysqli_query($conn,"select * from sort");
while($row = mysqli_fetch_assoc($stmt)){
    
    echo "<tr><td>".$row['sr']."</td>"."<td>".$row['id1']."</td> "."<td>".$row['name1']." </td>"."<td>".$row['id2']." </td>"."<td>".$row['name2']."</td> "."<td>".$row['id3']."</td> "."<td>".$row['name3']."</td> "."<td>".$row['roomalloted']."</td>"."</tr>";
    
}

$conn->close();
?>

